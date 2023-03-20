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
 * Time: 下午9:51
 */

namespace AlipaySdk\Builder;

/**
 * 统一下单
 * 官方文档:https://opendocs.alipay.com/open/02e7gq?scene=20
 * Class AlipayUnifiedOrderBuilder
 * @package AlipaySdk\Builder
 *
 * 商户网站唯一订单号。
 * 由商家自定义，64个字符以内，仅支持字母、数字、下划线且需保证在商户端不重复。
 * @property string $out_trade_no
 *
 * 订单总金额，单位为元，精确到小数点后两位，取值范围[0.01,100000000]，金额不能为0
 * @property float $total_amount
 *
 * 订单标题。注意：不可使用特殊字符，如 /，=，& 等。
 * @property string $subject
 *
 * 订单包含的商品列表信息，json格式，其它说明详见商品明细说明
 * @property array $goods_detail
 *
 * 绝对超时时间，格式为yyyy-MM-dd HH:mm:ss
 * @property string $time_expire
 *
 * 业务扩展参数
 * @property string $extend_params
 *
 * 商户传入业务信息，具体值要和支付宝约定，应用于安全，营销等参数直传场景，格式为json格式
 * @property string $business_params
 *
 * 公用回传参数，如果请求时传递了该参数，则返回给商户时会回传该参数。支付宝只会在同步返回（包括跳转回商户网站）和异步通知时将该参数原样返回。
 * 本参数必须进行UrlEncode之后才可以发送给支付宝。
 * @property string $passback_params
 *
 * 商户原始订单号，最大长度限制32位
 * @property string $merchant_order_no
 *
 * 外部指定买家
 * @property string $ext_user_info
 *
 * 返回参数选项。
 * 商户通过传递该参数来定制同步需要额外返回的信息字段，数组格式。
 * 包括但不限于：["hyb_amount","enterprise_pay_info"]
 * @property string $query_options
 *
 * 销售产品码，与支付宝签约的产品码名称。
 * 注：目前电脑支付场景下仅支持FAST_INSTANT_TRADE_PAY
 * 手机支付QUICK_WAP_WAY
 * App支付QUICK_MSECURITY_PAY
 * @property string $product_code
 */
class AlipayUnifiedOrderBuilder extends AlipayOrderBuilder
{

}
