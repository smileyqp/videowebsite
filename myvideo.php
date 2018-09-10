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
				  <li role="presentation"><a href="myinfo.php">我的信息</a></li>
				  <li role="presentation" class="active"><a href="myvideo.php">我发布的视频</a></li>
				  <li role="presentation"><a href="adminofupload.php">发布新视频</a></li>
				</ul>
			</div>
			<div class="rightofmain" style="text-align: center;">
				<div class="maininfo" style="margin: 100px;"> 
					<table class="table">
						<tr class="table-bordered">
							<th>视频缩略图</th>
							<th>视频标题</th>
							<th>视频简介</th>
							<th>视频发布时间</th>
							<th style="text-align: center;">操作</th>
						</tr>
						
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
$sql = "SELECT id,img,title,info,videourl,time,chapter,onename FROM   `videoinfo` where belongwho='{$_SESSION["username"]}' ORDER BY id DESC LIMIT " . $num . ",$fnum";
$result = doresult($sql);
$_SESSION['title']=null;
// 遍历输出
while (! ! $rows = dolists($result)) {
	 
  if($_SESSION['title']!=$rows['title']){
?>
						<tr>
							<td><img style="height: 50px;width: 50px;" src=<?php echo $rows['img']?>></td>
							<td><?php echo $rows['title'] ?></td>
							<td><?php echo $rows['info'] ?></td>
							<td><?php echo $rows['time'] ?></td>
							<td style="text-align: center;"><a href="chiledvideo.php?title=<?php echo $rows['title']?>">查看子视频</a>    <a>删除</a></td>
						</tr>
						
						<?php 
	$_SESSION['title']=$rows['title'];
	} 
}
?>

<div class='btntochangepage'>
<?php
// 翻页链接
for ($i = 0; $i < $pagenum; $i ++) {
    echo "
    	<a class='btn btn-default'  href=myvideo.php?page=" . ($i + 1) . ">" . ($i + 1) . "</a>";
}
?>
</div>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>