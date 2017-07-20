<?php
include('header.php');
$id = $_GET['id'];
$tt = $_GET['tt'];
$sq2 = "select * from `ward-dist` where  id= '".$id."'";
$kq = mysql_query($sq2) or die(mysql_error());
$row = mysql_fetch_assoc($kq);
$tong = $tt +$row['ship'];

?>

<div class="detail_sum">
    <div class="sum_L">Thành tiền:</div>
    <div class="sum_R" id="cartPriceByQuantity"><?=bsVndDot($tt) ?>  đ</div>
</div>
<div class="detail_sum"><div class="sum_L"> Phí vận chuyển:</div><div class="sum_R" id="shippingFee">
<?php
	if($row['ship']<=0) echo "Miễn phí";
	else {
		echo number_format($row['ship'],0,",",".")." VNĐ";
	}
?>
</div></div>
<div class="detail_sum">
    <div class="sum_L"><strong>Cần thanh toán</strong>:</div>
    <div class="sum_R">
        <p id="cartTotalPrice" class="book_price"><?=bsVndDot($tong) ?> đ</p>
    </div>
</div>
<input type="hidden" name="tong" value="<?=$tong ?>"  />


