<?php
$act = $_GET['act'];

switch($act) 
{
	case 'add':		include('controllers/hoidap/add.php');break;
	case 'edit':	include('controllers/hoidap/edit.php');break;
	case 'del':		include('controllers/hoidap/del.php');break;
	case 'delete':		include('controllers/hoidap/delete.php');break;
	case 'list':	include('controllers/hoidap/list.php');break;
	case 'traloi':	include('controllers/hoidap/comment.php');break;
	default:		include('controllers/hoidap/list.php');break;
}
?>