<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台欢迎页</title>
	<link rel="stylesheet" href="css/reset.css" />
	<link rel="stylesheet" href="css/content.css" />
</head>
<body marginwidth="0" marginheight="0">
	<div class="container">
		<div class="public-nav">您当前的位置：<a href="">首页</a>><a href="">个人</a><a href="">个人会员</a></div>
		<div class="public-content">
			<div class="public-content-header">
				<h3><a href="?r=resume/personadd">添加会员</a></h3>
			</div>
			<div class="public-content-cont">
				<table class="public-cont-table">
					<tr>
						
						<th style="width:10%">用户名</th>
						<th style="width:10%">email</th>
						<th style="width:10%">注册时间</th>
						<th style="width:10%">操作</th>
					</tr>
					<?php foreach ($list as $k=> $v) {?>
					<tr>
						<td><a href="?r=resume/resume&id=<?php echo $v['id']?>"><?php echo $v['username']?></a></td>
						<td><?php echo $v['email']?></td>						
						<td><?php echo date("Y-m-d",$v['addtime'])?></td>		
						<td>
							<div class="table-fun">
								<a href="?r=resume/resume&id=<?php echo $v['id']?>">管理</a>
								<a href="?r=resume/persondel&id=<?php echo $v['id']?>">删除</a>
							</div>
						</td>
					</tr>
					<?php }?>
				</table>
				<div class="page">
					<form action="" method="get">
						<a href="">首页</a>
						<a href="">上一页</a>
						<a href="">下一页</a>
						第<span style="color:red;font-weight:600">12</span>页
						共<span style="color:red;font-weight:600">120</span>页
						<input type="text" class="page-input">
						<input type="submit" class="page-btn" value="跳转">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>