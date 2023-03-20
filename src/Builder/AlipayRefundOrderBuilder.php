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
 * Time: 下午9:30
 */

namespace AlipaySdk\Builder;

/**
 * 退款
 * Class AlipayRefundOrder
 * @package AlipaySdk\Builder
 *
 * 商户订单号。
 * 订单支付时传入的商户订单号，商家自定义且保证商家系统中唯一。与支付宝交易号 trade_no 不能同时为空。
 * @property string $out_trade_no
 *
 * 支付宝交易号。
 * 和商户订单号 out_trade_no 不能同时为空。
 * @property string $trade_no
 *
 * 退款金额。
 * 需要退款的金额，该金额不能大于订单金额，单位为元，支持两位小数。
 * @property float $refund_amount
 *
 * 退款原因说明。
 * 商家自定义，将在会在商户和用户的pc退款账单详情中展示
 * @property string $refund_reason
 *
 * 退款请求号。
 * 标识一次退款请求，需要保证在交易号下唯一，如需部分退款，则此参数必传。
 * @property string $out_request_no
 *
 * 退分账明细信息。注：
 * 1.当面付且非直付通模式无需传入退分账明细，系统自动按退款金额与订单金额的比率，从收款方和分账收入方退款，不支持指定退款金额与退款方。
 * 2.直付通模式，电脑网站支付，手机 APP 支付，手机网站支付产品，须在退款请求中明确是否退分账，从哪个分账收入方退，退多少分账金额；如不明确，默认从收款方退款，收款方余额不足退款失败。不支持系统按比率退款。
 * @property array $refund_royalty_parameters
 *
 * 查询选项。
 * 商户通过上送该参数来定制同步需要额外返回的信息字段，数组格式。支持：
 * refund_detail_item_list：退款使用的资金渠道；
 * deposit_back_info：触发银行卡冲退信息通知；
 * @property string $query_options
 */
class AlipayRefundOrderBuilder extends AlipayOrderBuilder
{

}
