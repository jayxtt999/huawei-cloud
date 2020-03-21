<?php
require_once __DIR__ . '\..\vendor\autoload.php';
require_once 'config.php';

use HuaWeiCloud\Common\v20200320 as Common;
use HuaWeiCloud\Ecs\v20200320 as Ecs;

//配置
Common\Profile::setKey($key);
Common\Profile::setSecret($secret);

//获取所有的esc
$clsEndpoint = new Common\ListEndpoint();
$endpointList = $clsEndpoint->action();
$clsListProject = new Common\ListProject();
$clsListEcs = new Ecs\ListEcs();
$clsDetailEsc = new Ecs\Detail();
echo '<pre>';
foreach ($endpointList as $endpoint => $endpointDetail) {
    echo 'endpoint is:' . $endpoint . '<br>';
    $clsListProject->setEndpoint($endpoint);
    $projectList = $clsListProject->action();
    if ($projectList['projects']) {
        foreach ($projectList['projects'] as $project) {
            if ($endpoint != $project['name']) {
                continue;
            }
            $projectId = $project['id'];
            echo 'project id is:' . $projectId . '<br>';
            $clsListEcs->setEndpoint($endpoint);
            $clsListEcs->setProjectId($projectId);
            $escList = $clsListEcs->action();
            if( $escList['count'] > 0 ){
                foreach( $escList['servers'] as $serverDetail ){
                    $serverId = $serverDetail['id'];
                    $clsDetailEsc->setEndpoint($endpoint);
                    $clsDetailEsc->setProjectId($projectId);
                    $clsDetailEsc->setServerId($serverId);
                    //获取每个服务器的详情
                    $infoEsc = $clsDetailEsc->action();
                    print_r($infoEsc);
                }
            }
            //服务器列表
            print_r($escList);
        }
    }
}