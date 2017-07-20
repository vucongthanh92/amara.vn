<?php
require("header.php");

if(isset($_GET['act'])){
	$act = $_GET['act'];
	
	if($act == "getsubcat"){
		include 'controllers/product/getsub.php';
	}elseif($act == "addcomment"){
		include 'controllers/comment/add.php';
	}elseif($act == "addcart"){
		include 'controllers/payment/addcart2.php';
	}
}

?>