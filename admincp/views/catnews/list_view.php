<div class="wrapper_submenu">
	<div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>catnews/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-square.png">
        </div>
        <div class="text">Chủ đề</div>
        </div>
        </a>
	</div>
    <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>news/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-write.png">
        </div>
        <div class="text">Bài viết</div>
        </div>
        </a>
	</div>
    <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>pagehtml/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-paper.png">
        </div>
        <div class="text">Mở Rộng</div>
        </div>
        </a>
	</div>
    <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>weblink/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-paper.png">
        </div>
        <div class="text">Thông báo mới</div>
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
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-square.png" style="width:23px; height: 23px">
    </td>
    <td> Quản lý nội dung / Chủ đề bài viết / </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
        

<div class="content">
<div class="list_button">
<a href = '<?php echo BASE_URL_ADMIN;?>catnews/add' class="button"><img src = '<?php echo ADMIN_PATH_IMG;?>icon-16-plus.png'> <?php echo G_ADD; ?></a>
</div>

<form action = '<?php echo BASE_URL_ADMIN;?>catnews/del' method = 'post'  name="rowsForm" id="rowsForm">
<table class="view">	<tr>
		<th width="50"><input type="checkbox" name="Check_ctr" id = 'Check_ctr' value="yes" onClick="Check(document.rowsForm.check_list)"></th>
		<th width="50">ID</th>
		<th><?php echo TITLE; ?></th>
        <th>Mô Tả</th>
        <th width="100"><?php echo SORT; ?></th>
        <th width="100">Home</th>
		<th width="50">Bật / Tắt</th>
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
		function TreeCatnews($pid,$data,$text="--"){
			foreach($data as $item)
			{
				if($item['parentid'] == $pid){
			?>
				<tr>
					<td align = 'center'><input type="checkbox" id = 'check_list' name="check_list[]" value="<?php echo $item['Id'];?>"><br></td>
					<td><?php echo $item['Id']; ?></td>
					<td align="center"><a href = '<?php echo BASE_URL_ADMIN;?>catnews/edit/<?php echo $item['Id'];?>' title = 'Sửa'><?php echo $text.$item['title_vn']; ?></a></td>
                    <td align="center"><?php echo $item['description_vn']; ?></td>
					<td align = 'center'><input type = 'text' size = '5' name = 'sort[<?php echo $item['Id'];?>]' value = "<?php echo $item['sort'];?>" style = 'text-align:center;' /></td>
                    <td align = 'center'>
					<?php
                    if($item['home'] == 1){
                        echo "<div id = 'home".$item['Id']."'><a href = 'javascript: hideshow(\"".TBL_CATNEWS."\",\"home\",\"".$item['Id']."\",\"0\",\"home".$item['Id']."\",\"".BASE_URL_ADMIN."\");' title = 'Bỏ khóa'><img src = '".ADMIN_PATH_IMG."icon-16-default.png'></a></div>";
                    }else{
                        echo "<div id = 'home".$item['Id']."'><a href = 'javascript: hideshow(\"".TBL_CATNEWS."\",\"home\",\"".$item['Id']."\",\"1\",\"home".$item['Id']."\",\"".BASE_URL_ADMIN."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."icon-16-nondefault.png'></a></div>"; 	 
                    }
                    ?>
                    </td>
					<td align = 'center'>
					<?php 
					if($item['ticlock'] == "1"){
						echo "<div id = '".$item['Id']."'><a href = 'javascript:ticlockactive(\"".TBL_CATNEWS."\",\"ticlock\",\"".$item['Id']."\",\"0\",\"".BASE_URL_ADMIN."\");' title = 'Bỏ khóa'><img src = '".ADMIN_PATH_IMG."icon-16-remove.png'></a></div>";
					}else{
						echo "<div id = '".$item['Id']."'><a href = 'javascript:ticlockactive(\"".TBL_CATNEWS."\",\"ticlock\",\"".$item['Id']."\",\"1\",\"".BASE_URL_ADMIN."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."icon-16-tick.png'></a></div>"; 
					}
					?>
					</td>
					<td align = 'center' width="50"><a href = '<?php echo BASE_URL_ADMIN;?>catnews/edit/<?php echo $item['Id'];?>' title = 'Sửa'><img src = '<?php echo ADMIN_PATH_IMG;?>b_edit.png'></a></td>
					<td align = 'center' width="50"><a href = '<?php echo BASE_URL_ADMIN."catnews/del/".$item['Id'];?>' title = 'Xóa' onclick = 'javascript:thongbao("<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src = '<?php echo ADMIN_PATH_IMG;?>b_drop.png'></a></td>
				</tr>
			<?php
					TreeCatnews($item['Id'],$data,$text." ____");
				}
			}
			return;
		}
		TreeCatnews(0,$data,"");
	}
	?>
</table>
<div class="list_button">
<a href = '<?php echo BASE_URL_ADMIN;?>catnews/add' class="button"><img src = '<?php echo ADMIN_PATH_IMG;?>icon-16-plus.png'> <?php echo G_ADD; ?></a>
<a href = 'javascript:CheckAll(document.rowsForm.check_list)' class="button" >Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'javascript:UnCheckAll(document.rowsForm.check_list)' class="button" >Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmDelete('<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>',document.rowsForm.check_list)" class="button" ><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_drop.png" alt="Delete" title="Xóa các dòng check" /> Delete</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="button" href="javascript:confirmSave('<?php echo JSM_DO_YOU_REALLY_WANT_TO_SAVE;?>','<?php echo BASE_URL_ADMIN;?>catnews/save')"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_save.png" alt="Update" title="Cập nhật thứ tự" /> Save</a>
</div>
</form>

</div>