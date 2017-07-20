<script language = 'javascript' src = '<?php echo BASE_URL_ADMIN; ?>public/tiny_mce/tiny_mce.js'></script>
<script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>editor_tinymce.js'></script>
<script type="text/javascript">
	//tinymce_image("hinh_anh");
	tinymce_simple("des");
	//tinymce_advanced("cont");
</script>
<?php
if(isset($_POST['btnhoi'])){
	$hoten = $_POST['fullname'];
	$email = $_POST['email'];
	$content = $_POST['content'];
	$title = $_POST['title'];
	$error =0;
	if($hoten == ""){
		$error=1;
		$message .= "Bạn chưa nhập họ tên<br/>";
	}
	if($title == ""){
		$error=1;
		$message .= "Bạn chưa nhập tiêu đề<br/>";
	}
	if($email == ""){
		$error=1;
		$message .= "Bạn chưa nhập Email <br/>";
	}
	if( isValidEmail($email) == false){
		$error =1;
		$message .= "Email không hợp lệ <br />"; 	
	}
	if($content == ""){
		$error=1;
		$message .= "Bạn chưa nhập nội dung câu hỏi <br/>";
	}
	if($error == 0){
		$data = array(
			'name' => $hoten,
			'email' =>$email,
			'title_vn' =>$title,
			'parentid' =>0,
			'content_vn' =>$content,
			'ticlock' =>1,
			'date'   =>date("Y-m-d H:i:s"),
		);
		$db = new Models_MHoidap();
		$db->addNew($data);
		redirect(BASE_URL."hoi-dap-suc-khoe.html");
	}
	
}
?>
<div class="main">
<div class ='noidung'>
<h2 class="title"><?=$data["map_title"] ?></h2>
<?php
	if($error == 1){
		echo '<div class="error">'.$message.'</div>';
	}
?>
<form action="" name="formdatcauhoi" method="post" id="fromdatcauhoi">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td>Tiêu đề:</td>
    <td><input type="text" name="title" value="<?=$title ?>" size="50" /></td>
  </tr>
  <tr>
    <td>Họ tên:</td>
    <td><input type="text" name="fullname" value="<?=$hoten ?>" size="50" /></td>
  </tr>
  <tr>
    <td>Email: </td>
    <td><input type="text" name="email" value="<?=$email ?>" size="50" /></td>
  </tr>
  
  <tr>
    <td>Nội dung</td>
    <td><textarea name="content" style="width:400px; height:200px;" id="des"><?=$content ?></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="Gửi câu hỏi" name="btnhoi" class="btn" />   <input type="reset" value="Làm lại" class="btn"  /></td></td>
  </tr>
</table>
</form>
</div>
</div>