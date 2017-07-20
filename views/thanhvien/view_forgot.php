<div class="index_middle">
<div class="brackum"><?=$data['map_title']?></div>
<div class="left">
	<div class="box_left">
	<h2 class="title">Danh mục sản phẩm</h2>
    <div class="content_box" id="menuleft">
    	  <ul class="accordion" id="accordion-5">
    	<?php
		$mcat = new Models_MCatelog;
		if(!empty($data["danhmuc"])){
			foreach($data["danhmuc"] as $item){	
		?>
        <li class="dcjq-current-parent <?php if($item['Id']==$data['idcat']) echo "selected"?>" > <a href="danh-muc/<?=$item['alias'] ?>.html" >
        <span><?=$item["title_vn"] ?></span></a>
       	<?php 
		
		if($item['Id']==$data['idcat']){
		if(!empty($data["subcat"])){ ?>
        <ul>
        <?php      
		  foreach ($data["subcat"] as $sub2) {
		 ?>  
		<li>
			 <a href='danh-muc/<?=$sub2['alias'] ?>.html' <?php if($sub2['Id']==$data['idchild']) echo 'class="select_child"'; ?> > <?=$sub2['title_'.lang] ?></a>
		</li>
		<? } ?>
        </ul>
        <?php } } ?>
        </li>
        <?php }} ?>
        </ul>
        <div class="space_5"></div>
    </div>
    </div>
    <div class="space_5"></div>
    
	<div class="box_left">
	<h2 class="title">Sản phẩm bán chạy</h2>
    <div class="content_box">
    	<?php
			if(!empty($data['proleft'])){
				foreach($data['proleft'] as $item){
					$i++;
		?>
        <div class="oncesp">
        	<span class="number"><?=$i ?></span>
        	<a href="<?=$item['alias'].".html" ?>"><img src="<?=BASE_URL ?>timthumb.php?src=<?=BASE_URL.PATH_IMG_PRODUCT.$item['images'] ?>&h=70&w=70&zc=1" width="70" border="0" align="left" /></a>
            <a href="<?=$item['alias'].".html" ?>"> <?=$item['title_vn'] ?></a>
            <p class="price_old"><?=bsVndDot($item['price']) ?> đ</p>
             <p class="price_new"><?=bsVndDot($item['sale_price']) ?> đ</p>
        </div>
        <?php }} ?>
    </div>
    </div>
    <div class="space_5"></div>
    <div class="fb">
    	<div id="fb-root"></div>
		<script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-like-box" data-href="https://www.facebook.com/tapchiphaidep.com.vn" data-width="200" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true"></div>
    </div>
</div>
<div class="right">
	<h1 class="title">Yêu cầu lấy lại mật khẩu</h1>
    <div class="div_category"></div>
<!------------------------------------------>
<div class="form_dangky" style="float:left; text-align:left">
<div class="space_10"></div>
 <form action="" method="post">    
  
    <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr>
        	<td width="35%" align="right">
            	Nhập địa chỉ email <span class="red">*</span>
            </td>
            <td width="65%">
				<input   size="42" type="text" value="<?=$data['email'] ?>" name="email" />			</td>
        </tr>
		    
      
      
        <tr>
         <td></td>
            <td >
				<input size="42" type="submit" value="Gửi" name="btndangnhap" />             </td>
        </tr>
    </table><!-- end table thong tin dang nhao -->
    
 
        
        </form>
</div>
</div>
<div class="space_10"></div>
<!----------------------------------------->
</div>


	