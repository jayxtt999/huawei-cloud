<?php

/**
 * 页面参数?type=Restart或Start或Stop
 */
require_once __DIR__ . '\..\vendor\autoload.php';
require_once 'config.php';

use HuaWeiCloud\Common\v20200320 as Common;
use HuaWeiCloud\Ecs\v20200320 as Ecs;

//配置
Common\Profile::setKey($key);
Common\Profile::setSecret($secret);

//请用ListEcs获取的数据存下来后有这三个字段
$endpoint = '**';
$projectId = '**';
$serverId = '**';

//获取所有的esc
$type = $_GET['type'] ? $_GET['type'] : 'Reboot';
switch ($type) {
    case 'Reboot':
        $escOption = new Ecs\Reboot();
        break;
    case 'Start':
        $escOption = new Ecs\Start();
        break;
    case 'Stop':
        $escOption = new Ecs\Stop();
        break;
}
$escOption->setEndpoint($endpoint);
$escOption->setProjectId($projectId);
$escOption->setServerId($serverId);
$response = $escOption->action();
print_r($response);