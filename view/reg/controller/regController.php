<?php
require_once ('../../public/config/config.php');
require_once ('../class/User.class.php');

$userName = $_GET['q1'];
$passWord = $_GET['q2'];
$userRname = $_GET['q3'];

if ($_GET['q4'] == 1) {
	$sex = "男";
} else {
	$sex = "女";
}

$proGrade = $_GET['q5'];
$phone = $_GET['q6'];
$mail = $_GET['q7'];

$newUser = new User();

$newUser->info['userName'] = $userName;
$newUser->info['userPass'] = $passWord;
$newUser->info['userRName'] = $userRname;
$newUser->info['userSex'] = $sex;
$newUser->info['userPhone'] = $phone;
$newUser->info['userProGrade'] = $proGrade;
$newUser->info['userMail'] = $mail;

if ($newUser->SaveUser()) {
	echo "<script>alert('Success');
		top.location='../../signin/view'; </script>";
} else {
	echo "<script>alert('Error');
		top.location='../view'; </script>";
}
?>