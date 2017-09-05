<?php
header("content-type:text/html;charset=utf-8");


$filename = "./a.html";
// 设置10s过期
if(file_exists($filename)&&(time()-filemtime($filename))<3){
		include "$filename";

}else{
	// 过期了就再次缓存
	ob_start();
	echo '<html>This is a static ob pages</html>';
	$content = ob_get_contents();
	$rs =  file_put_contents('./a.html', $content);
	echo "<br>";
	if($rs){
		echo "缓存正确:只要显示此内容，就表示原来的已过期，重新加载了";
	}else{
		echo "缓存失败";
	}
}