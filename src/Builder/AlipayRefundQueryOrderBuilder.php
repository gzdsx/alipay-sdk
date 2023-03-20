<?php
/**
 * ============================================================================
 * Copyright (c) 2015-2023 贵州大师兄信息技术有限公司 All rights reserved.
 * siteַ: https://www.gzdsx.cn
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0.0
 * ---------------------------------------------
 * Date: 2023/3/20
 * Time: 下午9:37
 */

namespace AlipaySdk\Builder;

/**
 * 退款查询
 * Class AlipayRefundQueryOrderBuilder
 * @package AlipaySdk\Builder
 *
 * 支付宝交易号。
 * 和商户订单号不能同时为空
 * @property string $trade_no
 *
 * 商户订单号。
 * 订单支付时传入的商户订单号,和支付宝交易号不能同时为空。
 * @property string $out_trade_no
 *
 * 退款请求号。
 * 请求退款接口时，传入的退款请求号，如果在退款请求时未传入，则该值为创建交易时的商户订单号。
 * @property string $out_request_no
 *
 * 询选项，商户通过上送该参数来定制同步需要额外返回的信息字段，数组格式。
 * 枚举支持：
 * refund_detail_item_list：本次退款使用的资金渠道；
 * gmt_refund_pay：退款执行成功的时间；
 * deposit_back_info：银行卡冲退信息；
 * @property array $query_options
 */
class AlipayRefundQueryOrderBuilder extends AlipayOrderBuilder
{

}
