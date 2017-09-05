<?php
ob_start();
echo "woshihaoren";
echo "<hr>";
header("content-type:text/html;charset=utf-8");
echo "我是好人";

$a = "just  a string";


// for ($i=0; $i < 4; $i++) { 
// 	echo $i.'<br>';
// 	ob_flush();
// 	flush();
// 	sleep(1);
// }

// ob_clean();
$content = ob_get_contents();

echo  $content;

// ob_end_clean();//ob_clean、ob_end_clean两者效果相同

ob_clean();

echo $content;