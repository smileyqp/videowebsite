<!DOCTYPE html>
<htm>
<?php
		Session_start();
	if($_SESSION["username"]==null){
		$_SESSION["username"]="请登陆";
	}
	?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="l">
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

						<li><a href="login.html"><i class="fa fa-files-o fa-fw"></i>返回登录页面</a>
							<!-- /.nav-second-level --></li>
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
			<!-- /.navbar-static-side -->
		</nav>

		<div id="page-wrapper"style="text-align: center;">
		<div class="row"><div class="col-lg-12"><h3>用户列表</h3></div></div>
    		<div class="container-fluid">
    		      
    			<div class="row">
    				<div class="col-lg-2"><h5>账号</h5></div>
    				<div class="col-lg-2"><h5>密码</h5></div>
    				<div class="col-lg-2"><h5>注册时间</h5></div>
    				<div class="col-lg-2"><h5>注册IP</h5></div>
    				<div class="col-lg-1"><h5>视频数目</h5></div>
    				<div class="col-lg-3"><h5>操作</h5></div>
    				<!-- /.col-lg-12 -->
    			</div>	
            </div>
			
<?php
include '../mysqli.func.php';
$sql= "select * from user";//sql语句
$result =doresult($sql);
while (! ! $rows = dolists($result)) {
    echo "
    <div class='row'>
    				<div class='col-lg-2'><h5>$rows[username]</h5></div>
    				<div class='col-lg-2'><h5>$rows[password]</h5></div>
    				<div class='col-lg-2'><h5>$rows[regtime]</h5></div>
    				<div class='col-lg-2'><h5>$rows[regip]</h5></div>
    				<div class='col-lg-1'><h5>3</h5></div>
    				<div class='col-lg-3'>
    				    <div class='row'>
    				        <div class='col-lg-4'><a href='userinfo.php'>详情</a></div>
    				        <div class='col-lg-4'><a href='#'>修改</a></div>
    				        <div class='col-lg-4'><a href='#'>删除</a></div>			    
    				    </div>   				
    				</div>
    			</div>	
    
    
    
    
    
    
    ";//循环，拼凑下拉框选项
  } 
?>
			
			
			
			
			
			
			
			
			
			
			
			
		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->

	<!-- jQuery -->
	<script src="../js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="bootstrap/js/bootstrap.min.js"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="metisMenu/metisMenu.min.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="dist/js/sb-admin-2.js"></script>

</body>

</html>