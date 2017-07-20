<div class="wrapper_submenu">
	<div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>city/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-doituong.png">
        </div>
        <div class="text">Thành phố</div>
        </div>
        </a>
	</div>
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
        <div class="text">Deal</div>
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
    	<div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>comment/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-paper.png">
        </div>
        <div class="text">Đánh giá</div>
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
    <td> Quản lý Shop / Thành phố </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
<div class="content">
<div class="list_button">
<a href = '<?php echo BASE_URL_ADMIN;?>city/add' class="button"><span class = 'them'> <img src = '<?php echo ADMIN_PATH_IMG;?>icon-16-plus.png'><?php echo G_ADD; ?></span></a>
</div>
<form action = '<?php echo BASE_URL_ADMIN;?>city/del' method = 'post'  name="rowsForm" id="rowsForm">
<table class="view">
	<tr>
		<th width="50"><input type="checkbox" name="Check_ctr" id = 'Check_ctr' value="yes" onClick="Check(document.rowsForm.check_list)"></th>
		<th>ID</th>
		<th><?php echo TITLE; ?></th>
		<th>Alias</th>
		<th><?php echo SORT; ?></th>
		<th width="80"><?php echo G_LOCK; ?></th>
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
		function TreeCatnews($pid,$data,$text=" __ "){
			foreach($data['info'] as $item)
			{
				if($item['parentid'] == $pid){
					if($pid == "0"){ $cls = "color:red;font-weight:bold;";}else{$cls="";}
			?>
				<tr>
					<td align = 'center'><input type="checkbox" id = 'check_list' name="check_list[]" value="<?php echo $item['id'];?>"><br></td>
					<td><?php echo $item['id']; ?></td>
					<td style="<?=$cls?>" align="left"><a href = '<?php echo BASE_URL_ADMIN;?>city/edit/<?php echo $item['id'];?>' title = 'Sửa'><?php echo $text.$item['name']; ?></a></td>
					<td><?=$item['alias'] ?></td>
					<td align = 'center' width="100"><input type = 'text' size = '5' name = 'sort[<?php echo $item['id'];?>]' value = "<?php echo $item['sort'];?>" style = '<?=$cls?>text-align:center;' /></td>
					<td align = 'center'>
					<?php 
					if($item['ticlock'] == "1"){
						echo "<div id = '".$item['id']."'><a href = 'javascript:ticlockactive(\"".TBL_CITY."\",\"ticlock\",\"".$item['id']."\",\"0\",\"".BASE_URL_ADMIN."\");' title = 'Bỏ khóa'><img src = '".ADMIN_PATH_IMG."icon-16-remove.png'></a></div>";
					}else{
						echo "<div id = '".$item['id']."'><a href = 'javascript:ticlockactive(\"".TBL_CITY."\",\"ticlock\",\"".$item['id']."\",\"1\",\"".BASE_URL_ADMIN."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."icon-16-tick.png'></a></div>"; 
					}
					?>
					</td>
					<td align = 'center' width="50"><a href = '<?php echo BASE_URL_ADMIN;?>city/edit/<?php echo $item['id'];?>' title = 'Sửa'><img src = '<?php echo ADMIN_PATH_IMG;?>b_edit.png'></a></td>
					<td align = 'center' width="50"><a href = '<?php echo BASE_URL_ADMIN."city/del/".$item['id'];?>' title = 'Xóa' onclick = 'javascript:return thongbao("<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src = '<?php echo ADMIN_PATH_IMG;?>b_drop.png'></a></td>
				</tr>
			<?php
					TreeCatnews($item['id'],$data,$text."____ ");
				}
			}
			return;
		}
	
		TreeCatnews(0,$data," ");
	}
	}
	?>
</table>
<div class="list_button">
<a href = '<?php echo BASE_URL_ADMIN;?>city/add' class="button"><span class = 'them'> <img src = '<?php echo ADMIN_PATH_IMG;?>icon-16-plus.png'> <?php echo G_ADD; ?></span></a>
<a href = 'javascript:CheckAll(document.rowsForm.check_list)' class="button">Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'javascript:UnCheckAll(document.rowsForm.check_list)' class="button" >Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmDelete('<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>',document.rowsForm.check_list)" class="button"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_drop.png" alt="Delete" title="Xóa các dòng check" /> Delete</A>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmSave('<?php echo JSM_DO_YOU_REALLY_WANT_TO_SAVE;?>','<?php echo BASE_URL_ADMIN;?>city/save')" class="button"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_save.png" alt="Update" title="Cập nhật thứ tự" /> Save</A>
</div>
</form>
</div>
