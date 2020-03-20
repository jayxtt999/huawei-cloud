<?php

namespace HuaWeiCloud\Esc\v20200320;

use HuaWeiCloud\Common\v20200320\Base;
class ListEsc extends Base
{
    public function getList()
    {
        $projectId = $this->getProjectId();
        $endpoint = $this->getEndpoint();
        $url = "https://ecs.{$endpoint['key']}.myhuaweicloud.cn/v1/{$projectId}/cloudservers/detail?offset=1&limit=1000";
        return $this->request($url, 'GET');
    }
}