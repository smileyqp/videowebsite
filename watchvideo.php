
<?php
	Session_start();
	if($_SESSION["username"]==null){
		$_SESSION["username"]="请登陆";
	}
	$str=$_SERVER["QUERY_STRING"];
	echo $str.'</br>';
	$str=substr($str,strpos($str,"x"));
	echo $str;
	$str = substr($str,1);
	echo $str;
	?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title></title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/index.css" rel="stylesheet">
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

				<a class="navbar-brand" href="index.php">返回主页</a>

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
$sql = "SELECT id,img,title,info,videourl,time FROM   `videoinfo` where id = ' {$str}' ORDER BY id DESC LIMIT " . $num . ",$fnum";
$result = doresult($sql);

// 遍历输出
while (! ! $rows = dolists($result)) {
  
?>
<div class="box" style="margin: 0px; height: 500px;width: 100%;">
	<!-- "Video For Everybody" http://camendesign.com/code/video_for_everybody -->
<video style="height: 500px;width: 100%;" controls="controls" poster=<?PHP echo $rows['img']?> width="640" height="360">
	<source src=<?PHP echo $rows['videourl']?>  type="video/mp4" />
	<source src=<?PHP echo $rows['videourl']?> type="video/webm" />
	<source src=<?PHP echo $rows['videourl']?> type="video/ogg" />
	<object type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" width="640" height="360">
		<param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" />
		<param name="allowFullScreen" value="true" />
		<param name="wmode" value="transparent" />
		<param name="flashVars" value="config={'playlist':['http%3A%2F%2Fsandbox.thewikies.com%2Fvfe-generator%2Fimages%2Fbig-buck-bunny_poster.jpg',{'url':'http%3A%2F%2Fclips.vorwaerts-gmbh.de%2Fbig_buck_bunny.mp4','autoPlay':false}]}" />
		<img alt="Big Buck Bunny" src=<?PHP echo $rows['img']?> width="640" height="360" title="No video playback capabilities, please download the video below" />
	</object>
</video>
<h1 align="center"><?PHP echo $rows['title']?></h1>
<h4 align="center"><?PHP echo $rows['info']?></h4>
<?php 
	 
}
?>
<title></title>
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
					alert(iftrue);
					$(".change2").hide();
					$(".change").show();
				}
				else{
					alert(iftrue);
					$(".change2").show();
					$(".change").hide();
				}
			}
		);
			
		//页面加载的时候从url取得应该显示的page
		function getpagenum(){
			var url=window.location.href;
			var pagenum = url.match(/=(\S*)/)[1]; 
			return pagenum;
		}

		</script>
	
	</body>

</html>