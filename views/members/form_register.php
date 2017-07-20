<link rel = 'stylesheet' type = 'text/css' href = '<?php echo USER_PATH_CSS;?>register.css' />

<span class = 'title-register'><?php echo MB_TITLEDANGKY;?></span>
<?php
	if(!empty($data['error'])){
		echo "<ul class = 'valid_res'>";
		foreach($data['error'] as $item)
		{
			echo "<li>".$item."</li>";
		}
		echo "</ul>";
	}
?>
<div class = 'formrefister'>
<form method = 'post' action = '<?php echo BASE_URL;?>members/register.html'>
	<p><label><?php echo MB_TAIKHOAN;?></label><input type = 'text' size = '50' name = 'username' maxlength = '200'></p>
	<p><label><?php echo MB_MATKHAU;?></label><input type = 'password' size = '50' name = 'password' maxlength = '200'></p>
	<p><label><?php echo MB_REMATKHAU;?></label><input type = 'password' size = '50' name = 'repassword' maxlength = '200'></p>
	<p><label><?php echo MB_EMAIL;?></label><input type = 'text' size = '50' name = 'email' maxlength = '200'></p>
	<p><label><?php echo MB_HOTEN;?></label><input type = 'text' size = '50' name = 'fullname' maxlength = '200'></p>
	<p><label><?php echo MB_DIACHI;?></label><input type = 'text' size = '50' name = 'address' maxlength = '200'></p>
	<p><label><?php echo MB_DIENTHOAI;?></label><input type = 'text' size = '50' name = 'tel' maxlength = '200'></p>
<!--
	<p><label><?php echo MB_GIOITINH;?></label>
		<input type = 'radio' name = '' value = '0'><?php echo MB_NAM;?>&nbsp;&nbsp;&nbsp;&nbsp;
		<input type = 'radio' name = '' value = '1'><?php echo MB_NU;?></p>
	-->
	<p><label><?php echo MB_GIOITHIEUBT;?></label><textarea name = 'introduc' cols = '50' rows = '10'></textarea></p>
	<p><label><?php echo MB_CATPCHA;?></label>
			<input type = 'text' name = 'securitycode' maxlength = '20'>
			<img src = '<?php echo BASE_URL;?>public/captcha/captcha.php' alt="captcha">
	<p><label>&nbsp;</label>
		<input type = 'submit' name = 'register' value = '<?php echo MB_DANGKY;?>'>&nbsp;&nbsp;
		<input type = 'reset' name = 'reset' value = '<?php echo MB_LAMLAI;?>'>
	</p>
</form>
</div>

