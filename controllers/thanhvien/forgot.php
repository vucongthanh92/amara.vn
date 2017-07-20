<?php

	$db = new Models_MThanhvien;
	$sp['map_title'] = $arrowmap."Yêu cầu lấy lại mật khảu"; 
	if(isset($_POST['email'])){
		$sp['email'] = varpost('email');
		if( $sp["email"] == ""){
			$error =1;
			$message .= "Email không được trống <br />"; 	
		}
		
		if( isValidEmail($sp["email"]) == false){
			$error =1;
			$message .= "Email không hợp lệ <br />"; 	
		}
		$kq= $db->checkEmail($sp["email"]);
		if(mysql_num_rows($kq) != 1){
			$error =1;
			$message .= "Email không tồn tại <br />";	
		}
		if($error==0) {
			require('libraries/smtp.php');
			$row = mysql_fetch_assoc($kq);
			$mk = rand_string(10);
			$pass = md5($mk);
			$data= array(
				'password' =>$pass,
			);
			$db ->editUser($data,$row['id']);
			$subject = "Email  yêu cầu lấy lại mật khẩu";
			$body .= "Bạn nhận được mail này <br> vì đã yêu cầu lấy lại mật khẩu thành viên tại kangaru123.com <br>";
			$body .="Tên đăng nhập: ".$row['username'].".<br>"; 
			$body .="Mật khẩu: ".$mk.".<br>"; 
			SendMail( $title['emaillienhe_vn'],$sp['email'],$subject, $body);	
			$sp['error'] = 1;
			$sp['message'] = "Yêu đã dược gửi. <br> Vui lòng check email để lấy lại mật khẩu.";
			?>
            <script type="text/javascript">
			$(document).ready(function(){
				alert('Đã gởi yêu cầu lấy lại mật khẩu thành công. Vui lòng check mail và dùng mật khẩu mới để đang nhập. Xin cảm ơn');
				window.location='<?=BASE_URL ?>';
			})
			</script>
            <?
			
		}
		else
		{
			$sp['error'] = $error;
			$sp['message'] = $message;
			
		}
	}

		
	loadview("thanhvien/view_forgot",$sp);

?>