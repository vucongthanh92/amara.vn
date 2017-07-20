<div class="wrapper_submenu">
	<div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>flash/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-chuyenmuc.png">
        </div>
        <div class="text">File-Image</div>
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
    <td> Quản lý media / Banner / Thêm mới</td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
<div class="content">
	<div class="content_i">
<form action = '<?php echo BASE_URL_ADMIN;?>flash/edit/<?php echo $data['info']['Id']?>' method = 'post' enctype = "multipart/form-data">
<table>
	<tr>
		<td class = 'title_td'>Loại file</td>
		<td>
		<select name = "style">
			<option value = '2'  <?php if($data['info']['style'] == 2) echo 'selected';?>>Ảnh</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class = 'title_td'>Vị trí</td>
		<td>
		<select name = "location">
			<option value = '1' <?php if($data['info']['location'] == 1) echo 'selected';?>>Logo Thương Hiệu</option>
            <option value = '11' <?php if($data['info']['location'] == 11) echo 'selected';?>>Logo Chi Nhánh</option>
            <option value = '12' <?php if($data['info']['location'] == 12) echo 'selected';?>>Logo Giao Hàng</option>
			<option value = '2' <?php if($data['info']['location'] == 2) echo 'selected';?>>Slide Ảnh</option>
            <option value = '3' <?php if($data['info']['location'] == 3) echo 'selected';?>>Quảng Cáo</option>
            <option value = '4' <?php if($data['info']['location'] == 4) echo 'selected';?>>Banner Sản Phẩm</option>
            <option value = '5' <?php if($data['info']['location'] == 5) echo 'selected';?>>Banner Left</option>
            <option value = '6' <?php if($data['info']['location'] == 6) echo 'selected';?>>Banner Liên Hệ</option>
            <option value = '7' <?php if($data['info']['location'] == 7) echo 'selected';?>>Banner Giới Thiệu</option>
            <option value = '8' <?php if($data['info']['location'] == 8) echo 'selected';?>>Banner Cẩm nang Sức Khỏe</option>
            <option value = '9' <?php if($data['info']['location'] == 9) echo 'selected';?>>Banner Cẩm Nang Làm Đẹp</option>
            <option value = '10' <?php if($data['info']['location'] == 10) echo 'selected';?>>Banner Hỏi Đáp</option>
		</select>
		</td>
	</tr>
	<tr>
		<td class = 'title_td'>File</td>
		<td><input type = 'file' name = 'file_vn' size = '50'></td>
	</tr>
	<?php if($data['info']['file_vn'] != ""){?>
	<tr>
		<td>&nbsp;</td>
		<td><div id = "file_vn">
        
		<p><?php if($data['info']['style']==1){ ?><embed width="<?=$data['info']['width']?>" height="<?=$data['info']['height']?>" menu="true" loop="true" play="true" src="/data/Flash/<?php echo $data['info']['file_vn'];?>" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent"></embed>
        <?php } else { ?>
        <img src="<?=BASE_URL.PATH_IMG_FLASH.$data['info']['file_vn'] ?>"   />
        <? } ?>
        </p>
		&nbsp;&nbsp;&nbsp;
		<a href = "javascript: delFlash('<?php echo TBL_FLASH?>','file_vn',<?php echo $data['info']['Id']?>,'<?php echo $data['info']['file_vn'];?>','file_vn','<?=BASE_URL_ADMIN?>')"><img src = "<?php echo ADMIN_PATH_IMG;?>b_drop.png"></a></div>
		</td>
	</tr>
	<?php }?>
	<tr>
		<td class = 'title_td'>Kích thước</td>
		<td>Rộng: <input type = 'text' name = 'width' size = '15'  value = '<?php echo $data['info']['width'];?>'> Cao: <input type = 'text' name = 'height' size = '15'  value = '<?php echo $data['info']['height'];?>'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Link</td>
		<td><input type = 'text' name = 'link' size = '60'  value = '<?php echo $data['info']['link'];?>'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Sắp xếp</td>
		<td><input type = 'text' name = 'sort' size = '10' value = '<?php echo $data['info']['sort'];?>'></td>
	</tr>
	<tr>
    	<td></td>
		<th  align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew' class="button">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>' class="button" >
		</th>
	</tr>	
</table>
</form>
</div></div>
<style>
.file_vn img{ max-width:500px; max-height:300px; }
</style>