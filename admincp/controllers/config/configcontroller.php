<?php
$act = $_GET['act'];

switch($act)
{
	case "delsupport":
		include ("controllers/config/del_support.php");
		break;
	case "editsupport":
		include ("controllers/config/edit_support.php");
		break;
	case "addsupport":
		include ("controllers/config/add_support.php");
		break;	
	case "listsupport":
		include ("controllers/config/list_support.php");
		break;		
	default:
		include ("controllers/config/edit_cf.php");
		break;
}

?>