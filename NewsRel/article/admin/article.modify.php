<?php
/*
@ $brand 	实例化的mysqli_result Object对象结果集$query经过mysqli_fetch_assoc()函数处理后返回的一行数据集
@ mysqli_query() 	创建一个mysqli模块的实例化对象，并返回一个mysql的结果集
 */

require('connect.php');
//3.4.2 分支二 修改(即在h5页面更新录入article表)
	//逻辑：1.传值。通过文章id来传值进入此页面；2.定位文章。通过id来找到数据库中文章；3.展示文章内容。在h5面板展示可修改的文章内容；4.修改文章内容并update更新进入数据库（第4段逻辑放入子文件modify.handle.php）。

	//a.使用同样的get方法获取id
	echo "<br>";
	print_r($_GET['id']);
	echo "<br>";
	print_r(var_dump($_GET['title']));


		//b.获取旧的文章信息
	$id = $_GET['id'];
	$sql = "select * from article where id = $id";
	$query = mysqli_query($conn,$sql);
	echo "<br>";
	print_r($query);
	$brand = mysqli_fetch_assoc($query);
	echo "<br>";
	//print_r($brand['description']);

	//c.构造一个h5展示文章内容的面板
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>文章修改</title>
</head>
<body>
	<h1>后台文章管理</h1>
	<br>
		<a href="article.add.php">发布文章</a>
		<a href="article.manage.php">管理文章</a>
	<br>
	<h4>修改文章</h4>
		<!--此处的action功能：可修改后的内容在article.modify.handle.php文件逻辑处理后重新录入数据库-->
	<form method="post" action="article.modify.handle.php">
		<input type="hidden" name="id" value="<?php echo $brand['id'];?>">
	<br>
		<!--placeholder便是旧的文章内容通过默认填充显示-->
	标题：<input type="text" name="title"  placeholder="文章标题" value="<?php echo $brand['title'];?>">
	<br>
	作者：<input type="text" name="author" placeholder="文章作者" value="<?php echo $brand['author'];?>">
	<br>
		<!--textarea标签没有value属性-->
	简介：<textarea type="text" name="description" cols="30" rows="15" ><?php echo $brand['description'];?></textarea>
	<br>
	内容：<textarea type="text" name="content" cols="30" rows="15" ><?php echo $brand['content'];?></textarea>
	<br>
	<button type="submit">提交修改</button> 
	<!--点击按钮没有跳转到网页是怎么回事？18点46分经过4个小时后重新打开，居然又能跳转了卧槽，玄学！！！-->
	</from>
</body>
</html>
