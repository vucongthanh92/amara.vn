<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> Cấu hình site</h1>
<br/>
<hr/>

<form action = '<?php echo BASE_URL_ADMIN;?>configuration/edit/<?php echo $data['info']['Id'];?>' method = 'post' enctype = "multipart/form-data">
<table>
<?php
foreach($config_lang as $klang => $vlang)
{
?>
	<tr>
		<td class = 'title_td'><?php echo TITLE;?> trang  (<?php echo $vlang;?>)</td>
		<td><input type = 'text' name = 'title_<?php echo $vlang;?>' value = '<?php echo $data['info']['title_'.$vlang];?>' size = '50'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Từ khóa  (<?php echo $vlang;?>)</td>
		<td><textarea name = "<?php echo "keyword_".$vlang;?>" cols = "60" rows = "3"><?php echo $data['info']["keyword_".$vlang]; ?></textarea></td>
	</tr>
<?php
}
?>
	<tr>
		<td class = 'title_td'>Email gửi trang liên hệ</td>
		<td><input type = 'text' name = 'email' size = '50' value = '<?php echo $data['info']['email'];?>'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Yahoo 1</td>
		<td>Nick: <input type = 'text' name = 'yahoo1' size = '30' value = '<?php echo $data['info']['yahoo1'];?>'>
			Tên: <input type = 'text' name = 'title_yahoo1' size = '40' value = '<?php echo $data['info']['title_yahoo1'];?>'>
		</td>
	</tr>
	<tr>
		<td class = 'title_td'>Yahoo 2</td>
		<td>Nick: <input type = 'text' name = 'yahoo2' size = '30' value = '<?php echo $data['info']['yahoo2'];?>'>
			Tên: <input type = 'text' name = 'title_yahoo2' size = '40' value = '<?php echo $data['info']['title_yahoo2'];?>'>
		</td>
	</tr>
	<tr>
		<td class = 'title_td'>Phone</td>
		<td><input type = 'text' name = 'phone' size = '50' value = '<?php echo $data['info']['phone'];?>'></td>
	</tr>
	<tr>
		<th colspan = '2' align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew'>&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
		</th>
	</tr>	
</table>
</form>
