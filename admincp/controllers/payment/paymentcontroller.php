<?php

$act = varGetPost("act");

switch($act)
{
	case "list":	include ("list.php");break;
	case "edit":	include ("detail.php");break;
	case "del":		include ("del.php");break;
}

?>