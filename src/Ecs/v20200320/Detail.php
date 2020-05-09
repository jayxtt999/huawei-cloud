<?php

namespace HuaWeiCloud\Ecs\v20200320;

use HuaWeiCloud\Common\v20200320\Base;
use HuaWeiCloud\Common\v20200320\Common;

class Detail extends Base implements Common
{
    public function action()
    {
        $projectId = Base::getProjectId();
        $endpoint = Base::getEndpoint();
        $serverId = Base::getServerId();
        $url = "https://ecs.{$endpoint}.myhuaweicloud.cn/v1/{$projectId}/cloudservers/{$serverId}";
        return $this->request($url, 'GET');
    }
}