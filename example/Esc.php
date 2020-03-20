<?php

/**
 * 页面参数?type=Restart或Start或Stop
 */
require_once __DIR__ . '\..\vendor\autoload.php';
require_once 'config.php';

use HuaWeiCloud\Common\v20200320 as Common;
use HuaWeiCloud\Esc\v20200320 as Esc;

//配置
Common\Profile::setKey($key);
Common\Profile::setSecret($secret);

//请用ListEsc获取的数据存下来后有这三个字段
$endpoint = '**';
$projectId = '**';
$serverId = '**';

//获取所有的esc
$type = $_GET['type'] ? $_GET['type'] : 'Reboot';
switch ($type) {
    case 'Reboot':
        $escOption = new Esc\Reboot();
        break;
    case 'Start':
        $escOption = new Esc\Start();
        break;
    case 'Stop':
        $escOption = new Esc\Stop();
        break;
}
$escOption->setEndpoint($endpoint);
$escOption->setProjectId($projectId);
$escOption->setServerId($serverId);
$response = $escOption->action();
print_r($response);