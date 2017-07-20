<?php
	if($_SESSION['login_id'] != 1) {
		header("location: ".BASE_URL);
	}
	$db = new Models_MThanhvien;
	$user = $db->getOneUser($_SESSION['login_user_id']);
	if(isset($_POST['btnupdate'])){
		$error = 0;
		$OldPassword = varPost('OldPassword');
		$NewPassword = varPost('NewPassword');
		$RetypePassword = varPost('RetypePassword');
		if($OldPassword == "" ||$NewPassword == "" ){
			$error = 1;
			$message .= "Mật khẩu không được rỗng.<br>";
		}
		if($db->GenPassword($OldPassword) != $user['password']){
			$error = 1;
			$message .= "Mật khẩu cũ không đúng.<br>";
		}
	
		if($NewPassword != $RetypePassword){
			$error = 1;
			$message .= "Mật khẩu so không khớp.<br>";
		}
		
		if($error==0) {
			$data = array(
				'password'			=> $db->GenPassword($NewPassword),	
			);
			
			$db-> editUser($data,$_SESSION['login_user_id']);
	
			$sp['secessfull'] = 1;
			$sp['message'] = "Đổi mật khẩu thành công";
		}
		else
		{
			$sp['error'] = $error;
			$sp['message'] = $message;
			
		}
	}
	loadview("thanhvien/view_changepassword",$sp);

?>