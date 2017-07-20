<?php
	if($_SESSION['login_id'] != 1) {
		header("location: ".BASE_URL);
	}

	
	if(isset($_POST['email'])){
		$sp["email"] = $_POST['email'];
		$sp["full_name"] = $_POST['full_name'];
		$sp["tinh_id"] = $_POST['tinh_id'];
		$sp["address"] = $_POST['address'];
		$sp["ngay"] = $_POST['ngay'];
		$sp["thang"] = $_POST['thang'];
		$sp["nam"] = $_POST['nam'];
		$sp["phone"] = $_POST['phone'];
		$sp["gender"] = $_POST['gender'];
		$error = 0;
		$message = "";
		if( $sp["full_name"] == ""){
			$error =1;
			$message .= "Họ tên không được trống <br />"; 	
		}
		if( $sp["address"] == ""){
			$error =1;
			$message .= "Địa chỉ không được trống <br />"; 	
		}
		if( $sp["email"] == ""){
			$error =1;
			$message .= "Email không được trống <br />"; 	
		}
		
		if( isValidEmail($sp["email"]) == false){
			$error =1;
			$message .= "Email không hợp lệ <br />"; 
		
		}
		if( isValidEmail($sp["email"]) == false){
			$rw = $db->checkEmailEdit($sp["email"],$_SESSION['login_user_id']);
			if(mysql_num_rows($rw) > 0) {
				$error =1;
				$message .= "Email đã được sử dụng <br />"; 
			}
		}
		if ($sp["ngay"] != 0 || $sp["thang"] != 0 || $sp["nam"] != 0)
		{
			if (check_valid_date($sp['nam'], $sp['thang'], $sp['ngay']) == false)
			{
				$error = 1;
				$message .= "Ngày sinh: Không hợp lệ. <br />";
			}
		}
		if($error==0) {
			$ngaysinh = $sp["nam"]."-".$sp["thang"]."-".$sp["ngay"];
			$data = array(
				'fullname'			=> varPost('full_name'),
				'phone'			=> $sp["phone"],
				'email'			=> $sp["email"],
				'address'			=> $sp["address"],
				'idtinh'			=> $sp["tinh_id"],
				'gioitinh'			=> $sp["gender"],
				'birthday'			=> $ngaysinh,
			);
			
			$db-> editUser($data,$_SESSION['login_user_id']);
			redirect(BASE_URL."thanhvien/canhan.htm");
	
		}
		else
		{
			$sp['error'] = $error;
			$sp['message'] = $message;
			
		}
	}
	loadview("thanhvien/view_canhan",$sp);

?>