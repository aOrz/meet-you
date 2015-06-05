<?php
header("Access-Control-Allow-Origin:*");
require_once ('../../public/config/config.php');
require_once ('../../class/user.class.php');
$newUser = new User();
$controller = @$_GET['controller'];
switch ($controller) {
	case 'reg':
		echo $newUser->CreateUser($newUser);
		break;
	case 'login' :
	    echo $newUser->login();
		break;
	case 'logout': 
		session_start();
		unset($_SESSION['user_id']);
		session_destroy();
		break;
	case 'upInfo': 
		echo $newUser->SaveUser();
	    break;
	case 'getInfo':
		if ($newUser->GetUserByID($newUser)) {
			echo json_encode($newUser->GetUserByID($newUser));
		} else {
			echo 0;
		}
		break;
	case 'add':
		$friendId = $_GET['friendId'];
		echo $newUser->AddFriend($friendId);
		break;
	case "getAllFriend":
		echo json_encode($newUser->getAllFriend());
		break;
	case "delFriend":
		$friendId = $_GET['friendId'];
		echo $newUser->DelFriend($friendId);
		break;
	case 'saerchFriend':
		$nickName=$_GET['nickName'];
		echo json_encode($newUser->searchFriend($nickName));
		break;
	default:
		echo -2;
		break;
}
?>