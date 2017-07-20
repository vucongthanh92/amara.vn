<?php
$act = $_GET['act'];

switch($act)
{
	case 'add':		include('controllers/video/add.php');break;
	case 'edit':	include('controllers/video/edit.php');break;
	case 'del':		include('controllers/video/del.php');break;
	case 'list':	include('controllers/video/list.php');break;
	case 'save':	include('controllers/video/save.php');break;
	default:		include('controllers/video/list.php');break;
}
?>