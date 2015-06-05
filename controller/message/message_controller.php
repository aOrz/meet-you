<?php
header("Access-Control-Allow-Origin:*");
require_once ('../../public/config/config.php');
require_once ('../../class/message.class.php');
$message = new Message();
 $controller = @$_GET['controller'];
switch ($controller) {
	case 'SaveMessage':
		echo json_encode($message->SaveMessage());
		break;
	case 'GetMessageListByUserId':
		echo json_encode($message->GetMessageListByUserId());
		break;
	case 'GetMessageListBySendId':
		echo json_encode($message->GetMessageListBySendId());
		break;
	case 'GetMessageById':
		 $messageId = $_GET['messageId'];
		echo json_encode($message->GetMessageByid($messageId));
		break;		
	default:
		return -2;
		break;
}
?>