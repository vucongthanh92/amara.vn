<div class="wrapper_submenu">
	<div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>partners/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-chuyenmuc.png">
        </div>
        <div class="text">Ảnh Công Ty</div>
        </div>
        </a>
	</div>
    <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>flash/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-image.png">
        </div>
        <div class="text">Banner</div>
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
    <td> Quản lý media / Banner / </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
        

<div class="content">
<div class="list_button">
<a href = '<?php echo BASE_URL_ADMIN;?>flash/add' class="button"> <img src = '<?php echo ADMIN_PATH_IMG;?>icon-16-plus.png'><?php echo G_ADD; ?></a>
</div>

<form action = '<?php echo BASE_URL_ADMIN;?>flash/del' method = 'post'  name="rowsForm" id="rowsForm">
<table  class="view">
	<tr>
		<th width="50"><input type="checkbox" name="Check_ctr" id = 'Check_ctr' value="yes" onClick="Check(document.rowsForm.check_list)"></th>
		<th width="50">ID</th>
		<th>File</th>
		<th>Ảnh</th>
		<th>Vị trí</th>
		<th width="100">Sắp xếp</th>
        <th width="80"><?php echo G_LOCK; ?></th>
		<th colspan = '2' width="30"><?php echo G_ACTION; ?></th>
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
					<td align="center"><?php echo $item['Id']; ?></td>
					<td align="left"><a href = '<?php echo BASE_URL;?>/data/Flash/<?php echo $item['file_vn']; ?>'><?php echo $item['file_vn']; ?></a></td>
					<td>
					<?php if($item['style'] == 1){?>
						<embed width="100" height="50" menu="true" loop="true" play="true" src="<?=BASE_URL ?>/data/Flash/<?=$item['file_vn'];?>" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent"></embed>
					<?php }else{?>
						<img src = "<?=BASE_URL ?>/data/Flash/<?=$item['file_vn']?>" height="50">
					<?php }?>
					</td>
					<td>
						<?php 
						if($item['location'] == 1) echo 'Logo Thương Hiệu';
						if($item['location'] == 11) echo 'Logo Chi Nhánh';
						if($item['location'] == 12) echo 'Logo Giao Hàng';
						if($item['location'] == 2) echo 'Slide Ảnh';
		                if($item['location'] == 3) echo 'Quảng Cáo';
						if($item['location'] == 4) echo 'Banner Sản Phẩm';
						if($item['location'] == 5) echo 'Banner Left';
						if($item['location'] == 6) echo 'Banner Liên Hệ';
						if($item['location'] == 7) echo 'Banner Giới Thiệu';
						if($item['location'] == 8) echo 'Banner Cảm nang Sức Khỏe';
						if($item['location'] == 9) echo 'Banner Cẩm Nang Làm Đẹp';
						if($item['location'] == 10) echo 'Hỏi Đáp';
						?>
					</td>
					<td align = 'center'><input type = 'text' size = '10' name = 'sort[<?php echo $item['Id'];?>]' value = "<?php echo $item['sort'];?>" style = 'text-align:center;' /></td>
                    <td align = 'center'>
					<?php 
					if($item['ticlock'] == "1"){
						echo "<div id = '".$item['Id']."'><a href = 'javascript:ticlockactive(\"".TBL_FLASH."\",\"ticlock\",\"".$item['Id']."\",\"0\",\"".BASE_URL_ADMIN."\");' title = 'Bỏ khóa'><img src = '".ADMIN_PATH_IMG."icon-16-remove.png'></a></div>";
					}else{
						echo "<div id = '".$item['Id']."'><a href = 'javascript:ticlockactive(\"".TBL_FLASH."\",\"ticlock\",\"".$item['Id']."\",\"1\",\"".BASE_URL_ADMIN."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."icon-16-tick.png'></a></div>"; 
					}
					?>
					</td>
					<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN;?>flash/edit/<?php echo $item['Id'];?>' title = 'Sửa'><img src = '<?php echo ADMIN_PATH_IMG;?>b_edit.png'></a></td>
					<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN."flash/del/".$item['Id'];?>' title = 'Xóa' onclick = 'javascript:return thongbao("<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src = '<?php echo ADMIN_PATH_IMG;?>b_drop.png'></a></td>
				</tr>
			<?php
			}
		}
	}
	?>
</table>
<div class="list_button">
<a href = '<?php echo BASE_URL_ADMIN;?>flash/add' class="button" > <img src = '<?php echo ADMIN_PATH_IMG;?>icon-16-plus.png'><?php echo G_ADD; ?></a>
<a href = 'javascript:CheckAll(document.rowsForm.check_list)' class="button">Check all</a>
<a href = 'javascript:UnCheckAll(document.rowsForm.check_list)' class="button">Uncheck all</a>
<a href="javascript:confirmDelete('<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>',document.rowsForm.check_list)" class="button"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_drop.png" alt="Delete" title="Xóa các dòng check" /> Delete</a>

<a href="javascript:confirmSave('<?php echo JSM_DO_YOU_REALLY_WANT_TO_SAVE;?>','<?php echo BASE_URL_ADMIN;?>flash/save')" class="button"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_save.png" alt="Update" title="Cập nhật thứ tự" /> Save</A>
</a>
</div>
</form>
