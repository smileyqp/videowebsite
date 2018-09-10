
<?php
	
	//session启动，记录用户登陆状态
	Session_start();
	if($_SESSION["username"]==null){
		$_SESSION["username"]="请登陆";
	}
	?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>视频网站</title>
		<script type="text/javascript" src="js/jquery.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/indexx.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/muke.css">
	</head>
	<!--
    	作者：offline
    	时间：2017-06-21
    	描述：鼠标滑动自动下拉状态
    -->
	<style>
	 .nav > li .dropdown-menu {
	 	margin: 0; 
	 	}
	 .nav > li:hover .dropdown-menu {     
	 	display: block; 
	 	} 
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

				<a class="navbar-brand" href="index.php">视频列表</a>

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
		</nav>
	</div>
		


<!--
	作者：offline
	时间：2017-06-08
	描述：展示盒子
-->

<div style="margin: 50px;">
<?php
include 'mysqli.func.php';

// 总记录数
$sql = "SELECT id  FROM  `videoinfo` ";
$totalnums = totalnums($sql);

// 每页显示条数
$fnum = 8;

// 翻页数
$pagenum = ceil($totalnums / $fnum);

// 页数常量
@$tmp = $_GET['page'];

//防止恶意翻页
if ($tmp > $pagenum)
    echo "<script>window.location.href='index.php'</script>";

//计算分页起始值
if ($tmp == "") {
    $num = 0;
} else {
    $num = ($tmp - 1) * $fnum;
}

// 查询语句
$sql = "SELECT id,img,title,info,videourl,time,chapter,onename FROM   `videoinfo` ORDER BY id DESC LIMIT " . $num . ",$fnum";
$result = doresult($sql);
$_SESSION['title']=null;
// 遍历输出
while (! ! $rows = dolists($result)) {
  if($_SESSION['title']!=$rows['title']){
?>
<div class="box" style="height: auto;">
	<div class="smallbox" style="height: 200px;">
		<div class="leftbox">
			<img src=<?php echo $rows['img']?>>
		</div>
		<div class="rightbox">
			<div class="title">
				<?php echo $rows['title'] ?>
			</div>
			<div class="info">
				<?php echo $rows['info'] ?>
			</div>
			<div class="time">
				<?php echo $rows['time'] ?>
			</div>
		</div>
	</div>
	<div class="smallbox" style="height: auto;">
		<br />
		<br />
		<br />
		<br />
		<?php
			$_SESSION['chapter']=null;
		$sql = "SELECT info,videourl,time,chapter,onename FROM   `videoinfo` ";
$result = doresult($sql);
// 遍历输出
while (! ! $rowsx = dolists($result)) {
	 if($_SESSION['chapter']!=$rows['chapter']){
			?>
		<div style="width:80%;margin:20px auto;height: 50px;background: #008000;border: 1px solid #ccc;">
			<?php echo $rowsx['chapter']?> 
		
		</div>
		<?php
			$sql = "SELECT videourl,onename FROM `videoinfo` where chapter='{$rowsx["chapter"]}'";
			$result = doresult($sql);
			while (!!$rowsz = dolists($result)) {
			?>
		<div style="width:80%;margin:20px auto;height: 50px;background: navajowhite;">
			<?php echo $rowsz['onename']; ?>
		</div>
<?php 
}
	$_SESSION['chapter']=$rows['chapter'];
	 @$_SESSION['title']=$rows['title'];
	} 
}
}
}
?>
	</div>
</div>
</div>

<div class="foot">
	Copyright © 2015 All rights reserved. XXX有限公司 版权所有
</div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
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