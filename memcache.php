<?php
header("content-type:text/html;charset=utf-8");
phpinfo();
$mem = new Memcache();


$mem->connect('127.0.0.1',11211);
$arr = array(1,2,3,4,5);
class  Person {
	private  $name;
	private  $age;
	public function __construct($name,$age){
			$this->name = $name;
			$this->age = $age;
	}

	public function  writeJs(){
		echo $this->name.' can writeJs ,'.$this->name.'is '.$this->age;
	}
}

$person = new  Person("张三",123);
// $mem->set('key','value',是否压缩，有效期)；
// 存储类型：int float string bool  复合类型：obj array  特殊类型：NUll  resource
var_dump($mem->set('array',$arr,0,0));
echo "<hr>";
var_dump($mem->set('obj',$person,0,0));
echo "<hr>";	
var_dump($mem->get('array'));
echo "<hr>";

/**$mem -> close() 关闭memcache
$mem -> add(key,value,压缩，有效期)
	key存在就报错，不存在就添加
$mem -> replace(key,value,压缩，有效期)
	key存在就替换，不存在就报错
$mem -> decrement(key,[int])
按照num的幅度，对key的值进行减少操作
$mem -> increment(key,[int])
按照num的幅度，对key的值进行增加操作
$mem -> delete(key,规定时间)   //规定时间指的就是多少秒之后删除，0为立即执行
删除元素
$mem -> flush()
删除全部元素*/