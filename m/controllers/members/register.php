<?php

if(isset($_POST['register']))
{
	$mhelper = new Helpers_Validation;
	$mhelper->check_empty($_POST['username'],EMPTY_USERNAME);
	$mhelper->check_empty($_POST['password'],EMPTY_PASS);
	$mhelper->check_matches($_POST['password'],$_POST['repassword'],PASSNOTMATCHES);
	$mhelper->check_empty($_POST['email'],EMPTY_EMAIL);
	$mhelper->check_empty($_POST['fullname'],EMPTY_FULLNAME);
	$mhelper->check_matches($_POST['securitycode'],$_SESSION['code'],ERRORCODE);
	if($mhelper->valid() == 0)
	{	
		unset($_SESSION['code']);
		$info = array(
			'username'		=> varPost('username'),
			'password' 		=> varPost('password'),
			'email'			=> varPost('email'),
			'fullname' 		=> varPost('fullname'),
			'address' 		=> varPost('address'),
			'tel'			=> varPost('tel'),
			'introduction' 	=> safe(varPost('introduction'))
		);
		
		$mmember = new Models_MMembers;
		$mmember -> add_user($info);
	}
	else
	{
		$member['error'] = $mhelper->_mess;
	}
}

loadview("members/form_register",$member);
?>