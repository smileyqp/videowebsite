<!DOCTYPE html>
<html lang="en">
<?php
		Session_start();
	if($_SESSION["username"]==null){
		$_SESSION["username"]="请登陆";
	}
	?>
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<!--
        	作者：smile
        	时间：2017-06-08
        	描述：video后台管理系统
        -->
<title>admin网站后台管理</title>

<!-- Bootstrap Core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="metisMenu/metisMenu.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="dist/css/sb-admin-2.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="vendor/font-awesome/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

	<div id="wrapper">
        <!--
        	作者：smile
        	时间：2017-06-29
        	描述：顶部导航条
        -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation"
			style="margin-bottom: 0">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.html">后台管理系统</a>
			</div>
			<!-- /.navbar-header -->

			<ul class="nav navbar-top-links navbar-right">

				<!-- /dropdown -->
				<li class="dropdown">
				    <a class="dropdown-toggle"data-toggle="dropdown" href="#"> 
				        <i class="fa fa-user fa-fw"></i>欢迎您，<?php echo $_SESSION["username"]?><i class="fa fa-caret-down"></i>
				    </a>
					
					<ul class="dropdown-menu dropdown-user">
						<li><a href="#"><i class="fa fa-gear fa-fw"></i>设置</a></li>
						<li><a href="../index.php"><i class="fa fa-files-o fa-fw"></i>首页</a></li>
						<li class="divider"></li>
						<li><a href="../doexit.php"><i class="fa fa-sign-out fa-fw"></i>退出登录</a></li>
					</ul> 
				</li>
				<!-- /dropdown -->
			</ul>
			<!-- /顶部导航条 结束-->



			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
						<li><a href="#"><i class="fa fa-dashboard fa-fw"></i>总览</a></li>

						<li><a href="#"><i class="fa fa-edit fa-fw"></i>用户管理<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li role="presentation" ><a href="users.php">用户基本信息</a></li>
							</ul> <!-- /.nav-second-level -->
						</li>

						<li><a href="#"><i class="fa fa-table fa-fw"></i>视频管理<span
								class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li><a href="allvideos.php">全部视频</a></li>
								<li><a href="successvideos.php">发布成功</a></li>
								<li><a href="failvideos.php">发布失败</a></li>
							</ul> <!-- /.nav-second-level --></li>

						<li><a href="../login.php"><i class="fa fa-files-o fa-fw"></i>返回登录页面</a>
							<!-- /.nav-second-level --></li>
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
			<!-- /.navbar-static-side -->
		</nav>
        
        
        
         <!--
        	作者：smile
        	时间：2017-06-29
        	描述：失败上传视频导航条
        -->
<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12 ">
					<h3>Success Videos Management</h3>
				</div>
			</div>
			<ul class="nav nav-tabs">
				<li role="presentation"><a href="allvideos.php">全部视频【】</a></li>
				<li role="presentation"class="active"><a href="successvideos.php">发布成功【】</a></li>
				<li role="presentation"><a href="failvideos.php">发布失败【】</a></li>
			</ul>
			<div class="btn-group" role="group" aria-label="...">
				<button type="button" class="btn btn-default">全选</button>
				<button type="button" class="btn btn-default">添加到播单</button>
				<button type="button" class="btn btn-default">删除</button>
			</div>


			<div class="btn-group">
				<button type="button" class="btn btn-default dropdown-toggle"
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					筛选 <span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<li><a href="#">公开</a></li>
					<li><a href="#">我订阅课可见</a></li>
					<li><a href="#">仅自己可见</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="#">密码保护</a></li>
				</ul>
			</div>



			<div class="row" style="text-align: center;">
				 <div class="col-lg-1">
					<h5>选择</h5>
				</div>
				<div class="col-lg-2">
					<h5>视频</h5>
				</div>
				<div class="col-lg-2">
					<h5>标题</h5>
				</div>
				<div class="col-lg-2">
					<h5>上传者</h5>
				</div>
				<div class="col-lg-2">
					<h5>上传时间</h5>
				</div>
				<div class="col-lg-3">
					<h5>操作</h5>
				</div>

				<!-- /.col-lg-12 -->
			</div>
			<!--
        	作者：smile
        	时间：2017-06-08
        	描述：循环遍历全部上传成功videos信息
        	
        	<input type="checkbox" aria-label="...">
        	
        	
        --> 
<?php
include '../mysqli.func.php';
$sql = "select * from videoinfo where situation=1"; // sql语句
$result = doresult($sql);
while (! ! $rows = dolists($result)) {
    echo " 
    <div class='row'style='text-align:center;margin:10px;'>
    				
    				<div class='col-lg-3'>
    				<div class='col-lg-2'style='text-align:left;'><input type='checkbox' aria-label=''></div>
    				<div class='col-lg-10'><a href='#'> 
    				<video style='width:160px;height:120px;'class='media-object' src='$rows[videourl]' alt=''></a>
    				</div>
    				
    				
    				
    				
    				</div>
    				<div class='col-lg-2'><h5>$rows[title]</h5></div>
    				<div class='col-lg-2'><h5>$rows[belongwho]</h5></div>
    				<div class='col-lg-2'><h5>$rows[time]</h5></div>
    				<div class='col-lg-3'>
    				    <div class='row'>
    				        <div class='col-lg-4'><a href='userinfo.php'>详情</a></div>
    				        <div class='col-lg-4'><a href='#'>修改</a></div>
    				        <div class='col-lg-4'><a href='#'>删除</a></div>			    
    				    </div>   				
    				</div>
    			</div>	  
    ";
}
?>
		</div>

		<!--
        	作者：smile
        	时间：2017-06-08
        	描述：底部标签
        -->
		<ul class="list-group">
			<li class="list-group-item"><span class="badge">Success Videos</span>Success
				Videos</li>
		</ul>

		
		

	</div>
	
	<script src="../js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="bootstrap/js/bootstrap.min.js"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="metisMenu/metisMenu.min.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="dist/js/sb-admin-2.js"></script>

</body>

</html>