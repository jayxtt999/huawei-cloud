<?php

namespace HuaWeiCloud\Ecs\v20200320;

use HuaWeiCloud\Common\v20200320\Base;
class ListEcs extends Base
{
    public function action()
    {
        $projectId = $this->getProjectId();
        $endpoint = $this->getEndpoint();
        $url = "https://ecs.{$endpoint}.myhuaweicloud.cn/v1/{$projectId}/cloudservers/detail?offset=1&limit=1000";
        return $this->request($url, 'GET');
    }
}