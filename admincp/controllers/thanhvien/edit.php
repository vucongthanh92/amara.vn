<?php
$db = new Models_MThanhvien;
$id = varGetPost("id");
$data['info'] = $db -> getOneUser($id);
if(isset($_POST['editnew']))
{
	$error = 0;
	$username = $_POST['username'];
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$birthday = $_POST['birthday'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$tinh = $_POST['tinh'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$dta = array(
			"username" => $username,
			"password" => $password,
			"email"    =>$email,
			"idtinh"   =>$tinh,
			"address"  =>$address,
			"phone"    =>$phone,
			"gioitinh" =>$gender,
			"birthday" =>$birthday,
			"fullname" =>$fullname,
 		);
	//$db->editThanhVIenUser($dta,$id);
	redirect(BASE_URL_ADMIN."thanhvien/list");
	return;
}
loadview("thanhvien/edit_view",$data);
?>