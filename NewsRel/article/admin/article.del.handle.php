<?php
//3.4 本页负责 删除||修改 后台展示的文章内容（从数据库中删除）
	require('connect.php');
//3.4.1 分支一.删除
	//需要在后台管理页面article.manage.php定位到要删除的文章索引'id'。
	echo "<br>";
	//这里要用get方法从article.manage.php传值进来，否则无法通过$_GET获取要删除行的信息;另外，get方法只能传输ASCLL码数据（问题1？---这句话我并不明白，但我觉得与此有关，下面除了intval()以外的传值都失败无法传值）
	//$title=strval($_GET['title']);
	$id = intval($_GET['id']);
	echo  "id类型为".var_dump($id);
	$deleteSql="delete from article where id=$id";

	echo "<br>";
	//执行删除语句
	if (mysqli_query($conn,$deleteSql)) {
		//echo "删除成功";
		echo "<script>alert('删除成功');window.location.href='article.manage.php'</script>";
	}else{
		//echo "删除失败:\n".mysqli_error($conn);
		echo "<script>alert('删除文章失败'); window.location.href='article.manage.php'</script>";
	}

//2020年6月3日23点40分

?>