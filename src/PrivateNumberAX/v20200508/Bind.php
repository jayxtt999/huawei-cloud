<?php
/**
 * 绑定号码
 */

namespace HuaWeiCloud\PrivateNumberAX\v20200508;

use HuaWeiCloud\Common\v20200320\Common;
use HuaWeiCloud\Common\v20200508\BasePrivateNumber;

/**
 * Class Bind
 * @package HuaWeiCloud\PrivateNumberAX\v20200508
 */
class Bind extends BasePrivateNumber implements Common
{
    function action()
    {
        $data = json_encode(array(
            'origNum' => $this->getOrigNum(),
            'privateNum' => $this->getPrivateNum(),
            'calleeNumDisplay' => $this->getCalleeNumDisplay(),
        ));

        $contextOptions = $this->getContextOptions($this->getHeader(), $data);
        $url = $this->getBaseUrl() . '/rest/provision/caas/privatenumber/v1.0';

        try {
            $response = file_get_contents($url, false, stream_context_create($contextOptions)); // 发送请求
            return $response;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}