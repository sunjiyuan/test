<?php
/**
 * Created by PhpStorm.
 * User: sjy
 * Date: 2017/8/4
 * Time: 16:25
 */
header("content-type:image/jpeg");
$filename = "./images/23.jpg";
$res = imagecreatefromjpeg($filename);
imagejpeg($res);

imagedestroy($res);