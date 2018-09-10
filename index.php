
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
		<link href="css/index.css" rel="stylesheet">
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
        	描述：轮播图
       -->
<div class="width100 float_l margin_t-405 margin_b40" style="margin-top: 40px;">
	<div class="width_1200 margin_auto">
    	<div class="width100 float_l height460 posi_relative">
        	<div class="width100 float_l">
              
              
<div id="myCarousel" class="carousel slide" style="width: 85%;float: right;">
    <!-- 轮播（Carousel）指标 -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>   
    <!-- 轮播（Carousel）项目 -->
    <div class="carousel-inner" style="height: 100%;">
        <div class="item active" style="height: 100%;">
            <img src="img/1.jpg" alt="First slide" style="height: 100%;">
            <div class="carousel-caption">标题 1</div>
        </div>
        <div class="item" style="height: 100%;">
            <img src="img/3.jpg" alt="Second slide" style="height: 100%;">
            <div class="carousel-caption">标题 2</div>
        </div>
        <div class="item" style="height: 100%;" >
            <img src="img/2.jpg" alt="Third slide" style="height: 100%;">
            <div class="carousel-caption">标题 3</div>
        </div>
    </div>
    <!-- 轮播（Carousel）导航 -->
    <a class="carousel-control left" href="#myCarousel" 
        data-slide="prev">&lsaquo;
    </a>
    <a class="carousel-control right" href="#myCarousel" 
        data-slide="next">&rsaquo;
    </a>
