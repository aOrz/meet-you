<?php
require_once ('../../public/config/config.php');
require_once ('../../public/functions/functions.php');

if ($_GET['username'] == "admin" && $_GET['password'] == "admin") {
	header("location: ../../admin/view");
} else {
	$username = $_GET['username'];
	$password = $_GET['password'];

	$sql = "select * from lib_user
		where
		lib_user_name = '$username' and
		lib_user_pass = '$password'";
	$result = mysqli_query($GLOBALS['DB'], $sql);
	if (mysqli_num_rows($result) == 0) {
		echo "<script>alert('Signin Error');
			top.location='../view'; </script>";
	} else {
		$_SESSION['username'] = $username;
		$_SESSION['userID'] = GetUserID($username);
		header("location: ../../user/view/home/home.php");
	}

}

?>