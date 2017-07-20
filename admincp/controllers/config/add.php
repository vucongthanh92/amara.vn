<?php

if(isset($_POST['submit']))
{
	$help = new helpers_validation;
	$help->check_empty($_POST['email'],ERROR_EMPTY_EMAIL);
	
	$data['mess'] = $help->_mess;
	if($help->valid() == 1)
	{
		$db = new Models_Mconfig;
		$data = array(
			"Email"	=> $_POST['email'],
			"Sort" => intval($_POST['sort']),
		);
		
		if($db->create_support($data) == 1)
		{
			$data['mess'] = INSERT_COMPLETE;
		}
		else
		{
			$data['mess'] = ERROR_INSERT;
			$data['info'] = array(
				"email"	=> $_POST['email'],
				"sort"	=> $_POST['sort'],
			);
		}
	}
}

loadview("config/add_support",$data);
?>