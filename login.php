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
   <link rel="stylesheet" href="css/common_form.css">
   	<style>
	 .nav > li .dropdown-menu {   margin: 0; } .nav > li:hover .dropdown-menu {     display: block; } 
</style>
	</head>
	<body>
		<!--
        	作者：offline
        	时间：2017-06-08
        	描述：顶部导航条
        -->
       <div class="header">
		<nav class="navbar navbar-default navbar-fixed-top ">
			<div class="container-fluid">

				<a class="navbar-brand" href="index.php">视频网站</a>

				<ul class="nav navbar-nav navbar-right">

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="zhuangtai">欢迎您，<?php echo $_SESSION["username"]?></a>			
						<ul class='dropdown-menu'>
							<li class='change' style="">
								<a href='login.php'>登陆账号</a>
							</li>
							<li class='change' style="">
								<a href='registerpage.php'>注册账号</a>
							</li>
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
		
		
		
	<div class="content">

        <img class="content-logo" src="img/form_logo.png" alt="logo">
        <h1 class="content-title">登录</h1>
        <div class="content-form">
            <form method="post" action="dologin.php">
                <div id="change_margin_1">
                    <input class="user" type="text" name="username" placeholder="请输入用户名" onblur="oBlur_1()" onfocus="oFocus_1()" style="box-sizing: initial;">
                </div>
                <!-- input的value为空时弹出提醒 -->
                <p id="remind_1"></p>
                <div id="change_margin_2">
                    <input class="password" type="password" name="password" placeholder="请输入密码" onblur="oBlur_2()" onfocus="oFocus_2()" style="box-sizing: initial;">
                </div>
                <!-- input的value为空时弹出提醒 -->
                <p id="remind_2"></p>
                <div id="change_margin_3">
                    <input class="content-form-signup" type="submit" value="登录">
                </div>
            </form>
        </div>
        <div class="content-login-description">没有账户？</div>
        <div><a class="content-login-link" href="registerpage.php">注册</a></div>

	</div>
	


		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/common_form_test.js"></script>
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