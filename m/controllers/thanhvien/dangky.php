<?php
	$db = new Models_MThanhvien;
	if(isset($_POST['name'])){
		$sp["name"] = $_POST['name'];
		$sp["email"] = $_POST['email'];
		$sp["password"] = $_POST['password'];
		$sp["repassword"] = $_POST['repassword'];
		$sp["phone"] = $_POST['phone'];
		$sp["gender"] = $_POST['gender'];
		$error = 0;
		$message = "";
		if( $sp["name"] == ""){
			$error =1;
			$message .= "Họ tên không được trống <br />"; 	
		}
		if( $sp["password"] == ""){
			$error =1;
			$message .= "Mật khẩu không được trống <br />"; 	
		}
		if( $sp["password"] != $sp["repassword"] ){
			$error =1;
			$message .= "Mật khẩu so không khớp <br />"; 	
		}
		
		if( $sp["email"] == ""){
			$error =1;
			$message .= "Email không được trống <br />"; 	
		}
		
		if( isValidEmail($sp["email"]) == false){
			$error =1;
			$message .= "Email không hợp lệ <br />"; 	
		}
		
		if($db->checkEmailTT($sp["email"])>=1) {
			$error = 1;
			$message .= "Email đã có người sử dụng. <br />";
		}
		if( $sp["gender"] == -1){
			$error =1;
			$message .= "Vui lòng chọn giới tính <br />"; 	
		}
		
		if($error==0) {
			$data = array(
				'realname' 			=> varPost('name'),
				'password' 			=> $db->GenPassword($_POST['password']),
				'mobile'			=> $sp["phone"],
				'email'			=> $sp["email"],
				'enable'        => 'Y',
				'gender	'			=> $sp["gender"],
				'create_time'   => strtotime(date("Y-m-d H:i:s")),
			);
			
			$db-> addThanhvien($data);
			$_SESSION['login_id']= 1;
			$_SESSION['login_user_id']= mysql_insert_id();	
			$_SESSION['login_username']= varPost('username');
			
			header('location:'.BASE_URL.'thanh-toan.html');
		}
		else
		{
			$sp['error'] = $error;
			$sp['message'] = $message;
			
		}
	}

		
	loadview("thanhvien/view_dangky",$sp);

?>