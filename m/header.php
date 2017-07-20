<?php
ob_start();
session_start();

include ("libraries/class_db.php");
include ("config/config.php");
include ("config/config_site.php");
include ("config/title_page.php");

include ("libraries/functions.php");
include ("libraries/controls.php");

//kiem tra ngon ngu
if(isset($_POST['lang'])){
	$lang = strtolower($_POST['lang']);
	//session_register("lang");
	$_SESSION['lang'] = $lang;
}elseif(isset($_SESSION['lang'])){
	$lang = strtolower($_SESSION['lang']);
}else{
	$lang = "vn"; //default language
	//session_register("lang");
	$_SESSION['lang']=$lang;
}

if(file_exists("language/$lang.php")){
	include ("language/$lang.php");
}else{
//lang not exists, default language
	include ("language/vn.php");
	//session_register("lang");
	$_SESSION['lang']="vn";
}

$lang = $_SESSION['lang'];
define("lang",$lang);

// map title
$map_title = "<a href = '".BASE_URL."' class = 'linkred'>".MN_HOME."</a>";
$arrowmap = " >> ";

define('usd','21021');

// meta 
require 'meta.php';

?>