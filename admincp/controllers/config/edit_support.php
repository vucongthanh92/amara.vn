<?php

$id = $_GET['id'];
$db = new Models_Mconfig;

if(isset($_POST['save']))
{
	$help = new Helpers_Validation;
	$help->check_empty($email,ERROR_EMPTY_EMAIL);
	
	$data['mess'] = $help->_mess;
	if($help->valid() == 1)
	{
		$data = array(
			"Email"		=> $_POST['email'],
			"Sort"		=> $_POST['sort'],
		);
		
		if($db->edit_support($data,$id))
		{
			$data['mess'] == SUCCESS_EDIT_SUPPORT;
		}
		else
		{
			$data['mess'] == ERROR_EDIT_SUPPORT;
		}
	}
}

$data['info']=$db->getid_support($id);

loadview("config/edit_support",$data);
?>