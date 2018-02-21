<?php
//文件数组  ，文件格式，文件夹地址,是否开启检测真实图片，上传的图片大小   带默认值
function uploadFile($fileInfo,$allowExt=array('jpeg','jpg','png','gif'),$uploadPath='uploads',$flag=true,$maxSize=2097152){
//判断错误号
if($fileInfo['error']>0){
      //匹配错误信息
   switch($fileInfo['error']){
        case 1:
          $mes='上传文件超过了PHP配置文件中upload_max_filesize选项的值';
          break;
        case 2:
        $mes='超过了表单Max_FILE_SIZE限制的大小';
           break;
        case 3:
        $mes= '文件部分被上传';
            break;
         case 4:
         $mes='没有选择上传文件';
           break;
        case 6:
        $mes='没有找到临时目录';
           break;
           case 7:
           case 8:
           $mes='系统错误';
              break;

   }
exit($mes);
}

//检测上传的文件类型
$ext=pathinfo($fileInfo['name'],PATHINFO_EXTENSION);
// $allowExt=array('jpeg','jpg','png','gif');
if(!is_array($allowExt)){
    exit('系统错误');
}
if(!in_array($ext,$allowExt)){
exit('非法文件类型');
}
//检测上传文件大小是否符合规范
// $maxSize=2097152;
if($fileInfo['size']>$maxSize){
    exit('上传文件过大');
}
//检测图片是否是真实图片
// $flag=true;
if($flag){
    if(!getimagesize($fileInfo['tmp_name'])){
          exit('不是真实的图片');
    }
}
//检测文件是否通过HTTP  POST方式上传上来的
if(!is_uploaded_file($fileInfo['tmp_name'])){
exit('文件不是通过http post方式上传上来的');
    
}
//判断目录文件夹是否存在，不存在则创建
// $uploadPath='uploads';
if(!file_exists($uploadPath)){
    mkdir($uploadPath,0777,true);
    chmod($uploadPath,0777);
}
$uniName=md5(uniqid(microtime(true),true)).'.'.$ext;
$destination=$uploadPath.'/'.$uniName;
if(!move_uploaded_file($fileInfo['tmp_name'],$destination)){
    exit('文件移动失败');

}
   return  array(
       'newName'=>$destination,
       'size'=>$fileInfo['size'],
       'type'=>$fileInfo['type']
   );
}
?>