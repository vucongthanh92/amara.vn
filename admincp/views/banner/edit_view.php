<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> <?php echo BANNER_EDIT_TITLE; ?></h1>
<br/>
<hr/>

<script type="text/javascript">
<!--
function checkfrm(){
	var frm = document.frm;
	if(frm.location.value == ""){
		alert("Vui lòng chọn vị trí");
		return false;
	}
}
//-->
</script>

<form name = "frm" action = '<?php echo BASE_URL_ADMIN;?>banner/edit/<?php echo $data['info']['Id']?>' method = 'post' enctype = "multipart/form-data" onsubmit = "return checkfrm();">
<table>
	<tr>
		<td class = 'title_td'><?php echo LOCATION;?></td>
		<td>
			<select name = 'location'>
				<option value = ''>- - Chọn vị trí - -</option>
				<option value = '1'  <?php if($data['info']['location'] == "1") echo "selected"; ?>>Logo</option>
				<option value = '2' <?php if($data['info']['location'] == "2") echo "selected"; ?>>Banner</option>
			</select>
		</td>
	</tr>
<?php
foreach($config_lang as $klang => $vlang)
{
?>
	<tr>
		<td class = 'title_td'><?php echo TITLE;?></td>
		<td><input type = 'text' name = 'title_<?php echo $vlang;?>' size = '50' value = '<?php echo $data['info']['title_'.$vlang];?>'></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo CONTENT;?></td>
		<td><?php getFCKeditor("content_".$vlang,stripslashes($data['info']["file_".$vlang])); ?></td>
	</tr>
<?php
}
?>
	<tr>
		<td class = 'title_td'><?php echo LINK;?></td>
		<td><input type = 'text' name = 'link' size = '50' value = "<?php echo $data['info']['link'];?>">(vi dụ: http://vnexpress.net)</td>
	</tr>
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
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew'>&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
		</th>
	</tr>	
</table>
</form>
