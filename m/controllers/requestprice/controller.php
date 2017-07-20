<?php
$act = varGetPost('act');
if($act == "form")
	include ("formpost.php");
elseif($act == "add")
	include ("add.php");
else
	include ("formpost.php");

?>

