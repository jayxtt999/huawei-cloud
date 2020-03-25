<?php

namespace HuaWeiCloud\Common\v20200320;

use HuaWeiCloud\Core\v20200320\Signer;
use HuaWeiCloud\Core\v20200320\Request;
use HuaWeiCloud\Common\v20200320\Profile;

abstract class Base
{
    protected static $endpoint = '';
    protected static $projectId = '';
    protected static $serverId = ''; //服务器id
    protected static $customerId = '';

    /**
     * @return string
     */
    public static function getEndpoint()
    {
        return self::$endpoint;
    }

    /**
     * @param string $endpoint
     */
    public static function setEndpoint($endpoint)
    {
        self::$endpoint = $endpoint;
    }

    /**
     * @return string
     */
    public static function getProjectId()
    {
        return self::$projectId;
    }

    /**
     * @param string $projectId
     */
    public static function setProjectId($projectId)
    {
        self::$projectId = $projectId;
    }

    /**
     * @return string
     */
    public static function getServerId()
    {
        return self::$serverId;
    }

    /**
     * @param string $serverId
     */
    public static function setServerId($serverId)
    {
        self::$serverId = $serverId;
    }

    /**
     * @return string
     */
    public static function getCustomerId()
    {
        return self::$customerId;
    }

    /**
     * @param string $customerId
     */
    public static function setCustomerId($customerId)
    {
        self::$customerId = $customerId;
    }

    public function objectToArray($object)
    {
        $object = (array)$object;
        foreach ($object as $key => $value) {
            if (gettype($value) == 'resource') {
                return;
            }
            if (gettype($value) == 'object' || gettype($value) == 'array') {
                $object[$key] = (array)$this->objectToArray($value);
            }
        }

        return $object;
    }

    public function request($url, $type = 'GET', $data = array())
    {

        $signer = new Signer();
        $signer->Key = Profile::getKey();
        $signer->Secret = Profile::getSecret();

        $req = new Request($type, $url);

        $req->headers = array(
            'content-type' => 'application/json',
        );
        if ($data) {
            $body = json_encode($data);
        } else {
            $body = '';
        }
        $req->body = $body;
        $curl = $signer->Sign($req);
        $response = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $newLine = 'cli' == php_sapi_name() ? "\r\n" : '<br>';
        if ($status != 200) {
            //这里不throw是因为外面有foreach 不想断foreach
            echo '获取远程资源失败,code是:' . $status . ',url是:' . $url . $newLine;
            //throw new \Exception('获取远程资源失败,code是:' . $status . ',url是:' . $url);
        }
        curl_close($curl);
        $response = json_decode($response);
        $response = $this->objectToArray($response);
        return $response;
    }
}