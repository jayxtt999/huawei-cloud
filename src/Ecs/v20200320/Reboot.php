<?php

namespace HuaWeiCloud\Ecs\v20200320;

use HuaWeiCloud\Common\v20200320\Base;

class Reboot extends Base
{
    public function action()
    {
        $projectId = Base::getProjectId();
        $endpoint = Base::getEndpoint();
        $url = "https://ecs.{$endpoint}.myhuaweicloud.cn/v1/{$projectId}/cloudservers/action";
        $data = array(
            'reboot' => array(
                'type' => 'SOFT',
                'servers' => array(array('id' => $this->getServerId())),
            ),
        );
        return $this->request($url, 'POST', $data);
    }
}