<?php
header("Access-Control-Allow-Origin:*");
require_once ('../../public/config/config.php');
require_once ('../../class/circle.class.php');
$newCircle = new Circle();
$controller = @$_GET['controller'];
switch ($controller) {
	case 'AddCircle':
		echo $newCircle->AddCircle();
		break;
	case 'SaveCircle':
		echo $newCircle->SaveCircle();
		break;
	case 'Pass':
	    echo $user = $_GET['user'];
		echo $newCircle->Pass($user);
		break;
	case 'joinCircle':
		echo $newCircle->joinCircle();
		break;
	case 'delCircle':
		echo $newCircle->delCircle();
		break;
	case 'searchCircle':
		$circlname = $_GET['circlname'];
		echo json_encode($newCircle->searchCircle($circlname));
		break;
	case 'searchCircleByUserId':
		$userId = $_GET['userId'];
		echo json_encode($newCircle->searchCircleByUserId($userId));
		break;

	default:
		echo -2;
		break;
}
?>