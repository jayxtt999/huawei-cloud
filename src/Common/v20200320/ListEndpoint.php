<?php

namespace HuaWeiCloud\Common\v20200320;

/**
 * 本文档来源于https://developer.huaweicloud.com/endpoint
 * Class ListEndpoint
 * @package Common\v20200320
 */
class ListEndpoint extends Base
{
    public function action()
    {
        $list = array(
            'cn-northeast-1'=> array('key'=>'cn-northeast-1', 'name' => '东北-大连', 'protocol' => 'https'),
            'af-south-1'=> array('key'=>'af-south-1', 'name' => '非洲-约翰内斯堡', 'protocol' => 'https'),
            'cn-north-4'=> array('key'=>'cn-north-4', 'name' => '华北-北京四', 'protocol' => 'https'),
            'cn-north-1'=> array('key'=>'cn-north-1', 'name' => '华北-北京一', 'protocol' => 'https'),
            'cn-east-2'=> array('key'=>'cn-east-2', 'name' => '华东-上海二', 'protocol' => 'https'),
            'cn-east-3'=> array('key'=>'cn-east-3', 'name' => '华东-上海一',  'protocol' => 'https'),
            'cn-south-1'=> array('key'=>'cn-south-1', 'name' => '华南-广州', 'protocol' => 'https'),
            'eu-west-0'=> array('key'=>'eu-west-0', 'name' => '欧洲-巴黎', 'protocol' => 'https'),
            'cn-southwest-2'=> array('key'=>'cn-southwest-2', 'name' => '西南-贵阳一', 'protocol' => 'https'),
            'ap-southeast-2'=> array('key'=>'ap-southeast-2', 'name' => '亚太-曼谷', 'protocol' => 'https'),
            'ap-southeast-1'=> array('key'=>'ap-southeast-1', 'name' => '亚太-香港', 'protocol' => 'https'),
            'ap-southeast-3'=> array('key'=>'ap-southeast-3', 'name' => '亚太-新加坡', 'protocol' => 'https'),
        );
        $list = array(
            'cn-east-2'=> array('key'=>'cn-east-2', 'name' => '华东-上海二', 'protocol' => 'https'),
        );
        return $list;
    }
}
