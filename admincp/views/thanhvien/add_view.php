<?php
$birthday = "1990-01-01";
$db = new Models_MThanhvien;
if(isset($_POST['addnew']))
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
	if(($username == "")|| ($db->CheckUsername($username)>=1)) {
		$error = 1;
		$message = "Tài khoản rỗng hoặc đã có người sử dụng <br />";
	}
	if($password == "" || $password != $repassword){
		$error = 1;
		$message .= "Mật khẩu rỗng hoặc không khớp <br />";
	}
	if($email=="" ){
		$error = 1;
		$message .= "Email không được rỗng <br />";
	}
	if((isValidEmail($email)==false) || ($db->CheckEmailUser($email)>=1) ){
		$error  = 1;
		$message .= " Email không hợp lệ hoặc đã được sử dụng"; 
	}
	if($error == 0) {
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
		$db-> addUser($dta);
		redirect(BASE_URL_ADMIN."thanhvien/list");
		return;
	}
}
?>
<div class="wrapper_submenu">
	<div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>website/edit/1">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-cauhinh.png">
        </div>
        <div class="text">Cấu hình site</div>
        </div>
        </a>
	</div>
    <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>user/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-user.png">
        </div>
        <div class="text">Admin</div>
        </div>
        </a>
	</div>
    <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>thanhvien/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-nguoilienhe.png">
        </div>
        <div class="text">Thành viên</div>
        </div>
        </a>
	</div>
  

</div>
<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
    <tbody>
    <tr>
    <td width="25">
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-image.png" style="width:23px; height: 23px">
    </td>
    <td> Hệ thống / Quản lý thành viên / Thêm mới </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>

<div class="content">
<div class="content_i">
<?php
	if($error == 1) {
		echo "<div class='massage'>";
		echo $message;
		echo "</div>";
	}
?>
<form action = '<?php echo BASE_URL_ADMIN;?>thanhvien/add' method = 'post' enctype = "multipart/form-data" onsubmit="checkdulieu();" name="adduser" id="adduser" >

<table>
	<tr>
		<td class = 'title_td'>Tài Khoản</td>
		<td>
			<input type = 'text' name = 'username' size = '100' value="<?=$username ?>" >
		</td>
	</tr>
    <tr>
		<td class = 'title_td'>Mật khẩu</td>
		<td>
			<input type ='password' name = 'password' size = '100' value="<?=$password ?>" >
		</td>
	</tr>
    <tr>
		<td class = 'title_td'>Nhập lại mật khẩu</td>
		<td>
			<input type = 'password' name = 'repassword' size = '100' value="<?=$repassword ?>" >
		</td>
	</tr>
    <tr>
		<td class = 'title_td'>Họ tên</td>
		<td>
			<input type = 'text' name = 'fullname' size = '100' value="<?=$fullname ?>" >
		</td>
	</tr>
    <tr>
		<td class = 'title_td'>Email</td>
		<td>
			<input type = 'text' name = 'email' size = '100' value="<?=$email ?>" >
		</td>
	</tr>
    <tr>
		<td class = 'title_td'>Ngày sinh</td>
		<td>
			<input type = 'text' name = 'birthday' size = '100' class="datepicker" value="<?=$birthday ?>" >
		</td>
	</tr>
    <tr>
		<td class = 'title_td'>Giới tính</td>
		<td>
			<input type = 'text' name = 'gender' size = '100' value="<?=$gender ?>" >
		</td>
	</tr>
    <tr>
		<td class = 'title_td'>Địa chỉ</td>
		<td>
			<input type = 'text' name = 'address' size = '100' value="<?=$address ?>" >
		</td>
	</tr>
    <tr>
		<td class = 'title_td'>Điện thoại</td>
		<td>
			<input type = 'text' name = 'phone' size = '100' value="<?=$phone ?>" >
		</td>
	</tr>
    <tr>
		<td class = 'title_td'>Tỉnh</td>
		<td>
			<select name="tinh" id="tinh">
            	<option value="0">Tỉnh / Thành phố</option>
                    <option selected="selected" value="1">TP Hồ Chí Minh</option>
                    <option value="2">Hà Nội</option>
                    <option value="5">Bình Dương</option>
                    <option value="6">Bà Rịa- Vũng Tàu</option>
                    <option value="7">Tỉnh khác</option>
            </select>
		</td>
	</tr>
	
	<tr>
    	<th></th>
		<th align = 'center'>
			<input type = "hidden" >
			<input type = 'submit' value = '<?php echo G_BUTTON_ADD;?>' name = 'addnew' class="button">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>' class="button" >
		</th>
	</tr>	
</table>
</form>
</div>
</div>