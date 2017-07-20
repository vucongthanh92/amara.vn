
<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> Thêm download</h1>
<br/>
<hr/>

<form action = '<?php echo BASE_URL_ADMIN;?>download/add' method = 'post' enctype = "multipart/form-data">
<table>
<?php
foreach($config_lang as $klang => $vlang)
{
?>
	<tr>
		<td class = 'title_td'><?php echo TITLE;?> (<?php echo $vlang;?>)</td>
		<td><input type = 'text' name = 'title_<?php echo $vlang;?>' size = '50'></td>
	</tr>
	<tr>
		<td class = 'title_td'>File (<?php echo $vlang;?>)</td>
		<td><input type = 'file' name = 'file_<?php echo $vlang;?>' size = '50'></td>
	</tr>
<?php
}
?>
	<tr>
		<th colspan = '2' align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_ADD;?>' name = 'addnew'>&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
		</th>
	</tr>	
</table>
</form>
