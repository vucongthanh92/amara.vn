<div class="wrapper_submenu">

  	<div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>titlepage/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-support.png">
        </div>
        <div class="text">Support online</div>
        </div>
        </a>
	</div>
    
    <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>email/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-smtp.png">
        </div>
        <div class="text">Quản Lý Email</div>
        </div>
        </a>
	</div>
    
    <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>comment/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-paper.png">
        </div>
        <div class="text">Comment</div>
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
    <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-image.png" style="width:23px; height: 23px">
    </td>
    <td> Quản lý Comment / Chỉnh Sửa </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>

<?php

if(isset($data['error']))
{
	echo 'div id = "error">';
	echo '<h2>Lỗi!</h2>';
	echo '<ul>';
	echo getError($data['error']);
	echo '</ul>';
	echo '</div>';
}
?>

<div class="content">
<div class="content_i">
<form action = '<?php echo BASE_URL_ADMIN;?>comment/edit/<?php echo $data['info']['Id'];?>' method = 'post' enctype = "multipart/form-data">
<table>
	<tr>
		<td class = 'title_td'>Họ Tên</td>
		<td><input type = 'text' name = 'hoten' value = '<?php echo $data['info']['hoten'];?>' size = '50'></td>
	</tr>
    
    <tr>
		<td class = 'title_td'>Email</td>
		<td><input type = 'text' name = 'email' value = '<?php echo $data['info']['email'];?>' size = '50'></td>
	</tr>
    
    <tr>
		<td class = 'title_td'>Điện Thoại</td>
		<td><input type='text' name='phone' value='<?php echo $data['info']['phone'];?>' size='50'></td>
	</tr>
    
	<tr>
		<td class = 'title_td'>Nội Dung</td>
		<td><textarea style="width:550px; height:200px" name="content"><?php echo $data['info']['content'];?></textarea></td>
	</tr>
	<tr>
		<td class = 'title_td'>Khóa</td>
		<td><input type = 'checkbox' name = 'ticlock' value = '1' <?php if($data['info']['ticlock'] == 1) echo "checked";?>></td>
	</tr>
	<tr>
		<th colspan = '2' align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew'>&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
		</th>
	</tr>	
</table>
</form>
</div>
</div>