<?php
//header("content-type:image/jpeg");
header("content-type:text/html;charset=utf-8");
//phpinfo();
$filename = "./images/23.jpg";
//$res = imagecreatefromjpeg($filename);
$res = imagecreatetruecolor(400,400);
imagedestroy($res);
var_dump($res);