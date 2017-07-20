<?php
if(isset($_GET['act'])){
	$act = $_GET['act'];
}else{
	$act = "";
}
switch($act)
{
	case "danhmuc":
		include ("controllers/hoidap/list.php");
		break;
	case "chitiet":
		include ("controllers/hoidap/detail.php");
		break;
	case "datcauhoi":
		include ("controllers/hoidap/datcauhoi.php");
		break;
	default:
		include ("controllers/hoidap/list.php");
		break;	
}

?>