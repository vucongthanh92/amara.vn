<?php
$act = $_GET['act'];

switch($act) 
{
	case 'add':		include('controllers/commentnew/add.php');break;
	case 'edit':	include('controllers/commentnew/edit.php');break;
	case 'del':		include('controllers/commentnew/del.php');break;
	case 'list':	include('controllers/commentnew/list.php');break;
	default:		include('controllers/commentnew/list.php');break;
}
?>