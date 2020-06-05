<?php
//step 3.后台管理页面&后台管理逻辑
	require 'connect.php';
	//3.1 从数据库中获取录入文章的所有信息
	$sql = "select * from article order by dateline desc";
		//实例化查询的请求
	$query = mysqli_query($conn,$sql);
		//条件判断。mysqli_num_rows()的作用是输出表中的行数，这里作为判断(判断数据表内是否有内容)。
	if ($query&&mysqli_num_rows($query)) {

		while ($row = mysqli_fetch_assoc($query)) {
			//while(){}是一个循环语句（并非条件分支语句）,符合条件则循环执行；不符合则跳出循环
			//mysqli_fetch_assoc()返回一个数据表key-value集合中最新的一行
			$data[]=$row;
		}
		//print_r ($data);
		//print_r(mysqli_fetch_assoc($query));
		
	}else{
		//如果查询请求没有实例化&&表内没有内容，则先创建一个数组$data。？--作用是什么？还不知道
		$data = array();
	}

?>
	<!DOCTYPE html>
	<html>
	<head>
		<!--3.2 后台管理的H5页面（用于从数据库中提取表article部分字段下的内容，并在网页上展示）-->
		<meta charset="utf-8">
		<title>后台文章管理</title>
		<style type="text/css">
		</style>
	</head>
	<body>
		<!--依然是两个供选择跳转的锚点-->
		<br>
		<a href="article.add.php">发布文章</a>
		<a href="article.manage.php">管理文章</a>
		<br>
		<h1>文章管理列表</h1>
		<!--用表格来显示由数据库中提取的数据-->
		<table border="1">
			<!--这里是表格的3列表头-->
			<tr>
				<th>编号</th>
				<th>标题</th>
				<th>操作</th>
			</tr>
			<?php
				//3.3 这里写数据库的文章内容在表格显示的逻辑
				if (!empty($data)) {
					//3.3.1 foreach（）{}语句。针对php的循环赋值方法，机制结果和上方针对mysql数据表的mysqli_fetch_assoc+while循环的组合机制相同
					foreach ($data as $value) {	
					//php语句块里不能包括h5标签；但逻辑上依然包括h5的处理
						?>
					<tr>
						<td>
							<!--3.3.2 第一列根据拷贝自数据表的数据集$data->$value中的id列作为标题内容;第二列为title-->
							<?php echo $value['id']; ?>
						</td>
						<td>	
							<?php echo $value['title']; ?>
						</td>
						<td>
				<!--3.4 点击删除则跳转article.del.handle.php执行删除当前行的逻辑；点击修改则跳转到article.modify.php执行修改的逻辑-->
					<!--这里使用get方法（？即是get）传值进入article.del.handle.php页面-->
							<a href="article.del.handle.php?id=<?php echo $value['id'];?>">删除</a>
							<a href="article.modify.php?id=<?php echo $value['id'];?>&title=<?php echo $value['title'];?>">修改</a>
						</td>
						
						
					</tr>
			<?php
					}
				}


			?>
	
			

		</table>
	</body>
	</html>