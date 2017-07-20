<div id="header">
<div id="header_index">
     
     <div id="search_top">
          <div id="search_box">
          <form method="post" action="">
                <input type="text" name="keyword" id="keyword" value="bạn tìm gì..." onclick="if(this.value=='bạn tìm gì...') this.value=''" 
                       onblur="if(this.value=='') this.value='bạn tìm gì...'" />
                <input type="submit" name="btn_search" id="btn_search" value="TÌM" />
          </form>     
          </div>
          <div style="clear:both"></div>
     </div>
     

     <div id="logo">
          <a href="<?=BASE_URL;?>"> 
             <img class="logo_index" id="logo_thuonghieu" src="<?=BASE_URL.PATH_IMG_FLASH.$data["flash"]['logo_thuonghieu']['file_vn']?>" />
             <img class="logo_index" id="logo_chinhanh" src="<?=BASE_URL.PATH_IMG_FLASH.$data["flash"]['logo_chinhanh']['file_vn']?>" />
             <img class="logo_index" id="logo_giaohang" src="<?=BASE_URL.PATH_IMG_FLASH.$data["flash"]['logo_giaohang']['file_vn']?>" />
          </a>
     </div>
<div style="clear:both"></div>
</div>
</div>

<?php
    $dt1 = str_replace(".","",$_SESSION['dienthoai1']);
	$dt1 = str_replace("-","",$dt1);
	$dt2 = str_replace(".","",$_SESSION['dienthoai2']);
	$dt2 = str_replace("-","",$dt2);
?>

<!--<a href="tel:<?=$dt1?>"><div id="icon_dt1"><?=$_SESSION['dienthoai1'];?></div></a>
<a href="tel:<?=$dt2?>"><div id="icon_dt2"><?=$_SESSION['dienthoai2'];?></div></a>-->