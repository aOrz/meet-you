<?php
class Mood
{
	public $moodId;
	public $moodInfo;
	public $userId;
	public function __construct()
	{
		$this->moodId= @$_GET['moodId'];
		$this->moodInfo = array(
			'userId' =>  @$_GET['userId'],
			'moods' =>  @$_GET['moods'],
			'indate' =>  ''
		);
	}

	public function GetMoodByPage($page){
		if(!$page){
			$page=1;
		}
		$start  = ($page-1)*10;
		$end    = 10;
		$sql="select * from mood where user_id = ".$this->userId.
		" ORDER BY indate DESC LIMIT ".$start." , ".$end."";
		$result = mysqli_query($GLOBALS['DB'], $sql);
			$list['num']=mysqli_num_rows($result);
		$i=0;
		if($list['num']>0){
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

	public function DelMood(){
		$sql="DELETE FROM `mood` WHERE mood_id='".$this-> moodId."'";
		if(mysqli_query($GLOBALS['DB'], $sql)){
			return 1;
		}else{
			return 0;
		}
	}	

	public function SaveMood(){
		$date=date("Y-m-d H:i:s",time());
		$sql="INSERT INTO `mood`(`mood_id`, `user_id`, `moods`, `indate`) 
		VALUES 
		(NULL,'".$this->userId."','".$this->moodInfo."','".$date."')";
		if (mysqli_query($GLOBALS['DB'], $sql)) {
	 		return 1;
	 	}else{
	 		return 0;
	 	}

	}


}//mood
?>