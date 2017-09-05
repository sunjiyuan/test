<?php
/**
 * Created by PhpStorm.
 * User: sjy
 * Date: 2017/8/4
 * Time: 21:18
 */
header("content-type:text/html;charset=utf-8");
$filename = "./images/23.jpg";

//透明色

$res = imagecreatetruecolor(400,400);
$bgc = imagecolorallocate($res,255,242,0);
$color = imagecolorallocatealpha($res,mt_rand(0,255),
mt_rand(0,255),mt_rand(0,255),mt_rand(0,10)/10);

$str = "WQERQWRQWQWRQWQWER";
imagefill($res,0,0,$bgc);
for($i = 0;$i<strlen($str);$i++){
    $x = ($i+2)*20;
    $y = 100-$i*5;
    imagettftext($res,20,mt_rand(-20,20),$x,$y,imagecolorallocatealpha($res,mt_rand(0,255),
        mt_rand(0,255),mt_rand(0,255),mt_rand(0,10)/10),"./STXINGKA.TTF",substr($str,$i,1));
//        mt_rand(0,255),mt_rand(0,255),mt_rand(0,10)/10),"./STXINGKA.TTF",iconv('gbk','utf-8//INGORE',substr($str,$i,1)));
//    iconv ($in_charset, $out_charset, $str)

//    ($image, $size, $angle, $x, $y, $color, $fontfile, $text)
//    imagettftext($res,20,mt_rand(-20,20),0,0,$color,"./STXINGKA.TTF",substr($str,$i,1));
}

header("content-type:image/jpeg");
imagejpeg($res);
imagedestroy($res);

echo "<pre>";
var_dump(getimagesize($filename));