<?php
require_once __DIR__ . '\..\vendor\autoload.php';
require_once 'config.php';

use HuaWeiCloud\Common\v20200320\ListEndpoint;
use HuaWeiCloud\Common\v20200320\ListProject;
use HuaWeiCloud\Common\V20200320\Profile;
use HuaWeiCloud\Esc\v20200320\ListEsc;

//配置
Profile::setKey($key);
Profile::setSecret($secret);

//获取所有的esc
$endpoint = new ListEndpoint();
$endpointList = $endpoint->getEsc();
echo '<pre>';
$project = new ListProject();
$listEsc = new ListEsc();
foreach ($endpointList as $key => $endpoint) {
    $project->setEndPoint($endpoint);
    $projectList = $project->listAll();
    foreach ($projectList['projects'] as $project) {
        if ($endpoint['key'] != $project['name']) {
            continue;
        }

        $projectId = $project['id'];
        $listEsc->setEndPoint($endpoint);
        $listEsc->setProjectId($projectId);
        $escList = $listEsc->getList();
        print_r($escList);
    }
}
