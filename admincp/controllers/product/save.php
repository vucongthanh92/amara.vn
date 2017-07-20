<?php

$db = new Models_MProduct;

/*cap nhat thu tu sap xep*/
if(isset($_POST['sort'])){
	$data = $_POST['sort'];
	$db->sortData($data);
}


if(isset($_POST['team_price'])){
	$i=$_POST['team_price'];
	$i = str_replace( '.', '', $i );
	$data = $i;
	$db->editPrice($data);
}
if(isset($_POST['team_priceold'])){
	$i=$_POST['team_priceold'];
	$i = str_replace( '.', '', $i );
	$data = $i;
	$db->editPriceOld($data);
}

redirect(BASE_URL_ADMIN."product/list");

?>