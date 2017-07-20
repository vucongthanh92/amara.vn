<style type="text/css">
.info2 table {   
	border-collapse: collapse;
    text-align: center;
}
.info2 td,th { 
    border-color: #e1eed4;
    border-style: solid !important;
    border-width: 1px !important;
    padding-bottom: 5px;
    padding-left: 3px;
    padding-right: 3px;
    padding-top: 5px;
	font-size:12px;
}
.info2 th {
	font-size:12px;
	font-weight:normal;
}
 
</style>
<div class="index_middle">
<div class="content_cart">

<h2 class="tieude">
	<?=$data['map_title'] ?>	
</h2>
<div class="clear"></div>
<div class="main">

<!------------------------->
<div class="header-cart">
<span class="title-cart">Giỏ hàng của bạn</span>
<span class="step-cart step1-cart">Cập nhật giỏ hàng</span>
</div>
<div class="info2">	
<p class="title_cat">Danh sách sản phẩm</p>
<div class="space_10" style="height:24px;"></div>
<form action="<?=BASE_URL ?>gio-hang.html" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tbody>
  <tr class="bg_tren">
    <th width="50">STT</th>
	<th width="100">Hình</th>
    <th>Tên sản phẩm</th>
    <th width="70">Số lượng</th>
    <th>Giá</th>
	<th>Xóa</th>
  </tr>
 <?php session_start();
	$mproduct = new Models_MProduct;
 	if(isset($_SESSION["cart2"])) {
	$i =1;
	$dongdonhang = 0;
	foreach($_SESSION['cart2'] as $k=>$v){
	$row = $mproduct->getOneProduct($k);
	$dongdonhang = $dongdonhang + ($row["team_price"] *$v);
 ?>
  <tr>
    <td><?=$i ?></td>
	 <td><img src="<?=PATH_IMG_PRODUCT.$row["image"] ?>" width="80"  /></td>
    <td><?=$row["product"] ?></td>
    <td><input name="soluong[<?=$k ?>]" value="<?=$v ?>"  style="width:40px" /></td>
    <td style="color:#FF0000; font-size:12px; font-weight:bold;"><? echo number_format($row["team_price"],0,",","."); ?> VNĐ</td>
    <td><a href="<?=BASE_URL ?>payment/delcart/<?=$row['id'] ?>-gio-hang.htm"><img src="<?=USER_PATH_IMG ?>icon_delete.png" align="delete" border="0" /></a></td>
  </tr>
 <? 
 	$i++;
 } } else { ?>
 <tr>
    <td colspan="6" align="center" style="background-color:#FFE9E9; color:#FF0000">Không có sản phẩm</td>
    
  </tr>
  <? } ?>
  <tr>
    <td colspan="4" align="right">Tổng giá trị đơn hàng: </td> 
	 <td colspan="2" style="color:#FF0000;font-size:12px; font-weight:bold;" ><? echo number_format($dongdonhang,0,",","."); ?> VNĐ</td> 
  </tr>
 </tbody>
</table>
<div style="text-align:right; margin-top:10px;" class="list_btn_cart">
	
    <img src="<?=USER_PATH_IMG ?>btn_themsanpham_<?=lang ?>.png" border="0" onclick="javasript: history .go(-2)" />
    <input name="btncapnhat" type="image"  src="<?=BASE_URL.USER_PATH_IMG ?>btn_capnhat_vn.png" />
	<span class="scription_logcation"><img src="<?=BASE_URL.USER_PATH_IMG ?>btn_tieptuc_vn.png" onclick="window.location='<?=BASE_URL ?>dat-hang.html'" /></span>
</div>
</form>


</div>
<div class="hd_thanhtoan">
<p class="title_hd"><img src="<?=USER_PATH_IMG ?>den.png" />Hướng dẫn mua hàng</p>
<div class="noidunguongdanmuahang">
<?=NOIDUNGHUONGDANMUAHANG ?>
</div>
</div>
<!----------------->
<div class="space_10"></div>
</div>
</div>
</div>