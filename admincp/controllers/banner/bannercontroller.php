<?php
$act = $_GET['act'];

switch($act)
{
	case "del":
		include ("controllers/banner/del.php");
		break;
	case "edit":
		include ("controllers/banner/edit.php");
		break;
	case "add":
		include ("controllers/banner/add.php");
		break;		
	default:
		include ("controllers/banner/list.php");
		break;	
}

?>