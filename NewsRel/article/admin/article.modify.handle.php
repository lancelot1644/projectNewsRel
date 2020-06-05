<?php
require('connect.php');
//3.4.2 分支二 修改(即在h5页面更新录入article表)
 	//e.（18点58分添加）用来判断在h5页面的标题是否为空;如果为空，警告并关闭mysqli_close($conn)和【exit;】退出当前业务逻辑处理
 		//window.history.go()在web操作中选择前进或后退（推到上一步）；实际也可换成window.location.href='article.modify.php'，但这样会遇到刷新且不保留修改的问题
 		//这里分别使用!isset()和empty()的原因是，有可能输入空格充当NULL，而isset()对空格判断结果为true；empty()则能判断是否为空
 		if (!isset($_POST['title'])||empty($_POST['title'])) {
 		
 			echo "<script>alert('标题不能为空');window.history.go(-1)</script>";
 			mysqli_close($conn);
 			exit("此操作非法");
 		}


	//d.获得由article.modify.phparticle.modify.phpから文件以
	//article.modify.phpからpost方法でvalueをえる.
	$id = $_POST['id'];
	$title=$_POST['title'];
	$author=$_POST['author'];
	$description=$_POST['description'];
	$content=$_POST['content'];
	$dateline=time();

	$updateSql = "update article set title = '$title',author='$author',description='$description',content='$content',dateline='$dateline' where id='$id'; ";
	$query = mysqli_query($conn,$updateSql);
	echo "<br>";
	//print_r($query);
	//if ($query) { 	//下面是最终版本（感受到Git的必要）。添加了一个确认更新成功的条件;mysqli_affected_rows():返回前一次sql操作影响的行数，这里用来判断确实mysql进行过更新的变动
	if ($query&&mysqli_affected_rows($conn)) {
		//echo "<br>更新成功".mysqli_affected_rows($conn);
		
		echo "<script>alert('修改文章成功');window.location.href='article.manage.php'</script>";

	}else{
		echo "<script>alert('修改文章失败');window.location.href='article.manage.php'</script>";
	}

//2020年6月4日19点17分完成；总共耗时15小时。


?>