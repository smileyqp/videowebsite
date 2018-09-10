

 <?php
 require "config.php";
$time = time();
$regtime= date("y-m-d",$time) ;	
$regip = $_SERVER["REMOTE_ADDR"];	
 
$username=$_POST["username"];
$password=$_POST["password"];
$sql="INSERT INTO `user` (`id`, `username`, `password`,`regtime`,`regip`) VALUES (null, '{$username}', '{$password}','{$regtime}','{$regip}');";
if(mysql_query("$sql")){
	echo "<script language='javascript' type='text/javascript'>"; 
		echo "  alert('注册成功+$regtime');"; 
echo "window.location.href='login.php'"; 
echo "</script>"; 
}else{
		echo "<script language='javascript' type='text/javascript'>"; 
		echo "  alert('注册失败');"; 
echo "window.location.href='login.php'"; 
echo "</script>"; 
}
?>


