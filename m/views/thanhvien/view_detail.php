<div class="main">
<div class="menu_theloaideal ">
    <a class="a_menudeal" href="#">
         <span class="spn_dealcat">Chào, <?=$_SESSION['login_username']; ?> !</span>
    </a>
</div>
<div class="space_10"></div>
<div class="index_middle">


<div class="index_header1">
    <div class="header">
        <p class="logo">
            <input type="button" onclick="window.history.back();" class="btn_back"></p>
        <p class="text_top">LƯỢC SỬ GIAO DỊCH</p>
    </div>
</div>

<div id="divlistOrderdetail" class="index_middle">
<div class="space_10"></div>
 <?php
  $id = $_GET['id'];
$sql = "select * from `order` where `id` = '".$id."'";
$kq = mysql_query($sql) or die (mysql_error());
$row = mysql_fetch_assoc($kq);

$sql2 = "select *from `user` where `id` = '".$row['user_id']."'";
$kq2 = mysql_query($sql2);
$user = mysql_fetch_assoc($kq2);
?>      

<table>
	<tr><th colspan = '2'>Thông tin khách hàng</th></tr>
    
    
	<tr>
		<td class = 'title_td'>Họ tên</td>
		<td><?php echo $row['realname'];?></td>
	</tr>
	<tr>
		<td class = 'title_td'>Địa chỉ</td>
		<td><?php echo $row['address'];?></td>
	</tr>
	
	<tr>
		<td class = 'title_td'>Điện thoại</td>
		<td><?php echo $row['mobile'];?></td>
	</tr>
	<tr>
		<td class = 'title_td'>Ngày đặt</td>
		<td><?php echo date("d-m-Y",$row['create_time']);?></td>
	</tr>
	<tr>
		<td class = 'title_td'>Thanh toán</td>
		<td><?php echo $row['condbuy'];
			
		?></td>
	</tr>

	<tr>
		<td class = 'title_td'>Ghi chú</td>
		<td><?php echo $row['remark'];?></td>
	</tr>
</table>
<div class="space_10"></div>
<p style="text-align:left" ><b>Giỏ hàng:</b></p>
<div class="space_10"></div>
<table>
	<tr class="bg_tren">
		<th>STT</th>
		<th width="150">Tên sản phẩm</th>
		<th>SL</th>
		<th>Đơn giá</th>
		<th>Tổng giá</th>
	</tr>
	<?php
	$sql3 = "select * from  `cart` where order_id = ".$row['id'];
	$kq3 = mysql_query($sql3);
		$tongcong = 0;
		while($item = mysql_fetch_assoc($kq3))
		{
			
			
			$sql4 = "select * from team where id = ".$item['team_id'];
			$kq4 = mysql_query($sql4);
			$pro = mysql_fetch_assoc($kq4);
			$price = $item['price'];
			$tong = $item['price'] * $item['soluong'];
			$tongcong += $tong;
			$i++;
		?>
		<tr>
			<td align = 'center'><?php echo $i;?></td>
			<td><?php echo $pro['product'];?></td>
			<td align = 'center'><?php echo $item['soluong'];?></td>
			<td align = 'right'><?php echo number_format($item['price'],0,",",".");?></td>
            <td align = 'right'><?php echo number_format($tong,0,",",".");?></td>
		</tr>
		<?php 
		} 
	?>
	<tr>
		<td colspan = '4' align = 'right'><b>Tổng cộng</b></td>
		<td align = 'right'><b><?php echo number_format($tongcong,0,",",".");?></b></td>
	</tr>
    <tr>
		<td colspan = '5' align="right" ><?php echo $row['ship']." vnđ"; ?></td>
		
	</tr>
    <tr>
		<td colspan = '4' align = 'right'><b>Tổng thanh toán</b></td>
		<td align = 'right'><b><?php echo number_format($row['origin'],0,",",".");?></b></td>
	</tr>
</table>
</div>

</div>
</div>
	