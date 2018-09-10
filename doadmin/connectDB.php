<?php
	class connectDB{
		function connectDBa($host,$username,$password,$dbname){
			/* Connect to a MySQL server  连接数据库服务器 */
			$link = mysqli_connect(
			    $host,  /* The host to connect to 连接MySQL地址 */
			    $username,      /* The user to connect as 连接MySQL用户名 */
			    $password,  /* The password to use 连接MySQL密码 */
   				$dbname);    /* The default database to query 连接数据库名称*/
   			
   			if (!$link) {
    			return false;
			}else{
				return $link;
			}
		}
		
		function excuteMYSQL($MYSQL,$link){
			if ($result = mysqli_query($link, $MYSQL)) {
					return $result;
			}else{
				return false;
			}
		}
		
		function GETdata($result){
				return mysqli_fetch_assoc($result);
		}
		
		function closeDB($result,$link){
			mysqli_free_result($result);
			mysqli_close($link);	
		}
		
		function totalnums($sql,$link) {
		    $result=mysqli_query($link, $sql);
		    return $result->num_rows;
		}
	}
?>