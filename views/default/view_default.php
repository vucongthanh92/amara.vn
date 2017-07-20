<div class="space_10"></div>
<div class="default_page">
<div class="content">
	<?php
	$mnproduct = new Models_MProduct;
	$mcatelog = new Models_MCatelog;
	if(!empty($data['cat'])){
		foreach($data['cat'] as $row) 
		{
			$id = $row['id'];
			$subid = $mcatelog->getSubId($id);
			if($subid != ""){
				$subid = $id.",".substr($subid,0,-1);
				$where = " group_id in ($subid) and home = '1' and ticlock = '0'";
			}else{
				$where = " group_id = '$id' and home = '1' and ticlock = '0' ";
			}
			$pro =  $mnproduct -> listdata("*",$where,"Id desc",4);
	?>
    <div class="bg_box">
    <h2 class="title_main">
       <div class="title_main_left"><?=$row['name'];?></div>
       <img class="title_main_img" src="public/template/images/bg_default_title1.png" />
       <a href="<?=BASE_URL.strtoseo($row['name'])."-".$row['id'].".html";?>"><div class="panel_xemhet">Xem hết</div></a>
    </h2>
   
   <div class="index_danhmuc">
   <div class="index_danhmuc_title">Gợi Ý Mua Sắm</div>
   <?php
        $sql="select * from category where parentid='$id' and display='1'";
		$ds=mysql_query($sql) or die(mysql_error());
		while($ds_row=mysql_fetch_assoc($ds)) {
   ?>
        <div><a href="<?=strtoseo($ds_row['name'])."-".$ds_row['id'].".html"?>">
		     <?=$ds_row['name'];?></a></div>
   <?php } ?>
   </div>
   
   <div class="div_content_deal" id="div_content_deal">
   	<?php
	
		if(!empty($pro)){
			foreach($pro as $item){
				$i++;
				
				//echo date('d-m-y H:i:s',$item['end_time']);
				$time = $item['end_time']-time();
	?>
    <div class="span3  product-item">
    <div class="thumb">
    
    <!--phần icon khuyến mãi giảm giá bán chạy-->
    <?php
		if($item['hot']==1) {
			echo '<img src="'.BASE_URL.USER_PATH_IMG.'icon-hot.png" border="0"  class="hot_icon"/>';
		}
		if($item['ticnew']==1) {
			echo '<img src="'.BASE_URL.USER_PATH_IMG.'icon-hot.gif" border="0"  class="sale_icon"/>';
		}
	 ?>
    <!------------------------------------------>
    <a rel="nofollow" href="<?=$item['alias'].".htm" ?>">
    <img class="thumb_image" alt="<?=$item['product'] ?>"  src="<?=PATH_IMG_PRODUCT.$item['image'] ?>"  title="<?=$item['product'] ?>" >                                            </a>
    </div>
    <div class="meta-icon-deal-new"></div>
    <div class="title">
    <h2><a title="<?=$item['product'] ?>" href="<?=$item['alias'].".htm" ?>"><?=$item['product'] ?></a></h2>
    <span class="sell-price"><?=bsVndDot($item['team_price']) ?><sup>đ</sup></span>
    	<a rel="nofollow" class="view" href="<?=$item['alias'].".htm" ?>"></a>
    </div>
    </div>
    <?php }} ?>
    
   </div>
	</div>
  <?php }} ?>
  
  
  <!--danh mục tin tức-->
  <?php
       while($row2=mysql_fetch_assoc($data['catnews'])) {		   
  ?>
  <div class="group_news">
       <div class="groupnews_title">
            <div class="title_panel"><?=$row2['title_vn']?></div>
            <div class="info_panel"><?=$row2['description_vn']?></div>
            <a href="<?=BASE_URL."c".$row2['Id']."-".$row2['alias'].".html";?>"><div class="panel_xemhet">Xem hết</div></a>
            <div style="clear:both;"></div>
       </div>
       <?php
	        $idcat=$row2['Id'];
		    $sql3="select * from mn_news where idcat='$idcat' and Noibat='1' and ticlock='0' order by sort asc, Id desc limit 4";
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
</div>

<div id="cty_img"><?php loadview('pagefixed/right',$right); ?></div>
<div style="clear:both"></div>

<script>
     $(document).ready(function(e) {
          $(".title_main_img:odd").attr("src","public/template/images/bg_default_title2.png");
     });
</script>

<!--kiểm tra phiên bản của trình duyệt-->
<script>
    $(document).ready(function(e) {
		 var i=browserName();
		 if(i=='Chrome')
		 {
			 $(".title_main_left").css("padding-top","10px");
		 }
    });
	
	function browserName(){
		 var Browser = navigator.userAgent;
		 if (Browser.indexOf('MSIE') >= 0){
			 Browser = 'MSIE';
		 }
		 else if (Browser.indexOf('Firefox') >= 0){
			 Browser = 'Firefox';
		 }
		 else if (Browser.indexOf('Chrome') >= 0){
			 Browser = 'Chrome';
		 }
		 else if (Browser.indexOf('Safari') >= 0){
			 Browser = 'Safari';
		 }
		 else if (Browser.indexOf('Opera') >= 0){
			 Browser = 'Opera';
		 }
		 else{
			 Browser = 'UNKNOWN';
		 }
	 return Browser;
	}
</script>