<?php

namespace HuaWeiCloud\Common\v20200320;

use HuaWeiCloud\Core\v20200320\Signer;
use HuaWeiCloud\Core\v20200320\Request;
use HuaWeiCloud\Common\v20200320\Profile;

class Base
{
    protected $endpoint = '';
    protected $projectId = '';

    /**
     * @return string
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param string $projectId
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }

    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
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

    public function request($url, $type = 'GET', $body = '')
    {

        $signer = new Signer();
        $signer->Key = Profile::getKey();
        $signer->Secret = Profile::getSecret();

        $req = new Request($type, $url);

        $req->headers = array(
            'content-type' => 'application/json',
        );
        $req->body = $body;
        $curl = $signer->Sign($req);
        $response = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($status != 200) {
            throw new \Exception('获取远程资源失败');
        }
        curl_close($curl);
        $response = json_decode($response);
        $response = $this->objectToArray($response);
        return $response;
    }
}