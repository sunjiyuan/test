<span style="font-family:FangSong_GB2312;font-size:14px;"><span style="font-family:FangSong_GB2312;font-size:14px;">/** $file_size  文件大小 */
<?php
header("content-type:text/html;charset=utf-8");
//HP断点续传的原理与实现
//断点续传主要是HTTP协议中的Content-Range报头。其理解如下：
//Content-Range：响应资源的范围。可以在多次请求中标记请求的资源范围，在连接断开重新连接时，客户端只请求该资源未被下载的部分，
//而不是重新请求整个资源，实现了断点续传。迅雷就是基于这个原理，使用多线程分段读取网络上的资源，
//最后合并。关于php使用多线程实现断点续传稍后讨论。本文只实现简单的断点续传。
//代码实现:先定义一个函数  getRange() 这个函数用来处理  header中 Range 具体数据的处理


      functiongetRange($file_size){
     $range =isset($_SERVER['HTTP_RANGE'])?$_SERVER['HTTP_RANGE']:null;
    if(!empty($range)){
         $range =preg_replace('/[\s|,].*/', '', $range);
          $range =explode('-',substr($range,6));
          if(count($range) < 2 ) {
             $range[1] = $file_size;
          }
         $range =array_combine(array('start','end'),$range);
         if(empty($range['start'])) {
            $range['start'] = 0;
         }
         if (!isset($range['end']) || empty($range['end'])) {
            $range['end'] = $file_size;
         }
         return$range;
     }
     return null;
  }
  ?>

 </span></span>

<span style="font-family:FangSong_GB2312;font-size:14px;"><span style="font-family:FangSong_GB2312;font-size:14px;"><?php $speed = 512;?>//此参数为下载最大速度
<?php
// 假设文件的地址为 $file_path
        $file_path = "C:/Users/sjy/Desktop/阳光森林.jpg";
  $pos =strrpos($file_path, "/");
   $file_name =substr($file_path, $pos+1);
  $file_size =filesize($file_path);
  $ranges =getRange($file_size);
  $fh =  fopen($file_path, "rb");
 header('Cache-control: public');
 header('Content-Type: application/octet-stream');
 header('Content-Disposition: attachment; filename='.$file_name);
 if ($ranges !=null) {
    header('HTTP/1.1 206 Partial Content');
    header('Accept-Ranges: bytes');
    header(sprintf('Content-Length: %u',$ranges['end'] - $ranges['start']));
    header(sprintf('Content-Range: bytes %s-%s/%s', $ranges['start'],$ranges['end'], $file_size));
     fseek($fh,sprintf('%u',$ranges['start']));
 }else{
    header("HTTP/1.1 200 OK");
     header(sprintf('Content-Length:%s', $file_size));
 }
 while(!feof($fh))
 {
     echo  fread($fh, round($speed*1024, 0));
     ob_flush();
     sleep(1);
 }
 ($fh != null)&& fclose($fh);
  ?>
 </span></span>

