<?php

//判断上传文件的类型
header('Content-Type:text/html;charset=utf-8');
$fileInfo=$_FILES['myFile'];
$maxSize=2097152;
$allowExt=array('jpeg','jpg','png','gif');
$flag=true;
//1.
if($fileInfo['error']==0){
//判断上传文件的大小
  if($fileInfo['size']>$maxSize){
      exit('上传文件过大');
  }
  //$ext=strtolower(end(explode('.',$fileInfo['name'])))  //获取上传文件的后缀名
  $ext=pathinfo($fileInfo['name'],PATHINFO_EXTENSION);   //只返回扩展名
    //服务端验证  判读上传的文件类型是否符合要求
  if(!in_array($ext,$allowExt)){

      exit('非法文件类型');   
  }

  //判断文件是否是通过http post 方式上传来的
  if(!is_uploaded_file($fileInfo['tmp_name'])){
      exit('文件不是通过HTTP  POST方式上传来的');
  }
  //检测是否为真实的图片
  if($flag){
      if(!getimagesize(fileInfo['tmp_name'])){
           exit('不是真正的图片类型');
      }
  }

  $path='upload';
  //如果不存在upload这个文件夹 则自动创建
  if(!file_exists($path)){
      mkdir($path,0777,true);
      chmod($path,0777);
  }
  //确保文件名唯一，防止重名产生覆盖
  $uniName=md5(uniqid(microtime(true),true)).'.'.$ext;
  echo '$uniName';
  $destination=$path.'/'.$uniName;
  if(@move_uploaded_file($fileInfo['tmp_name'],$destination)){   //@ 错误警告隐藏符
    echo '文件上传成功';
  }else{
        echo '文件上传失败';
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