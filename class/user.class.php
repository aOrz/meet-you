<?php
/**
* user
*/
class User
{  
	public $userId;
	public $info;
	
	public function __construct()
	{
		$this->userId =  @$_GET['userId'];
		$this->info = array(
			'userNickName' =>  @$_GET['userNickName'],
			'userPWD' =>  @$_GET['userPWD'],
			'userSex' => @$_GET['userSex'],
			'userMail' =>  @$_GET['userMail'],
			'userTel' =>  @$_GET['userTel'],
			'userQq' =>  @$_GET['userQq'],
			'userWeiXin' =>  @$_GET['userWeiXin'],
			'userHomePage' =>  @$_GET['userSchool'],
			'userIntroduction' =>  @$_GET['userIntroduction'],
			'userImgUrl' =>  @$_GET['UserImgUrl'],
			'userWeiBo' => @$_GET['userWeiBo']
			);
	}

	public function GetUserByID()
	{
		// $user = new User();
		$sql = "select * from user where id = '".$this->userId."'";
		$result = mysqli_query($GLOBALS['DB'], $sql);
		$row = mysqli_fetch_assoc($result);

		if(mysqli_num_rows($result) > 0){

			$user->userId = $row['id'];
			$user->info['userNickName'] = $row['nickname'];
			$user->info['userPWD'] = $row['pwd'];
			$user->info['userSex'] = $row['sex'];
			$user->info['userMail'] = $row['mail'];
			$user->info['userTel'] = $row['tel'];
			$user->info['userQq'] = $row['qq'];		
			$user->info['userWeiXin'] = $row['weixin'];
			$user->info['userSchool'] = $row['homepage'];
			$user->info['userIntroduction'] = $row['introduction'];
			$user->info['userImgUrl'] = $row['imgurl'];
			$user->info['userWeiBo'] = $row['weibo'];

			mysqli_free_result($result);
			return $user;
		}else{
			return false;
		}
	}

	public function CreateUser($newUser){
		$nUserNickName = $this->info['userNickName'];
		$nUserPWD = $this->info['userPWD'];
		$nUserMail = $this->info['userMail'];
		$nUserTel = $this->info['userTel'];

	
			$sql = "INSERT INTO `user`(`id`, `pwd`, `mail`, `tel`, `nickname`)
			VALUES 
			(Null,'".$nUserPWD."','".$nUserMail."','".$nUserTel."','".$nUserNickName."')";
			if(mysqli_query($GLOBALS['DB'], $sql)){
				$this->userID = mysqli_insert_id($GLOBALS['DB']);
				return $this->userID;
			}else{
				return false;
			}
		
	}

	public function SaveUser()
	{
		//$sUserId = $this->userID;
		$sUserNickName = $this->info['userNickName'];
		$sUserPWD = $this->info['userPWD'];
		$sUserSex = $this->info['userSex'];
		$sUserMail = $this->info['userMail'];
		$sUserTel = $this->info['userTel'];
		$sUserQq = $this->info['userQq'];
		$sUserWeiXin = $this->info['userWeiXin'];
		$sUserHomePage = $this->info['userHomePage'];
		$sUserIntroduction = $this->info['userIntroduction'];
		$sUserImgUrl = $this->info['userImgUrl'];
		$sUserWeiBo = $this->info['userWeiBo'];

			$sql = "UPDATE `user` SET 
			`pwd`='".$sUserPWD."',
			`sex`='".$sUserSex."',
			`mail`='".$sUserMail."',
			`tel`='".$sUserTel."',
			`qq`='".$sUserQq."',
			`weixin`='".$sUserWeiXin."',
			`homepage`='".$sUserHomePage."',
			`introduction`='".$sUserIntroduction."',
			`nickname`='".$sUserNickName."',
			`imgurl`='".$sUserImgUrl."',
			`weibo`='".$sUserWeiBo."'
			 WHERE 
			`mail` = '".$sUserMail."' and `pwd` = ".$this->info['userPWD']."";

			if(mysqli_query($GLOBALS['DB'], $sql)){
				return true;
			}else{
				return false;
			}
	}


	public function login(){
		$sql="SELECT * FROM `user` WHERE mail = '".$this->info['userMail']."'and pwd = '".$this->info['userPWD']."'";
		$rel=mysqli_query($GLOBALS['DB'], $sql);
		$row = mysqli_fetch_assoc($rel);
		if($row['id']){
				return $row['id'];
			}else{
				return false;
			}

	}

	public function AddFriend($friendId){
		if($this->userId>$friendId)
		$sql="INSERT INTO `relation`(`user_a`, `user_b`) VALUES ('".$this->userId."','".$friendId."')";
	 	else{
		$sql="INSERT INTO `relation`(`user_a`, `user_b`) VALUES ('".$friendId."','".$this->userId."')";
	 	}
	 	if (mysqli_query($GLOBALS['DB'], $sql)) {
	 		return 1;
	 	}else{return 0;}
	}

	public function GetAllFriend(){
		$sql="SELECT * FROM `relation` WHERE user_b=".$this->userId." or user_a=".$this->userId;
		$result=mysqli_query($GLOBALS['DB'], $sql);
			$list['num']=mysqli_num_rows($result);
		$i=0;
		if($list['num']>0){
			while ($row = mysqli_fetch_assoc($result)) {
				if($row['user_a']==$this->userId){
					$UID=$row['user_b'];
				}else{
					$UID=$row['user_a'];
				}
				 $sql1="SELECT * FROM `user` WHERE id = ".$UID;
				$result1=mysqli_query($GLOBALS['DB'], $sql1);
				$row1 = mysqli_fetch_assoc($result1);
				mysqli_free_result($result1);
				$list[$i++] = $row1;
			}
			return $list;
		}else{
			return 0;
		}
		mysqli_free_result($result);

	}

	public function DelFriend($friendId){
		if($this->userId>$friendId)
		$sql="DELETE FROM `relation` WHERE user_a = $this->userId and user_b = $friendId";
	 	else{
		$sql="DELETE FROM `relation` WHERE user_a = $friendId and user_b = $this->userId";
	 	}
	 	if (mysqli_query($GLOBALS['DB'], $sql)) {
	 		return 1;
	 	}else{return 0;
	 	}
	}

	public function searchFriend($nickname){
		$sql="SELECT * FROM `user` WHERE `nickname` like '%".$nickname."%'";
		// echo $sql;
		$result=mysqli_query($GLOBALS['DB'], $sql);
		if (!$result) {
			return 0;
		}
			$number=mysqli_num_rows($result);
		$i=0;
		if($number>0){
			while ($row = mysqli_fetch_assoc($result)) {
				$list[$i++] = $row;
			}
			return json_encode($list);
		}else{
			return 0;
		}
	}
}//class
?>