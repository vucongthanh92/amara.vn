<div class="main">
<div class="space_10"></div>
<div class="index_middle">
<?php
$mproduct = new Models_MProduct();
	$mcatelog = new Models_MCatelog;
	if(!empty($data["danhmuc"])){
	foreach($data['danhmuc'] as $row){
		$id = $row['id'];
			$subid = $mcatelog->getSubId($id);
			if($subid != ""){
				$subid = $id.",".substr($subid,0,-1);
				$where = " group_id in ($subid) and ticlock = '0'";
			}else{
				$where = " group_id = '$id' and ticlock = '0' ";
			}
			$pro =  $mproduct -> listdata("*",$where,"rand()",5);
?>
<div class="gripview">
<h3 class="btn_title"><a href="<?=BASE_URL.strtoseo($row['name'])."-".$row['id'].".html" ?>"><?=$row['name'] ?></a> <span><a href="<?=BASE_URL.strtoseo($row['name'])."-".$row['id'].".html" ?>"> Xem hết</a></span></h3>
<?php
	if(!empty($pro)){
		foreach($pro as $item){ 
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
<?php }} ?>
</div>
<?php }} ?>

</div>
</div>

	
       
   