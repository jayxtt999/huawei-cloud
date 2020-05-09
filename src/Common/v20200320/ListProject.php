<?php

namespace HuaWeiCloud\Common\v20200320;

/**
 * 获取华为云的project列表
 * Class ListProject
 * @package HuaWeiCloud\Common\v20200320
 */
class ListProject extends Base implements Common
{
    public function action()
    {
        //$endpoint = Base::getEndpoint();
        //$url = "https://ecs.{$endpoint}.myhuaweicloud.com/v3/projects";
        //用这个获取所有的projects
        $url = "https://iam.myhuaweicloud.com/v3/projects";
        return $this->request($url, 'GET');
    }
}