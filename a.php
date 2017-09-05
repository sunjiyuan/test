<?php
header("content-type:text/html;charset=utf-8");
//imagecreatefromjpeg()
$s = "EOT解析变量";
$s1 = "'EOT'不解析变量";
$str = <<<EOT
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>长字符串</title>
    </head>
    <body>
            <div style="color:gold;font-size:20px;">是否解析变量：$s</div>
            
    </body>
    </html>
EOT;
$str1 = <<<'EOT'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>长字符串</title>
</head>
<body>
    <div style="color:gold;font-size:20px;">是否解析变量：$s1</div>
</body>
</html>
EOT;


        echo $str;
        echo $str1;

?>