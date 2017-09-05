<?php
/**
 * Created by PhpStorm.
 * User: sjy
 * Date: 2017/8/4
 * Time: 17:01
 */
header("content-type:text/html;charset=utf-8");


$filename = "./images/23.jpg";
//$res = imagecreatetruecolor(400,400);
$res = imagecreatefromjpeg($filename);



$width = imagesx($res)/2;
//$height = imagesy($res);

$red = imagecolorallocate($res,255,0,0);
$green= imagecolorallocate($res,0,255,0);
$gold= imagecolorallocate($res,255,242,0);
//imagefill($res,100,100,$red);
imagefill($res,0,0,$green);

//注意：imagefill:只要是和（x,y)相同或相邻的点颜色相同的点
//都会被填充
imagefill($res,360,0,$red);
imagefill($res,360,0,$gold);
//imagefill($res,$width,$height,$red);


//写一行字符串
imagestring($res,20,200,300,'Mine',$red);
header("content-type:image/jpeg");
imagejpeg($res);
imagedestroy($res);
