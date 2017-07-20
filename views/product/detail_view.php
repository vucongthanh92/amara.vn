<!--zoom ảnh bài viết-->
    <link rel="stylesheet" href="<?=BASE_URL;?>public/smoothzoom/css/smoothzoom.css">
    <script type="text/javascript" src="<?=BASE_URL;?>public/smoothzoom/js/easing.js"></script>
    <script type="text/javascript" src="<?=BASE_URL;?>public/smoothzoom/js/smoothzoom.min.js"></script>
<!--------------------->

<!--<script>
   $(document).ready(function(e) {
	   $(".content_noidung img").load(function()
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

<script type="text/javascript">
$(document).ready(function(){
	$('#etalage a').hover(function(){
		src = $(this).attr('href');
		$('#idIMG').attr('src',src);
	});
})
</script>

<div class="index_middle">
<div class="content">
     
     <!--phần menu left-->
     <div id="accordiondemo">
     <div id="menu_accor">
	     <?php 
		     if($data['parent_cat']!="") echo $data['parent_cat'];
			 else echo "Danh Mục Sản Phẩm";
	     ?>
    </div>
         <!--menu loại sản phẩm-->
         <?php
			 //menu con
			 $idpa = $data['id_cat'];
			 $sql2="select * from category where ticlock='0' and parentid='$idpa' order by sort_order asc, id desc";
			 $ds2=mysql_query($sql2) or die(mysql_error());
			 $row=mysql_num_rows($ds2);
			 if($row==0) 
			 {
				 $click=0;
				 $sql2="select * from category where ticlock='0' and parentid='0' order by sort_order asc, id desc";
				 $ds2=mysql_query($sql2) or die(mysql_error());
			 }
			 else $click=1;
			 $line=mysql_num_rows($ds2);
			 if($line>0) {
			 while($ds_row2=mysql_fetch_assoc($ds2)) {
         ?>
         	 <p <?php if($data['prod']['group_id']==$ds_row2['id']) echo "style='color:#5ACB59;'";?> class="according_child">
             <a href="<?=strtoseo($ds_row2['name'])."-".$ds_row2['id'].".html";?>""><?=$ds_row2['name'];?></a></p>
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
     
     <div class="div_wap_left">
     
     <div id="list_title"><a href="<?=BASE_URL?>">Trang Chủ</a><img class="arrow_icon" src="public/template/images/arrow.gif" />
     <?php if($data['parent_cat']!="") { ?>
     <a href="<?=strtoseo($data['parent_cat'])."-".$data['id_cat'].".html";?>"><?=$data['parent_cat']?></a><img class="arrow_icon" 
     src="public/template/images/arrow.gif" />
     <?php } ?>
     <a href="<?=strtoseo($data['child_catname'])."-".$data['child_catid'].".html";?>"><?=$data['child_catname']?></a>
     </div>
     
     <!--phần mô tả sản phẩm-->
     <div class="hinhcitiet">
          <h1><?php echo $data['prod']['product'] ?></h1>
    	  <div class="image_pro">
               <img src="<?=BASE_URL.PATH_IMG_PRODUCT.$data['prod']['image1']?>" id="detailprod_img" />
          </div>
        
     <div id="info_detail_desktop" class="info_detail">
          <h2>Thông Tin Sản Phẩm</h2>
          <div class="lin"><div id="detail_label">Xuất xứ: </div>
		  <?php
		    if($data['prod']['hangsx']>0)
			{
				$id_hang=$data['prod']['hangsx'];
				$sql4="select * from mn_manufacturer where Id='$id_hang' and ticlock='0'";
				$ds4=mysql_query($sql4) or die(mysql_error());
				$row4=mysql_fetch_assoc($ds4);
			
		?> 
            <a href="<?=BASE_URL."hang-san-xuat/".$row4['Id']."-".strtoseo($row4['title_vn']).".html"?>">
            <img src="<?=BASE_URL."data/Manufacturer/".$row4['images']?>" /></a>
		<?php } ?> <div style="clear:both"></div> 
        </div>
          <p class="lin"><b>Quy cách: </b><?=$data['prod']['quycach'] ?></p>
      
    <p class="lin"><b>Thương hiệu: </b><?=$data['prod']['xuatxu'] ?></p>
        <p class="lin_price">Đơn giá: <span><?=bsVndDot($data['prod']['team_price']); ?> VNĐ</span></p>
        <p class="addcart"><a href="<?=BASE_URL.$data['tinh']."/".substr(strtoseo($data['prod']['product']),0,-1)."_".$data['prod']['id']."/buy.html" ?>">Mua Ngay</a></p>
        
        <div class="lin">
             <div class="lin_vanchuyen">
                  <img class="lin_vanchuyen_img" src="public/template/images/vanchuyen.jpg" />
                  <div class="lin_vanchuyen_info">Miễn Phí Vận Chuyển Trên Toàn Quốc</div>
                  <div style="clear:both"></div>
             </div>
             
             <div class="lin_vanchuyen">
                  <img class="lin_vanchuyen_img" src="public/template/images/thanhtoan.jpg" />
                  <div class="lin_vanchuyen_info">Thanh Toán Khi Nhận Hàng</div>
                  <div style="clear:both"></div>
             </div>
             
        </div> 
        <div class="lin"><div id="lin_tuvan">BẠN CẦN TƯ VẤN, HÃY GỌI</div></div>  
        <p class="lin_hotline"><?=$_SESSION['dienthoai1']?> - <?=$_SESSION['dienthoai2']?></p>   
        </div>
    	<!-------------------------->
        
   </div>
   <?php  if($data['prod']['khuyenmai']!=""){ ?>
   <div class="space_10"></div>
   <div class="div_km">
   	<?=str_replace("../../../","",stripcslashes($data['prod']['khuyenmai'])) ?>
   </div>
   <?php } ?>
      
      <div id="camket_muahang">
           <h3>Cam Kết Mua Hàng</h3>
           <?php
		       $sql="select * from mn_pagehtml where Id='12'";
			   $ds=mysql_query($sql) or die(mysql_error());
			   $row=mysql_fetch_assoc($ds);
			   echo $row['content_'.lang];
		   ?>
      </div>
     
      <!--thông tin bản mobi-->
      <div id="info_detail_mobi" class="info_detail">
          <h2>Thông Tin Sản Phẩm</h2>
          <div class="lin"><div id="detail_label">Xuất xứ: </div>
			   <?php
               if($data['prod']['hangsx']>0)
               {
                 $id_hang=$data['prod']['hangsx'];
                 $sql4="select * from mn_manufacturer where Id='$id_hang' and ticlock='0'";
                 $ds4=mysql_query($sql4) or die(mysql_error());
                 $row4=mysql_fetch_assoc($ds4);
               ?> 
               <img src="<?=BASE_URL."data/Manufacturer/".$row4['images']?>" />
		       <?php } ?> <div style="clear:both"></div> 
          </div>
          <p class="lin"><b>Quy cách: </b><?=$data['prod']['quycach'] ?></p>
          <p class="lin"><b>Thương hiệu: </b><?=$data['prod']['xuatxu'] ?></p>
          <p class="lin_price">Đơn giá: <span><?=bsVndDot($data['prod']['team_price']); ?> VNĐ</span></p>
          <p class="addcart"><a href="<?=BASE_URL.$data['tinh']."/".substr(strtoseo($data['prod']['product']),0,-1)."_".$data['prod']['id']."/buy.html" ?>">Mua Hàng</a></p>
        
        <div class="lin">
             <div class="lin_vanchuyen">
                  <img class="lin_vanchuyen_img" src="public/template/images/vanchuyen.jpg" />
                  <div class="lin_vanchuyen_info">Miễn Phí Vận Chuyển Trên Toàn</div>
                  <div style="clear:both"></div>
             </div>
             
             <div class="lin_vanchuyen">
                  <img class="lin_vanchuyen_img" src="public/template/images/thanhtoan.jpg" />
                  <div class="lin_vanchuyen_info">Thanh Toán Khi Nhận Hàng</div>
                  <div style="clear:both"></div>
             </div>
             
        </div> 
        <div class="lin"><div id="lin_tuvan">BẠN CẦN TƯ VẤN, HÃY GỌI</div></div>  
        <p class="lin_hotline"><?=$_SESSION['dienthoai1']?> - <?=$_SESSION['dienthoai2']?></p>   
     </div>
     
     <div id="camket_muahang_mobi">
           <h3>Cam Kết Mua Hàng</h3>
           <?php
		       $sql="select * from mn_pagehtml where Id='12'";
			   $ds=mysql_query($sql) or die(mysql_error());
			   $row=mysql_fetch_assoc($ds);
			   echo $row['content_'.lang];
		   ?>
      </div>
      <!--------------------->
      
      <div style="clear:both"></div>
      <!--phần nội dung sản phẩm-->
      <div class="div_left" style="position:relative">
      	<div class="tag-detail">
             <p>Thông tin chi tiết</p>
        </div>
        <div class="content_noidung">
        	<?=str_replace("../../../","",stripcslashes($data['prod']['detail'])) ?>
        </div>
     </div>
     
     <div class="space_10"></div>
	    <div class="content_noidung2">
        <?=stripcslashes($data['pagehtml']['content_vn']); ?>
        </div>
   <div class="space_10"></div>
 <p class="addcart"><a href="<?=BASE_URL.$data['tinh']."/".substr(strtoseo($data['prod']['product']),0,-1)."_".$data['prod']['id']."/buy.html" ?>">Mua Hàng</a></p>
        <div class="space_10"></div>
         
        <!-----------endwap_left------------->  
        <?php loadview('pagefixed/partners',$partners); ?>
        </div><!-----------endwap_left------------->  
   
   
    <div class="space_10"></div>
    <div id="spcl_box">
  	    <div id="list_title">Sản Phẩm Liên Quan</div>
        <div class="div_sp_cl">
        <?php
            if(!empty($data['prod_cl'])){
                 foreach($data['prod_cl'] as $item){
        ?>
        <div class="span3  product-item">
    
        <div class="thumb">
        <?php
		    if($item['hot']==1) 
			{
			   echo '<img src="'.BASE_URL.USER_PATH_IMG.'icon-hot.png" border="0"  class="hot_icon"/>';
		    }
			
			if($item['ticnew']==1) 
			{
			   echo '<img src="'.BASE_URL.USER_PATH_IMG.'icon-hot.gif" border="0"  class="sale_icon"/>';
		    }
		?>
        <a rel="nofollow" href="<?=BASE_URL.$item['alias'].".htm" ?>">
           <img class="thumb_image" alt="<?=$item['title'] ?>"  src="<?=BASE_URL.PATH_IMG_PRODUCT.$item['image'] ?>"  title="<?=$item['product'] ?>">        </a>
        </div>
        <div class="title">
        <h2><a title="<?=$item['product'] ?>" href="<?=BASE_URL.$item['alias'].".htm" ?>"><?=$item['product'] ?></a></h2>
        <span class="sell-price"><?=bsVndDot($item['team_price']) ?><sup>đ</sup></span>
            <a rel="nofollow" class="view" href="<?=BASE_URL.$item['alias'].".htm" ?>"></a>
        </div>
        </div>
        <?php }} ?>
        </div>
    </div>
    <div style="clear:both"></div>
    
    <!-------------------->
    
    </div>
</div>

</div>
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