<?php
$act = $_GET['act'];

switch($act)
{
	case 'add':		include('controllers/styleproduct/add.php');break;
	case 'edit':	include('controllers/styleproduct/edit.php');break;
	case 'del':		include('controllers/styleproduct/del.php');break;
	case 'list':	include('controllers/styleproduct/list.php');break;
	case 'save':	include('controllers/styleproduct/save.php');break;
	default:		include('controllers/styleproduct/list.php');break;
}
?>