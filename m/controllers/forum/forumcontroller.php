<?php
$act = varGetPost("act");

switch($act)
{
	case "list":		include ("list.php");break;
	case "gui-y-kien":	include ("add.php");break;
	case "detail":		include ("detail.php");break;
	default:			include ("list.php");break;
}

?>