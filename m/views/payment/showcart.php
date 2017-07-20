<div class="main">
<div class="menu_theloaideal ">
    <a class="a_menudeal" href="#" onclick="return false">
        <span class="spn_dealcat">Giỏ hàng</span>
    </a>
</div>
<div class="space_10"></div>
<div class="index_middle">
<form action="cap-nhat.html" method="post" id="formupdate">
<table cellspacing="0" cellpadding="0" border="0" class="shopping_cart_detail">
<tbody>
<?php
	$mproduct = new Models_MProduct;
	$tong=0;
	foreach($_SESSION['cart2'] as $k=>$v){
		if($k>0){
		$pro = $mproduct->getOneProduct($k);
		$tong = $tong+$pro['team_price']*$v;
		$prionce = $pro['team_price']*$v;
		$i++;
?>
<tr class="active">
    <th valign="top" align="right" class="left_col" colspan="5">
    <a href="" onclick="return false"><?=$pro['product'] ?></a>
    </th>
</tr>
<tr>
	<td width="9%" valign="top" align="left" class="left_col">
	<a><img width="71" alt="" src="<?=BASE_URL_DATA.PATH_IMG_PRODUCT.$pro['image'] ?>"></a></td>
	<td width="14%" valign="middle" align="left" class="bg_price">
   <p class="book_price"><?=bsVndDot($pro['team_price']) ?> đ</p>
    </td>
    <td> x </td>
    <td width="47%" valign="middle" align="right"> 
    <select class="quanty"  name="quantity[<?=$k ?>]">
    <option value="0" <?php if($v==0) echo 'selected="selected"'; ?> >0</option>
    <option value="1" <?php if($v==1) echo 'selected="selected"'; ?> >1</option>
    <option value="2" <?php if($v==2) echo 'selected="selected"'; ?> >2</option>
    <option value="3" <?php if($v==3) echo 'selected="selected"'; ?> >3</option>
    <option value="4" <?php if($v==4) echo 'selected="selected"'; ?> >4</option>
    <option value="5" <?php if($v==5) echo 'selected="selected"'; ?>>5</option>
    </select>
    </td>
    <td align="right" > = <span style="color:#F00; font-family:Arial, Helvetica, sans-serif; font-size:11px;"><?=bsVndDot($prionce) ?> đ </span></td>
 </tr>
 <tr class="line_null"><td valign="top" align="right" colspan="5"></td></tr>
<?php }} ?>
</tbody>
 </table>
 </form>
<div class="detail_sum">
    <div class="sum_L">Thành tiền:</div>
    <div class="sum_R" id="cartPriceByQuantity"><?=bsVndDot($tong) ?>  đ</div>
</div>
<div class="detail_sum"><div class="sum_L"> Phí vận chuyển:</div><div class="sum_R" id="shippingFee">Miễn phí</div></div>
<div class="detail_sum">
    <div class="sum_L"><strong>Cần thanh toán</strong>:</div>
    <div class="sum_R">
        <p id="cartTotalPrice" class="book_price"><?=bsVndDot($tong) ?> đ</p>
    </div>
</div>
<div class="bg_button">
            <input type="button" value="THANH TOÁN" class="btn_green_big btn_buy" onclick=" window.location='thanh-toan.html'">
        </div>
</div>
</div>
<script type="text/javascript">
$('.quanty').change(function(){
	$('#formupdate').submit();
});
</script>
<?php
	if($tong<=0) redirect(BASE_URL);
?>