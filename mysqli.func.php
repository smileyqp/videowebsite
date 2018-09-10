<?php
// 数据库连接常量
define('DB_HOST', 'localhost');
define('DB_USER', 'admin');
define('DB_PWD', 'yqp123');
define('DB_NAME', 'video');

// 连接数据库
function conn()
{
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    mysqli_query($conn, "set names utf8");
    return $conn;
}

//获得结果集
function doresult($sql){
   $result=mysqli_query(conn(), $sql);
   return  $result;
}

//结果集转为对象集合
function dolists($result){
    return mysqli_fetch_array($result, MYSQL_ASSOC);
}

function totalnums($sql) {
    $result=mysqli_query(conn(), $sql);
    return $result->num_rows;
}




// 关闭数据库
function closedb()
{
    if (! mysqli_close()) {
        exit('关闭异常');
    }
}

?>