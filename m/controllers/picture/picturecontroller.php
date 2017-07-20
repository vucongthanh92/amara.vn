<?php
$act = varGetPost("act");

switch($act)
{
	case "list":	include("controllers/picture/list.php");break;
}
?>