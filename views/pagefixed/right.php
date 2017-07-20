<!-- ảnh công ty -->

<script src="<?=BASE_URL?>public/owl_carousel/owl-carousel/owl.carousel.js"></script>

<h2 class="anhcty_title">Đối tác</h2>

<div id="owl-demo2">
	<?php
	    $sql="select * from partner where ticlock='0'";
		$ds=mysql_query($sql) or die(mysql_error());
		while($item=mysql_fetch_assoc($ds)) {
	?>            
    <div class="item">
         <img class="prodbox_anh" src="<?=BASE_URL."data/images/".$item['images'];?>" />
    </div>
    <?php } ?>
</div>
<div style="clear:both"></div>

<script>
    $(document).ready(function() {
      $("#owl-demo2").owlCarousel({
          autoPlay: 3000, //Set AutoPlay to 3 seconds
          items : 6,
          itemsDesktop : [1199,3],
          itemsDesktopSmall : [979,3]
     
      });
    });
</script>