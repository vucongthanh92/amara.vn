<?php
	if($_SESSION['login_id'] != 1) {
		header("location: ".BASE_URL);
	}
	$db = new Models_MThanhvien;
	$sp["user"] = $db->getOneUser($_SESSION['login_user_id']);
	if(isset($_POST['btnupdate'])){
		$Name = $_POST['Name'];
		$Mobile = $_POST['Mobile'];
		$Gender = $_POST['Gender'];
		$BirthDate_Day = $_POST['BirthDate_Day'];
		$BirthDate_Month = $_POST['BirthDate_Month'];
		$BirthDate_Year = $_POST['BirthDate_Year'];
		$error = 0;
		$message = "";
		if($Name==""){
			$error=1;
			$message .= "Họ tên không được trống <br/>";
		}
		if($Mobile==""){
			$error=1;
			$message .= "Số điện thoại không được trống <br/>";
		}
		if($error == 0){
		
			$data = array(
				'realname'			=> $Name,	
				'gender'			=> $Gender,	
				'mobile'			=> $Mobile,	
				'birthday'			=> $BirthDate_Day."-".$BirthDate_Month."-".$BirthDate_Year,	
			);
			echo $hinh;
			$db-> editUser($data,$_SESSION['login_user_id']);
			$sp['secessfull'] = 1;
			$sp['message'] = "Cập nhật thông tin thành công";
		}else {
			$sp['error'] = $error;
			$sp['message'] = $message;
		}		
	}
	loadview("thanhvien/view_avatar",$sp);
?>