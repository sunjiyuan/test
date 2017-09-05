<?php
header("content-type:text/html;charset=utf-8");

/*
1.不顾后果型:不可控制，前面不执行，后面一下子输出完
 */
// ignore_user_abort();
// set_time_limit(0);
// ini_set('memory_limit','512M');
// $interval = 3;
// $a  = 20;
// do{
// 	$a--;
// 	echo $a;
// 	sleep($interval);
// 	flush();
// }
// while($a>0);
/*
2. 简单可控
 */

// ignore_user_abort();
set_time_limit(0);
$interval =1;
$a  = 20;
do{
	$a--;
	echo $a."<hr>";
	$run = include './config.php';
	if($run<2){
		die("进程终止")	;
	}
	sleep($interval);
}
while($a>0);
