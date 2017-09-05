<?php
echo DIRECTORY_SEPARATOR;
echo  getcwd();

// pdo是PHP的一种数据库封装格式，兼容性好，兼容多种数据库，用C编写，执行效率高。。。。。。。就是PHP中的一个类，查文档接口
// mysqli:只支持MySQL mysql的增强版


//1、pdo连接MySQL
//	PDO::__construct(string $dsn[,string  $username[,string $password]])
//  $dsn = "mysql:dbhost=localhsot;"
?>