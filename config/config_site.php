<?php
######################################
# general
//fix base

$server_name = $_SERVER['HTTP_HOST'];

define("BASE_URL","http://$server_name/");

//--------config table
define("PREFIX","mn_");
define("TBL_BANNER","".PREFIX."banner");
define("TBL_WEBSITE","".PREFIX."website");
define("TBL_PAGEHTML","".PREFIX."pagehtml");
define("TBL_COMMENTNEW","".PREFIX."commentnew");
define("TBL_CATNEWS","".PREFIX."catnews");
define("TBL_NEWS","".PREFIX."news");
define("TBL_EMAIL","".PREFIX."email");

define("TBL_CATELOG","category");
define("TBL_PRODUCT","team");
define("TBL_STYLEPRODUCT","".PREFIX."product_style");
define("TBL_MANUFACTURER","".PREFIX."manufacturer");
define("TBL_STYLEPRO","".PREFIX."style_pro");
define("TBL_CITY","".PREFIX."city");
define("TBL_THANHVIEN","user");
define("TBL_CUSTOMER","".PREFIX."customer");
define("TBL_CUSTOMER_CART","".PREFIX."customer_cart");


define("TBL_FLASH","".PREFIX."flash");
define("TBL_VIDEO","".PREFIX."video");

define("TBL_ALBUMIMAGE","".PREFIX."album_image");


define("TBL_COMMENT","".PREFIX."comment");
define("TBL_FORUM","".PREFIX."forum");
define("TBL_COUNTER","".PREFIX."counter");
define("TBL_PARTNERS","partner");
define("TBL_GUEST","".PREFIX."guest");
define("TBL_WEBLINK","feedback");
define("TBL_CONTACT","".PREFIX."contact");
define("TBL_ADMIN","".PREFIX."admin");


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

#################################################
# admin

define("BASE_URL_ADMIN","".BASE_URL."admincp/");

//link thu muc hinh anh, css, java cua admin
define("ADMIN_PATH_PUBLIC","".BASE_URL_ADMIN."public/");
define("ADMIN_PATH_JS","".BASE_URL_ADMIN."public/js/");
define("ADMIN_PATH_IMG","".BASE_URL_ADMIN."public/template/");
define("ADMIN_PATH_CSS","".BASE_URL_ADMIN."public/css/");
?>