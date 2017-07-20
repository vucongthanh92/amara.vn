<?php
ob_start();
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

include ("libraries/class_db.php");
include ("config/config.php");
include ("config/config_site.php");
include ("config/title_page.php");

$_SESSION['hoten1']=$title['hoten1'];
$_SESSION['yahoo1']=$title['yahoo1'];
$_SESSION['dienthoai1']=$title['dienthoai1'];
$_SESSION['hoten2']=$title['hoten2'];
$_SESSION['yahoo2']=$title['yahoo2'];
$_SESSION['dienthoai2']=$title['dienthoai2'];
$_SESSION['email_send']=$title['email_send'];
$_SESSION['pass_send']=$title['pass_send'];
$_SESSION['emaillienhe_vn']=$title['emaillienhe_vn'];

include ("libraries/functions.php");
include ("libraries/controls.php");

//kiem tra ngon ngu
if(isset($_GET['tinh'])){
	$lang = strtolower($_GET['tinh']);
	//session_register("lang");
	$_SESSION['tinh'] = $lang;
}elseif(isset($_SESSION['tinh'])){
	$lang = strtolower($_SESSION['tinh']);
}else{
	$lang = 1; //default language
	//session_register("lang");
	$_SESSION['tinh']=$lang;
}

include('language/vn.php');
$_SESSION['tinh']=1;
define("lang","vn");

// map title
$map_title = "<a href = '".BASE_URL."' class = 'linkred'><img src='".BASE_URL.USER_PATH_IMG."icon-home.png'  border='0' /> ".MN_HOME."</a>";
$arrowmap = " <img src='".BASE_URL.USER_PATH_IMG."icon-arrow.png' />";

define('usd','21021');

// meta 
require 'meta.php';


$db = new Models_MWebsite;
$rowbetawebsite = $db->getOneWebsite(1);
if($rowbetawebsite['enable']==0) exit();
?>