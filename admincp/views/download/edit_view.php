
<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> Sửa download</h1>
<br/>
<hr/>

<form action = '<?php echo BASE_URL_ADMIN;?>download/edit/<?php echo $data['info']['Id']?>' method = 'post' enctype = "multipart/form-data">
<table>
<?php
foreach($config_lang as $klang => $vlang)
{
?>
	<tr>
		<td class = 'title_td'><?php echo TITLE;?> (<?php echo $vlang;?>)</td>
		<td><input type = 'text' name = 'title_<?php echo $vlang;?>' size = '50' value = '<?php echo $data['info']['title_'.$vlang];?>'></td>
	</tr>
	<tr>
		<td class = 'title_td'>File (<?php echo $vlang;?>)</td>
		<td><input type = 'file' name = 'file_<?php echo $vlang;?>' size = '50'></td>
	</tr>
	<?php if($data['info']['file_'.$vlang] != ""){?>
	<tr>
		<td>&nbsp;</td>
		<td><div id = "file_<?php echo $vlang;?>"><?php echo $data['info']['file_'.$vlang];?> &nbsp;&nbsp;&nbsp;
		<a href = "javascript: delFile('<?php echo TBL_DOWNLOAD?>','file_<?php echo $vlang?>',<?php echo $data['info']['Id']?>,'<?php echo $data['info']['file_'.$vlang];?>','file_<?php echo $vlang;?>')"><img src = "<?php echo ADMIN_PATH_IMG;?>b_drop.png"></a></div>
		</td>
	</tr>
	<?php }?>
<?php
}
?>
	<tr>
		<th colspan = '2' align = 'center'>
			<input type = "hidden" >
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew'>&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
		</th>
	</tr>	
</table>
</form>
