<div style="clear:both"></div>

<div id="page_html">
    <div id="news_banner"><a href="<?=$data['banner']['link']?>">
         <img src="<?=BASE_URL.PATH_IMG_FLASH.$data['banner']['file_vn']?>"  /></a>
    </div>
    
    <div id="prodhot">
    <div id="prodhot_info">Sản Phẩm Nổi Bật</div>
    <?php
		if(!empty($data['prod_hot'])){
			 while($row=mysql_fetch_assoc($data['prod_hot'])){
	?>
        <div class="span3  product-item">
        <div class="thumb">
        <?php
		 if($row['hot']==1) {
			echo '<img src="'.BASE_URL.USER_PATH_IMG.'icon-hot.png" border="0"  class="hot_icon"/>';
		 }
		 if($row['ticnew']==1) {
			echo '<img src="'.BASE_URL.USER_PATH_IMG.'icon-hot.gif" border="0"  class="sale_icon"/>';
		 }
	     ?>
        <a rel="nofollow" href="<?=BASE_URL.$row['alias'].".htm" ?>">
           <img class="thumb_image" alt="<?=$row['title'] ?>"  src="<?=BASE_URL.PATH_IMG_PRODUCT.$row['image'] ?>"  title="<?=$row['product'] ?>">        </a>
        </div>
        <div class="title">
        <h2><a title="<?=$row['product'] ?>" href="<?=BASE_URL.$row['alias'].".htm" ?>"><?=$row['product'] ?></a></h2>
        <span class="sell-price"><?=bsVndDot($row['team_price']) ?><sup>đ</sup></span>
            <a rel="nofollow" class="view" href="<?=BASE_URL.$row['alias'].".htm" ?>"></a>
        </div>
        </div>
    <?php }} ?>
    <div style="clear:both"></div>
    </div>
    
    <div class = 'pagehtml_content'>
    <div class="mappage">
         <span class="title_vn"> <a href="<?=BASE_URL?>">Trang Chủ</a>
         <img src="<?=BASE_URL?>public/template/images/arrow.gif" /> 
         <?php echo $data['map_title'];?></span>
    </div>
    <div id="pagehtml_noidung"><?php echo stripslashes($data['content_'.lang]);?></div>
    <div class="space_10"></div>
    </div>
    
    <div style="clear:both"></div>

</div>