<?php
/**
 * ============================================================================
 * Copyright (c) 2015-2020 贵州大师兄信息技术有限公司 All rights reserved.
 * siteַ: https://www.gzdsx.cn
 * ============================================================================
 * @author:     David Song<songdewei@163.com>
 * @version:    v1.0.0
 * ---------------------------------------------
 * Date: 2020/4/28
 * Time: 1:49 上午
 */

namespace AlipaySdk\Response;


/**
 * Class AlipayResponse
 * @package Alipay\Response
 * @property-read string $msg
 * @property-read string $code
 * @property-read string $sub_code
 * @property-read string $sub_msg
 */
class AlipayResponse
{
    protected $response = [];

    /**
     * AlipayResponse constructor.
     * @param array $response
     */
    public function __construct($response = [])
    {
        $this->response = $response;
    }

    public function all()
    {
        return $this->response;
    }

    /**
     * @return bool
     */
    public function success()
    {
        return $this->msg == 'Success';
    }


    public function __set($name, $value)
    {
        $this->response[$name] = $value;
    }

    public function __get($name)
    {
        return $this->response[$name] ?? null;
    }

}
