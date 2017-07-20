<?php
if(isset($_GET['act'])){
	$act = $_GET['act'];
}else{
	$act = "";
}

switch($act)
{
	case "danh-muc":
		include ("controllers/news/list.php");
		break;
	case "tieudiem":
		include ("controllers/news/tieudiem.php");
		break;
	case "dacbiet":
		include ("controllers/news/dacbiet.php");
		break;
	case "xemnhieu":
		include ("controllers/news/xemnhieu.php");
		break;
	case "chi-tiet":
		include ("controllers/news/detailnews.php");
		break;
	case "timkiem":
		include ("controllers/news/seachnews.php");
		break;
	default:
		include ("controllers/news/list.php");
		break;	
}

?>