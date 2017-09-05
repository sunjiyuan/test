<?php
header("content-type:image/jpeg");

$filename = "./images/23.jpg";
$res = imagecreatefromjpeg($filename);

$red = imagecolorallocate($res,255,0,0);
$red = imagecolorallocate($res,255,0,0);
$gold= imagecolorallocate($res,255,242,0);
//$res = imagecreatetruecolor(400,400);
//imagejpeg($res,$filename,100);
//imagejpeg($res,null,100);
//imagejpeg($res,"./images/16.jpg",null);
imagejpeg($res);
imagedestroy($res);
//var_dump($res);