
<div class="wrapper_submenu">
	<div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>contact/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-nhom.png">
        </div>
        <div class="text">Liên hệ</div>
        </div>
        </a>
	</div>
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
        <div class="text">Email</div>
        </div>
        </a>
	</div>
     <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>partners/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-employee.png">
        </div>
        <div class="text">Đối tác</div>
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
    <td> Quản lý liên hệ / Xem danh sách liên hệ  </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
<div class="content">
<div class="content_i">
<form action = '<?php echo BASE_URL_ADMIN;?>contact/edit/<?php echo $data['info']['Id']?>' method = 'post' enctype = "multipart/form-data">
<table>

	<tr>
		<td class = 'title_td'>Họ tên</td>
		<td><input type = 'text' name = 'nick_<?php echo $vlang;?>' size = '50' value = '<?php echo $data['info']['name'];?>'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Email</td>
		<td><input type = 'text' name = 'name_<?php echo $vlang;?>' size = '50' value = '<?php echo $data['info']['email'];?>'></td>
	</tr>
    <tr>
		<td class = 'title_td'>Phone</td>
		<td><input type = 'text' name = 'name_<?php echo $vlang;?>' size = '50' value = '<?php echo $data['info']['phone'];?>'></td>
	</tr>
     <tr>
		<td class = 'title_td'>Địa chỉ</td>
		<td><input type = 'text' name = 'name_<?php echo $vlang;?>' size = '50' value = '<?php echo $data['info']['address'];?>'></td>
	</tr>
     <tr>
		<td class = 'title_td'>Nội dung</td>
		<td><textarea  style="width:400px; height:200px;"><?php echo $data['info']['content'];?></textarea></td>
	</tr>

	<tr>
   	 <th  align = 'center'>
		<th  align = 'center'>
			<input type = "hidden" >
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew' class="button">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>' class="button" >
		</th>
	</tr>	
</table>
</form>
</div>
</div>