<?php
/**
* message
*/
class Message
{
	public $userId;
	public $sendId;
	public $message;
	public $title;
	public $breviary;
	public function __construct()
	{
		$this->userId = @$_GET['userId'];
		$this->sendId = @$_GET['sendId'];
		$this->message = @$_GET['message'];
		$this->title =  @$_GET['title'];
		$this->breviary =  @$_GET['breviary'];
	}

	public function SaveMessage(){
		$date=date("Y-m-d H:i:s",time());
		$sql="INSERT INTO `message`(`id`, `user_id`, `send_id`, `data`, `messages`, `title`, `breviary`)
		 VALUES
		  (NULL,'".$this->userId."','".$this->sendId."','".$date."','".$this->message."','".$this->title."','".$this->breviary."')";
			if (mysqli_query($GLOBALS['DB'], $sql)) {
	 		return 1;
	 	}else{
	 		return 0;
	 	}

	}

	public function GetMessageListByUserId(){
		$sql="SELECT `id`, `user_id`, `send_id`, `data`, `title`, `breviary` FROM `message` WHERE `user_id` = ".$this->userId;
		$result = mysqli_query($GLOBALS['DB'], $sql);
		$num=mysqli_num_rows($result);
		$i=0;
		if($num>0){
			while ($row = mysqli_fetch_assoc($result)) {
				# code...
				$list[$i++] = $row;
			}
			return $list;
		}else{
			return 0;
		}
		mysqli_free_result($result);
	}

	public function GetMessageListBySendId(){
		$sql="SELECT `id`, `user_id`, `send_id`, `data`, `title`, `breviary` FROM `message` WHERE `send_id` = ".$this->sendId;
		$result = mysqli_query($GLOBALS['DB'], $sql);
		$num = mysqli_num_rows($result);
		$i=0;
		if($num>0){
			while ($row = mysqli_fetch_assoc($result)) {
				# code...
				$list[$i++] = $row;
			}
			return $list;
		}else{
			return 0;
		}
		mysqli_free_result($result);
	}

	public function GetMessageByid($messageId){
	$sql="SELECT * FROM `message` WHERE `id` = ".$messageId;
	// echo $sql;
	$result = mysqli_query($GLOBALS['DB'], $sql);
	$row = mysqli_fetch_assoc($result);
	return $row; 
	}
}//Message
?>