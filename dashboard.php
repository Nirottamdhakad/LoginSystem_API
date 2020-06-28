<?php
session_start();
require 'connection.php';
if(isset($_SESSION['IS_LOGIN'])){
	echo "Welcome User";
}else{
	header('location:index1.php');
	die();
}
?>
<a href="logout1.php">Logout</a>