<?php
$act = varGetPost("act");

if($act == "addemail"){
	include 'controllers/email/addemail.php';
}
?>