
<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?php $form = ActiveForm::begin([
	'action' => ['resume/a_update'],
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
		<div class="public-nav">您当前的位置：<a href="">首页</a>><a href="">个人</a><a href="">基本信息</a></div>
		<div class="public-content">
			<div class="public-content-header">
				<h3>简历信息</h3>
			</div>
			<div class="public-content-cont">
				<table class="public-cont-table">
					
					<?php foreach ($res as $k => $v) {?>
					<tr>
					简历名称:<input type="test" name="fullname" value="<?php echo $v['title']?>">&nbsp&nbsp&nbsp公开状态:<select name="nametype">
						<option value="<?php echo $v['nametype']?>"><?php echo $v['nametype']?></option>
						<option value="半公开">半公开</option>
					</select>
					</tr>
					</br>
					<tr>	
						<td style="widget=10%">
						*基本信息</br>
						姓名:<input type="test" name="fullname" value="<?php echo $v['fullname']?>"></br>
						性别：<input type="radio" name="sex" value="男" <?php
                        if($v['sex']=='男'){
                            echo "checked";
                        }
                        ?>>男
						<input type="radio" name="sex" value="女"
                        <?php
                        if($v['sex']=='女'){
                            echo "checked";
                        }
                        ?>
                        >女

                        </br>
						最高学历:<input type="test" name="education" value="<?php echo $v['education']?>"></br>
						工作经验：<input type="test" name="experience" value="<?php echo $v['experience']?>"></br>
						身高：<input type="test" name="height" value="<?php echo $v['height']?>"></br>
						手机：<input type="test" name="telephone" value="<?php echo $v['telephone']?>"></br>
						邮箱：<input type="test" name="email" value="<?php echo $v['email']?>"></br>
						出生年份：<input type="test" name="birthday" value="<?php echo $v['birthday']?>"></br>
						现居住地：<input type="test" name="residence" value="<?php echo $v['residence']?>"></br>
						专业：<input type="test" name="m_id" value="<?php echo $v['m_id']?>"></br>
						婚姻状况：<input type="test" name="marriage" value="<?php echo $v['marriage']?>"></br>
						籍贯:<input type="test" name="householdaddress" value="<?php echo $v['householdaddress']?>">
						</td>
						<td>
							<img src="">
						</td>
						</tr>	
						<tr>
							
							<td>
							*求职意向</br>
								求职状态：<input type="test" name="current" value="<?php echo $v['current']?>"></br>
								工作性质：<input type="test" name="nature" value="<?php echo $v['nature']?>"></br>
								期望行业：<input type="test" name="t_id" value="<?php echo $v['t_id']?>"></br>
								期望职位：<input type="test" name="i_id" value="<?php echo $v['i_id']?>"></br>
								工作地区：<input type="test" name="d_id" value="<?php echo $v['d_id']?>"></br>
								期望薪资：<input type="test" name="wage" value="<?php echo $v['wage']?>"></br>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center"><input type="hidden" name="id" value="<?php echo $v['id']?>"><input type="submit" value="保存"></td>
						</tr>		
					<?php }?>
				</table>

			</div>
		</div>
	</div>
</body>
</html>




