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
    <td> Hệ thống / Quản lý thành viên / Sửa </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
<div class="content">
<div class="content_i">
<form action = '<?php echo BASE_URL_ADMIN;?>thanhvien/edit/<?php echo $data['info']['id']?>' method = 'post' enctype = "multipart/form-data">

<table>
	<tr>
		<td class = 'title_td'>Username</td>
		<td>
			<input type = 'text' name = 'username' size = '100' value="<?=$data['info']['username'] ?>" >
		</td>
	</tr>
    <tr>
		<td class = 'title_td'>Họ tên</td>
		<td>
			<input type = 'text' name = 'fullname' size = '100' value="<?=$data['info']['fullname'] ?>" >
		</td>
	</tr>
    <tr>
		<td class = 'title_td'>Email</td>
		<td>
			<input type = 'text' name = 'email' size = '100' value="<?=$data['info']['email'] ?>" >
		</td>
	</tr>
    <tr>
		<td class = 'title_td'>Ngày sinh</td>
		<td>
			<input type = 'text' name = 'birthday' size = '100' value="<?=$data['info']['birthday'] ?>" >
		</td>
	</tr>
    <tr>
		<td class = 'title_td'>Giới tính</td>
		<td>
			<input type = 'text' name = 'gender' size = '100' value="<? if($data['info']['gioitinh']==1) echo "Nam"; else echo "Nữ"; ?>" >
		</td>
	</tr>
    <tr>
		<td class = 'title_td'>Địa chỉ</td>
		<td>
			<input type = 'text' name = 'address' size = '100' value="<? echo $data['info']['address']; ?>" >
		</td>
	</tr>
    <tr>
		<td class = 'title_td'>Điện thoại</td>
		<td>
			<input type = 'text' name = 'phone' size = '100' value="<? echo $data['info']['phone']; ?>" >
		</td>
	</tr>
    <tr>
		<td class = 'title_td'>Tỉnh</td>
		<td>
			<select name="tinh" id="tinh">
            	<option value="0">Tỉnh / Thành phố</option>
                    <option selected="selected" value="1">TP Hồ Chí Minh</option>
                    <option value="2">Hà Nội</option>
                    <option value="5">Bình Dương</option>
                    <option value="6">Bà Rịa- Vũng Tàu</option>
                    <option value="7">Tỉnh khác</option>
            </select>
            <script type="text/javascript">
			$(document).ready(function(){
				$('#tinh').val(<?=$data['info']['idtinh'] ?>);
			})
			</script>
		</td>
	</tr>
	
	<tr>
    	<th></th>
		<th align = 'center'>
			<input type = "hidden" >
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew' class="button">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>' class="button" >
		</th>
	</tr>	
</table>
</form>
</div>
</div>