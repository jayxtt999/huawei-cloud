<?php

namespace HuaWeiCloud\Ecs\v20200320;

use HuaWeiCloud\Common\v20200320\Base;
use HuaWeiCloud\Common\v20200320\Common;

class ListEcs extends Base implements Common
{
    public function action()
    {
        $projectId = Base::getProjectId();
        $endpoint = Base::getEndpoint();
        $url = "https://ecs.{$endpoint}.myhuaweicloud.cn/v1/{$projectId}/cloudservers/detail?offset=1&limit=1000";
        return $this->request($url, 'GET');
    }
}