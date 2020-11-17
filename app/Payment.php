<?php

/*
 * 有关stripe支付的接口说明
 *
 * 单次支付：
 *      银行卡支付：
 *          使用paymentIntent进行支付, 主要参数为 支付金额 支付方式(payment method id), 分为create(收集银行卡信息前)和confirm阶段(除非confirm = true)
 *      先收集前端支付信息再一次性payment_intent方法:
 *          Billable里的charge方法即是本种支付方式，先从前端的stripe获取payment_method_id
 *          至于从前端获取payment_method_id的方法,可以在前端收集银行卡信息后createPaymentMethod,生成payment_method再api给后端进行charge
 *          这种情况虽然产生了payment_method,但是并没有将其attach在某一个客户身上,所以可以当做一次性支付
 *      先在服务器创建payment_intent对象,不具有支付力的对象,将其包含的客户密钥传给前端,由前端收集银行卡信息后通过confirmCardPayment(客户密钥,银行卡信息)完成一次payment_intent
 *      alipay支付：
 *          使用source(和payment_method并列)支付, 先获取source(chargeable), 经过webhook(推荐)或重定向后再利用charge对象(充值接口)进行支付, charge接口以source id和金额为参数
 *          charge接口和paymentIntent是并列的两种支付接口 https://stripe.com/docs/payments/charges-api
 *      ！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！
 *      注意，使用charge接口进行支付已经过时，现在统一用paymentIntent接口进行支付 The Charges API is an older payments API that does not handle bank requests for card authentication. Try our new payments APIs and integrations instead.
 *          并且建议在服务器createPaymentIntent并将clientsecret传给前端,由前端confirmCardPayment/confirmAlipayPayment的方法,
 *          在上述两个方法中传入return_url参数处理支付结果路由，如果需要require_action,stripe会自动跳转到支付验证页面,并在验证结束后自动返回验证结果和这次的paymentIntentId和redirect_status给return_url路由
 *          这种方法(先后端生成paymentIntent在前端confirm)很简便,如需支付验证自动跳转并自动跳转回来,所以在return_url路由中处理支付结果(注意,详情见注意1),如果redirect_status成功,则在数据库中记录本次paymentIntentId等支付信息,
 *          用以后续退款或发票
 *          如果不使用confirmCardPayment,则在后端createPaymentIntent时传入confirm=true，confirmation_method: "manual",如果需要支付验证则需要手动读取require_action中的rediret_to_url给前端进行支付验证 https://stripe.com/docs/payments/accept-a-payment-synchronously
 *          在创建paymentIntent时传入receipt_email用于给用户发送支付收据邮件,在test模式下不会发送收据
 * ！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！
 * 在退款时,以paymentIntent或charge的id作为参数,所以应创建一个表来记录每次支付的id用以退款
 * 银行卡记录支付(订阅, 记住支付方式):
 *      记录支付方式:
 *          使用setupIntent接口进行记录payment method(银行卡)
 *          或者用上述方法生成的payment_method后,attach到一个客户身上,就同样是添加支付方式
 * 订阅:
 *      先在stripe设置订阅, 再根据订阅类型, 定期类型预创建, 最后根据payment method创建订阅
 *      并自动将此支付方式添加为默认支付方式(在cashier中实现)，并用来给后续续订账单支付
 *      在此框架中,订阅也根据payment_method_id作为参数,但会记住此参数,并将其更新为该用户的默认支付方式,以便在更新订阅时生成账单并自动支付
 *      订阅通过Invoice账单来管理支付,可以通过此webhook来接受用户每个月的订阅费缴费情况
 *      订阅一般来说只取消订阅,当月取消的订阅费并不退款
 *      注意, 订阅周期内的每次交费,由stripe的账单系统自动管理,很方便，当用户自动支付失败后会触发invoice.payment_failed,可在此对客户发邮件提醒支付
 *      账单的生命周期中,可触发的webhook: upcoming(到期7天前触发 status:draft)->created(到期当天, auto_advanced为true,在1小时后自动转换状态为draft->finalized)
 *      ->invoice.paid(在账单状态为finalized(open)后支付成功) 或 invoice.payment_failed(在账单默认支付方式失败后触发)
 *
 *
 * 整体上来说,支付方式有source_id,payment_method_id等,支付提交和记录的方式有paymentIntent和charge等.
 * 在stripe的官方文档里都写得很清w楚 https://stripe.com/docs/api
 *
 * 账单有两种支付方式,分别是发送到客户邮箱通过邮件银行卡支付,和通过用户的默认支付方式支付
 * 获取账单的方法: 在Payment_Intent里有invoice可以获取,并不是每一个paymentIntent都有invoice,准确来说是先有Invoice后发起paymentIntent
 * 在这里的Invoice其实就是账单,包括One-Off一次性支付的订单和subscription按照支付周期自动生成的账单
 * 所以一般出现在subscription中.并在Billable中调用findInvoice(invoice_id)获取账单。对于一般的paymentIntent，使用receipt_email给用户提供收据.
 * 对于subscription来说,可以通过Billable的invoices()来获取该用户所有的账单,即包括了每月订阅费的账单
 * 或Billable->subscription(name) 获取到$Subscription后$Subscription->invoice()获取该订阅的账单
 * 若非要当此支付订阅的账单, 可用Billable->subscription(name) 获取到$Subscription后$Subscription->latestPayment()
 * 获取最新一次账单
 * https://stripe.com/docs/billing/subscriptions/overview
 *
 *
 * 对于此应用:
 * 用户进入订阅页面, 选择订阅方式, 点击确定后进入银行卡输入页面
 * 在此页面中获取paymentMethod并递交给后端api/abonner, 在此路由中生成订阅, 自动记录支付方式为默认支付方式
 *
 *
 * 防止用户多次支付:
 * 在用户选择商品后，在后端生成多种支付方式的paymentIntent进入确认支付页面,在确认支付页面选择支付方式并confirm相应的paymentIntent
 * 然后前端立刻跳转至等待页面防止用户多次提交(其实多次提交confirm的同一个paymentIntent应该也没问题)
 *
 *
 * 注意1:
 *  建议使用webhook,不要将支付成功的处理逻辑放在此处,但是可以给用户显示一些提示信息(或者说只用来给用户显示提示信息)。
 *  支付成功的订单处理逻辑最好放在webhook路由
 *  因为一旦网络不好服务器可能接收不到支付,而用户已经扣款。但是webhook会检测服务器是否回应,所以更有保障
 *  (当confirm_type为automatic时会自动扣款并重定向到此来处理支付成功逻辑,
 *  但如果为manual则此次paymentIntent的status会是requires_confirmation)
 *
 *
 * https://stripe.com/docs/payments/save-and-reuse这个网站关于stripe的doc,写的很清晰,有代码示例
 * https://stripe.com/docs/api/setup_intents/confirm这个网站关于stripe的api详细信息
 * https://stripe.com/docs/js/setup_intents/confirm_card_setup这个网站关于前端js的调用api
 */
