<div class="index_middle" style="margin:0 auto; padding-top:65px;" >
<div class="menu_theloaideal ">
    <a class="a_menudeal" href="#">
        <span class="spn_dealcat"><?=$data['cat']['name']?></span>
    </a>
</div>					
<div class="space_10"></div>
<?php 
	$j=0;$k=0;
	
	/*
	 * san pham sieu cap
	 */
	if(!empty($data['pro_1'])){
		$i=0;
		foreach ($data['pro_1'] as $item) {
			
	?>
	<div class="product-item">
                        						
    <div class="thumb">
        <a rel="nofollow" href="<?=BASE_URL.$item['alias'].".htm" ?>">
        <img width="520" border="0" height="250"  src="<?=BASE_URL_DATA.PATH_IMG_PRODUCT.$item['image']  ?>"  style="display: inline; visibility: visible;">                                                            </a>
    </div>
    <div class="info">
        <h2><a href="<?=BASE_URL.$item['alias'].".htm" ?>"><?=$item['product'] ?></a></h2>
        <p class="sell-price"><?=bsVndDot($item['team_price']) ?> đ</p>
    </div>
</div>
	<?php 
		}
	}
	?>
<?php
if($data['page'] != "")
	echo "<div class = 'paging'>". $data['page']."</div>";
?>
</div> 