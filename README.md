安装方式:  
composer require junqing124/huawei-cloud  

非官方项目，主要用于对华为云的基本管理，实现原理是对其url组装程序封装好,如果想实现华为云的其它功能可以看案例Esc\v20200320\Reboot.php,官方文档是：https://support.huaweicloud.com/api-ecs/ecs_02_0302.html  

开发规则:  
1、包名请以华为的资源名首字母大写为包名，其它为小写,如果碰上空格或其它特殊字符直接去除，如操作管理esc的则包名为Esc,Cloud Eye则包名为CloudEye  
2、包版本以日期为准则，如果官方API版本升级，则新起个日期做更新，否则直接更新当前的包[v20200320]。号外：为啥不用华为api里的版本号，因为发现版本号比较放飞自我，有v1.0[support.huaweicloud.com/api-ces/ces_03_0023.html]、v2[support.huaweicloud.com/api-ecs/ecs_02_0201.html]、v3[support.huaweicloud.com/api-rds/rds_06_0001.html]、v1[support.huaweicloud.com/api-ecs/ecs_02_0203.html]等，故直接用日期做本SDK的版本号  

基本配置获取:  
1、Customer Id:  
API凭证->账号ID  
2、key和secret获取:  
我的凭证->访问密码，然后新增访问密钥  
后面会有个csv下载下来，里面有Access Key Id和Secret Access Key。  
本案例中请在example目录下，新建config.php,然后根据自己的key配置如下内容即可：  
```
<?php  
$customerId = '***';
$key = '***';  
$secret = '***';
```  

1.0.3(2020-04-15):  
1、修改project list的获取方式   

1.0.2(2020-03-25):  
1、获取资源过期时间  
2、规范开发规则  

1.0.1(2020-03-20):  
1、基本版本上线  
2、ESC的基本操作:获取列表、重启、开启、停止
