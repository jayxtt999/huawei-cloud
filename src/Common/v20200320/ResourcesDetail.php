<?php

namespace HuaWeiCloud\Common\v20200320;
class ResourcesDetail extends Base
{
    public function action()
    {
        $serverId = Base::getServerId();
        $customerId = Base::getCustomerId();
        $url = "https://bss.myhuaweicloud.com/v1.0/{$customerId}/common/order-mgr/resources/detail?resource_ids={$serverId}&only_main_resource=1";
        return $this->request($url, 'GET');
    }
}