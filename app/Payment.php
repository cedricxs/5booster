<?php

/*
 * 有关stripe支付的接口说明
 *
 * 单次支付：
 *      银行卡支付：
 *          使用paymentIntent进行支付, 主要参数为 支付金额 支付方式(payment method id)
 *      alipay支付：
 *          使用source支付, 先获取source(chargeable), 经过webhook(推荐)或重定向后再利用charge对象(充值接口)进行支付, charge接口以source id和金额为参数
 *
 * 银行卡记录支付(订阅, 记住支付方式):
 *      记录支付方式:
 *          使用setupIntent接口进行记录payment method(银行卡), 再确认后利用addPaymentMethod(Payment id)添加支付方式
 *
 * 订阅:
 *      现在stripe设置订阅, 再根据订阅类型, 定期类型预创建, 最后根据payment method创建生产订阅
 *
 *
 */
