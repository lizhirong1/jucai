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
		<div class="public-nav">您当前的位置：<a href="">管理首页</a>><a href="">会员管理</a><a href="">V币充值</a></div>
		<div class="public-content">
			<div class="public-content-header">
				<h3>修改网站配置</h3>
			</div>
			<div class="public-content-cont">
				<table class="public-cont-table">
					<tr>
						<th style="width:10%">编号</th>
						<th style="width:10%">风格</th>
						<th style="width:20%">音乐名称</th>
						<th style="width:30%">播放器</th>
						<th style="width:30%">操作</th>
					</tr>
					<tr>
						<td>1</td>
						<td>dj</td>
						<td>My Lady</td>						
						<td>
								<audio controls="controls" autoplay="autoplay" src="http://www.yii.com/advanced/backend/web/音乐/DJ小鱼儿 - My Lady.mp3" loop="loop" style="height: 20px;background-color: cyan"></audio>
						</td>						
						<td>
							<div class="table-fun">
								<a href="">修改</a>
								<a href="">删除</a>
							</div>
						</td>
					</tr>
					<tr>
						<td>2</td>
						<td>优雅</td>
						<td>刚好遇见你</td>					
						<td>
								<audio controls="controls" autoplay="autoplay" src="http://www.yii.com/advanced/backend/web/音乐/李玉刚 - 刚好遇见你.mp3" loop="loop" style="height: 20px;background-color: cyan"></audio>
						</td>						
						<td>
							<div class="table-fun">
								<a href="">修改</a>
								<a href="">删除</a>
							</div>
						</td>
					</tr>
						<tr>
						<td>3</td>
						<td>喊麦</td>
						<td>吉拉拉</td>					
						<td>
								<audio controls="controls" autoplay="autoplay" src="http://www.yii.com/advanced/backend/web/音乐/MC天佑 - 吉拉拉.mp3" loop="loop" style="height: 20px;background-color: cyan"></audio>
						</td>						
						<td>
							<div class="table-fun">
								<a href="">修改</a>
								<a href="">删除</a>
							</div>
						</td>
					</tr>
				</table>
				<div class="page">
					<form action="" method="get">
					共<span>42</span>个站点
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
<script>
$().ready(function(){
	var item = $(".public-ifame-item");

	for(var i=0; i < item.length; i++){
		$(item[i]).on('click',function(){
			$(".ifame-item-sub").hide();
			if($(this.lastElementChild).css('display') == 'block'){
				$(this.lastElementChild).hide()
				$(".ifame-item-sub li").removeClass("active");
			}else{
				$(this.lastElementChild).show();
				$(".ifame-item-sub li").on('click',function(){
					$(".ifame-item-sub li").removeClass("active");
					$(this).addClass("active");
				});
			}
		});
	}
});
</script>
