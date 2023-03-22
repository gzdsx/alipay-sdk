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
 * Time: 下午8:24
 */

namespace AlipaySdk\Builder;

/**
 * Class AlipayOrderBuilder
 * @package AlipaySdk\Builder
 */
class AlipayOrderBuilder
{
    protected $atributes = [];

    public function __construct($atributes = [])
    {
        $this->make($atributes);
    }

    public function make($atributes)
    {
        $this->atributes = $atributes;
    }

    public function all()
    {
        return $this->atributes;
    }

    public function toArray()
    {
        foreach ($this->atributes as $k => $v) {
            if (is_numeric($k) || is_null($v) || empty($v)) {
                unset($this->atributes[$k]);
            }
        }

        return $this->atributes;
    }

    /**
     * @return false|string
     */
    public function toJson()
    {
        return json_encode($this->toArray(), JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return false|string
     */
    public function getBizContent()
    {
        return $this->toJson();
    }

    public function __set($name, $value)
    {
        $this->atributes[$name] = $value;
    }

    public function __get($name)
    {
        return $this->atributes[$name] ?? null;
    }
}
