<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  

<!DOCTYPE html>
<?php
	session_start();
	if($_SESSION["username"]==null){
		$_SESSION["username"]="请登陆";
	}
	$_SESSION["title"]=$_SESSION["title"];
	$_SESSION["info"]=$_SESSION["info"];
	echo $_SESSION["destination"] ;
	?>
<html>

	<head>
		<meta charset="utf-8" />
		<title></title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/index.css" rel="stylesheet">
		<link href="css/adminofupload.css" rel="stylesheet">
			<style>
	 .nav > li .dropdown-menu {   margin: 0; } 
	 .nav > li:hover .dropdown-menu {     display: block; } 
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

				<a class="navbar-brand" href="#">后台</a>

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
				  <li role="presentation"><a href="myinfo.php">我的信息</a></li>
				  <li role="presentation"><a href="myvideo.php">我发布的视频</a></li>
				  <li role="presentation" class="active"><a href="adminofupload.php">发布新视频</a></li>
				</ul>
			</div>
			<div class="rightofmain">
				<div class="smallbox">
					<ul class="nav nav-pills">
					  <li role="presentation" class="listyle"><a href="adminofupload.php">上传视频缩略图</a></li>
					  <li role="presentation" class="listyle" ><a href="adminofuploadinfo.php">上传视频信息</a></li>
					  <li role="presentation" class="active listyle" ><a>上传视频数据</a></li>
					  <li role="presentation" class="listyle" style="width: 24%;" ><a>确认信息</a></li>
					</ul>
				</div>
				<div style="text-align: center;margin-top: 100px;" >
					<label>点击章节进行章节视频添加</label>
					<table class="table">
						<tr>
							<th>章节名称</th>
							<th>章节集数</th>
							<th>操作</th>
						</tr>	
					<?php 
					if(@$_POST['chapter1name']!=null){
						for($i=1;$i<=$_SESSION["numofchapter"];$i++){	
							//第I章节的名字
							@$_SESSION['chapter'.$i.'name']=$_POST['chapter'.$i.'name'];
							//第I章节的分集数量
							@$_SESSION['chapter'.$i.'numofchapter']=$_POST['chapter'.$i.'numofchapter'];
					?>
					
						<tr>
							<td><?php echo $_SESSION['chapter'.$i.'name'];?></td>
							<td><?php echo $_SESSION['chapter'.$i.'numofchapter'];?></td>
							<td><a href="addvideo.php?chapter=<?php echo $i?>">添加</a></td>
						</tr>
				
					<?php
					}
					}else{
						for($i=1;$i<=$_SESSION["numofchapter"];$i++){	
			
						?>
						<tr>
							<td><?php echo $_SESSION['chapter'.$i.'name'];?></td>
							<td><?php echo $_SESSION['chapter'.$i.'numofchapter'];?></td>
							<td><a href="addvideo.php?chapter=<?php echo $i?>">添加</a></td>
						</tr>
					<?php
					}
					}
						?>
						</table>    
						<a class="btn btn-danger" style="display: block; margin: 30px;" href="confirm.php">下一步</a> 
				</div>
			</div>
		</div>
	</body>
</html>