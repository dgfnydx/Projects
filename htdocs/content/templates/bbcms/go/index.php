<?php
$post = trim($post);
$post = strip_tags($post,""); //清除HTML等代码
$post = ereg_replace("\t","",$post); //去掉制表符号
$post = ereg_replace("\r\n","",$post); //去掉回车换行符号
$post = ereg_replace("\r","",$post); //去掉回车
$post = ereg_replace("\n","",$post); //去掉换行
$post = ereg_replace(" ","",$post); //去掉空格
$post = ereg_replace("'","",$post); //去掉单引号
$go=$_REQUEST["url"];
function if_http($http_url)
{
$url=$http_url;
$preg='|^http://|';
if(!preg_match($preg,$url))
{$url='http://'.$url;}
$tz_url=$url;
return $tz_url;
}
$web=if_http($go);
header("Location:$web");
?>