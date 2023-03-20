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
 * Time: 2:01 上午
 */

namespace AlipaySdk\Application;


/**
 * Class AppPayApplication
 * @package AlipaySdk\Application
 */

class AppPayApplication extends AlipayApplication
{
    protected $apiMethod = 'alipay.trade.app.pay';

    /**
     * @return string
     */
    public function createPayStr()
    {
        $this->makeSign();
        return http_build_query($this->params);
    }
}
