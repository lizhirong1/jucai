
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
	 <style>
        .pre li {
            float:left;

            padding-left: 25px;;
        }
    </style>
</head>
<body marginwidth="0" marginheight="0">
	<div class="container">
		<div class="public-nav">您当前的位置：<a href="">首页</a>><a href="">个人</a><a href="">待审核简历列表</a></div>
		<div class="public-content">
			<div class="public-content-header">
				<h3>修改简历信息</h3>
			</div>
			<div class="public-content-cont">
				<table class="public-cont-table">
					<tr>
						<th style="width:5%">ID</th>
						<th style="width:10%">姓名</th>
						<th style="width:10%">等级</th>
						<th style="width:10%">审核状态</th>
						<th style="width:10%">添加时间</th>
						<th style="width:20%">操作</th>
					</tr>
					<?php foreach ($res as $k => $v) {?>
					<tr>
						<td><?php echo $v['id']?></td>
						<td><a href="?r=resume/resume&id=<?php echo $v['id']?>"><?php echo $v['fullname']?></a></td>
						<?php if($v['talent']==1){?>
						<td>高级人才</td>
						<?php }else{?>
							<td>普通人才</td>
						<?php }?>
						<?php if($v['is_audit']==1){?>				
						<td>审核通过</td>
						<?php }else{?>		
						<td>审核未通过</td>	
						<?php }?>
						<td><?php echo date('Y-m-d',$v['addtime'])?></td>			
						<td>
							<div class="table-fun">
								<a href="?r=resume/resume&id=<?php echo $v['id']?>">管理</a>
								<a href="?r=resume/del&id=<?php echo $v['id']?>">删除</a>
								<a href="javascript:void(0)" class="audit" aid="<?php echo $v['id']?>">通过审核</a>
							</div>
						</td>
					</tr>

					<?php }?>
				<tr>				
				<td style="text-align: center" colspan="6">
				<?= LinkPager::widget(['pagination' => $pages,
				'nextPageLabel' => '下一页', 
				'prevPageLabel' => '上一页',
				'firstPageLabel' => '首页', 
				'lastPageLabel' => '尾页',
				'options' => ['class' => 'pre'],]); ?>
				</td>
				</tr>	
				</table>

			</div>
		</div>
	</div>
</body>
</html>
<script src="assets/jquery-1.9.1.min.js"></script>
<script>
	$(".audit").click(function(){
		var id=$(this).attr('aid');
	window.location.href="?r=resume/doindex&id="+id;
})
</script>



