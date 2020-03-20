<?php

namespace HuaWeiCloud\Esc\v20200320;

use HuaWeiCloud\Common\v20200320\Base;

class Stop extends Base
{
    public function action()
    {
        $projectId = $this->getProjectId();
        $endpoint = $this->getEndpoint();
        $url = "https://ecs.{$endpoint}.myhuaweicloud.cn/v1/{$projectId}/cloudservers/action";
        $data = array(
            'os-stop' => array(
                'type' => 'SOFT',
                'servers' => array(array('id' => $this->getServerId())),
            ),
        );
        return $this->request($url, 'POST', $data);
    }
}