<div class="index_middle">
<div class="content">
     <div style="clear:both"></div>
<!----------------------------------->
	
    <div id="news_banner"><a href="<?php if($data['banner']['link']!="") echo $data['banner']['link']; else echo BASE_URL."home.html";?>">
         <img src="<?=BASE_URL.PATH_IMG_FLASH.$data['banner']['file_vn']?>"  /></a>
    </div>
    
	<div id="prodhot">
         <div id="prodhot_info">Sản Phẩm Nổi Bật</div>
         <?php
            if(!empty($data['prod_hot'])){
                 while($item2=mysql_fetch_assoc($data['prod_hot'])){
         ?>
         <div class="prodhot_box">
         <div class="thumb">
         <?php
		 if($item2['hot']==1) {
			echo '<img src="'.BASE_URL.USER_PATH_IMG.'icon-hot.png" border="0"  class="hot_icon"/>';
		 }
		 if($item2['ticnew']==1) {
			echo '<img src="'.BASE_URL.USER_PATH_IMG.'icon-hot.gif" border="0"  class="sale_icon"/>';
		 }
	     ?>
         <a rel="nofollow" href="<?=BASE_URL.$item2['alias'].".htm" ?>">
           <img class="prodhot_image" alt="<?=$item2['title'] ?>"  src="<?=BASE_URL.PATH_IMG_PRODUCT.$item2['image'] ?>"  title="<?=$item2['product'] ?>">         </a>
         </div>
         <div class="title">
         <h2><a title="<?=$item2['product'] ?>" href="<?=BASE_URL.$item2['alias'].".htm" ?>"><?=$item2['product'] ?></a></h2>
         <span class="sell-price"><?=bsVndDot($item2['team_price']) ?><sup>đ</sup></span>
            <a rel="nofollow" class="view" href="<?=BASE_URL.$item2['alias'].".htm" ?>"></a>
         </div>
         </div>
         <?php }} ?>
    </div>
 
<!----------------------------------->
	<div class="Co_LC_Ce">
    
         <div class="groupnews_title">
            <div class="title_panel"><?=$data['info_cat']['title_vn'] ?></div>
            <div class="info_panel">Những Bí Quyết Chăm Sóc Sức Khỏe Gia Đình</div>
            <div style="clear:both;"></div>
         </div>
         
         <div class="listnews_content">
		 <?php
            if(!empty($data['info'])){
              foreach($data['info'] as $k=>$item)
              {
         ?>
              <div class="news">
              <h3><a href="<?=BASE_URL.$item['alias']."-n".$item['Id'].".html" ?>" title="<?=stripslashes($item['title_'.lang])?>">
			      <?=stripslashes($item['title_'.lang])?></a></h3>
              <div class="images">
                   <a href="<?=BASE_URL.$item['alias']."-n".$item['Id'].".html"?>" title="<?=stripslashes($item['title_'.lang])?>">
                   <?php
                    if($item['images']!=""){
                        if(file_exists(PATH_IMG_NEWS.$item['images'])){
                   ?>
                    <img src="<?=BASE_URL.PATH_IMG_NEWS.$item['images']?>" width="120" height="90" class="img_left" alt="<?=$item['title_'.lang]?>">
                    <?php }
                        else {echo '<img src="'.BASE_URL.USER_PATH_IMG.'no_image.jpg" border="0" class="img_left"  >';}
                    
                    } else{ 
                        echo '<img src="'.USER_PATH_IMG.'no_image.jpg" border="0" class="img_left"  >';
                    } ?>
                    </a>
                    </div>
                    <!--<h2 class="date_news">Ngày đăng: <?=date("d/m/Y",strtotime($item['date'])) ?> - Lượt xem: <?=$item["visit"] ?></h2>-->
                    <p><?php echo stripslashes($item['description_'.lang]);?> </p>
                    <div class="xemtep">
                       <a  href="<?=BASE_URL.$item['alias']."-n".$item['Id'].".html"?>" title="<?=stripslashes($item['title_'.lang])?>">Xem Thêm</a>
                    </div>
                    <div class="clear"></div> 
                </div>
                
        <?php }} else {
            echo "updating...";
            }
        ?>
        
        <?php
        //xuat phan trang
        if($data['page'] != "")
            echo "<div class = 'paging'>". $data['page']. "</div>";
        ?>
        </div>
    </div>
<!----------------------------------->
    <div style="clear:both"></div>
</div>

<!--phần slide sản phẩm mới-->
<?php loadview('pagefixed/prod_moi',$moi); ?>
<!------------------------------>

<div style="clear:both"></div>
</div>