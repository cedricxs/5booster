<?php

/*
 * 有关stripe支付的接口说明
 *
 * 单次支付：
 *      银行卡支付：
 *          使用paymentIntent进行支付, 主要参数为 支付金额 支付方式(payment method id)
 *      先收集前端支付信息再一次性payment_intent方法:
 *          Billable里的charge方法即是本种支付方式，先从前端的stripe获取payment_method_id
 *          至于从前端获取payment_method_id的方法,可以在前端收集银行卡信息后createPaymentMethod,生成payment_method再api给后端进行charge
 *          这种情况虽然产生了payment_method,但是并没有将其attach在某一个客户身上,所以可以当做一次性支付
 *      先在服务器创建payment_intent对象,不具有支付力的对象,将其包含的客户密钥传给前端,由前端收集银行卡信息后通过confirmCardPayment(客户密钥,银行卡信息)完成一次payment_intent
 *      alipay支付：
 *          使用source(和payment_method并列)支付, 先获取source(chargeable), 经过webhook(推荐)或重定向后再利用charge对象(充值接口)进行支付, charge接口以source id和金额为参数
 *          charge接口和paymentIntent是并列的两种支付接口 https://stripe.com/docs/payments/charges-api
 * 在退款时,以paymentIntent或charge的id作为参数,所以应创建一个表来记录每次支付的id用以退款
 * 银行卡记录支付(订阅, 记住支付方式):
 *      记录支付方式:
 *          使用setupIntent接口进行记录payment method(银行卡), 再确认后利用addPaymentMethod(Payment id)添加支付方式
 *          或者用上述方法生成的payment_method后,attach到一个客户身上,就同样是添加支付方式
 * 订阅:
 *      先在stripe设置订阅, 再根据订阅类型, 定期类型预创建, 最后根据payment method创建订阅
 *      在此框架中,订阅也根据payment_method_id作为参数,但会记住此参数,并将其更新为该用户的默认支付方式,以便在更新订阅时生成支付订单
 *订阅一般来说只取消订阅,当月取消的订阅费并不退款
 *
 *
 * 整体上来说,支付方式有source_id,payment_method_id等,支付提交和记录的方式有paymentIntent和charge等.
 * 在stripe的官方文档里都写得很清楚 https://stripe.com/docs/api
 */
