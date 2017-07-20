<div class="index_middle">

<div class="leff_canhan">
<div class="avatar">
<?php
	
	if(file_exists(PATH_IMG_USER.$data['user']['avatar'])&& strlen($data['user']['avatar']) >0) {
		
?>
<div class="inva"><img src="<?=PATH_IMG_USER.$data['user']['avatar'] ?>" width="100"  /></div>
<? } else { ?>
<img src="<?=USER_PATH_IMG ?>noavatar.gif" width="100" />
<? }?>
</div>
<div class="title"><?=$data['user']['username'] ?></div>
<div class="menu">
<a href="<?=BASE_URL ?>doi-anh-dai-dien.html"><img src="<?=USER_PATH_IMG?>icon_student.png"/>Đổi ảnh đại diện</a>
<a href="<?=BASE_URL ?>doi-mat-khau.html"><img src="<?=USER_PATH_IMG?>icon_password.png"/>Đổi mật khẩu</a>
<a href="<?=BASE_URL ?>trang-ca-nhan.html"><img src="<?=USER_PATH_IMG?>icon_thongtin.png"/>Thông tin cá nhân</a>
<a href="<?=BASE_URL ?>lich-su-giao-dich.html"><img src="<?=USER_PATH_IMG?>icon-voice.png"/>Lịch sử giao dich</a>
<a href="<?=BASE_URL ?>thoat.html"><img src="<?=USER_PATH_IMG?>logout.png"/>Thoát</a>
</div>

<!---------------------->
</div>
<div class="right_canhan">
<h2 class="tieudecanhan">Lịch sử giao dịch</h2>

<div class="div_lichsu">

<table cellpadding="0" cellspacing="0">
	<tr class="bg_tren">
		<th>STT</th>
		<th>Họ Tên</th>
		<th>Email</th>
		<th>Điện thoại</th>
		<th>Ngày đặt hàng</th>
        <th>Tình trạng</th>
		<th>Xem</th>
	</tr>
	<?php
	if(empty($data['info'])){ //neu khong co du lieu
	?>
	<tr>
		<td colspan = '9' class = 'emptydata'><?php echo "Không có giao dịch nào"; ?></td>
	</tr>
	<?php
	}
	else //neu co du lieu xuat du lieu ra
	{
		$i=0;
		foreach($data['info'] as $item)
		{
			$i++;
		?>
		<tr>
			<td ><?php echo $i; ?></td>  
			<td><?php echo $item['fullname']; ?></td>
			<td><?php echo $item['email']; ?></td>
			<td><?php echo $item['tel'];?></td>
			<td><?php echo date("d-m-Y",strtotime($item['date']));?></td>
            <td align = 'center'>
			<?php 
			if($item['xuly'] == "1"){
				echo '<span style="color:#1f9af0"> Đã xử lý xong </span>';
			}else{
				echo '<span style="color:#F00"> Đang chờ xử lý </span>';
			}
			?>
			</td>	
			<td align = 'center'><img src = '<?php echo ADMIN_PATH_IMG;?>icon-16-comment.gif' align="Click để xem chi tiết" style="cursor:pointer" onClick="return popitup('<?=BASE_URL ?>orderdetail.php?id=<?=$item['Id'] ?>')" /></td>
			
		</tr>
		<?php
		}
	}
	?>
</table>

</div>


</div>

<script language="javascript" type="text/javascript">
<!--
function popitup(url) {
	newwindow=window.open(url,'chitietdonhang','height=480,width=520,top=100,left=250');
	if (window.focus) {newwindow.focus()}
	return false;
}
// -->
</script>
<div class="space_10"></div>
 </div>