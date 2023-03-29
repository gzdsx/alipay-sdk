<?php
/**
 * ============================================================================
 * Copyright (c) 2015-2023 贵州大师兄信息技术有限公司 All rights reserved.
 * siteַ: https://www.gzdsx.cn
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0.0
 * ---------------------------------------------
 * Date: 2023/3/29
 * Time: 下午7:01
 */

use AlipaySdk\Builder\AlipayRefundOrderBuilder;
use AlipaySdk\Builder\AlipayRefundQueryOrderBuilder;
use AlipaySdk\Builder\AlipayUnifiedOrderBuilder;
use AlipaySdk\AlipaySdk;

$order = new AlipayUnifiedOrderBuilder();
$order->out_trade_no = time();
$order->subject = '测试商品';
$order->total_amount = 100;


AlipaySdk::appPay()->setBizContent($order->getBizContent())->createPayStr();

AlipaySdk::pagePay()->setBizContent($order->getBizContent())->buildRequestForm();

AlipaySdk::query()->setBizContent([
    'out_trade_no'=>'你的订单号'
])->sendRequest();

AlipaySdk::close()->setBizContent(['out_trade_no'=>'你的订单号'])->sendRequest();

$order = new AlipayRefundOrderBuilder();
$order->out_trade_no = '你的订单号';
$order->refund_amount = '退款金额';
$order->refund_reason = '退款原因';

AlipaySdk::refund()->setBizContent($order->getBizContent())->sendRequest();

AlipaySdk::refundQuery()->setBizContent(['out_trade_no'=>'你的订单号'])->sendRequest();
