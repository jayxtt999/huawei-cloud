<?php
/**
 * private number ax模式通用的参数参考:https://support.huaweicloud.com/devg-PrivateNumber/privatenumber_01_0006.html
 */

namespace HuaWeiCloud\Common\v20200508;

use HuaWeiCloud\Common\v20200320\Profile;
use HuaWeiCloud\Common\v20200320\Base;


class BasePrivateNumber
{
    private $baseUrl; //主url
    private $origNum; //A号码
    private $privateNum;  //X号码
    private $calleeNumDisplay = '0';  // 设置非A用户呼叫X时,A接到呼叫时的主显号码


    /**
     * @return mixed
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param mixed $baseUrl
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return mixed
     */
    public function getOrigNum()
    {
        return $this->origNum;
    }

    /**
     * @param mixed $origNum
     */
    public function setOrigNum($origNum)
    {
        $this->origNum = $origNum;
    }

    /**
     * @return mixed
     */
    public function getPrivateNum()
    {
        return $this->privateNum;
    }

    /**
     * @param mixed $privateNum
     */
    public function setPrivateNum($privateNum)
    {
        $this->privateNum = $privateNum;
    }

    /**
     * @return string
     */
    public function getCalleeNumDisplay()
    {
        return $this->calleeNumDisplay;
    }

    /**
     * @param string $calleeNumDisplay
     */
    public function setCalleeNumDisplay($calleeNumDisplay)
    {
        $this->calleeNumDisplay = $calleeNumDisplay;
    }


    /**
     * 构建X-WSSE值 来自华为原厂
     *
     * @param string $appKey
     * @param string $appSecret
     * @return string
     */
    function buildWsseHeader($appKey, $appSecret)
    {
        date_default_timezone_set("UTC");
        $Created = date('Y-m-d\TH:i:s\Z'); //Created
        $nonce = uniqid(); //Nonce
        $base64 = base64_encode(hash('sha256', ($nonce . $Created . $appSecret), true)); //PasswordDigest

        return sprintf("UsernameToken Username=\"%s\",PasswordDigest=\"%s\",Nonce=\"%s\",Created=\"%s\"", $appKey,
            $base64, $nonce, $Created);
    }

    function getHeader()
    {
        return array(
            'Accept: application/json',
            'Content-Type: application/json;charset=UTF-8',
            'Authorization: WSSE realm="SDP",profile="UsernameToken",type="Appkey"',
            'X-WSSE: ' . $this->buildWsseHeader(Profile::getKey(), Profile::getSecret())
        );
    }

    function getContextOptions($headers, $data = null, $method = 'POST')
    {
        $option = array(
            'http' => array(
                'method' => $method, // 请求方法为POST
                'header' => $headers,
                'ignore_errors' => true // 获取错误码,方便调测
            ),
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false
            ) // 为防止因HTTPS证书认证失败造成API调用失败,需要先忽略证书信任问题
        );
        if ($data) {
            $option['http']['content'] = $data;
        }

        return $option;
    }
}