<?php
/**
* circle
*/
class Circle
{
	public $adminUser;
	public $circleId;
	public $circleName;
	public $circleNumber;
	public $circleNotic;
	public function __construct()
	{
		 $this->adminUser = @$_GET['adminUser'];
		 $this->circleId = @$_GET['circleId'];
		 $this->circleName = @$_GET['circleName'];
		 $this->circleNumber = @$_GET['circleNumber'];
		 $this->circleNotic = @$_GET['circleNotic'];
	}
	public function AddCircle(){
		$sql=="INSERT INTO `circle`(`circle_id`, `admin_id`, `circle_name`, `circle_number`, `circle_notic`)
		 VALUES
		  (NULL,'".$this->adminUser."','".$this->circleName."','1','".
		  	$this->circleNotic."')";
		  if(mysqli_query($GLOBALS['DB'], $sql)){
		  	$id= mysqli_query($GLOBALS['DB'], 'select last_insert_id()');
		  	$sql="INSERT INTO `circle_user`(`id`, `circle_id`, `user_id`, `state`, ` permission`) 
		  	VALUES 
		  	(NULL,'".$id."','".$this->adminUser."',1,3)";
		  	$rel=mysqli_query($GLOBALS['DB'], $sql);
		  	return $id;
		  }else{
		  	return -1;
		  }
	} #AddCircle

	public function SaveCircle(){
		$sql="UPDATE `circle` SET`circle_name`='".$this->circleId."',`circle_notic`='".$this->circleNotic."' WHERE `circle_id`='".$this->circle_notic."'";
		if(mysqli_query($GLOBALS['DB'], $sql)){
				return true;
			}else{
				return false;
			}

	}//SaveCircle

	public function Pass($user){ 
		$sql="UPDATE `circle_user` SET `state`=1 WHERE `user_id` = $user";
		if(mysqli_query($GLOBALS['DB'], $sql)){
				return true;
			}else{
				return false;
			}
	}

	public function joinCircle(){
		$sql="INSERT INTO `circle_user`(`id`, `circle_id`, `user_id`, `state`, ` permission`) 
		VALUES 
		(NULL,'".$this->circleId."','".$this->user_id."',0,'0')";
		if(mysqli_query($GLOBALS['DB'], $sql)){
				return true;
			}else{
				return false;
			}
	}

	public function delCircle(){
		$sql="DELETE FROM `circle_user` WHERE `circle_id`='".
		$this->circle_id."' and  `user_id`=".$thid->user_id;
			if(mysqli_query($GLOBALS['DB'], $sql)){
				return true;
			}else{
				return false;
			}
	}

	public function searchCircle($circlname){
		$sql="SELECT * FROM `circle` WHERE `circle_name`=".$circleNames;
		$result=mysqli_query($GLOBALS['DB'], $sql);
			$list['num']=mysqli_num_rows($result);
		$i=0;
		if($list['num']>0){
			while ($row = mysqli_fetch_assoc($result)) {
				$list[$i++] = $row;
			}
			return $list;
		}else{
			return 0;
		}
	}

	public function searchCircleByUserId($userId){
		$sql="SELECT * FROM `circle_user` WHERE `user_id` = ".$userId;
		$result=mysqli_query($GLOBALS['DB'], $sql);
			$list['num']=mysqli_num_rows($result);
		$i=0;
		if($list['num']>0){
			while ($row = mysqli_fetch_assoc($result)) {
				$list[$i++] = $row;
			}
			return $list;
		}else{
			return 0;
		}
	}

}
?>