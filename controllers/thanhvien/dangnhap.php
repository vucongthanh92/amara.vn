<?php

	$db = new Models_MThanhvien;
	$sp['map_title'] = $arrowmap."Thành viên đăng nhập"; 
	if(isset($_POST['email'])){
		$username = varpost('email');
		$password = varpost('password');	
		$error = 0;
		if($username ==""){
			$error = 1;
			$message .= "Bạn chưa nhập tên đăng nhập <br>";
		}
		if($password == ""){
			$error = 1;
			$message .= "Bạn chưa nhập mật khẩu <br>";
		}
		$kq = $db->checklogin($username,$password);
		if(mysql_num_rows($kq)!= 1){
			$error = 1;
			$message .= "Tên đăng nhập hoặc mật khẩu không chính xác <br>";
		}
		if($error==0) {
			$row = mysql_fetch_assoc($kq);
			$_SESSION['login_id']= 1;
			$_SESSION['login_user_id']= $row['id'];	
			$_SESSION['login_username']= $row['realname'];
			redirect(BASE_URL."dat-hang.html");
		}
		else 
		{
			$sp['error'] = $error;
			$sp['message'] = $message;
			$sp['username'] = $username;
		}
		
	}		
	loadview("thanhvien/view_dangnhap",$sp);

?>