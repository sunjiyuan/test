<?php
header("content-type:text/html;charset=utf-8");

$id = $_GET['id'];

$filename = "./static/$id.html";
// 设置10s过期
if(file_exists($filename)&&(time()-filemtime($filename))<3){
		include "$filename";

}else{
	// 过期了就再次缓存
	ob_start();
	// echo '<html>This is a static ob pages</html>';
	// $content = ob_get_contents();
	// $rs =  file_put_contents('./a.html', $content);
	// echo "<br>";
	// if($rs){
	// 	echo "缓存正确:只要显示此内容，就表示原来的已过期，重新加载了";
	// }else{
	// 	echo "缓存失败";
	// }
	
// 连接数据
		@mysql_connect('127.0.0.1','root','123456');
		@mysql_select_db("blog");
		@mysql_query('set names utf8');
		$sql = "select   * from article where id = $id";

		$res = @mysql_query($sql);
		$data = @mysql_fetch_assoc($res);

		// 判断是否有值
		if($data){
			foreach ($data as $key => $value) {
				echo $value.'<br>';
			}
		}else{
			echo "id= $id 下的内容为空";
		}

		$content = ob_get_contents();
		$rs = file_put_contents($filename,$content);
	if($rs){
			echo "缓存正确:只要显示此内容，就表示原来的已过期，重新加载了";
	}else{
			echo "缓存失败";
	}
}