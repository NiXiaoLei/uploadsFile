<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="doaction4.php" method="post" enctype="multipart/form-data">
           <!-- <input type="hidden"   name="MAX_FILE_SIZE"  value="10000"> -->

           <!-- 这样写如果一个文件上传不合规范则会导致全部停止 -->
             <input type = "file" id = "idName" multiple = "multiple" name="myFile1">
             <input type = "file" id = "idName" multiple = "multiple" name="myFile2">
             <input type = "file" id = "idName" multiple = "multiple" name="myFile3">
             <input type = "file" id = "idName" multiple = "multiple" name="myFile4">
                <!-- 这样写如果一个文件上传不合规范则会导致全部停止 -->
            <input type="submit"  value="上传文件">
    </form>
   
</body>
</html>