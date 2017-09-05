<?php
// 1,2,3,5,8,13,21.......N
//100  50  25.....N 
/**千克力锅炉控制器类：1.锅炉不能满了继续加料2.只接受巧克力和奶油3.防止锅炉内还没有原料就开始空烧4.忽略巧克力比例，锅炉每次使用后会充分冷却进行下次燃烧*/


// 3.
/**
 * 设计一个单例类：
 * 1.属性：千克力和奶油的最大值
 * 2.构造方法，判断料多少和品种，执行相关方法
 * 3.定义相关方法：空烧、满了、甚至是检测数据变化的函数（sleep）
 * 4.暴露  静态方法getInstance,当然是加参数的，参数最好封装成数组，以便于判断材料品种
 */

// 一、
function  nNum($n){
				
				
					if($n<3){
						
						return $n;
					}
					if($n>=3){
						$n1=1;
						$n2=2;
						$temp = 0;
						for($i=2;$i<$n;$i++){
							$temp = $n2;
							$n2+=$n1;
							$n1=$temp;
						}
						return $n2;
					}
				
		// 1.
		// $arr = array();
		// for($i=0;$i<$n;$i++){
		// 	if($i>=2){
				
		// 		$arr[$i] = $arr[$i-1]+$arr[$i-2];
		// 	}
		// 	// 要加限制条件，不然每次都执行
		// 	if($i<3) $arr[$i] =$i+1;
		// }
		// return  $arr[$n-1];
}
// 二、
function  nSum($n){
	$sum = 0;
	for($i = 0;$i<$n;$i++){
		$sum +=  100*pow(2,-$i);
	}
	return  $sum;
}

echo nSum(2);
echo "<hr>";
echo nNum(1);echo "<hr>";
echo nNum(2);echo "<hr>";
echo nNum(3);echo "<hr>";
echo nNum(6);
// echo pow(2,-2);