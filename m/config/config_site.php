<?php
######################################
# general
//fix base

$server_name = $_SERVER['HTTP_HOST'];

define("BASE_URL","http://$server_name/");

define("BASE_URL_DATA","http://dealhot.vn/");

//--------config table


define("TBL_PAGEHTML","mn_pagehtml");
define("TBL_CATELOG","category");
define("TBL_PRODUCT","team");
define("TBL_THANHVIEN","user");
################################################
# trang giao dien 

//config thu muc hinh anh, css, java giao dien nguoi dung
define("USER_PATH_JS","public/js/");
define("USER_PATH_CAPTCHA","public/captcha/");
define("USER_PATH_DOWNLOAD","data/download/");
define("USER_PATH_IMG","public/template/images/");
define("USER_PATH_CSS","public/template/css/");

define("PATH_IMG_NEWS","data/News/");
define("PATH_IMG_PRODUCT","data/Product/");
define('PATH_IMG_PARTNERS','data/Partners/');
define('PATH_IMG_PICTURE','data/Picture/');
define('PATH_IMG_FLASH','data/Flash/');

?>