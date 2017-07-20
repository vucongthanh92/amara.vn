<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> <?php echo YCBG_VIEW_TITLE; ?></h1>
<br/>
<hr/>
<table>
	<tr><th colspan = '2'>Thông tin khách hàng</th></tr>
	<tr>
		<td class = 'title_td'><?php echo BG_HOTEN;?></td>
		<td><?php echo $data['info']['fullname'];?></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo BG_DIACHI;?></td>
		<td><?php echo $data['info']['address'];?></td>
	</tr>
	<tr>
		<td class = 'title_td'>Tel</td>
		<td><?php echo $data['info']['tel'];?></td>
	</tr>
	<tr>
		<td class = 'title_td'>Fax</td>
		<td><?php echo $data['info']['fax'];?></td>
	</tr>
	<tr>
		<td class = 'title_td'>Email</td>
		<td><?php echo $data['info']['email'];?></td>
	</tr>
	<tr>
		<td class = 'title_td'>Ghi chú</td>
		<td><?php echo $data['info']['note'];?></td>
	</tr>
</table>
<br/>
Thiết bị cần báo giá:
<br/>
<table>
	<tr>
		<th>STT</th>
		<th>Tên thiết bị</th>
		<th>Số lượng</th>
	</tr>
	<?php
	$i=0;
	if(!empty($data['tb']))
	{
		foreach($data['tb'] as $item)
		{
			$i++;
		?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $item['nametb'];?></td>
			<td><?php echo $item['numbers'];?></td>
		</tr>
		<?php 
		} 
	}
	?>
</table>
