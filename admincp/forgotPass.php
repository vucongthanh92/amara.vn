<?php 
include ("../config/config_site.php"); 

if(isset($_POST['send']))
{
	include_once('Rmail.php');
	$mail = new Rmail();
	$mail->setFrom('kythuat2@ngonhaidang.net');
	$mail->setSubject('Test email');
	$mail->setPriority('high');
	$mail->setText('Sample text');
	$mail->setHTML('<b>Sample HTML</b> <img src="background.gif">');
	$mail->setReceipt('test@test.com');
	$mail->addEmbeddedImage(new fileEmbeddedImage('background.gif'));
	$mail->addAttachment(new fileAttachment('example.zip'));
	$address = 'fruity@licious.com';
    $result  = $mail->send(array($address));
}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<link rel="stylesheet" type="text/css" href="public/css/style_login.css" />
<script language = 'javascript' src = '<?=ADMIN_PATH_JS?>ajax_framework.js'></script>
<head>
<meta http-equiv = "Content-Type" Content = 'text/html;charset=utf-8' />
</head>
<body>
<div id = 'formlogin'>
	<div id = 'login_response'></div>
	<div id = 'login'>
		<div id = 'ndtb_login'>Ä�Äƒng nháº­p há»‡ thá»‘ng<p style = 'margin-top:5px;'><a href = ''></a></p></div>
		
		<div id = 'notice'>
			<br/>HÃ£y gá»­i email cho chÃºng tÃ´i:&nbsp; <a href = 'mailto:kythuat2@ngonhaidang.net'>kythuat2@ngonhaidang.net</a><br/>
			Hoáº·c liÃªn láº¡c qua yahoo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="ymsgr:sendim?coder.giakiem">coder.giakiem@yahoo.com</a><br><br>
		</div>
		
		<form action = 'javascript:login();' method = 'post'>
		<div id = 'ndform_login'>
			<label>Email:</label><input type = 'text' name = 'email' id = 'email'><br/>
			<label>&nbsp;</label><input type = 'submit' name = 'send' id = 'submit' value = 'Gá»­i' style = 'width:100px;'><br/>
		</div>
		</form>
	
		<div id = 'forgotpass'>
			<a href = 'Login.php'>
			--------------------------------------------------------<br/>
			Trá»Ÿ láº¡i trang Ä‘Äƒng nháº­p !</a>
		</div>
	</div>
</div>
</body>
</html>