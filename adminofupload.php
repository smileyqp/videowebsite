<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<?php  
	Session_start();
	if($_SESSION["username"]==null){
		$_SESSION["username"]="请登陆";
	}
/****************************************************************************** 
参数说明: 
$max_file_size  : 上传文件大小限制, 单位BYTE 
$destination_folder : 上传文件路径 
$watermark   : 是否附加水印(1为加水印,其他为不加水印); 
使用说明: 
1. 将PHP.INI文件里面的"extension=php_gd2.dll"一行前面的;号去掉,因为我们要用到GD库; 
2. 将extension_dir =改为你的php_gd2.dll所在目录; 
******************************************************************************/  
//上传文件类型列表  
session_start();
$uptypes=array(  
    'image/jpg',  
    'image/jpeg',  
    'image/png',  
    'image/pjpeg',  
    'image/gif',  
    'image/bmp',  
    'image/x-png'  
);  
  
$max_file_size=2000000;     //上传文件大小限制, 单位BYTE  
$destination_folder="uploadimg/"; //上传文件路径  
$watermark=1;      //是否附加水印(1为加水印,其他为不加水印);  
$watertype=1;      //水印类型(1为文字,2为图片)  
$waterposition=1;     //水印位置(1为左下角,2为右下角,3为左上角,4为右上角,5为居中);  
$waterstring="http://www.xplore.cn/";  //水印字符串  
$waterimg="xplore.gif";    //水印图片  
$imgpreview=1;      //是否生成预览图(1为生成,其他为不生成);  
$imgpreviewsize=1/2;    //缩略图比例  
?>  
<?php
	
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
		<div class="main" style="margin-top: 10px;">
			<div class="leftofmain">
				<ul class="nav nav-pills nav-stacked">
				  <li role="presentation"><a href="myinfo.php">我的信息</a></li>
				  <li role="presentation"><a href="myvideo.php">我发布的视频</a></li>
				  <li role="presentation" class="active"><a href="#">发布新视频</a></li>
				</ul>
			</div>
			<div class="rightofmain">
				<div class="smallbox">
					<ul class="nav nav-pills">
					  <li role="presentation" class="active listyle"><a href="adminofupload.php">上传视频缩略图</a></li>
					  <li role="presentation" class="listyle" ><a>上传视频信息</a></li>
					  <li role="presentation" class="listyle" ><a>上传视频数据</a></li>
					  <li role="presentation" class="listyle" style="width: 24%;" ><a>确认信息</a></li>
					</ul>
				</div>
				<div style="text-align: center;">
					<form enctype="multipart/form-data" method="post" name="upform" style="text-align: center;">  
					    <label class="control-label">上传视频缩略图</label>  
					  <input name="upfile" type="file" id="photoCover" class="input-large" style="height:30px;">  
					  <input class="anniu" type="submit" value="上传"><br>  
					  允许上传的文件类型为:<?=implode(', ',$uptypes)?>  
					</form>  
  
<?php  
if ($_SERVER['REQUEST_METHOD'] == 'POST')  
{  
    if (!is_uploaded_file($_FILES["upfile"][tmp_name]))  
    //是否存在文件  
    {  
         echo "图片不存在!";  
         exit;  
    }  
  
    $file = $_FILES["upfile"];  
    if($max_file_size < $file["size"])  
    //检查文件大小  
    {  
        echo "文件太大!";  
        exit;  
    }  
  
    if(!in_array($file["type"], $uptypes))  
    //检查文件类型  
    {  
        echo "文件类型不符!".$file["type"];  
        exit;  
    }  
  
    if(!file_exists($destination_folder))  
    {  
        mkdir($destination_folder);  
    }  
  
    $filename=$file["tmp_name"];  
    $image_size = getimagesize($filename);  
    $pinfo=pathinfo($file["name"]);  
    $ftype=$pinfo['extension'];  
    $destination = $destination_folder.time().".".$ftype;  
    if (file_exists($destination) && $overwrite != true)  
    {  
        echo "同名文件已经存在了";  
        exit;  
    }  
  
    if(!move_uploaded_file ($filename, $destination))  
    {  
        echo "移动文件出错";  
        exit;  
    }  
  
    $pinfo=pathinfo($destination);  
    $fname=$pinfo[basename];  
    echo " <font color=red>已经成功上传</font><br>文件名:  <font color=blue>".$destination_folder.$fname."</font><br>";  
    echo " 宽度:".$image_size[0];  
    echo " 长度:".$image_size[1];  
    echo "<br> 大小:".$file["size"]." bytes";  
  
    if($watermark==1)  
    {  
        $iinfo=getimagesize($destination,$iinfo);  
        $nimage=imagecreatetruecolor($image_size[0],$image_size[1]);  
        $white=imagecolorallocate($nimage,255,255,255);  
        $black=imagecolorallocate($nimage,0,0,0);  
        $red=imagecolorallocate($nimage,255,0,0);  
        imagefill($nimage,0,0,$white);  
        switch ($iinfo[2])  
        {  
            case 1:  
            $simage =imagecreatefromgif($destination);  
            break;  
            case 2:  
            $simage =imagecreatefromjpeg($destination);  
            break;  
            case 3:  
            $simage =imagecreatefrompng($destination);  
            break;  
            case 6:  
            $simage =imagecreatefromwbmp($destination);  
            break;  
            default:  
            die("不支持的文件类型");  
            exit;  
        }  
  
        imagecopy($nimage,$simage,0,0,0,0,$image_size[0],$image_size[1]);  
        imagefilledrectangle($nimage,1,$image_size[1]-15,80,$image_size[1],$white);  
  
        switch($watertype)  
        {  
            case 1:   //加水印字符串  
            imagestring($nimage,2,3,$image_size[1]-15,$waterstring,$black);  
            break;  
            case 2:   //加水印图片  
            $simage1 =imagecreatefromgif("xplore.gif");  
            imagecopy($nimage,$simage1,0,0,0,0,85,15);  
            imagedestroy($simage1);  
            break;  
        }  
  
        switch ($iinfo[2])  
        {  
            case 1:  
            //imagegif($nimage, $destination);  
            imagejpeg($nimage, $destination);  
            break;  
            case 2:  
            imagejpeg($nimage, $destination);  
            break;  
            case 3:  
            imagepng($nimage, $destination);  
            break;  
            case 6:  
            imagewbmp($nimage, $destination);  
            //imagejpeg($nimage, $destination);  
            break;  
        }  
  
        //覆盖原上传文件  
        imagedestroy($nimage);  
        imagedestroy($simage);  
    }  
  
    if($imgpreview==1)  
    {  
    $_SESSION["filename"]=$destination_folder.$fname;
    echo $destination;
    echo "<br>图片预览:<br>";  
    echo "<img src=\"".$destination."\" width=".($image_size[0]*$imgpreviewsize)." height=".($image_size[1]*$imgpreviewsize);  
    echo " alt=\"图片预览:\r文件名:".$destination."\r上传时间:\">"; 
    $_SESSION["destination"] =$destination;
    }  
}  
?> 
	<a class="btn btn-danger" style="display: block; margin: 30px;" href="adminofuploadinfo.php">下一步</a> 
				</div>
			</div>
		</div>
	</body>
</html>