</div>

           
            </div>
		
  <div class="width_224 float_l height460 posi_absolute backg_jqian padding_t5 bianshou" >
            	<div class="width100 float_l tab_qiehuan " >
                	<div class="width100 float_l text_c height64 line_hei64 color_white bianhuabeijing backg_jqian padding_lr20">
                        <div class="width100 float_l text_l height64 line_hei64 color_white border_b_baise fon_siz16">
                            <span>前端开发</span>
                            <span class="float_r">></span>
                        </div>
                    </div>
                    <div class="width_700 float_l lunbofenlei dis_none img_backg15">
                    	<div class="width100 float_l padding40">
                        	<div class="width100 float_l margin_b40">
                            	<span class="width100 color_shenred fon_siz16 float_l margin_b20">分类目录</span>
                                <ul class="width100 ul_lis float_l">
                                	<li><a>Photoshop</a></li>
                                    <li>/</li>
                                    <li><a>Maya</a></li>
                                    <li>/</li>
                                    <li><a>Premiere</a></li>
                                    <li>/</li>
                                    <li><a>ZBrush</a></li>
                                </ul>
                            </div>
                            
                            <div class="width100 float_l margin_b40">
                            	<span class="width100 color_shenred fon_siz16 float_l margin_b20">推荐</span>
                                <ul class="width100 ul_lis float_l">
                                	<li class="width100 float_l margin_b15"><a>课程 | ps入门教程Ⅱ-路径</a></li>
									<li class="width100 float_l margin_b15"><a>课程 | 手机UI设计基础-尺寸</a></li>
									<li class="width100 float_l margin_b15"><a>课程 | PS入门基础-魔幻调色</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="width100 float_l tab_qiehuan">
                	<div class="width100 float_l text_c height64 line_hei64 color_white bianhuabeijing backg_jqian padding_lr20">
                        <div class="width100 float_l text_l height64 line_hei64 color_white border_b_baise fon_siz16">
                            <span>后端开发</span>
                            <span class="float_r">></span>
                        </div>
                    </div>
                    <div class="width_700 float_l lunbofenlei dis_none img_backg16">
                    	<div class="width100 float_l padding40">
                        	<div class="width100 float_l margin_b40">
                            	<span class="width100 color_shenred fon_siz16 float_l margin_b20">分类目录</span>
                                <ul class="width100 ul_lis float_l">
                                	<li><a>Photoshop</a></li>
                                    <li>/</li>
                                    <li><a>Maya</a></li>
                                    <li>/</li>
                                    <li><a>Premiere</a></li>
                                    <li>/</li>
                                    <li><a>ZBrush</a></li>
                                </ul>
                            </div>
                            
                            <div class="width100 float_l margin_b40">
                            	<span class="width100 color_shenred fon_siz16 float_l margin_b20">推荐</span>
                                <ul class="width100 ul_lis float_l">
                                	<li class="width100 float_l margin_b15"><a>课程 | ps入门教程Ⅱ-路径</a></li>
									<li class="width100 float_l margin_b15"><a>课程 | 手机UI设计基础-尺寸</a></li>
									<li class="width100 float_l margin_b15"><a>课程 | PS入门基础-魔幻调色</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="width100 float_l tab_qiehuan">
                	<div class="width100 float_l text_c height64 line_hei64 color_white bianhuabeijing backg_jqian padding_lr20">
                        <div class="width100 float_l text_l height64 line_hei64 color_white border_b_baise fon_siz16">
                            <span>移动开发</span>
                            <span class="float_r">></span>
                        </div>
                    </div>
                    <div class="width_700 float_l lunbofenlei dis_none img_backg17">
                    	<div class="width100 float_l padding40">
                        	<div class="width100 float_l margin_b40">
                            	<span class="width100 color_shenred fon_siz16 float_l margin_b20">分类目录</span>
                                <ul class="width100 ul_lis float_l">
                                	<li><a>Photoshop</a></li>
                                    <li>/</li>
                                    <li><a>Maya</a></li>
                                    <li>/</li>
                                    <li><a>Premiere</a></li>
                                    <li>/</li>
                                    <li><a>ZBrush</a></li>
                                </ul>
                            </div>
                            
                            <div class="width100 float_l margin_b40">
                            	<span class="width100 color_shenred fon_siz16 float_l margin_b20">推荐</span>
                                <ul class="width100 ul_lis float_l">
                                	<li class="width100 float_l margin_b15"><a>课程 | ps入门教程Ⅱ-路径</a></li>
									<li class="width100 float_l margin_b15"><a>课程 | 手机UI设计基础-尺寸</a></li>
									<li class="width100 float_l margin_b15"><a>课程 | PS入门基础-魔幻调色</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="width100 float_l tab_qiehuan">
                	<div class="width100 float_l text_c height64 line_hei64 color_white bianhuabeijing backg_jqian padding_lr20">
                        <div class="width100 float_l text_l height64 line_hei64 color_white border_b_baise fon_siz16">
                            <span>数据库</span>
                            <span class="float_r">></span>
                        </div>
                    </div>
                    <div class="width_700 float_l lunbofenlei dis_none img_backg18">
                    	<div class="width100 float_l padding40">
                        	<div class="width100 float_l margin_b40">
                            	<span class="width100 color_shenred fon_siz16 float_l margin_b20">分类目录</span>
                                <ul class="width100 ul_lis float_l">
                                	<li><a>Photoshop</a></li>
                                    <li>/</li>
                                    <li><a>Maya</a></li>
                                    <li>/</li>
                                    <li><a>Premiere</a></li>
                                    <li>/</li>
                                    <li><a>ZBrush</a></li>
                                </ul>
                            </div>
                            
                            <div class="width100 float_l margin_b40">
                            	<span class="width100 color_shenred fon_siz16 float_l margin_b20">推荐</span>
                                <ul class="width100 ul_lis float_l">
                                	<li class="width100 float_l margin_b15"><a>课程 | ps入门教程Ⅱ-路径</a></li>
									<li class="width100 float_l margin_b15"><a>课程 | 手机UI设计基础-尺寸</a></li>
									<li class="width100 float_l margin_b15"><a>课程 | PS入门基础-魔幻调色</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="width100 float_l tab_qiehuan">
                	<div class="width100 float_l text_c height64 line_hei64 color_white bianhuabeijing backg_jqian padding_lr20">
                        <div class="width100 float_l text_l height64 line_hei64 color_white border_b_baise fon_siz16">
                            <span>云计算&大数据</span>
                            <span class=" float_r">></span>
                        </div>
                    </div>
                    <div class="width_700 float_l lunbofenlei dis_none img_backg16">
                    	<div class="width100 float_l padding40">
                        	<div class="width100 float_l margin_b40">
                            	<span class="width100 color_shenred fon_siz16 float_l margin_b20">分类目录</span>
                                <ul class="width100 ul_lis float_l">
                                	<li><a>Photoshop</a></li>
                                    <li>/</li>
                                    <li><a>Maya</a></li>
                                    <li>/</li>
                                    <li><a>Premiere</a></li>
                                    <li>/</li>
                                    <li><a>ZBrush</a></li>
                                </ul>
                            </div>
                            
                            <div class="width100 float_l margin_b40">
                            	<span class="width100 color_shenred fon_siz16 float_l margin_b20">推荐</span>
                                <ul class="width100 ul_lis float_l">
                                	<li class="width100 float_l margin_b15"><a>课程 | ps入门教程Ⅱ-路径</a></li>
									<li class="width100 float_l margin_b15"><a>课程 | 手机UI设计基础-尺寸</a></li>
									<li class="width100 float_l margin_b15"><a>课程 | PS入门基础-魔幻调色</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="width100 float_l tab_qiehuan">
                	<div class="width100 float_l text_c height64 line_hei64 color_white bianhuabeijing backg_jqian padding_lr20">
                        <div class="width100 float_l text_l height64 line_hei64 color_white border_b_baise fon_siz16">
                            <span>运维&测试</span>
                            <span class="float_r">></span>
                        </div>
                    </div>
                    <div class="width_700 float_l lunbofenlei dis_none img_backg15">
                    	<div class="width100 float_l padding40">
                        	<div class="width100 float_l margin_b40">
                            	<span class="width100 color_shenred fon_siz16 float_l margin_b20">分类目录</span>
                                <ul class="width100 ul_lis float_l">
                                	<li><a>Photoshop</a></li>
                                    <li>/</li>
                                    <li><a>Maya</a></li>
                                    <li>/</li>
                                    <li><a>Premiere</a></li>
                                    <li>/</li>
                                    <li><a>ZBrush</a></li>
                                </ul>
                            </div>
                            
                            <div class="width100 float_l margin_b40">
                            	<span class="width100 color_shenred fon_siz16 float_l margin_b20">推荐</span>
                                <ul class="width100 ul_lis float_l">
                                	<li class="width100 float_l margin_b15"><a>课程 | ps入门教程Ⅱ-路径</a></li>
									<li class="width100 float_l margin_b15"><a>课程 | 手机UI设计基础-尺寸</a></li>
									<li class="width100 float_l margin_b15"><a>课程 | PS入门基础-魔幻调色</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="width100 float_l tab_qiehuan ">
                	<div class="width100 float_l text_c height64 line_hei64 color_white bianhuabeijing backg_jqian padding_lr20">
                        <div class="width100 float_l text_l height64 line_hei64 color_white border_b_baise fon_siz16">
                            <span>视觉设计</span>
                            <span class="float_r">></span>
                        </div>
                    </div>
                    <div class="width_700 float_l lunbofenlei dis_none img_backg17">
                    	<div class="width100 float_l padding40">
                        	<div class="width100 float_l margin_b40">
                            	<span class="width100 color_shenred fon_siz16 float_l margin_b20">分类目录</span>
                                <ul class="width100 ul_lis float_l">
                                	<li><a>Photoshop</a></li>
                                    <li>/</li>
                                    <li><a>Maya</a></li>
                                    <li>/</li>
                                    <li><a>Premiere</a></li>
                                    <li>/</li>
                                    <li><a>ZBrush</a></li>
                                </ul>
                            </div>
                            
                            <div class="width100 float_l margin_b40">
                            	<span class="width100 color_shenred fon_siz16 float_l margin_b20">推荐</span>
                                <ul class="width100 ul_lis float_l">
                                	<li class="width100 float_l margin_b15"><a>课程 | ps入门教程Ⅱ-路径</a></li>
									<li class="width100 float_l margin_b15"><a>课程 | 手机UI设计基础-尺寸</a></li>
									<li class="width100 float_l margin_b15"><a>课程 | PS入门基础-魔幻调色</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            
        </div>
    </div>
</div>
<script>
	$('.tab_qiehuan').hover(function(){
         $(this).children(".bianhuabeijing").css("background-color","#8a8f93").next().css("display","block")
	},function(){
    	 $(this).children(".bianhuabeijing").css("background-color","#a9aaae").next().css("display","none")
	});
</script>

<script type="text/javascript">
	jQuery(".focusBox").slide({ mainCell:".pic",effect:"left", autoPlay:true, delayTime:500});
</script>

<!--
	作者：offline
	时间：2017-06-08
	描述：展示盒子
-->


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
<a href="childofvideoindex.php?title=<?php echo $rows['title']?>">
<div class="box">
	<div class="smallbox">
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
</div>
</a>
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
    	<a class='btn btn-default'  href=index.php?page=" . ($i + 1) . ">" . ($i + 1) . "</a>";
}
?>
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