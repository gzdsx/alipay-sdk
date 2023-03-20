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


class AlipayOrderBuilder
{
    protected $order = [];

    public function __construct($order = [])
    {
        $this->order = $order;
    }

    public function setOrder($orer)
    {
        $this->order = $orer;
    }

    /**
     * @return array
     */
    public function order()
    {
        foreach ($this->order as $k => $v) {
            if (is_numeric($k) || is_null($v) || empty($v)) {
                unset($this->order[$k]);
            }
        }

        return $this->order;
    }

    /**
     * @return false|string
     */
    public function toJson()
    {
        return json_encode($this->order(), JSON_UNESCAPED_UNICODE);
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
        $this->order[$name] = $value;
    }

    public function __get($name)
    {
        return $this->order[$name] ?? null;
    }
}
