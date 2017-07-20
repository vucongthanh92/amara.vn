<?php
session_start();
require("header.php");
require("phpmailer/class.phpmailer.php");
require("controllers/pagefixed/pagefixed.php");
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
?>

<!--[if IE]>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<![endif]-->

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title><?php echo $meta['title'];?></title>
	<meta http-equiv = "content-type" content = "text/html;charset=utf-8" />
    <link rel="shortcut icon" href="<?=BASE_URL.USER_PATH_IMG.'suckhoe.png' ?>" type="image/x-icon">
	<meta name = "keywords" content = "<?php echo $meta['keyword'];?>" />
	<meta name = "description" content = "<?php echo $meta['description'];?>" />
	<meta name = "abstract" content = "<?php echo $meta['description'];?>" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <link href='http://amara.vn/' hreflang='vi-vn' rel='alternate'/>
	<link rel= "stylesheet" type = "text/css" href = "<?php echo BASE_URL.USER_PATH_CSS;?>css.css" />
    <link rel= "stylesheet" type = "text/css" href = "<?=BASE_URL ?>public/jqueryui/css/ui-lightness/jquery-ui-1.10.3.custom.css" />
    <link rel= "stylesheet" type = "text/css" href = "<?php echo BASE_URL.USER_PATH_CSS;?>font-awesome.min.css" />
    <link rel= "stylesheet" type = "text/css" href = "<?php echo BASE_URL.USER_PATH_CSS;?>bootstrap-theme.css" />
    <link href="<?=BASE_URL;?>public/owl_carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?=BASE_URL;?>public/owl_carousel/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
 
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.js"></script>
    <script src="<?=BASE_URL?>public/jqueryui/js/jquery-ui-1.10.3.custom.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL.USER_PATH_JS;?>website.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL.USER_PATH_JS;?>time.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL.USER_PATH_JS;?>number.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL.USER_PATH_JS;?>scrolltopcontrol.js"></script>
    <script type="text/javascript" src="<?=BASE_URL?>public/accordion/jquery.magic-accordion.js"></script>
    
    <!-- dropdown menu -->
	<script type="text/javascript" src="<?=BASE_URL?>public/dropdown/ddsmoothmenu.js"></script>
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>public/dropdown/ddsmoothmenu.css" />	
    
    <?=$rowbetawebsite['googleanalytics'] ?>
</head>
<body>


<!--<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4&appId=730787483662945";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>-->


<div id="baseurljs" style="display:none"><?=BASE_URL ?></div>
<div class="index">
	<?php loadview('pagefixed/banner',$banner)?>
    <?php loadview('pagefixed/menu',$menu); ?>
    <?php
	    if($_GET["mod"]=="tin-tuc") $slide=0;
		else if($_GET["mod"]=="lien-he") $slide=0;
		else if($_GET["mod"]=="bai-viet") $slide=0;    
		else if($_GET["mod"]=="payment") $slide=0; 
		else if(($_GET['mod']=='sanpham')) $slide=0;
		else if(isset($_GET['mod'])) $slide=1;
		else $slide=1;
	    if($slide==1) 
	    loadview('pagefixed/slide',$slide); 
	?>
	<?php include 'main.php'; ?>
	<?php loadview('pagefixed/footer',$footer) ?>
</div>
<div class="hotline-popup"><img src="<?=BASE_URL.USER_PATH_IMG ?>hotlinedeal.jpg" />
<!----------
	<div class="yahoo">
		 <a style="margin-left: 3px; padding-top: 7px;" href="ymsgr:sendim?<?=$title['yahoo1'] ?>">
        <img  src="http://opi.yahoo.com/online?u=<?=$title['yahoo1'] ?>&m=g&t=1">
        </a>
     <a style="margin-left: 3px; padding-top: 7px;" href="ymsgr:sendim?<?=$title['yahoo1'] ?>">
    <img  src="http://opi.yahoo.com/online?u=<?=$title['yahoo1'] ?>&m=g&t=1">
    </a>
    </div>
-------------->
</div>
</body>
</html>


