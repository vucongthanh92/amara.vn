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
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-image.png" style="width:23px; height: 23px">
    </td>
    <td> Quản lý liên hệ / Hỗ trợ trực tuyến </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
<div class="content">
<div class="content_i">
<form name = "frm1" action = '<?php echo BASE_URL_ADMIN;?>titlepage/list' method = 'post' enctype = "multipart/form-data">
<table>
    <tr>
		<td colspan="2">Phòng kinh doanh</td>
	</tr>
    <tr>
		<td class = 'title_td'>Họ Tên</td>
		<td><input type = 'text' name = 'hoten1' size = '100' value = "<?php echo $data['hoten1'];?>">
		</td>
	</tr>
	<tr>
		<td class = 'title_td'>Yahoo </td>
		<td><input type = 'text' name = 'yahoo1' size = '100' value = "<?php echo $data['yahoo1'];?>">
		</td>
	</tr>
	<tr>
		<td class = 'title_td'>Điện thoại</td>
		<td>
			<input type = 'text' name = 'dienthoai1' size = '100' value = "<?php echo $data['dienthoai1'];?>">
		</td>
	</tr>
      <tr>
		<td colspan="2">Chăm sóc khách hàng</td>
		
	</tr>
    <tr>
		<td class = 'title_td'>Họ Tên</td>
		<td><input type = 'text' name = 'hoten2' size = '100' value = "<?php echo $data['hoten2'];?>">
		</td>
	</tr>
	<tr>
		<td class = 'title_td'>Yahoo </td>
		<td> <input type = 'text' name = 'yahoo2' size = '100' value = "<?php echo $data['yahoo2'];?>"></td>
	</tr>
	<tr>
		<td class = 'title_td'>Điện thoại</td>
		<td> <input type = 'text' name = 'dienthoai2' size = '100' value = "<?php echo $data['dienthoai2'];?>">
            
		</td>
	</tr>
   
     <tr>
		<td colspan="2">Holine</td>
		
	</tr>
    <tr>
		<td class = 'title_td'>Hotline 1  </td>
		<td><input type = 'text' name = 'hotline1' size = '100' value = "<?php echo $data['hotline1'];?>"></td>
	</tr>
    <tr>
		<td class = 'title_td'>Hotline 2   </td>
		<td><input type = 'text' name = 'hotline2' size = '100' value = "<?php echo $data['hotline2'];?>"></td>
	</tr>
    	<tr>
		<td class = 'title_td'>Email nhận liên hệ</td>
		<td><input type = 'text' name = 'emaillienhevn' size = '100' value = "<?php echo $data['emaillienhe_vn'];?>"></td>
	</tr>
    
    </tr>
    	<tr>
		<td class = 'title_td'>Email gởi liên hệ</td>
		<td><input type = 'text' name = 'email_send' size = '100' value = "<?php echo $data['email_send'];?>"></td>
	</tr>
    
    </tr>
    	<tr>
		<td class = 'title_td'>Password</td>
		<td><input type="password" name = 'pass_send' size = '100' value = "<?php echo $data['pass_send'];?>"></td>
	</tr>
    
    	<th></th>
		<th colspan = '2' align = 'center'>
        
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'save' class="button">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>' class="button" >
		</th>
	</tr>
</table>
</form>

</div>
</div>
