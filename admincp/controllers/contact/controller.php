<?php
$act = $_GET['act'];

switch($act)
{
	case 'add':		include('controllers/contact/add.php');break;
	case 'edit':	include('controllers/contact/edit.php');break;
	case 'del':		include('controllers/contact/del.php');break;
	case 'list':	include('controllers/contact/list.php');break;
	case 'save':	include('controllers/contact/save.php');break;
	default:		include('controllers/contact/list.php');break;
}
?>