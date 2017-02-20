<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?php $form = ActiveForm::begin([
	'action' => ['resume/personadd'],
	'method'=>'post',
	]); ?>

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
		<div class="public-nav">您当前的位置：<a href="">管理首页</a>><a href="">个人</a><a href="">个人会员</a></div>
		<div class="public-content">
			<div class="public-content-header">
				<h3><a href="">添加个人会员</a></h3>
			</div>
			<div>
			<center>
				<table border="1">
						<tr>
							<td>用户名：</td>
							<td><input type="text" name="username"></td>
						</tr>
						<tr>
							<td>邮箱地址：</td>
							<td><input type="text" name="email"></td>
						</tr>
						<tr>
							<td>登录密码：</td>
							<td><input type="password" name="password"></td>
						</tr>
						<tr>
							<td>再次输入密码：</td>
							<td><input type="password" name="pwd"></td>
						</tr>
						<tr>
							<td align="center" colspan="2">
								<input type="submit" value="添加">
							</td>
						</tr>

				</table>
				</center>
<a href="?r=resume/person"><input type="button" value="返回个人中心"></a>
			</div>
		</div>
	</div>
</body>
</html>