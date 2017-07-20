<?php
$act = varGet("act");

switch($act)
{
	case "register":	include ("controllers/members/register.php");break;
	default:
		redirect(BASE_URL);
}
?>