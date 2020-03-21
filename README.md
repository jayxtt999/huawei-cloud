安装方式:  
composer require junqing124/huawei-cloud  

非官方项目，主要用于对华为云的基本管理，实现原理是对其url组装程序封装好,如果想实现华为云的其它功能可以看案例Esc\v20200320\Reboot.php,官方文档是：https://support.huaweicloud.com/api-ecs/ecs_02_0302.html  

华为云的凭证请在后台:  
我的凭证->访问密码，然后新增访问密钥  
后面会有个csv下载下来，里面有Access Key Id和Secret Access Key。  
本案例中请在example目录下，新建config.php,然后根据自己的key配置如下内容即可：  
```
<?php  
$key = 'RB7MOJ4IMHKPTQLJB55S';  
$secret = '6qjxKDKcb4RL6jZB4C7NhwkyDsd57p4TAYw02lLX';
```  