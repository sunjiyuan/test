<?php
/**
 * Created by PhpStorm.
 * User: sjy
 * Date: 2017/8/4
 * Time: 17:21
 */
header("content-type:text/html;charset=utf-8");
$res = imagecreatefromjpeg("./images/23.jpg");
echo "23.jpg:</br>x:".imagesx($res)."<br>y:".imagesy($res);

echo "<br><pre>";
var_dump(getimagesize("./images/23.jpg"));
imagedestroy($res);