<script src="<?=BASE_URL?>public/owl_carousel/owl-carousel/owl.carousel.js"></script>
<script>
    $(document).ready(function() 
	{
		$("#owl-demo").owlCarousel({
	   
			navigation : true, // Show next and prev buttons
			slideSpeed : 300,
			paginationSpeed : 400,
			singleItem:true
	   
			// "singleItem:true" is a shortcut for:
			// items : 1, 
			// itemsDesktop : false,
			// itemsDesktopSmall : false,
			// itemsTablet: false,
			// itemsMobile : false
	   
		});
    });
</script>

<div class="index_menu">
    <div id="owl-demo" class="owl-carousel owl-theme">
         <?php
             $sql="select * from mn_flash where location='2' and ticlock='0' order by sort asc, Id desc";
             $ds=mysql_query($sql) or die(mysql_error());
             while($item=mysql_fetch_assoc($ds)) {
         ?>
         <div class="item"><img src="<?php echo BASE_URL.PATH_IMG_FLASH.$item['file_vn'];?>" /></div>
         <?php } ?>
    </div>


    <div class="wap_banner_small">
    <?php
    if(!empty($data['adv'])){
        foreach($data['adv'] as $item){
    ?>
    <div class="banner_home">
    <a href="<?=$item['link'] ?>" target="_blank"><img src="<?php echo PATH_IMG_FLASH.$item['file_vn'];?>" border="0" width="250" /></a> </div>
    <?php }} ?>
    </div>


    <div id="quangcao">
    <?php
        $sql2="select * from mn_flash where location='3' and ticlock='0' order by sort asc, Id desc";
        $ds2=mysql_query($sql2) or die(mysql_error());
		if($ds2!="") {
        while($item2=mysql_fetch_assoc($ds2)) {
    ?>
        <a href="<?=$item2['link'] ?>"><img src="<?php echo BASE_URL.PATH_IMG_FLASH.$item2['file_vn'];?>" /></a>
    <?php }} ?>
    </div>
    
    <div id="hotnews">
         <?php
              $sql3="select * from mn_news where ticlock='0' and home='1' order by sort asc, Id desc limit 2";
              $ds3=mysql_query($sql3) or die(mysql_error());
              while($item3=mysql_fetch_assoc($ds3)) {
         ?>
         <div class="hotnews_box">
              <a href="<?=BASE_URL.strtoseo(stripslashes($item3['title_'.lang]))."-n".$item3['Id'].".html" ?>">
              <img src="<?=BASE_URL.PATH_IMG_NEWS.$item3['images'];?>" />
              <div class="hotnews_info">
                   <div class="hotnews_title"><?=$item3['title_vn'];?></div>
                   <div class="hotnews_mota"><?=$item3['description_vn'];?></div>
              </div>
              </a>
         </div>
         <?php } ?>
    </div>
</div>

<script>
    $(document).ready(function(e) {
          $(".hotnews_box:odd").css("margin-right","0px");
    });
</script>