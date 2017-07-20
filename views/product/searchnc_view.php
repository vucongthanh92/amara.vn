<div class="listpro_content">

<div id="prod_banner"><a href="<?=$data['banner']['link']?>">
     <img src="<?=BASE_URL.PATH_IMG_FLASH.$data['banner']['file_vn']?>"  /></a>
</div>

<div class="div_content_search">
     <div id="list_title">Tìm Kiếm</div>
<?php 
	$j=0;$k=0;
	if(!empty($data['prod'])){
		$i=0;
		foreach ($data['prod'] as $item) {
			$i++;$j++;
			if($i==3){
				$cls = "nomarginright";
				$i=0;
			}else{
				$cls = "";
			}
			$time = $item['end_time']-time();
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
    <a rel="nofollow" href="<?=BASE_URL.$item['alias'].".htm" ?>">
    <img class="listprod_img" alt="<?=$item['product'] ?>"  src="<?=BASE_URL.PATH_IMG_PRODUCT.$item['image'] ?>"  title="<?=$item['product'] ?>"></a>
    </div>
    <div class="meta-icon-deal-new"></div>
    <div class="title">
    <h2><a title="<?=$item['product'] ?>" href="<?=BASE_URL.$item['alias'].".htm" ?>"><?=$item['product'] ?></a></h2>
    <span class="sell-price"><?=bsVndDot($item['team_price']) ?><sup>đ</sup></span>
    	<a rel="nofollow" class="view" href="<?=BASE_URL.$item['alias'].".htm" ?>"></a>
    </div>
    </div>	
	<?php 
		}
	}



if($data['page'] != "")
	echo "<div class = 'paging'>". $data['page']."</div>";
?>
</div>
<div style="clear:both;"></div>
</div>