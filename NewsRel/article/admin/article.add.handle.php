<?php
//step 2.2 此文件的功能有：
//1.选择分支锚点a,b跳转后的逻辑处理
//2.将提交的信息输入数据库，并在输入前进行校验


require_once('connect.php');

//phase.1
//检验文章title是否为空，空则弹出提示(这里使用表单form传值进入本文件)
if (!$_POST['title']) {
	//这里用script脚本弹出alert()提示框来进行提醒;并使用“window.location.href=”来进行动态输出跳转（返回）到article.add.php
	echo "<script>alert('标题不能为空'); window.location.href='article.add.php'</script>";
}

//phase.2
//如果校验通过，则进行内容入库的操作
	//获取表单中信息&添加进入数据库的语句
	$title = $_POST['title'];
	$author = $_POST['author'];
	$description = 	$_POST['description'];
	$content =	$_POST['content'];
	$dateline = time();

	$insertSql = "insert into article(title,author,description,content,dateline) values('$title','$author','$description','$content',$dateline)";
	$articlePub = mysqli_query($conn,$insertSql);
	//判断文章是否发布成功
	if ($articlePub) {
		//符合条件判断，则弹出成功提示框，并跳转到article.manage.php页面
		echo "<script>alert('发布文章成功'); window.location.href='article.manage.php'</script>";
	}else{
		//echo "发布文章失败".mysqli_error($conn);
		//发布失败也同样跳到article.manage.php页面
		echo "<script>alert('发布文章失败'); window.location.href='article.manage.php'</script>";
	}

	//执行插入语句完成后关闭连接数据库的请求
	mysqli_close($conn);
	//至此，提交表单内容至数据库（发布文章）的动作完成了；接下来是article.manage.php（后台管理）的语句

?>