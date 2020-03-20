<?php

namespace HuaWeiCloud\Common\v20200320;
class ListProject extends Base
{
    public function listAll()
    {
        $endpoint = $this->getEndpoint();
        $url = "https://ecs.{$endpoint['key']}.myhuaweicloud.com/v3/projects";
        return $this->request($url, 'GET');
    }
}