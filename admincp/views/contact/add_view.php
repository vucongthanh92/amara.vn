
<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> thêm hộ trợ trực tuyến</h1>
<br/>
<hr/>

<form action = '<?php echo BASE_URL_ADMIN;?>support/add' method = 'post' enctype = "multipart/form-data">
<table>
	<tr>
		<td>Loại</td>
		<td>
		<select name = "style">
			<option value = "1">Yahoo</option>
			<option value = "2">Skype</option>
		</select>
		</td>
	</tr>
<?php
foreach($config_lang as $klang => $vlang)
{
?><!-- 
	<tr>
		<td class = 'title_td'><?php echo TITLE;?> (<?php echo $vlang;?>)</td>
		<td><input type = 'text' name = 'title_<?php echo $vlang;?>' size = '50'></td>
	</tr>
 -->
	<tr>
		<td class = 'title_td'>Nick (<?php echo $vlang;?>)</td>
		<td><input type = 'text' name = 'nick_<?php echo $vlang;?>' size = '50'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Tên người hỗ trợ (<?php echo $vlang;?>)</td>
		<td><input type = 'text' name = 'name_<?php echo $vlang;?>' size = '50'></td>
	</tr>
	<!-- 
	<tr>
		<td class = 'title_td'>Điện thoại (<?php echo $vlang;?>)</td>
		<td><input type = 'text' name = 'phone_<?php echo $vlang;?>' size = '50'></td>
	</tr>
	 -->
<?php
}
?>
	<tr>
		<td class = 'title_td'><?php echo SORT;?></td>
		<td><input type = 'text' name = 'sort' size = '10'></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo TICLOCK;?></td>
		<td><input type = 'checkbox' name = 'ticlock' value = '1'></td>
	</tr>
	<tr>
		<th colspan = '2' align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_ADD;?>' name = 'addnew'>&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
		</th>
	</tr>	
</table>
</form>
