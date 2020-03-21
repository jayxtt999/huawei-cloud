<?php
require_once __DIR__ . '\..\vendor\autoload.php';
require_once 'config.php';

use HuaWeiCloud\Common\v20200320 as Common;
use HuaWeiCloud\Ecs\v20200320 as Ecs;

//配置
Common\Profile::setKey($key);
Common\Profile::setSecret($secret);

//获取所有的esc
$endpoint = new Common\ListEndpoint();
$endpointList = $endpoint->action();
$project = new Common\ListProject();
$listEcs = new Ecs\ListEcs();
echo '<pre>';
foreach ($endpointList as $endpoint => $endpointDetail) {
    echo 'endpoint is:' . $endpoint . '<br>';
    $project->setEndpoint($endpoint);
    $projectList = $project->action();
    foreach ($projectList['projects'] as $project) {
        if ($endpoint != $project['name']) {
            continue;
        }

        $projectId = $project['id'];
        echo 'project id is:' . $projectId . '<br>';
        $listEcs->setEndpoint($endpoint);
        $listEcs->setProjectId($projectId);
        $escList = $listEcs->action();
        print_r($escList);
    }
}