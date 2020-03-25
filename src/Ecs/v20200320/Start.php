<?php

namespace HuaWeiCloud\Ecs\v20200320;

use HuaWeiCloud\Common\v20200320\Base;

class Start extends Base
{
    public function action()
    {
        $projectId = Base::getProjectId();
        $endpoint = Base::getEndpoint();
        $url = "https://ecs.{$endpoint}.myhuaweicloud.cn/v1/{$projectId}/cloudservers/action";
        $data = array(
            'os-start' => array(
                'type' => 'SOFT',
                'servers' => array(array('id' => Base::getServerId())),
            ),
        );
        return $this->request($url, 'POST', $data);
    }
}