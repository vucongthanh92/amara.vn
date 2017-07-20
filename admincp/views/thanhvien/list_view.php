<div class="wrapper_submenu">
	<div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>website/edit/1">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-cauhinh.png">
        </div>
        <div class="text">Cấu hình site</div>
        </div>
        </a>
	</div>
    <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>user/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-user.png">
        </div>
        <div class="text">Admin</div>
        </div>
        </a>
	</div>
    <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>thanhvien/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-nguoilienhe.png">
        </div>
        <div class="text">Thành viên</div>
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
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-image.png" style="width:23px; height: 23px">
    </td>
    <td> Hệ thống / Quản lý thành viên  </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
<div class="content">
<div class="list_button">
<a href = '<?php echo BASE_URL_ADMIN;?>thanhvien/add' class="button"><span class = 'them'> <img src = '<?php echo ADMIN_PATH_IMG;?>icon-16-plus.png'><?php echo G_ADD; ?></span></a>
</div>
<form action = '<?php echo BASE_URL_ADMIN;?>thanhvien/del' method = 'post'  name="rowsForm" id="rowsForm">
<table class="view">
	<tr>
		<th width="50"><input type="checkbox" name="Check_ctr" id = 'Check_ctr' value="yes" onClick="Check(document.rowsForm.check_list)"></th>
		<th width="50">id</th>
	
        <th>Email</th>
        <th>Điện thoại</th>
		<th width="150">Ngày tham gia</th>
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
					<td align = 'center'><input type="checkbox" id = 'check_list' name="check_list[]" value="<?php echo $item['id'];?>"><br></td>
					<td><?php echo $item['id']; ?></td>
				
                    <td align="left"><a href = '<?php echo BASE_URL_ADMIN;?>thanhvien/edit/<?php echo $item['id'];?>' title = 'Sửa'><?php echo $item['email']; ?></a></td>
                    	<td align="left"><a href = '<?php echo BASE_URL_ADMIN;?>thanhvien/edit/<?php echo $item['id'];?>' title = 'Sửa'><?php echo $item['mobile']; ?></a></td>
					<td>
					<? echo date("d/m/Y",strtotime($item['date'])); ?>
					</td>

					<td align = 'center' width="50"><a href = '<?php echo BASE_URL_ADMIN;?>thanhvien/edit/<?php echo $item['id'];?>' title = 'Sửa'><img src = '<?php echo ADMIN_PATH_IMG;?>b_edit.png'></a></td>
					<td align = 'center' width="50"><a href = '<?php echo BASE_URL_ADMIN."thanhvien/del/".$item['id'];?>' title = 'Xóa' onclick = 'javascript:return thongbao("<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src = '<?php echo ADMIN_PATH_IMG;?>b_drop.png'></a></td>
				</tr>
			<?php
			}
		}
	}
	?>
</table>
<div class="list_button">
<a href = '<?php echo BASE_URL_ADMIN;?>thanhvien/add' class="button"><span class = 'them'> <img src = '<?php echo ADMIN_PATH_IMG;?>icon-16-plus.png'><?php echo G_ADD; ?></span></a>
<a href = 'javascript:CheckAll(document.rowsForm.check_list)' class="button">Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'javascript:UnCheckAll(document.rowsForm.check_list)' class="button">Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmDelete('<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>',document.rowsForm.check_list)" class="button"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_drop.png" alt="Delete" title="Xóa các dòng check" /> Delete</A>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmSave('<?php echo JSM_DO_YOU_REALLY_WANT_TO_SAVE;?>','<?php echo BASE_URL_ADMIN;?>thanhvien/save')" class="button"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_save.png" alt="Update" title="Cập nhật thứ tự" /> Save</A>
</div>
</form>
</div>
