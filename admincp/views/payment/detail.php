<style type="text/css">
.cart { border-collapse:collapse; border: solid 1px #DDDDDD;}
.cart td { border: solid 1px #DDDDDD; padding:5px;}
.cart th {
	background: -moz-linear-gradient(100% 100% 90deg, #F0F0F0, #F8F8F8) repeat scroll 0 0 transparent;
    border-bottom: 1px solid #DDDDDD;
    border-top: 1px solid #DDDDDD;
	padding:5px;
}
</style>
<div class="wrapper_submenu">

	 <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>catelog/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-folder.png">
        </div>
        <div class="text">Danh mục</div>
        </div>
        </a>
	</div>
	<div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>product/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-pro.png">
        </div>
        <div class="text">Sản Phẩm</div>
        </div>
        </a>
	</div>


  	<div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>payment/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-checklist.png">
        </div>
        <div class="text">Đơn hàng</div>
        </div>
        </a>
	</div>


</div>
<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
    <tbody>
    <tr>
    <td width="25">
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-pro.png" style="width:23px; height: 23px">
    </td>
    <td> Quản lý Shop / Đơn hàng / Chi tiết </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
<div class="content">
<table>
<tr>
<td style="text-align:left" width="500">
     <h2>
    <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-16-info.png">
    Thông tin khách hàng
    </h2>
<form method="post" action="" enctype="multipart/form-data">
<table>
	<tr>
		<td class = 'title_td'><?php echo BG_HOTEN;?></td>
		<td><?php echo $data['cus']['fullname'];?></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo BG_DIACHI;?></td>
		<td><?php echo $data['cus']['address'];?></td>
	</tr>
	<tr>
		<td class = 'title_td'>Thanh toán</td>
		<td><?php if($data['cus']['methodpay']==1) echo 'Chuyển khoản ngân hàng';
			if($data['cus']['methodpay']==2) echo 'Thanh toán trực tiếp';
			if($data['cus']['methodpay']==3) echo 'Thanh toán khi nhận hàng';
		?> </td>
	</tr>
	<tr>
		<td class = 'title_td'>Tel</td>
		<td><?php echo $data['cus']['tel'];?></td>
	</tr>
	<tr>
		<td class = 'title_td'>Ngày đặt hàng</td>
		<td><?php echo date("d-m-Y",strtotime($data['cus']['date']));?></td>
	</tr>

	<tr>
		<td class = 'title_td'>Ghi chú</td>
		<td><textarea style="width:250px;height:80px" name="note"><?=$data['cus']['note'];?></textarea></td>
	</tr>
    <tr>
        <td colspan="2"><input type="submit" class="button" style="margin-left:250px;" name="editnew" value="Cập nhật"></td>
    </tr>
</table>
</form>
 
</td>
<td valign="top" style="text-align:left">
     <h2>
    <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-16-info.png">
    Thông tin giỏ hàng
    </h2>
<table class="cart">
	<tr>
		<th>STT</th>
		<th>Tên sản phẩm</th>
		<th>Hình sản phẩm</th>
		<th>Số lượng</th>
		<th>Đơn giá</th>
		<th>Tổng giá</th>
	</tr>
	<?php
	$mpro = new Models_MProduct;
	$i=0;
	if(!empty($data['cart']))
	{
		$tongcong = 0;
		foreach($data['cart'] as $item)
		{
			$pro = $mpro->getOneProduct($item['idpro']);
			$price = $pro['team_price'];
			$tong = $price *$item['amount'];
			$tongcong += $tong;
			$i++;
			
		?>
		<tr>
			<td align = 'center'><?php echo $i;?></td>
			<td><?php echo $pro['product'];?></td>
			<td><img src = '<?php echo BASE_URL;?>/data/Product/<?php echo $pro['image']; ?>' width = '60'></td>
			<td align = 'center'><?php echo $item['amount'];?></td>
			<td align = 'right'><?php echo bsVndDot($price);?></td>
			<td align = 'right'><?php echo bsVndDot($tong);?></td>
		</tr>
		<?php 
		} 
	}
	?>
	<tr>
		<td colspan = '5' align = 'right'><b>Tổng cộng</b></td>
		<td align = 'right'><b><?php echo bsVndDot($tongcong);?> VNĐ</b></td>
	</tr>
</table>
</td>
</tr>
</table>
<div class="backlink"><a href="<?=BASE_URL_ADMIN ?>payment/list"> <img src="<?=ADMIN_PATH_IMG ?>back.png" border="0" />Trở lại</a></div>
</div>