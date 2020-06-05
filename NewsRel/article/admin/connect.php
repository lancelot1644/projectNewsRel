<?php
//step 1.2 连接数据库操作
	//加载文件config.php。require_once()加载一次，使得本php文件中可以引用config.php中的内容
require_once('config.php');
	//头部设置，忽略除了E级错误以外的异常报告。
error_reporting(E_ALL &~E_NOTICE &~E_DEPRECATED);

#主要部分：
//1.连库
$conn = mysqli_connect(host,userName,passWord);
if (!$conn) {
	echo mysqli_error();
}else{
	echo "<br>connect success";
}

//2.选库
if (!mysqli_select_db($conn,"NewsHub")) {
	echo mysqli_error();
}else{
	echo "<br>select success";
}


//3.设定字符集。防止乱码
if (!mysqli_query($conn,"set names utf8")) {
	echo mysqli_error();
}else{
	echo "<br>set utf8 success";
}


?>