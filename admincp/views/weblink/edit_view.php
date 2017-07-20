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
        <div class="text">Thông Báo Mới</div>
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
    <td> Quản lý cửa hàng / Địa điểm / Sửa </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
        

<div class="content">
<div class="content_i">

<form action = '<?php echo BASE_URL_ADMIN;?>weblink/edit/<?php echo $data['info']['Id']?>' method = 'post' enctype = "multipart/form-data">
<table>
	<tr>
		<td class = 'title_td'><?php echo TITLE;?></td>
		<td><input type = 'text' name = 'title_vn' size = '80' value = '<?php echo $data['info']["title_vn"];?>'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Description</td>
		<td><textarea style="width:580px; height:120px;" name="description_vn"><?=$data['info']['description_vn']?></textarea></td>
	</tr>
    
    <tr>
    	<td class = 'title_td'><strong>Nội Dung</strong></td>
		<td>
            <?php getFCKeditor("content_vn",stripslashes($data['info']["content_vn"]),500); ?>
        </td>
	</tr>

	<tr>
		<td class = 'title_td'><?php echo TICLOCK;?></td>
		<td><input type = 'checkbox' <?php if($data['info']['ticlock']==1) echo "checked" ?> name = 'ticlock' value = '1'></td>
	</tr>
	<tr>
    	<th></th>
		<th  align = 'center'>
			<input type = 'submit' name = 'editnew' value = '<?php echo G_BUTTON_EDIT;?>' class="button">
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>' class="button">
			<input type = 'button' value = '<?php echo G_BUTTON_BACK;?>' onclick = "javascript:history.go(-1);" class="button" >
		</th>
	</tr>	
</table>
</form>
</div>
</div>