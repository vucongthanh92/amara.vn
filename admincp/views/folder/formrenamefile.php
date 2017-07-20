<div class="wrapper_submenu">
	<div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>folder/list">
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
    <td> Quản lý media / Data Upload / Đổi tên file </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
        

<div class="content">
<div class="content_i" >
<?php
	if($data["error"]==1){
		echo "<div class='error'>".$data["message"]."</div>";	
	}
?>
<form action="<?php echo BASE_URL_ADMIN;?>index.php?mod=folder&act=rename_file&file=<?=$data['file']?>&current_path_folder=<?=$data['current_path_folder'] ?>" method="post">
<table class="view2">
<tr>
    <td class = 'title_td'>Tên file: </td>
    <td><input type = 'text' name = 'filername' size="50" value="<?=$data["file"] ?>"></td>
</tr>
<tr>
    <th colspan = '2' align = 'center'>
    <input  type = 'submit' value = 'Lưu lại' name = 'addnew'>&nbsp;&nbsp;
    <input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
    </th>
</tr>
</table>
</form>
</div>
</div>