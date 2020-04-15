<?php
require_once __DIR__ . '\..\vendor\autoload.php';
require_once 'config.php';

use HuaWeiCloud\Common\v20200320 as Common;
use HuaWeiCloud\Ecs\v20200320 as Ecs;
use HuaWeiCloud\Common\v20200320\Base;

//配置
Common\Profile::setKey($key);
Common\Profile::setSecret($secret);

//获取所有的esc
$clsEndpoint = new Common\ListEndpoint();
$endpointList = $clsEndpoint->action();
$clsListProject = new Common\ListProject();
$projectList = $clsListProject->action();
$clsListEcs = new Ecs\ListEcs();
$clsDetailEsc = new Ecs\Detail();
$clsResourceDetail = new Common\ResourcesDetail();
echo '<pre>';
foreach ($endpointList as $endpoint => $endpointDetail) {
    echo 'endpoint is:' . $endpoint . '<br>';
    Base::setEndpoint($endpoint);
    if ($projectList['projects']) {
        foreach ($projectList['projects'] as $project) {
            if ($endpoint != $project['name']) {
                continue;
            }
            $projectId = $project['id'];
            echo 'project id is:' . $projectId . '<br>';
            Base::setProjectId($projectId);
            $escList = $clsListEcs->action();
            if( $escList['count'] > 0 ){
                foreach( $escList['servers'] as $serverDetail ){
                    $serverId = $serverDetail['id'];
                    Base::setServerId($serverId);
                    //获取每个服务器的详情
                    $infoEsc = $clsDetailEsc->action();
                    //获取过期时间
                    Base::setCustomerId($customerId);
                    $infoResource = $clsResourceDetail->action();
                    print_r($infoEsc);
                    print_r($infoResource);
                }
            }
            //服务器列表
            print_r($escList);
        }
    }
}