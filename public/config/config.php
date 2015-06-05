<?php

header("Cache-Control:no-cache, must-revalidate");
session_start();  
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'address_book');

if(!$GLOBALS['DB'] = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)){
	die('无法链接数据库');
}else{}

mysqli_query($GLOBALS['DB'], "set names utf8");
?>