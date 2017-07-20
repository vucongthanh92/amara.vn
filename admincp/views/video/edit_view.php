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
       <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>weblink/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-item.png">
        </div>
        <div class="text">Gallery</div>
        </div>
        </a>
	</div>
    <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>video/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-video.png">
        </div>
        <div class="text">Video</div>
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
    <td> Quản lý media / Video / Thêm mới</td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
<div class="content">
	<div class="content_i">
<form action = '<?php echo BASE_URL_ADMIN;?>video/edit/<?php echo $data['info']['Id']?>' method = 'post' enctype = "multipart/form-data">
<table>
	
    <tr>
		<td class = 'title_td'>Tiêu đề</td>
		<td><input type = 'text' name = 'title_vn' size = '100' value = '<?php echo $data['info']['title_vn'];?>'></td>
	</tr>
	<tr>
		<td class = 'title_td'>File</td>
		<td><input type = 'file' name = 'file_vn' size = '50'></td>
	</tr>
    <tr>
		<td class = 'title_td'>Link URL("Youtube.com,...")</td>
		<td><input type = 'text' name = 'link' size = '100' value = '<?php echo $data['info']['link'];?>'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Sắp xếp</td>
		<td><input type = 'text' name = 'sort' size = '10' value = '<?php echo $data['info']['sort'];?>'></td>
	</tr>
    <tr>
		<td class = 'title_td'><?php echo TICLOCK;?></td>
		<td><input type = 'checkbox' name = 'ticlock' value = '1' <?php if($data['info']['ticlock']==1) echo 'checked="checked"'; ?> ></td>
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