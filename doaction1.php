<?php
header('Content-Type:text/html;charset=utf-8');
print_r($_FILES);
$filename=$_FILES['myFile']['name'];
$file_name = iconv('utf-8','gbk',$filename);//解决中文上传乱码
$type=$_FILES['myFile']['type'];

$tmp_name=$_FILES['myFile']['tmp_name'];
$size=$_FILES['myFile']['size'];
$error=$_FILES['myFile']['error'];


//2.判断下错误号，只有为0或者是UPLOAD_ERR_OK，没有错误发生，上传成功
if($error==UPLOAD_ERR_OK){

   if(move_uploaded_file($tmp_name,"upload/".$file_name)){
        echo '文件上'.$filename.'上传成功';

   }else{

          echo '文件上'.$filename.'上传失败';
   }
}else{
    //匹配错误信息
   switch($error){
        case 1:
          echo '上传文件超过了PHP配置文件中upload_max_filesize选项的值';
          break;
        case 2:
           echo '超过了表单Max_FILE_SIZE限制的大小';
           break;
        case 3:
            echo '文件部分被上传';
            break;
         case 4:
            echo '没有选择上传文件';
           break;
        case 6:
            echo '没有找到临时目录';
           break;
           case 7:
           case 8:
              echo '系统错误';
              break;

   }

}
?>