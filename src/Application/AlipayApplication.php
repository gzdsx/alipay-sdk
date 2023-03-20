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
 * Time: 1:22 上午
 */

namespace AlipaySdk\Application;


use AlipaySdk\AlipaySdk;

/**
 * Class AlipayApplication
 * @package AlipaySdk\Application
 *
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
abstract class AlipayApplication
{

    protected $gateway = 'https://openapi.alipay.com/gateway.do';
    protected $rsaPrivateKey = '';
    protected $rsaPublicKey = '';
    //api接口名称
    protected $apiMethod = 'alipay.trade.app.pay';

    protected $params = [
        'format' => 'json',
        'charset' => 'utf-8',
        'sign_type' => 'RSA2',
        'version' => '1.0',
    ];


    public function __construct()
    {
        $this->app_id = AlipaySdk::$appId;
        $this->return_url = AlipaySdk::$returnUrl;
        $this->notify_url = AlipaySdk::$notifyUrl;
        $this->timestamp = date('Y-m-d H:i:s');
        $this->method = $this->apiMethod;

        $this->rsaPublicKey = AlipaySdk::$rsaPublicKey;
        $this->rsaPrivateKey = AlipaySdk::$rsaPrivateKey;
    }

    /**
     * @param $appid
     * @return $this
     */
    public function setAppId($appid)
    {
        $this->app_id = $appid;
        return $this;
    }

    /**
     * @param $method
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @param $format
     * @return $this
     */
    public function setFormat($format)
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @param $charset
     * @return $this
     */
    public function setCharset($charset)
    {
        $this->charset = $charset;
        return $this;
    }

    /**
     * @param $signType
     * @return $this
     */
    public function setSignType($signType)
    {
        $this->sign_type = $signType;
        return $this;
    }

    /**
     * @param $timestamp
     * @return $this
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @param $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @param $app_auth_token
     * @return $this
     */
    public function setAppAuthToken($app_auth_token)
    {
        $this->app_auth_token = $app_auth_token;
        return $this;
    }

    /**
     * @param $bizContent
     * @return $this
     */
    public function setBizContent($bizContent)
    {
        $this->biz_content = $bizContent;
        return $this;
    }

    /**
     * @param $url
     * @return $this
     */
    public function setNotifyUrl($url)
    {
        $this->notify_url = $url;
        return $this;
    }

    /**
     * @param $url
     * @return $this
     */
    public function setReturnUrl($url)
    {
        $this->return_url = $url;
        return $this;
    }

    /**
     * @param $rsaPrivateKey
     * @return $this
     */
    public function setRsaPrivateKey($rsaPrivateKey)
    {
        $this->rsaPrivateKey = $rsaPrivateKey;
        return $this;
    }

    /**
     * @param $rsaPublicKey
     * @return $this
     */
    public function setRsaPublicKey($rsaPublicKey)
    {
        $this->rsaPublicKey = $rsaPublicKey;
        return $this;
    }

    /**
     * @return array|mixed
     */
    public function sendRequest()
    {
        $this->makeSign();
        return $this->postData($this->params);
    }


    /**
     * 生成签名
     */
    protected function makeSign()
    {
        $this->prepareParams();
        $this->params['sign'] = $this->sign($this->buildParams($this->params));
    }

    /**
     * 去除不合法的参数
     */
    protected function prepareParams()
    {
        foreach ($this->params as $k => $v) {
            if (is_numeric($k) || $v == null || $v == '') unset($this->params[$k]);
        }
    }

    /**
     * @param $params
     * @return string
     */
    protected function buildParams($params)
    {
        ksort($params);
        $newparams = [];
        foreach ($params as $key => $value) {
            $newparams[] = "$key=$value";
        }
        return implode('&', $newparams);
    }

    /**
     * @param $data
     * @return string
     */
    protected function rsaEncode($data)
    {
        $sign = '';
        $publicKey = "-----BEGIN PUBLIC KEY-----\n" .
            wordwrap($this->rsaPublicKey, 64, "\n", true) .
            "\n-----END PUBLIC KEY-----";
        openssl_public_encrypt($data, $sign, $publicKey);
        return $sign;
    }

    /**
     * @param $data
     * @return string|null
     */
    protected function sign($data)
    {
        $sign = null;
        $privateKey = "-----BEGIN RSA PRIVATE KEY-----\n" .
            wordwrap($this->rsaPrivateKey, 64, "\n", true) .
            "\n-----END RSA PRIVATE KEY-----";
        openssl_sign($data, $sign, $privateKey, OPENSSL_ALGO_SHA256);
        $sign = base64_encode($sign);
        return $sign;
    }

    /**
     * @param array $data
     * @param int $ssl
     * @param int $timeout
     * @return mixed
     */
    protected function curl($data = [], $ssl = false, $timeout = 500)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->gateway);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, $ssl);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, $ssl);
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        $res = curl_exec($curl);
        curl_close($curl);
        return $res;
    }

    /**
     * @param $data
     * @return array|mixed
     */
    protected function postData($data)
    {
        return json_decode($this->curl($data), true);
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
