<?php
/**
 * Created by PhpStorm.
 * User: sjy
 * Date: 2017/8/4
 * Time: 19:36
 */
$str = "";
$filename = "./images/16.jpg";
$font = 5;
$margin = "3px";
$margin_left = "12px";
$margin_top = "14px";
$width = 100;
$height = 40;
$strLen =4;
//字符范围
$arr_list = array_merge(range('A','Z'),range(0,9));
shuffle($arr_list);
shuffle($arr_list);
$index_list = array_rand($arr_list,$strLen);
shuffle($index_list);

foreach ($index_list as $value){
    $str .= $arr_list[$value];
}
//$res = imagecreatefromjpeg($filename);
$res = imagecreatetruecolor($width,$height);
$color = imagecolorallocate($res,mt_rand(0,255),mt_rand(0,255),mt_rand(100,255));
//加背景色
$bg = imagecolorallocate($res,255,255,255   );
imagefill($res,0,0,$bg);
$imgWidth = imagesx($res);
$imgHeight = imagesy($res);
$fontWidth = imagefontwidth($font)+$margin;
$fontHeight = imagefontheight($font);

//将颜色分为四个装入数组
$colArr = array(
    imagecolorallocate($res,mt_rand(0,255),mt_rand(0,255),mt_rand(100,255)),
    imagecolorallocate($res,mt_rand(0,255),mt_rand(0,255),mt_rand(100,255)),
    imagecolorallocate($res,mt_rand(0,255),mt_rand(0,255),mt_rand(100,255)),
    imagecolorallocate($res,mt_rand(0,255),mt_rand(0,255),mt_rand(100,255)));

////计算字符串的起始坐标
//$x = ($imgWidth-$fontWidth*strlen($str))/2;
//$y = ($imgHeight-$fontHeight)/2;
//
////输出图片
//imagestring($res,$font,$x,$y,$str,$color);

//改良
//$arr = explode("",$str);var_dump($arr);
for($i = 0;$i<strlen($str);$i++){
//    $newStr = $arr[$i];
    $x = ($imgWidth-$fontWidth*(strlen($str)-$i*3))/2-$margin_left;
    $y = ($imgHeight-$fontHeight)/2+$margin_top;
//    imagestring($res,$font,$x,$y,substr($str,$i,1)." ",$colArr[$i]);
//    function imagettftext ($image, $size, $angle, $x, $y, $color, $fontfile, $text) {}
        $size = 20;
        $angle = mt_rand(-30,30);
        $fontfile = "./STXINGKA.TTF";
        $text = substr($str,$i,1)."";
    imagettftext ($res, $size, $angle, $x, $y, $colArr[$i], $fontfile, $text);
}
    header("content-type:image/jpeg");
    imagejpeg($res);
    imagedestroy($res);