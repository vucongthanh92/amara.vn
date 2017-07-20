<div class="listpro_content">

<?php if($data['banner']['file_vn']!="") { ?>
<div id="prod_banner"><a href="<?php if($data['banner']['link']!="") echo $data['banner']['link']; else echo BASE_URL."home.html";?>">
     <img src="<?=BASE_URL.PATH_IMG_FLASH.$data['banner']['file_vn']?>"  /></a>
</div>
<?php } ?>

     <div style="clear:both"></div>
<div class="list_prod">

<div id="list_title"><a href="<?=BASE_URL?>">Trang Chủ</a><img class="arrow_icon" src="<?=BASE_URL."public/template/images/arrow.gif"?>" />
     Hãng Sản Xuất<img class="arrow_icon" src="<?=BASE_URL."public/template/images/arrow.gif"?>" />
     <?=$data['hangsx_title']?>
</div>

   	 <?php
		if(!empty($data['info'])){
			foreach($data['info'] as $item){
				$i++;
	 ?>
     <div class="span3 product-item">
    
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
	     Danh Mục Sản Phẩm
    </div>
         <!--menu loại sản phẩm-->
         <?php
			 //menu con
			 $sql2="select * from category where ticlock='0' and parentid='$idpa' order by sort_order asc, id desc";
			 $ds2=mysql_query($sql2) or die(mysql_error());
			 $row=mysql_num_rows($ds2);
			 if($row==0) $click=0;
			 else $click=1;
			 $line=mysql_num_rows($ds2);
			 if($line>0) {
			 while($ds_row2=mysql_fetch_assoc($ds2)) {
         ?>
                 <div class="according_child"><a href="<?=BASE_URL.strtoseo($ds_row2['name'])."-".$ds_row2['id'].".html";?>">
                 <?=$ds_row2['name'];?></a>
                     <!--lấy danh sách menu con-->
                     <?php
					      $idpa=$ds_row2['id'];
					      $sql4="select * from category where parentid='$idpa' and ticlock='0'";
						  $ds4=mysql_query($sql4) or die(mysql_error());
						  $row4=mysql_num_rows($ds4);
						  if($row4>0) { echo "<div class='according_box'>";
						  while($item4=mysql_fetch_assoc($ds4)) {
					 ?>
                          <div class="according_sub">
                               <a href="<?=BASE_URL.strtoseo($item4['name'])."-".$item4['id'].".html";?>"><?=$item4['name']?></a>
                          </div>
                     <?php } echo "</div>"; } ?>
                     <!--------------------------->
                 </div>
         <?php }} ?>
         
         <?php
              $sql3="select * from mn_flash where location='5' and ticlock='0' limit 1";
              $ds3=mysql_query($sql3) or die(mysql_error());
              $ds_row3=mysql_fetch_assoc($ds3);
              if($ds_row3['file_vn']!="") {
         ?>
         <a href="<?php if($ds_row3['link']!="") echo $ds_row3['link']; else echo BASE_URL."home.html";?>">
            <img id="banner_left" src="<?=BASE_URL."data/Flash/".$ds_row3['file_vn']?>" />
         </a>
         <?php } ?>
    </div>
     <!--end menu left-->
   
   <div style="clear:both"></div>
   
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
            <a href="<?=BASE_URL.strtoseo(stripslashes($row3['title_'.lang]))."-n".$row3['Id'].".html" ?>">
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