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
    <td> Hệ thống/ Cấu hình site  </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
<div class="content">
<div class="content_i">

<form action = '<?php echo BASE_URL_ADMIN;?>website/edit/<?php echo $data['info']['Id']?>' method = 'post' enctype = "multipart/form-data">
<table>
<tbody>
<tr>
   <td width="600">
<table>

	<tr>
		<td class = 'title_td'>Tiêu đề </td>
		<td><input type = 'text' name = 'title_vn' size = '50' value = '<?php echo $data['info']['title_vn'];?>'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Email</td>
		<td><input type = 'text' name = 'email' size = '50' value = '<?php echo $data['info']['email'];?>'></td>
	</tr>
    <tr>
		<td class = 'title_td'>Meta Keyword</td>
		<td><textarea  style="width:400px; height:100px;" name="keyword_vn"><?php echo $data['info']['keyword_vn'];?></textarea></td>
	</tr>
     <tr>
		<td class = 'title_td'>Meta Description</td>
		<td><textarea  style="width:400px; height:100px;" name="description_vn"><?php echo $data['info']['description_vn'];?></textarea></td>
	</tr>
     <tr>
		<td class = 'title_td'>Google analytics</td>
		<td><textarea  style="width:400px; height:200px;" name="google"><?php echo $data['info']['googleanalytics'];?></textarea></td>
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
</td>
<td valign="top">

<table>
    <tr>
        <td class = 'title_td'>Bật/ tắt Webite</td>
        <td> 
        <select name="enable">
        		<option value="1" <? if($data['info']['enable']==1) echo 'selected="selected"'; ?> > Bật </option>
                <option value="0" <? if($data['info']['enable']==0) echo 'selected="selected"'; ?> > Tắt </option>
        </select>
        </td>
    </tr>
    <tr>
        <td class = 'title_td'>Đóng dấu ảnh</td>
        <td> 
        <select name="stamp">
        		<option value="1" <? if($data['info']['stamp']==1) echo 'selected="selected"'; ?> > Bật </option>
                <option value="0" <? if($data['info']['stamp']==0) echo 'selected="selected"'; ?> > Tắt </option>
        </select>
        </td>
    </tr>
    <tr>
        <td class = 'title_td'>Thông báo</td>
        <td> 
        <textarea  style="width:400px; height:200px;" name="message"><?php echo $data['info']['message'];?></textarea>
        </td>
    </tr>
</table>

</td>
</tr>
</tbody>
</table>
</form>
</div>
</div>