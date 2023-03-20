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
 * Time: 1:27 上午
 */

namespace AlipaySdk\Application;


/**
 * Class PagePayApplication
 * @package AlipaySdk\Application
 */

class PagePayApplication extends AlipayApplication
{
    protected $apiMethod = 'alipay.trade.page.pay';
    /**
     * @return string
     */
    public function buildRequestForm()
    {
        $this->makeSign();
        $sHtml = '<!DOCTYPE html><html lang="zh"><head><title>Alipay</title></head><body>' . "\n";
        $sHtml .= "<form id='alipaysubmit' name='alipaysubmit' action='" . $this->gateway . "' method='POST'>\n";
        foreach ($this->params as $key => $val) {
            $val = str_replace("'", "&apos;", $val);
            $sHtml .= "<input type='hidden' name='" . $key . "' value='" . $val . "'/>\n";
        }

        //submit按钮控件请不要含有name属性
        $sHtml = $sHtml . "</form>";
        $sHtml = $sHtml . "<script>document.getElementById('alipaysubmit').submit();</script></body></html>";

        return $sHtml;
    }
}
