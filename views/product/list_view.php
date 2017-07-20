<script src="<?=BASE_URL?>public/owl_carousel/owl-carousel/owl.carousel.js"></script>

<div class="listpro_content">

<?php if($data['banner']['file_vn']!="") { ?>
<div id="prod_banner"><a href="<?php if($data['banner']['link']!="") echo $data['banner']['link']; else echo BASE_URL."home.html";?>">
     <img src="<?=BASE_URL.PATH_IMG_FLASH.$data['banner']['file_vn']?>"  /></a>
</div>
<?php } ?>

     <div style="clear:both"></div>
<div class="list_prod">

<div id="list_title"><a href="<?=BASE_URL?>">Trang Chủ</a><img class="arrow_icon" src="public/template/images/arrow.gif" />
     <?php if($data['parent_cat']!="") { ?>
     <a href="<?=strtoseo($data['parent_cat'])."-".$data['id_cat'].".html";?>"><?=$data['parent_cat']?></a><img class="arrow_icon" 
     src="public/template/images/arrow.gif" />
     <?php } ?>
     <a href="<?=strtoseo($data['name_cat'])."-".$data['name_cat_id'].".html";?>"><?=$data['name_cat']?></a>
</div>

   	 <?php
		if(!empty($data['info'])){
			foreach($data['info'] as $item){
				$i++;
				$time = $item['end_time']-time();
	 ?>
     <div class="span3  product-item">
    
     <div class="thumb">
     <?php
		if($item['hot']==1) {
			echo '<img src="'.BASE_URL.USER_PATH_IMG.'icon-hot.png" border="0"  class="hot_icon"/>';
		}
		if($item['ticnew']==1) {
			echo '<img src="'.BASE_URL.USER_PATH_IMG.'icon-hot.gif" border="0"  class="sale_icon"/>';
		}
	 ?>
     <a rel="nofollow" href="<?=BASE_URL ?><?=$item['alias'].".htm" ?>">
        <img class="listprod_img" alt="<?=$item['product'] ?>" src="<?=BASE_URL.PATH_IMG_PRODUCT.$item['image'] ?>" title="<?=$item['product'] ?>">
     </a>
     </div>
     <div class="meta-icon-deal-new"></div>
     <div class="title">
     <h2><a title="<?=$item['product'] ?>" href="<?=BASE_URL?><?=$item['alias'].".htm" ?>"><?=$item['product'] ?></a></h2>
     <span class="sell-priceold">
	 <?php
	 if($item['team_priceold']>0) 
	 echo bsVndDot($item['team_priceold'])." đ"; 
	 ?>
    <sup></sup></span>
    <span class="sell-price"><?=bsVndDot($item['team_price']) ?><sup>đ</sup></span>
    	<a rel="nofollow" class="view" href="<?=BASE_URL ?><?=$item['alias'].".htm" ?>"></a>
    </div>
    </div>
    <?php }} ?>
    
    <?php
         if($data['page'] != "")
         echo "<div class = 'paging'>". $data['page']."</div>";
    ?>
    
   </div>
   	
    
    <!--phần menu left-->
    <div id="accordiondemo">
    <div id="menu_accor">
	     <?php 
		     if($data['parent_cat']!="") echo $data['parent_cat'];
			 else echo $data['name_cat'];
	     ?>
    </div>
         <!--menu loại sản phẩm-->
         <?php
                 //menu con
                 $idpa = $data['id_cat'];
                 $sql2="select * from category where ticlock='0' and parentid='$idpa' order by sort_order asc, id desc";
                 $ds2=mysql_query($sql2) or die(mysql_error());
                 $row=mysql_num_rows($ds2);
                 if($row==0) $click=0;
                 else $click=1;
				 $line=mysql_num_rows($ds2);
                 if($line>0) {
                 while($ds_row2=mysql_fetch_assoc($ds2)) {
         ?>
                 <p <?php if($ds_row2['id']==$data['name_cat_id']) echo "style='color:#5ACB59' ";?> 
                 class="according_child"><a href="<?=BASE_URL.strtoseo($ds_row2['name'])."-".$ds_row2['id'].".html";?>">
                 <?=$ds_row2['name'];?></a></p>
         <?php }} ?>
         
         <?php
              $sql3="select * from mn_flash where location='5' and ticlock='0'";
              $ds3=mysql_query($sql3) or die(mysql_error());
              while($ds_row3=mysql_fetch_assoc($ds3)){
                   if($ds_row3['file_vn']!="") {
         ?>
         <a href="<?php if($ds_row3['link']!="") echo $ds_row3['link']; else echo BASE_URL."home.html";?>">
            <img id="banner_left" src="<?=BASE_URL."data/Flash/".$ds_row3['file_vn']?>" />
         </a>
         <?php }} ?>
    </div>
     <!--end menu left-->
   
   <div style="clear:both"></div>
   
   <!--sản phẩm nổi bật-->
   <div class="group_news">
       <div class="groupnews_title">
            <div class="title_panel">Sản Phẩm Nổi Bật</div>
            <div class="info_panel"></div>
            <div style="clear:both;"></div>
       </div>
       <div id="owl-demo3">
          <?php
		    $sql3="select * from team where hot='1' and ticlock='0' order by sort asc, Id desc";
		    $ds3=mysql_query($sql3) or die(mysql_error());
		    while($row3=mysql_fetch_assoc($ds3)) {
				  $idcat=$row3['group_id'];
				  $sql2="select * from category where id='$idcat'";
				  $ds2=mysql_query($sql2) or die(mysql_error());
				  $row2=mysql_fetch_assoc($ds2);
	      ?>
          <div class="span3 product-item">
          <div class="thumb">
          <?php
		    if($row3['hot']==1) {echo '<img src="'.BASE_URL.USER_PATH_IMG.'icon-hot.png" border="0"  class="hot_icon"/>';}
		    if($row3['ticnew']==1) {echo '<img src="'.BASE_URL.USER_PATH_IMG.'icon-hot.gif" border="0"  class="sale_icon"/>';}
	      ?>
          <a href="<?=BASE_URL.$row3['alias'].".htm" ?>">
          <img class="listprod_img" alt="<?=$row3['product'] ?>" src="<?=BASE_URL.PATH_IMG_PRODUCT.$row3['image'] ?>" title="<?=$row3['product'] ?>">
          </a>
          </div>
          
          <div class="meta-icon-deal-new"></div>
               <div class="title">
               <h2><a title="<?=$row3['product'] ?>" href="<?=BASE_URL.$row3['alias'].".htm" ?>"><?=$row3['product'] ?>
               </a></h2>
               <span class="sell-priceold">
	      <?php
	          if($row3['team_priceold']>0) 
	          echo bsVndDot($row3['team_priceold'])." đ"; 
	      ?>
          <sup></sup></span>
          <span class="sell-price"><?=bsVndDot($row3['team_price']) ?><sup>đ</sup></span>
    	  <a class="view" href="<?=BASE_URL.$row3['alias'].".htm" ?>"></a>
          </div>
          </div>
          <?php } ?>
       </div><!--kết thúc slide sản phẩm nổi bật-->
       <div class="customNavigation">
          <a class="btn prev"></a>
          <a class="btn next"></a>
       </div>
       <div style="clear:both;"></div>
  </div>
  <script>
    $(document).ready(function() {
	    var owl = $("#owl-demo3");
		owl.owlCarousel({
			items : 5, //10 items above 1000px browser width
			itemsDesktop : [1000,5], //5 items between 1000px and 901px
			itemsDesktopSmall : [900,4], // betweem 900px and 601px
			itemsTablet: [650,2], //2 items between 600 and 0
			itemsMobile : [480,2],
		    itemsMobile : [350,1]
		});
		// Custom Navigation Events
		$(".next").click(function(){
		  owl.trigger('owl.next');
		})
		$(".prev").click(function(){
		  owl.trigger('owl.prev');
		})
		$(".play").click(function(){
		  owl.trigger('owl.play',1000); //owl.play event accept autoPlay speed as second parameter
		})
		$(".stop").click(function(){
		  owl.trigger('owl.stop');
		})
    });
  </script>
  <!-------------------->
   
   <!--danh mục tin tức-->
  <?php
       while($row2=mysql_fetch_assoc($data['catnews'])) {		   
  ?>
  <div class="group_news">
       <div class="groupnews_title">
            <div class="title_panel"><?=$row2['title_vn']?></div>
            <div class="info_panel"><?=$row2['description_vn']?></div>
            <a href="<?=BASE_URL."c".$row2['Id']."-".$row2['alias'].".html";?>"><div class="panel_xemhet">Xem Hết</div></a>
            <div style="clear:both;"></div>
       </div>
       <?php
	        $idcat=$row2['Id'];
		    $sql3="select * from mn_news where idcat='$idcat' and ticlock='0' order by sort asc, Id desc limit 4";
		    $ds3=mysql_query($sql3) or die(mysql_error());
		    while($row3=mysql_fetch_assoc($ds3)) {
	   ?>
            <a href="<?=BASE_URL.$row3['alias']."-n".$row3['Id'].".html" ?>">
            <div class="box_news">
                 <div class="boxnews_title"><?=$row3['title_vn']?></div>
                 <img class="boxnews_img" src="<?=BASE_URL.PATH_IMG_NEWS.$row3['images'];?>" />
                 <div class="boxnews_mota"><?=$row3['description_vn']?></div>
            </div>
            </a>
       <?php } ?>
       <div style="clear:both;"></div>
  </div>
  <?php } ?>
   
</div>
<div style="clear:both"></div>