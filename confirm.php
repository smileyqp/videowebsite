<?php
	 session_start();
	if($_SESSION["username"]==null){
		$_SESSION["username"]="请登陆";
	}
	?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>后台管理系统——上传视频信息确认</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/index.css" rel="stylesheet">
		<link href="css/adminofupload.css" rel="stylesheet">
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
					  <li role="presentation" class="listyle" ><a href="uploadvideo.php">上传视频数据</a></li>
					  <li role="presentation" class="active listyle" style="width: 24%;" ><a>确认信息</a></li>
					</ul>
				</div>
				<div style="text-align: center;margin-top: 100px;" >
					<form method="post" action="confirmupload.php">
					<table class="table">
						<tr>
							<th>视频标题</th>
							<td><?php echo  $_SESSION["title"]?></td>
							<input type="hidden" name="title" value="<?php echo $_SESSION['title']?>"  />
						</tr>
						<tr>
							<th>视频简介</th>
							<td><?php echo  $_SESSION["info"]?></td>
							<input type="hidden" name="info" value="<?php echo $_SESSION['info']?>"  />
						</tr>
						<tr>
							<th>视频缩略图</th>
							<td><img style="height: 100px;height: 100px;" src="<?php echo $_SESSION['destination']?>"></td>
							<input type="hidden" name="destination" value="<?php echo $_SESSION['destination']?>"  />
						</tr>
						<tr>
							<th>
								章节数量
							</th>
							<td>
								<?php echo $_SESSION["numofchapter"]?>
							</td>
						</tr>
						<?php
							$i = 1; 
							for($i;$i<=$_SESSION["numofchapter"];$i++){
							?>
						<tr>
							<th>视频章节名</th>
							<td><?php echo  $_SESSION['chapter'.$i.'name'];
								$name='name'.$i;?>
							</td>
							<input type="hidden" name="<?php echo $name?>" value="<?php echo  $_SESSION['chapter'.$i.'name']?>"  />
						</tr>
						<?php
							$n=1;
							for($n;$n<=$_SESSION['chapter'.$i.'numofchapter'];$n++){
							?>
						<tr>
							<th style="text-align: right;">视频单集名</th>
							<td><?php echo  $_SESSION["nameofevery".$i.$n];
								$nameofevery='nameofevery'.$i.$n;?>
							</td>
							<input type="hidden" name="<?php echo $nameofevery?>" value="<?php echo  $_SESSION["nameofevery".$i.$n]?>"  />
						</tr>
						<tr>
							<th style="text-align: right;">视频文件服务器路径</th>
							<td><?php echo  $_SESSION["videourl".$i.$n];
								$videourl="videourl".$i.$n;
								?></td>
							<input type="hidden" name="<?php echo $videourl?>" value="<?php echo $_SESSION["videourl".$i.$n]?>"  />
						</tr>
						
						<?php
								}							
							}?>
						<tr>
							<th>上传人</th>
							<td><?php echo  $_SESSION["username"]?></td>
							<input type="hidden" name="username" value="<?php echo $_SESSION['username']?>"  />
						</tr>
					</table>
						<button type="submit">确认上传</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>