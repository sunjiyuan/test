<?php
header("content-type:text/html;charset=utf-8");

// 拷贝文件夹
function recurse_copy($src,$des) {
    $dir = opendir($src);
    @mkdir($des);
    while(false !== ( $file = readdir($dir)) ) {
             if (( $file != '.' ) && ( $file != '..' )) {
                    if ( is_dir($src . '/' . $file) ) {
                            recurse_copy($src . '/' . $file,$des . '/' . $file);
                    }  else  {
                            copy($src . '/' . $file,$des . '/' . $file);
                    }
            }
      }
      closedir($dir);
   }

   // 递归删除文件
   function fileDelete($file){
   	// 打开目录
   	$handle = opendir($file);
   	// 循环读取目录中的条目
   	while($line = readdir($handle)){
   		// 如果是.或者..则跳过
   		if($line=='.'||$line=='..') continue;

   		// 判断是否是文件夹
   		if(is_dir("$file/$line")){
   			// 如果是文件夹，递归
   			fileDelete("$file/$line");
   		}else{
   			// 如果是文件则删除
   			unlink("$file/$line");
   		}
   	}
   	// 关闭目录
   	closedir($handle);
   	// 删除当前空目录
   	rmdir($file);
   }

//   递归输出目录
   function  fileFactotial($filepath){

   		$handle = opendir($filepath);
   		echo "<ul>";
   		while ($file=readdir($handle)) {
   			if ($file=='.'||$file=='..'){ continue;
   			}else{
   				echo "<li style="."list_style:none;>".iconv("gbk","utf-8",$file)."</li>";
   				if(is_dir("$filepath/$file")){
   					fileFactotial("$filepath/$file");
   				}
   			}
   		}
   		echo "</ul>";
   		closedir($handle);
   }

//   打印数组
function dump($arr){
echo "<pre>";
var_dump($arr);
echo "</pre>";
}

//应该单独下载另一个文件中，且头文件域应该换成image/XXX
// 加载图片
function LoadPNG($imgname)
{
    /* Attempt to open */
    $im = @imagecreatefrompng($imgname);

    /* See if it failed */
    if(!$im)
    {
        /* Create a blank image */
        $im  = imagecreatetruecolor(150, 30);
        $bgc = imagecolorallocate($im, 222, 220, 220);
        $tc  = imagecolorallocate($im, 0, 0, 0);

        imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

        /* Output an error message */
        imagestring($im, 1, 5, 5, 'Error loading ' . $imgname, $tc);
    }

    return $im;
}
// 图片居中
function  copyImageToCenter($src,$des){
// 拷贝图片的一部分到另一个图片
header("content-type:image/jpeg");
$des=imagecreatefromjpeg('./images/flower.jpg');
$src=imagecreatefromjpeg('./images/girl1.jpeg');
// imagejpeg($des);// 拷贝图片的一部分到另一张图片
imagecopy($des, $src, (imagesx($des)-imagesx($src))/2, (imagesy($des)-imagesy($src))/2, 0, 0, imagesx($src), imagesy($src));
imagejpeg($des);
}

// 居中显示文字
function  imageWordCenter($str,$img){
//在09_randImage.php中，进一步封装后可用
}
?>