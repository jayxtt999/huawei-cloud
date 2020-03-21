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
$endpoint = 'cn-east-2';
$projectId = '080cf108198026be2f20c01402057a45';
$serverId = '3a05ed27-ecfd-4bf2-901b-a4e5c58038d1';

//获取所有的esc
$type = $_GET['type'] ? $_GET['type'] : 'Reboot';
switch ($type) {
    case 'Reboot':
        $clsEscOption = new Ecs\Reboot();
        break;
    case 'Start':
        $clsEscOption = new Ecs\Start();
        break;
    case 'Stop':
        $clsEscOption = new Ecs\Stop();
        break;
    case 'Detail':
        $clsEscOption = new Ecs\Detail();
        break;
}
$clsEscOption->setEndpoint($endpoint);
$clsEscOption->setProjectId($projectId);
$clsEscOption->setServerId($serverId);
$response = $clsEscOption->action();
print_r($response);