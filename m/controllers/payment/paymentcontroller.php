<?php
$act = varGetPost('act');
switch($act)
{
	case "info-customer":	include("info_cus.php");break;
	case "addcart":		include("addcart.php");break;
	case "editcart":	include("editcart.php");break;
	case "delcart":		include("delcart.php");break;
	case "showcart":	include("showcart.php");break;
	case "showorder":	include("showorder.php");break;
	case "order":		include("order.php");break;
}

?>