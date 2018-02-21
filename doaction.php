
<?php
print_r($_FILES);
$filename=$_FILES['myFile']['name'];
$filename = iconv('utf-8','gbk',$filename);//解决中文上传乱码
$type=$_FILES['myFile']['type'];

$tmp_name=$_FILES['myFile']['tmp_name'];
$size=$_FILES['myFile']['size'];
$error=$_FILES['myFile']['error'];

//将服务器上的临时文件移动到指定目录
$pd=move_uploaded_file($tmp_name,"upload/".$filename);

if($pd){
echo '上传成功';

}else{
    echo '上传失败';
}

//第二种    将文件拷贝到指定目录 ，拷贝成功返回true ,否则返回false
// exit;
// copy($tmp_name,"uploads/".$filename);
?>

