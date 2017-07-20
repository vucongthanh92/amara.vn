<?php
$act = varGetPost("act");

switch($act)
{
	case "active":		include ("controllers/comment/active.php");break;
	case "del":			include ("controllers/comment/del.php");break;
}

?>