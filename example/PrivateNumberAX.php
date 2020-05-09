<?php
require_once __DIR__ . '\..\vendor\autoload.php';
require_once 'config.php';

use HuaWeiCloud\Common\v20200320\Profile;
use HuaWeiCloud\PrivateNumberAX\v20200508 as PNZX;

//配置
Profile::setKey($privateNumberAppKey); //获取方法请参考readme.md
Profile::setSecret($privateNumberAppSecret);

$type = $_GET['type'] ? $_GET['type'] : 'BindList';
$clsPnzx = null;
switch ($type) {
    case 'Bind':
        $clsPnzx = new PNZX\Bind();
        break;
    case 'UnBind':
        $clsPnzx = new PNZX\UnBind();
        break;
}

if ($clsPnzx) {
    $clsPnzx->setBaseUrl('https://rtcapi.cn-north-1.myhuaweicloud.com:12543');//获取方法请参考readme.md
    $clsPnzx->setOrigNum('+8618688923375');
    $clsPnzx->setPrivateNum('+8616556328603');
    $clsPnzx->action();
}
