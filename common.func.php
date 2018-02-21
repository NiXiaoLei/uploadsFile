<?php
/*
得到文件的扩展名
*/

function  getExt($filename){
    return strtolower(pathinfo($filename,PATHINFO_EXTENSION));
}
/*

产生唯一的字符串

*/

function getUniName(){
    return  md5(uniqid(microtime(true),true));
}


?>