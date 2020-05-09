<?php
/**
 * 解绑
 */

namespace HuaWeiCloud\PrivateNumberAX\v20200508;


use HuaWeiCloud\Common\v20200320\Common;
use HuaWeiCloud\Common\v20200508\BasePrivateNumber;

class UnBind extends BasePrivateNumber implements Common
{

    function action()
    {
        $data = http_build_query(array(
            'origNum' => $this->getOrigNum(),
            'privateNum' => $this->getPrivateNum(),
        ));

        $contextOptions = $this->getContextOptions($this->getHeader(), null, 'DELETE');
        $url = $this->getBaseUrl() . '/rest/provision/caas/privatenumber/v1.0?' . $data;

        try {
            $response = file_get_contents($url, false, stream_context_create($contextOptions)); // 发送请求
            return $response;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}