<?php
	$db = new Models_MThanhvien;
	if(isset($_POST['name'])){
		$sp["name"] = $_POST['name'];
		$sp["email"] = $_POST['email'];
		$sp["password"] = $_POST['password'];
		$sp["RetypePassword"] = $_POST['RetypePassword'];
		$sp["phone"] = $_POST['Mobile'];
		$sp["gender"] = $_POST['Gender'];
		$sp["BirthDate_Day"] = $_POST['BirthDate_Day'];
		$sp["BirthDate_Month"]  = $_POST['BirthDate_Month'];
		$sp["BirthDate_Year"]  = $_POST['BirthDate_Year'];
		 $AcceptTerms = $_POST['AcceptTerms'];
		$error = 0;
		$message = "";
		if($AcceptTerms ==false){
			$error = 1;
			$message .="Bạn chưa đồng ý quy định của Dealxinh.com <br>";
		}
		if( $sp["name"] == ""){
			$error =1;
			$message .= "Họ tên không được trống <br />"; 	
		}
		if( $sp["password"] == ""){
			$error =1;
			$message .= "Mật khẩu không được trống <br />"; 	
		}
		if( $sp["password"] != $sp["RetypePassword"] ){
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
			
			header('location:'.BASE_URL.'dat-hang.html');
		}
		else
		{
			$sp['error'] = $error;
			$sp['message'] = $message;
			
		}
	}

		
	loadview("thanhvien/view_dangky",$sp);

?>