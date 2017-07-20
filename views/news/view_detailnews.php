<!--zoom ảnh bài viết-->
    <link rel="stylesheet" href="<?=BASE_URL;?>public/smoothzoom/css/smoothzoom.css">
    <script type="text/javascript" src="<?=BASE_URL;?>public/smoothzoom/js/easing.js"></script>
    <script type="text/javascript" src="<?=BASE_URL;?>public/smoothzoom/js/smoothzoom.min.js"></script>
<!--------------------->

<!--<script>
   $(document).ready(function(e) {
	   $(".detailnews_content img").load(function()
	   {
		   var src = $(this).attr("src");
		   var chieucao = $(this).height();
		   var chieurong = $(this).width();
		   var hinhanh="<a href='"+src+"' data-smoothzoom='group1'>"+"<img src='"+src+"' height='"+chieucao+"' width='"+chieurong+"'></a>";
		   $(this).before(hinhanh);
		   $(this).hide();
	   });
   });
</script>-->

<div class="index_middle">
<div class="content">
<!----------------------------------->
	
    <div id="news_banner"><a href="<?php if($data['banner']['link']!="") echo $data['banner']['link']; else echo BASE_URL."home.html";?>">
         <img src="<?=BASE_URL.PATH_IMG_FLASH.$data['banner']['file_vn']?>"  /></a>
    </div>
    
    
    <!--sản phẩm hot bản desktop-->
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
    
 
<!----------------------------------->
	<div class="Co_LC_Ce">
    <style type="text/css">
	  .info2 {width:530px; min-height:200px; background-color:#edebec; padding:10px; padding-top:5px; float:left; margin-top:10px; margin-left:5px; font-size:12px !important;}
	  .lienhe { width:480px; float:left; overflow:hidden; padding:5px; margin-left:10px; padding-left:0px; margin-top:10px; font-size:12px !important; margin-left:40px;}
	  .lienhe input[type=text] { border:solid 1px #CCC; width:300px; height:20px; margin-top:10px; }
	  #noidung {  border:solid 1px #CCC; width:300px; margin-top:10px; margin-bottom:10px; height:100px;}
	  .lienhe td { font-size:12px !important;}
	  #change-image { cursor:pointer; margin:0px; }
	  #btngui { padding:5px;  border:solid 1px #CCC; border-radius:15px; padding-left:10px; font-weight:bold; padding-right:10px;  margin-top:5px; margin-bottom:10px;}
	  #btngui:hover { color:#F00;}
	  .frmlienhe{ width:320px; height:auto; float:left; padding-left:20px}
	</style>

        <div class="groupnews_title">
             <div class="title_panel"><?=$data['cat']['title_vn'] ?></div>
             <div class="info_panel">Những Bí Quyết Chăm Sóc Sức Khỏe Gia Đình</div>
             <div style="clear:both;"></div>
        </div>
         
        <div class="detailnews_content">
        	<h4 class="title_item1"><?=$data['news']["title_vn"] ?></h4>
        		<?=stripcslashes($data['news']['content_vn']) ?>       
        <div class="space_5"></div>
        
        <div id="tcl">
             <div id="tcl_title">Các Bài Viết Khác</div>
             <?php
                 if(!empty($data['tincungloai'])){
                    while($item2=mysql_fetch_assoc($data['tincungloai'])){
             ?>
                 <div class="tcl_row"><a href="<?=BASE_URL.$item2['alias']."-n".$item2['Id'].".html" ?>">
				      <?=$item2['title_vn']?>
                 </a></div>
             <?php }} ?>
        </div>
        </div>
        
        <!---------phần comment tin tức------------>
        <?php loadview('pagefixed/partners',$partners); ?>        
    </div>
    
    
    <!--sản phẩm hot bản mobi-->
	<div id="sanpham_hot_mobi">
    <div id="sanpham_hot_title">Sản Phẩm Nổi Bật</div>
    <?php
		if(!empty($data['prod_hot_mobi'])){
			 while($row2=mysql_fetch_assoc($data['prod_hot_mobi'])){
	?>
        <div class="span3  product-item">
        <div class="thumb">
        <?php
		 if($row2['hot']==1) {
			echo '<img src="'.BASE_URL.USER_PATH_IMG.'icon-hot.png" border="0"  class="hot_icon"/>';
		 }
		 if($row2['ticnew']==1) {
			echo '<img src="'.BASE_URL.USER_PATH_IMG.'icon-hot.gif" border="0"  class="sale_icon"/>';
		 }
	     ?>
        <a rel="nofollow" href="<?=BASE_URL.$row2['alias'].".htm" ?>">
           <img class="thumb_image" alt="<?=$row2['title'] ?>"  src="<?=BASE_URL.PATH_IMG_PRODUCT.$row2['image'] ?>"  title="<?=$row2['product'] ?>"></a>
        </div>
        <div class="title">
        <h2><a title="<?=$row2['product'] ?>" href="<?=BASE_URL.$row2['alias'].".htm" ?>"><?=$row2['product'] ?></a></h2>
        <span class="sell-price"><?=bsVndDot($row2['team_price']) ?><sup>đ</sup></span>
            <a rel="nofollow" class="view" href="<?=BASE_URL.$row2['alias'].".htm" ?>"></a>
        </div>
        </div>
    <?php }} ?>
    <div style="clear:both"></div>
    </div>
    
    
    <!--phần slide sản phẩm mới-->
	<?php loadview('pagefixed/prod_moi',$moi); ?>
    <!------------------------------>
    
<!----------------------------------->
</div>
<div class="space_10"></div>
</div>

<div id="cty_img"><?php loadview('pagefixed/right',$right); ?></div>
<div style="clear:both"></div>

<script type="text/javascript">
	$(window).load( function() {
		$('img').smoothZoom({
			// Options go here
		});
	});
</script>