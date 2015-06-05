<?php
header("Access-Control-Allow-Origin:*");
require_once ('../../public/config/config.php');
require_once ('../../class/mood.class.php');
$newMood = new Mood();
$controller = @$_GET['controller'];
switch ($controller) {
	case 'GetMoodByPage':
		$page = $_GET['page'];
		echo json_encode($newMood->GetMoodByPage($page));

		break;
	case 'DelMood':
		echo $newMood->DelMood();
		break;
	case 'SaveMood':
		echo $newMood->SaveMood();
		break;
	// case '':

	// 	break;
	// case '':

	// 	break;	
	default:
		echo -2;
		break;
}
?>