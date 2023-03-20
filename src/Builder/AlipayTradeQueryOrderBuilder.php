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
 * Time: 下午9:41
 */

namespace AlipaySdk\Builder;

/**
 * 线下交易查询
 * Class AlipayTradeQueryOrderBuilder
 * @package AlipaySdk\Builder
 *
 * 订单支付时传入的商户订单号,和支付宝交易号不能同时为空。
 * trade_no,out_trade_no如果同时存在优先取trade_no
 * @property string $out_trade_no
 *
 * 支付宝交易号，和商户订单号不能同时为空
 * @property string $trade_no
 *
 * 银行间联模式下有用，其它场景请不要使用；
 * 双联通过该参数指定需要查询的交易所属收单机构的pid;
 * @property string $org_pid
 *
 * 查询选项，商户传入该参数可定制本接口同步响应额外返回的信息字段，数组格式。
 * 支持枚举如下：
 * trade_settle_info：返回的交易结算信息，包含分账、补差等信息；
 * fund_bill_list：交易支付使用的资金渠道；
 * voucher_detail_list：交易支付时使用的所有优惠券信息；
 * dscount_goods_detail：交易支付所使用的单品券优惠的商品优惠信息；
 * iscount_amount：商家优惠金额；
 * @property array $query_options
 */
class AlipayTradeQueryOrderBuilder extends AlipayOrderBuilder
{

}
