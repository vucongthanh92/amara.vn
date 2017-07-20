<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> Hỗ trợ trực tuyến</h1>
<br/>
<hr/>
<img src = '<?php echo ADMIN_PATH_IMG;?>b_insrow.png'><a href = '<?php echo BASE_URL_ADMIN;?>support/add'><span class = 'them'> <?php echo G_ADD; ?></span></a>
<hr/>

<form action = '<?php echo BASE_URL_ADMIN;?>support/del' method = 'post'  name="rowsForm" id="rowsForm">
<table>
	<caption>Danh sách</caption>
	<tr>
		<th><input type="checkbox" name="Check_ctr" id = 'Check_ctr' value="yes" onClick="Check(document.rowsForm.check_list)"></th>
		<th>ID</th>
		<th>Loại</th>
		<!-- <th><?php echo TITLE; ?></th> -->
		<th>nick</th>
		<th>tên</th>
		<!-- <th>điện thoại</th> -->
		<th><?php echo SORT; ?></th>
		<th><?php echo G_LOCK; ?></th>
		<th colspan = '2'><?php echo G_ACTION; ?></th>
	</tr>
	<?php
	if(empty($data)){ //neu khong co du lieu
	?>
	<tr>
		<td colspan = '7' class = 'emptydata'><?php echo G_EMPTYDATA; ?></td>
	</tr>
	<?php
	}
	else //neu co du lieu xuat du lieu ra
	{
	if(!empty($data['info'])){
			foreach($data['info'] as $item)
			{
			?>
				<tr>
					<td align = 'center'><input type="checkbox" id = 'check_list' name="check_list[]" value="<?php echo $item['Id'];?>"><br></td>
					<td><?php echo $item['Id']; ?></td>
					<td align = 'center'>
					<?php 
					if($item['style'] == '1'){
						echo '<img src = "'.ADMIN_PATH_IMG.'yahoo.png">';
					}else{
						echo '<img src = "'.ADMIN_PATH_IMG.'Skype.png">';
					}					
					?>
					</td>
					<!-- <td><?php echo $item['title_vn']; ?></td> -->
					<td><?php echo $item['nick_vn']; ?></td>
					<td><?php echo $item['name_vn']; ?></td>
					<!-- <td><?php echo $item['phone_vn']; ?></td> -->
					<td align = 'center'><input type = 'text' size = '1' name = 'sort[<?php echo $item['Id'];?>]' value = "<?php echo $item['sort'];?>" style = 'text-align:center;' /></td>
					<td align = 'center'>
					<?php 
					if($item['ticlock'] == "1"){
						echo "<div id = '".$item['Id']."'><a href = 'javascript:ticlockactive(\"".TBL_SUPPORT."\",\"ticlock\",\"".$item['Id']."\",\"0\");' title = 'Bỏ khóa'><img src = '".ADMIN_PATH_IMG."visible.gif'></a></div>";
					}else{
						echo "<div id = '".$item['Id']."'><a href = 'javascript:ticlockactive(\"".TBL_SUPPORT."\",\"ticlock\",\"".$item['Id']."\",\"1\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."invisible.gif'></a></div>"; 
					}
					?>
					</td>
					<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN;?>support/edit/<?php echo $item['Id'];?>' title = 'Sửa'><img src = '<?php echo ADMIN_PATH_IMG;?>b_edit.png'></a></td>
					<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN."support/del/".$item['Id'];?>' title = 'Xóa' onclick = 'javascript:return thongbao("<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src = '<?php echo ADMIN_PATH_IMG;?>b_drop.png'></a></td>
				</tr>
			<?php
			}
	}
	
	}
	?>
</table>
<hr/>
<img src = '<?php echo ADMIN_PATH_IMG;?>b_insrow.png'><a href = '<?php echo BASE_URL_ADMIN;?>support/add'><span class = 'them'> <?php echo G_ADD; ?></span></a>
<a href = 'javascript:CheckAll(document.rowsForm.check_list)'>Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'javascript:UnCheckAll(document.rowsForm.check_list)'>Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmDelete('<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>',document.rowsForm.check_list)"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_drop.png" alt="Delete" title="Xóa các dòng check" /></A>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmSave('<?php echo JSM_DO_YOU_REALLY_WANT_TO_SAVE;?>','<?php echo BASE_URL_ADMIN;?>support/save')"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_save.png" alt="Update" title="Cập nhật thứ tự" /></A>
</form>
<hr/>
