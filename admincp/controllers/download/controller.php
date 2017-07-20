<?php
$act = $_GET['act'];

switch($act)
{
	case 'add':		include('controllers/download/add.php');break;
	case 'edit':	include('controllers/download/edit.php');break;
	case 'del':		include('controllers/download/del.php');break;
	case 'list':	include('controllers/download/list.php');break;
	case 'save':	include('controllers/download/save.php');break;
	default:		include('controllers/download/list.php');break;
}
?>