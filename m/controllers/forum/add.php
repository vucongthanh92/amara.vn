<?php
$db = new Models_MForum;

if(isset($_POST['addnew'])){
	
	$id = idMax(TBL_FORUM) + 1;
	$datainfo = array(
		'Id'			=> $id,
		'fullname' 		=> addslashes(varPost('fullname')),
		'email'			=> addslashes(varPost('email','',1)),
		'title'			=> addslashes(varPost('title','',1)),
		'question'		=> addslashes(varPost('question','',1)),
		'lang'			=> lang,
	);
	
	$db-> addNew($datainfo);
	$_SESSION['tc'] = 1;
	redirect(BASE_URL."forum/list/hoi-dap-ky-thuat.html");
}
else
{
	redirect(BASE_URL."forum/list/hoi-dap-ky-thuat.html");
}
?>