<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<?php
		Session_start();
	if($_SESSION["username"]==null){
		$_SESSION["username"]="请登陆";
	}
	?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title></title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/index.css" rel="stylesheet">
		<link href="css/adminofupload.css" rel="stylesheet">
		</head>
		<style>
	 .nav > li .dropdown-menu {   margin: 0; } .nav > li:hover .dropdown-menu {     display: block; } 
</style>
	<body>
		<!--
        	作者：offline
        	时间：2017-06-08
        	描述：顶部导航条
        -->
       <div class="header">
		<nav class="navbar navbar-default navbar-fixed-top ">
			<div class="container-fluid">

				<a class="navbar-brand" href="index.php">后台</a>

				<ul class="nav navbar-nav navbar-right">

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="zhuangtai">欢迎您，<?php echo $_SESSION["username"]?></a>			
						<ul class='dropdown-menu'>
							<li class='change2' style="">
								<a href='myinfo.php'>个人主页</a>
							</li>
							<li class='change2' style="">
								<a href='myvideo.php'>我发布的视频</a>
							</li>
							<li class='change2' style="">
								<a href='adminofupload.php'>发布视频</a>
							</li>
							<li role='separator' class='divider' class='change2' style=""></li>
							<li class='change2' style="">
								<a href='doexit.php'>退出登陆</a>
							</li>
						</ul>

					</li>
				</ul>
			</div>
			<!-- /.container-fluid -->
		</nav>
		</div>
		
		<!--
        	作者：offline
        	时间：2017-06-08
        	描述：主体
        -->
		<div class="main">
			<div class="leftofmain">
				<ul class="nav nav-pills nav-stacked">
				  <li role="presentation" class="active"><a href="myinfo.php">我的信息</a></li>
				  <li role="presentation"><a href="myvideo.php">我发布的视频</a></li>
				  <li role="presentation"><a href="adminofupload.php">发布新视频</a></li>
				</ul>
			</div>
			
			<div class="rightofmain" style="text-align: center;">
				<span style="margin: 50px;display: block;font-family: '微软雅黑';font-size: 30px;">我的信息</span>
				<div class="maininfo" style="margin: 100px;"> 
					<table class="table">
						<tr class="table-bordered">
							<th>用户名</th>
							<td><?php echo $_SESSION["username"] ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<script>
			
			$("document").ready(function() {
				var iftrue=document.getElementById('zhuangtai').innerHTML;
				if(iftrue=="欢迎您，请登陆"){
					$(".change2").hide();
					$(".change").show();
				}
				else{
					$(".change2").show();
					$(".change").hide();
				}
			}
		);
			
		</script>
	</body>
</html>