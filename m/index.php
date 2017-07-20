<?php
require("header.php");
require("controllers/pagefixed/pagefixed.php");
?>
<!--[if IE]>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<title><?php echo $meta['title'];?></title>
	<meta http-equiv = "content-type" content = "text/html;charset=utf-8" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta name = "keywords" content = "<?php echo $meta['keywork'];?>" />
	<meta name = "description" content = "<?php echo $meta['keywork'];?>" />
	<meta name = "abstract" content = "<?php echo $meta['keywork'];?>" />
    <link rel="shortcut icon" href="<?=BASE_URL.USER_PATH_IMG.'icon-deal.jpg' ?>" type="image/x-icon">
   <meta name="google-site-verification" content="hlboqMjEPC3cSzWNNmFweFauWUfUNsJLV7Bsr0Of1I8" />
	<base href = "<?php echo BASE_URL;?>" />
	<link rel= "stylesheet" type = "text/css" href = "<?php echo USER_PATH_CSS;?>css.css" />
	<script type="text/javascript" src="<?php echo USER_PATH_JS;?>jquery-1.5.1.min.js"></script>
    <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-41471529-1', 'dealxinh.com');
			  ga('send', 'pageview');
		
	</script>
    <script type="text/javascript">
	$(document).ready(function() { 
			
			$('#iconshow').click(function(){
				id = $(this).attr("idshow");
				if(id==0){
					$('.sidr_left').animate({'left':0},'slow');
					$(this).attr("idshow",1);
					$('.index').animate({'left':260},'slow');
		
				} else {
					
					$('.sidr_left').animate({'left':-260},'slow');
					$(this).attr("idshow",0);
					$('.index').animate({'left':0},'slow');
		
				}
			});
			
		});
	</script>
</head>
<body>
	<div class="sidr_left">
    	<div class="search-menu">
        <form class="form-search-box" action="index.php" name="search-box">
            <input type="text" placeholder="Tìm Deal?" class="search-textbox" name="tukhoa" />
            <input type="hidden" value="sanpham" name="mod" />
            <input type="hidden" value="timkiem" name="act" />
        </form>
    	</div>
        <ul class="catalog-menu">
        <?php
		$mncatelog = new Models_MCatelog;
		$mproduct = new Models_MProduct();
		$catlist = $mncatelog->listdata('id, ename,name', 'ticlock = "0" AND parentid = "0"','sort_order asc, Id desc');
		
		
		if(!empty($catlist)){
			foreach($catlist as $item){

		?>
          	<li class="first-level catalog-menu-<?=$item['id'] ?> ">
                <a href="<?=BASE_URL.strtoseo($item['name'])."-".$item['id'].".html" ?>"><?=$item['name'] ?></a>
            </li>
        <?php }} ?>
         </ul>
    </div>
    <div class="index">
    
	<?php loadview('pagefixed/banner',$banner)?>
	<?php include 'main.php';?>
    <?php loadview('pagefixed/footer',$footer)?>
    </div>
</body>
</html>


