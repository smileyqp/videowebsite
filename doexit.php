<?php
	Session_start();
	if($_SESSION["username"]==null){
		$_SESSION["username"]="请登陆";
	}else{
		session_unset();
		session_destroy();
		echo "<script language='javascript' type='text/javascript'>"; 
		echo "  alert('exit sucess');"; 
		echo "window.location.href='index.php'"; 
		echo "</script>"; 
	}
?>