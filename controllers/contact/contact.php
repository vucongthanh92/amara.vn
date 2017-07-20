<?php
$mpagehtml = new Models_MPageHtml;
$mflash = new Models_MFlash();
$ct['banner'] = $mflash->getOneflashLocation(6);
$ct['thongtin'] = $mpagehtml->getpagehtmlid(11);

$sql2="select * from team where ticlock='0' and hot='1' order by sort asc,Id desc limit 5";
$ds2=mysql_query($sql2);
$ct['prod_hot']=$ds2;

if(isset($_POST['btngui']))
{
		$to=$title['emaillienhe_vn'];
	 	$ten=$_POST['hoten'];
		$email=$_POST['email'];
		$add=$_POST['diachi'];
		$tell=$_POST['dienthoai'];
		$cont=$_POST['noidung'];
		if (get_magic_quotes_gpc()== false) {
			$ten=trim(mysql_real_escape_string($ten));
			$email=trim(mysql_real_escape_string($email));
			$add=trim(mysql_real_escape_string($add));
			$tell=trim(mysql_real_escape_string($tell));
			$cont=trim(mysql_real_escape_string($cont));
		}
		$cont=str_replace("NOIDUNG*: ","",$cont);
		if($ten==""||$email==""||$cont==""||$add==""){
			$error= 1;
			$mesage .= "Nhập thông tin chưa đầy đủ <br />"; 
		}
		if( isValidEmail($email) == false){
			$error =1;
			$mesage .= "Email không hợp lệ <br />"; 	
		}
		if($error==0){
			$from=$email;
			$tieude="Liên hệ";
			ob_start();
			echo file_get_contents("mail/emaillienhetukhachhang.html");
			$noidung = ob_get_clean();
			$noidung =str_replace("{hoten}", $ten ,$noidung);
			$noidung = str_replace("{diachi}", $add , $noidung);
			$noidung = str_replace("{email}", $email, $noidung);
			$noidung = str_replace("{dienthoai}", $tell , $noidung);
			$noidung =str_replace("{noidung}", $cont , $noidung);
			$noidung1 .="Chào <b>$ten</b>! Cảm ơn bạn đã liên hệ với chúng tôi.<br>";
			$noidung1 .="Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất!<br> ";
		echo $to." - ".$from;
			smtpmailer($to,$from,$ten,$tieude,$noidung);
			smtpmailer($from,$to,"Siêu Thị Sức Khỏe",$tieude,$noidung1);
			echo '<script>alert("Gửi liên hệ thành công!");
			              location.href="home.html";
				  </script>';
		}
		$ct["error"] =$error;
		$ct["mesage"] = $mesage;
		$ct["hoten"] = $ten;
		$ct["email"] = $email;
		$ct["add"] = $add;
		$ct["tell"] = $tell;
		$ct["cont"] = $cont;
}

$mcontact = new Models_MPagehtml;
/*$ct['ttlienhe'] = $mcontact -> getpagehtmlid('25');
$ct['googlemap'] = $mcontact -> getpagehtmlid('26');*/
/*
 * tieu de trang
 */
$map_title = CONTACT;
$ct['map_title'] =  $map_title;

loadview("contact/contact",$ct);

?>