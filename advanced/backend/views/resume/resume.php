
<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
?>

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
		<div class="public-nav">您当前的位置：<a href="">首页</a>><a href="">个人</a><a href="">基本信息</a></div>
		<div class="public-content">
			<div class="public-content-header">
				<h3>简历信息</h3>
			</div>
			<div class="public-content-cont">
				<table class="public-cont-table">
					
					<?php foreach ($res as $k => $v) {?>
					<tr>
					简历名称:<?php echo $v['title']?>&nbsp&nbsp&nbsp公开状态:<?php echo $v['nametype']?>
					</tr>
					</br>
					<tr>	
						<td style="widget=10%">
						*基本信息</br>
						姓名:<?php if($v['nametype']==0){echo $v['fullname'];}else{echo "已隐藏";}?></br>
						性别：<?php echo $v['sex']?></br>
						最高学历:<?php echo $v['education']?></br>
						工作经验：<?php echo $v['experience']?></br>
						身高：<?php echo $v['height']?></br>
						手机：<?php echo $v['telephone']?></br>
						邮箱：<?php echo $v['email']?></br>
						出生年份：<?php echo $v['birthday']?></br>
						现居住地：<?php echo $v['residence']?></br>
						专业：<?php echo $v['m_id']?></br>
						婚姻状况：<?php echo $v['marriage']?></br>
						籍贯:<?php echo $v['householdaddress']?>
						</td>
						<td>
							<img src="<?php echo $v['photo']?>" width="150px" height="100px">
						</td>
						</tr>	
						<tr>
							
							<td>
							*求职意向</br>
								求职状态：<?php echo $v['current']?></br>
								工作性质：<?php echo $v['nature']?></br>
								期望行业：<?php echo $v['t_id']?></br>
								期望职位：<?php echo $v['i_id']?></br>
								工作地区：<?php echo $v['d_id']?></br>
								期望薪资：<?php echo $v['wage']?>
							</td>
						</tr>
						<tr>
							<td><a href="?r=resume/resumesave&id=<?php echo $v['id']?>">修改简历</a></td>
						</tr>		
					<?php }?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>




