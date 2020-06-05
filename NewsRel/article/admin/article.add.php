<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>发布文章</title>

<!--不添加这些索引 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="文章发布系统——后台管理系统">
    <meta name="author" content="DreamBoy">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../myCss/style.css"> -->
</head>
<body>
	<!--step 2.1 制作文章发布&后台管理的默认页面article.add.php。它拥有提交文章的功能-->
	<h1>文章发布系统&后台管理系统</h1>
			<!--锚点a.发布文章&提交动作的内容在此名为article.add.php的文件中-->
			<a href="article.add.php">发布文章</a>
			<!--锚点b.如果想要后台管理文章则跳转到article.manage.php的文件-->
			<a href="article.manage.php">管理文章</a>
	<h4>发布文章</h4>
			<!--制作表单，提交的目标为article.add.handle.php文件 ，
			这个页面负责：
			1.将提交的文章录入数据库
			2.定义文章的简介信息&将其返回浏览器页面	
			3.显示文章录入的状态为成功or失败	
			4.如果点击锚点b，则跳转至article.manage.php文章管理界面-->			
			<form method="post" action="article.add.handle.php">
			标题：<input type="text" placeholder="作品标题" name="title"><br>
			作者：<input type="text" placeholder="作者" name="author"><br>
			简介：<textarea name="description" cols="30" rows="5" ></textarea><br>						
			内容	:<textarea name="content" cols="30" rows="15"></textarea><br>					
				<button type="submit">提交</button><br>	
			</form>								
	<footer>
		Copyright &copyright; 1994-2020, shadowloop, All Rights Reserved
	</footer>
</body>
</html>