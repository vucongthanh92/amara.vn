<div class="main">

<div class="index_middle">
<div class="menu_theloaideal ">
    <a class="a_menudeal" href="#" onclick=" return false">
        <span class="spn_dealcat">Tìm kiếm sản phẩm</span>
    </a>
</div>
	<div class="space_10"></div>		
<p style=" margin:5px; margin-top:0px; text-align:left"> Tìm được <b><?=$data["total"] ?></b> Sản phẩm</b>
<div class="space_10"></div>
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
	?>
		<div class="product-item">
                        						
    <div class="thumb">
        <a rel="nofollow" href="<?=BASE_URL.$item['alias'].".htm" ?>">
        <img width="520" border="0" height="250"  src="<?=BASE_URL_DATA.PATH_IMG_PRODUCT.$item['image']  ?>"  style="display: inline; visibility: visible;">                                                            </a>
    </div>
     <div class="meta">
        <span class="sell-price"><?=bsVndDot($item['team_price']) ?><sup>đ</sup></span>
    </div>
    <div class="title">
        <h2><a href="<?=BASE_URL.$item['alias'].".htm" ?>"><?=$item['product'] ?></a></h2>
    </div>
</div>
	<?php 
		}
	}
?>
<?php

if($data['page'] != "")
	echo "<div class = 'paging'>".H_TRANG.": ". $data['page']."</div>";
?>
</div>
<div class = "space-10"></div>
</div>
