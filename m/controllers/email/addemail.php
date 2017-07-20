<?php

if(isset($_POST['dangkyemail'])){
	
	$email = addslashes(varPost("email"));
	
	$mhelper = new helpers_validation();
	$mhelper->check_email($email);
	
	if($mhelper->valid() != 1)
	{
		$data = array(
			"email"	=> $email
		);
		
		$memail = new Models_MEmail();
		$memail -> add_email($data);
		
		//bao thanh cong
		echo '<script type="text/javascript">alert("Đăng ký email thành công");window.location=("'.BASE_URL.'");</script>';
		
	}else{
		//bao loi
		echo '<script type="text/javascript">alert("Lỗi!");window.location=("'.BASE_URL.'");</script>';
	}
	
	
}
?>