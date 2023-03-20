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
 * Time: 下午9:34
 */

namespace AlipaySdk\Builder;

/**
 * 关闭订单
 * Class AlipayCloseOrderBuilder
 * @package AlipaySdk\Builder
 *
 * 该交易在支付宝系统中的交易流水号。最短 16 位，最长 64 位。和out_trade_no不能同时为空，如果同时传了 out_trade_no和 trade_no，则以 trade_no为准。
 * @property string $trade_no
 *
 * 订单支付时传入的商户订单号,和支付宝交易号不能同时为空。 trade_no,out_trade_no如果同时存在优先取trade_no
 * @property string $out_trade_no
 *
 * 商家操作员编号 id，由商家自定义
 * @property string $operator_id
 */
class AlipayCloseOrderBuilder extends AlipayOrderBuilder
{

}
