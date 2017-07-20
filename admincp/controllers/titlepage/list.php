<?php

if(isset($_POST['save'])){
	$yahoo1 = trim($_POST['yahoo1']);	
	$yahoo2 = trim($_POST['yahoo2']);
	$dienthoai1 = trim($_POST['dienthoai1']);	
	$dienthoai2 = trim($_POST['dienthoai2']);	
	$hoten1 = trim($_POST['hoten1']);	
	$hoten2 = trim($_POST['hoten2']);	
	
	$hotline1 = trim($_POST['hotline1']);		
	$hotline2 = trim($_POST['hotline2']);	
	$emaillienhevn = trim($_POST['emaillienhevn']);
	$email_send = trim($_POST['email_send']);	
	$pass_send = trim($_POST['pass_send']);		
	
$text = "<?php	

\$title['yahoo1'] = '".$yahoo1."';	
\$title['yahoo2'] = '".$yahoo2."';	
\$title['dienthoai1']='".$dienthoai1."';
\$title['dienthoai2']='".$dienthoai2."';		
\$title['hoten1']='".$hoten1."';	
\$title['hoten2']='".$hoten2."';
	
\$title['hotline1']='".$hotline1."';	
\$title['hotline2']='".$hotline2."';
\$title['email_send']='".$email_send."';
\$title['pass_send']='".$pass_send."';			
\$title['emaillienhe_vn']='".$emaillienhevn."';?>";	
 
$file = "../config/title_page.php";

if(file_exists($file)){		
$fp = fopen($file, 'w');		
fwrite($fp, $text);		fclose($fp);	
}
}if(file_exists('../config/title_page.php')){	include '../config/title_page.php';}

loadview('titlepage/list',$title);
?>