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
 * Time: 下午7:29
 */

namespace AlipaySdk;

/**
 * Class AlipaySdk
 * @package AlipaySdk
 * @method static \AlipaySdk\Application\PagePayApplication pagePay() 网页支付
 * @method static \AlipaySdk\Application\AppPayApplication appPay() app支付
 * @method static \AlipaySdk\Application\QueryApplication query() 订单查询
 * @method static \AlipaySdk\Application\CloseApplication close() 关闭订单
 * @method static \AlipaySdk\Application\RefundApplication refund() 退款
 * @method static \AlipaySdk\Application\RefundQueryApplication refundQuery() 退款查询
 */
class AlipaySdk
{
    public static $appId;
    public static $rsaPrivateKey;
    public static $rsaPublicKey;
    public static $returnUrl;
    public static $notifyUrl;

    private static $appMap = [
        'pagePay' => \AlipaySdk\Application\PagePayApplication::class,
        'appPay' => \AlipaySdk\Application\AppPayApplication::class,
        'query' => \AlipaySdk\Application\QueryApplication::class,
        'close' => \AlipaySdk\Application\CloseApplication::class,
        'refund' => \AlipaySdk\Application\RefundApplication::class,
        'refundQuery' => \AlipaySdk\Application\RefundQueryApplication::class,
    ];

    /**
     * @param string $appId 支付宝签约的APPID
     * @param string $rsaPrivateKey 支付宝私钥
     * @param string $rsaPublicKey 支付宝公钥
     * @param null $defaultNotifyUrl 默认通知地址
     * @param null $defaultReturnUrl 默认返回页地址
     */
    public static function register($appId, $rsaPrivateKey, $rsaPublicKey, $defaultNotifyUrl = null, $defaultReturnUrl = null)
    {
        static::$appId = $appId;
        static::$rsaPublicKey = $rsaPublicKey;
        static::$rsaPrivateKey = $rsaPrivateKey;
        static::$notifyUrl = $defaultNotifyUrl;
        static::$returnUrl = $defaultReturnUrl;
    }

    /**
     * @param $name
     * @param array $config
     * @return mixed
     */
    public static function make($name, $config = [])
    {
        $application = self::$appMap[$name];
        return new $application($config);
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return self::make($name, ...$arguments);
    }
}
