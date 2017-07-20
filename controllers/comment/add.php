<?php
$db = new Models_MComment();
$maxacnhan = varPost('maxacnhan');
if(isset($_POST)){ /* && $maxacnhan == $_SESSION['code']*/
	
	$datainfo = array(
		'fullname' 		=> addslashes(varPost('fullname')),
		'email'			=> addslashes(varPost('email','',1)),
		'title'			=> addslashes(varPost('tieude','',1)),
		'content'		=> addslashes(varPost('noidung','',1)),
		'idproduct'		=> intval(varPost('idproduct')),
		'dateupdate'	=> time(),
	);
	
	$db-> addNew($datainfo);
	$id = $db->returnIdinsert();
	include 'libraries/smtp.php';
	
	/*
	 * gui cho quan tri
	 */
	
	$content = '
	Ý kiến khách hàng về sản phẩm: <br/>
	Họ & tên : '.varPost('fullname').'<br/>
	Email : '.varPost('email').'<br/>
	Tiêu đề : '.varPost('tieude').'<br/>
	Nội dung : '.varPost('noidung').'<br/><br/>
	<a href = "'.BASE_URL.'comment/active/'.$id.'.htm" style = "background:#000; color:#fff; padding:3px 5px;"><b>Duyệt</b></a>&nbsp;&nbsp;&nbsp;
	<a href = "'.BASE_URL.'comment/del/'.$id.'.htm" style = "background:#000; color:#fff; padding:3px 5px;"><b>Xoá</b></a>';
	
	SendMail($_POST['email'],$title['emaillienhe_vn'],'Ý kiến khách hàng sieuthimtxt.net',$content);	

	echo 0;
}
else
{
	echo 'Nhập sai mã xác nhận';
}
?>