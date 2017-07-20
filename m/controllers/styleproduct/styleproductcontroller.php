<?php


switch($act)
{
	case "list":	include("controllers/styleproduct/list.php");break;
	default:					include('controllers/styleproduct/list.php');break;
}
?>