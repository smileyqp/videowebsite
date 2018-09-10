
<?php
	require "doadmin/connectDB.php";
	$username=$_POST["username"];
$password=$_POST["password"];
		$connect=new connectDB;
		$sql="SELECT username,password FROM user where username='{$username}' and password= '{$password}';";
	$link=$connect->connectDBa("localhost","admin","yqp123","video");
	$result=$connect->excuteMYSQL($sql,$link);
	$row=$connect->GETdata($result);

	
	
	
	
if($result->{'num_rows'}!=0){
	Session_Start();
$_SESSION["username"]=$username;
var_dump($result);
	echo "<script language='javascript' type='text/javascript'>"; 
		echo "  alert('login sucess');"; 
echo "window.location.href='index.php'"; 
echo "</script>"; 
}else{
		echo "<script language='javascript' type='text/javascript'>"; 
		echo "  alert('login fail');"; 
echo "window.location.href='login.php'"; 
echo "</script>"; 
}
?>