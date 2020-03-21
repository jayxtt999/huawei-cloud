<?php

namespace HuaWeiCloud\Ecs\v20200320;

use HuaWeiCloud\Common\v20200320\Base;
class Detail extends Base
{
    public function action()
    {
        $projectId = $this->getProjectId();
        $endpoint = $this->getEndpoint();
        $serverId = $this->getServerId();
        $url = "https://ecs.{$endpoint}.myhuaweicloud.cn/v1/{$projectId}/cloudservers/{$serverId}";
        return $this->request($url, 'GET');
    }
}