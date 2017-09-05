<?php
header("content-type:text/html;charset=utf-8");


//递归遍历目录
    function recursive($dir){
        $handle = opendir($dir);
        echo "<ul>";
         while($line=readdir($handle)){
         if($line=='.'||$line=='..')continue;
            echo "<li>".iconv('gbk','utf-8',$line)."</li>";
            if(is_dir("$dir/$line")){
                  recursive("$dir/$line");
             }}
        echo "</ul>";
        closedir($handle);
    }
    //递归删除目录
    function delAllFile($dir){
    if(!is_dir($dir)) exit("没有此文件夹|不是文件夹");
        $handle = opendir($dir);

         while($line=readdir($handle)){
         if($line=='.'||$line=='..')continue;

                if(is_dir("$dir/$line")){
                      delAllFile("$dir/$line");
                 }else{
                       unlink("$dir/$line");
                 }
         }

        closedir($handle);
        rmdir($dir);
    }
//断点续传
<?php
/**
 * PHP-HTTP断点续传实现
 * @param string $path: 文件所在路径
 * @param string $file: 文件名
 * @return void
 */
function download($path,$file) {
  $real = $path.'/'.$file;
  if(!file_exists($real)) {
    return false;
  }
  $size = filesize($real);
  $size2 = $size-1;
  $range = 0;
  if(isset($_SERVER['HTTP_RANGE'])) {
    header('HTTP /1.1 206 Partial Content');
    $range = str_replace('=','-',$_SERVER['HTTP_RANGE']);
    $range = explode('-',$range);
    $range = trim($range[1]);
    header('Content-Length:'.$size);
    header('Content-Range: bytes '.$range.'-'.$size2.'/'.$size);
  } else {
    header('Content-Length:'.$size);
    header('Content-Range: bytes 0-'.$size2.'/'.$size);
  }
  header('Accenpt-Ranges: bytes');
  header('application/octet-stream');
  header("Cache-control: public");
  header("Pragma: public");
  //解决在IE中下载时中文乱码问题
  $ua = $_SERVER['HTTP_USER_AGENT'];
  if(preg_match('/MSIE/',$ua)) {
    $ie_filename = str_replace('+','%20',urlencode($file));
    header('Content-Dispositon:attachment; filename='.$ie_filename);
  } else {
    header('Content-Dispositon:attachment; filename='.$file);
  }
  $fp = fopen($real,'rb+');
  fseek($fp,$range);
  while(!feof($fp)) {
    set_time_limit(0);
    print(fread($fp,1024));
    flush();
    ob_flush();
  }
  fclose($fp);
}


//    文件下载
    function downloadFile($path,$name){
        $filename = $_GET['filename'];
        $pathname = "./download/$filename";
        $handle = fopen($pathname,"rb");
        header("content-type:application/octet-stream");
        header("content-disposition:attachment;filename=$filename");

        while($str=fread($handle,1024)){
        echo $str;
        }
        fclose($handle);
    }


    delAllFile("C:/Users/sjy/Desktop/1");
//    recursive("../../");
?>