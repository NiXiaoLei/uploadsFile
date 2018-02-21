<?php
header('Content-Type:text/html;charset=utf-8');
include_once 'upload.func.php';  //包含此文件
$fileInfo=$_FILES['myFile'];
$allowExt=array('jpg','png','jpeg','gif');
$newName=uploadFile($fileInfo,$allowExt,'upload',true);
print_r($newName)
?>