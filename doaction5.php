<?php
/*多个单文件上传
*/

header('Content-Type:text/html;charset=utf-8');
include_once 'upload.func.php';
//print_r($_FILES);
include_once 'common.func1.php';
$files=getFiles();
// print_r($files);
foreach($files as $fileInfo){
    $res=uploadFile($fileInfo);
    echo $res['mes'],'<br/>';
    $uploadFiles[]=$res['dest'];

}
//过滤数组中的空值   并重新生成新数组
$uploadFiles=array_values(array_filter($uploadFiles));  
print_r($uploadFiles);
?>