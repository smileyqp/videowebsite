<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  

<!DOCTYPE html>
<?php
	session_start();
	if($_SESSION["username"]==null){
		$_SESSION["username"]="请登陆";
	}
	?>
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
<?php
		Session_start();
	if($_SESSION["username"]==null){
		$_SESSION["username"]="请登陆";
	}
	?>
<?php
  //重点说明 因为上传的是视频文件 所以文件大小会超出服务器及php的默认配置 需要手动修改配置
  //php配置文件php.ini
  //file_uploads on 是否允许通过HTTP上传文件的开关。默认为ON即是开
  // upload_tmp_dir – 文件上传至服务器上存储临时文件的地方，如果没指定就会用系统默认的临时文件夹
  // upload_max_filesize 8m 望文生意，即允许上传文件大小的最大值。默认为2M
  // post_max_size 8m 指通过表单POST给PHP的所能接收的最大值，包括表单里的所有值。默认为8M 

  //如果是nginx服务器还需要修改nginx的配置文件 下面是我的nginx修改后的配置 加入了client_max_body_size 100m;
  // server {
  //     listen       83;
  //     server_name localhost;
  //     root /usr/share/nginx/html;
  //     index index.php;
  //     client_max_body_size 100m;

  //     access_log /var/log/nginx/html-access.log;
  //     error_log  /var/log/nginx/html-error.log;

  //     location / {
  //         try_files $uri $uri/ /index.php?$args =404;
  //         #try_files $uri$args $uri$args/ index.php;
  //     }

  //     location ~ .*\.(php|php7.0)?$ {
  //         #fastcgi_pass   127.0.0.1:9000;
  //         fastcgi_pass unix:/var/run/php/php7.0-fpm.sock;
  //         include        fastcgi_params;
  //     }

  //     location ~ /\.(ht|svn|git) {
  //             deny all;
  //     }
  // }

  //修改完毕后要求重启php，以及服务器
  // sudo service php7.0-fpm restart （ubuntu下）
  // sudo service nginx restart（ubuntu下）


  //当前脚本文件所在目录
  define('ROOT_DIR', dirname(__FILE__) . DIRECTORY_SEPARATOR);

	$i=1;
	for($i;$i<=$_SESSION['num'];$i++){
		$_SESSION["nameofevery".$_GET['chapter'].$i]=$_POST[$_SESSION['chapterwho'].$i];
  //上传后的文件数据对象 文件信息都保存在这个数组中
  $file = $_FILES["file".$_GET['chapter'].$i];
  //格式及大小验证 只接收mp4, rmvb格式 文件大小限制100M 如需添加或更改则在此修改
  if (($file["type"] == "video/mp4" || $file["type"] == "video/rmvb") && $file["size"] < 100 * 1024 * 1024) {
    //上传是否成功判断
    if ($file["error"] > 0) {
      echo "错误信息: " . $file["error"] . "<br />";
    } else {
      //文件是否已经存在
      if (file_exists("upload/" . $file["name"])) {
        echo $file["name"] . " 已存在. ";
      } else {
        //是否是通过表单提交的文件
        if (is_uploaded_file($file['tmp_name'])) {
          //保存路径拼接 要求upload目录权限为777
          $save_path = ROOT_DIR . 'upload/' . basename($file['name']);
		  $save_path='upload/' . basename($file['name']);
          //使用函数将上传的临时文件保存到自定义的目录
          if (move_uploaded_file($file['tmp_name'], $save_path)) {
            $save_path= str_replace('\\', '/', $save_path);
            session_start();
            $_SESSION["videourl".$_GET['chapter'].$i]=$save_path;
            echo $_SESSION["videourl".$_GET['chapter'].$i];
            echo "上传成功！<hr/>";
			continue;
          } else {
            echo "<script>alert('上传失败');window.history.go(-1)</script>";
          }
        } else {
           echo "<script>alert('文件来源错误');window.history.go(-1);</script>";
        }
      }
    }
  } else {
    echo "<script>alert('无效文件'".$_SESSION['num'].");window.history.go(-1);</script>"	;
  }
   echo "<hr/>";
  }
  
?>

<a class="btn btn-danger" style="display: block; margin: 30px;" href="uploadvideoui.php">返回章节选择</a> 

</div>
			</div>
		</div>
	</body>
</html>