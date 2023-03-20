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
 * Time: 下午9:16
 */

namespace AlipaySdk\Builder;

/**
 * 公共请求参数
 * Class AlipayCommonParamBuilder
 * @package AlipaySdk\Builder
 * @property string $app_id
 * @property string $method
 * @property string $format
 * @property string $charset
 * @property string $sign_type
 * @property string $timestamp
 * @property string $version
 * @property string $notify_url
 * @property string $return_url
 * @property string $biz_content
 * @property string $app_auth_token
 */
class AlipayCommonParamBuilder
{
    protected $params = [
        'format' => 'json',
        'charset' => 'utf-8',
        'sign_type' => 'RSA2',
        'version' => '1.0',
    ];

    public function __construct($params = [])
    {
        $this->params = $params;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->params;
    }

    public function __set($name, $value)
    {
        $this->params[$name] = $value;
    }

    public function __get($name)
    {
        return $this->params[$name] ?? null;
    }
}
