<?php

namespace HuaWeiCloud\Common\v20200320;
class ListProject extends Base
{
    public function action()
    {
        $endpoint = $this->getEndpoint();
        $url = "https://ecs.{$endpoint}.myhuaweicloud.com/v3/projects";
        return $this->request($url, 'GET');
    }
}