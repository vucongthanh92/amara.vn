<style type="text/css">
.info3 table {   
	border-collapse: collapse;
    text-align: center;
}
.info3 td,th { 
    border-color: #e1eed4;
    border-style: solid !important;
    border-width: 1px !important;
    padding-bottom: 5px;
    padding-left: 3px;
    padding-right: 3px;
    padding-top: 5px;
	font-size:12px;
}
.info3 th {
	font-size:12px;
	font-weight:normal;
}

.title_hd
{
	text-align:center;
}
 
</style>
<div class="index_middle">
<div class="content_cart">

<div class="clear"></div>
<div class="main">

<!------------------------->
<div class="header-cart">
     <span class="title-cart">Giỏ hàng của bạn</span>
     <span class="step-cart step4-cart">Cập nhật giỏ hàng</span>
</div>

<h2 class="title_order">Thông Tin Đơn Đặt Hàng Từ AMARA.VN</h2>

<div class="info3">	
<p class="title_cat">Thông Tin Đơn Hàng</p>
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
     <div>Chào bạn ! Cảm ơn bạn đã đặt hàng tại HỆ THỐNG SIÊU THỊ SỨC KHỎE GIA ĐÌNH - AMARA VIỆT NAM</div>
     <input name="hoantat" type="button" id="vetrangchu" value="Trở Về Trang Chủ" onclick="location.href='<?=BASE_URL?>'" />
</span>
</div>
</form>
</div>

<?php
     $id_cus=$_SESSION['id_cus'];
	 $sql="select * from mn_customer where Id='$id_cus'";
	 $ds=mysql_query($sql) or die(mysql_error());
	 $item=mysql_fetch_assoc($ds);
?>
<div class="hd_customer">
<p class="title_hd">Thông Tin Người Đặt Hàng</p>
<div class="noidunguongdanmuahang">
     <table id="cus_info" border="0">
         <tr>
             <td class="cus_td">Họ Tên</td>
             <td><?=$item['fullname']?></td>
         </tr>
         <tr>
             <td class="cus_td">Email</td>
             <td><?=$item['email']?></td>
         </tr>
         <tr>
             <td class="cus_td">Địa Chỉ</td>
             <td><?=$item['address']?></td>
         </tr>
         <tr>
             <td class="cus_td">Điện Thoại</td>
             <td><?=$item['tel']?></td>
         </tr>
         <tr>
             <td class="cus_td">Thanh Toán</td>
             <td>
             <?php
			    if($item['methodpay'] == 1) echo "Chuyển khoản ngân hàng ";
			    if($item['methodpay'] == 2) echo "Thanh toán trực tiếp";
			    if($item['methodpay'] == 3) echo "Thanh toán khi nhận hàng";
			 ?>
             </td>
         </tr>
         <tr>
             <td class="cus_td">Ghi Chú</td>
             <td><?=$item['note']?></td>
         </tr>
     </table>
</div>
</div>
<!----------------->
<div class="space_10"></div>
</div>
</div>
</div>
<?php unset($_SESSION['cart2']); ?>