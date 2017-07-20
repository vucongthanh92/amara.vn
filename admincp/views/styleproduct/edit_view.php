
<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> Sửa hãng xe</h1>
<br/>
<hr/>

<form action = '<?php echo BASE_URL_ADMIN;?>styleproduct/edit/<?php echo $data['info']['Id']?>' method = 'post' enctype = "multipart/form-data">
<table>
	<tr>
		<td class = 'title_td'><?php echo PARENTID;?></td>
		<td>
			<select name = 'parentid'>
				<option value = ''>- - Là chủ đề gốc - -</option>
			<?php
			$mcatelog = new Models_MStyleProduct;
			$ldata = $mcatelog->listdata();
			echo $tmenu = TreeCat($ldata,0,"",$data['info']['parentid'],"--");
			?>
			</select>&nbsp;<i style = 'color:red;'>(<?php echo LUUYNHOMSP;?>)</i>
		</td>
	</tr>
<?php
foreach($config_lang as $klang => $vlang)
{
?>
	<tr>
		<td class = 'title_td'><?php echo TITLE;?> (<?php echo $vlang;?>)</td>
		<td><input type = 'text' name = 'title_<?php echo $vlang;?>' size = '50' value = '<?php echo $data['info']['title_'.$vlang];?>'></td>
	</tr>
<?php
}
?>
	<tr>
		<td class = 'title_td'><?php echo SORT;?></td>
		<td><input type = 'text' name = 'sort' size = '10' value = '<?php echo $data['info']['sort'] ?>'></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo TICLOCK;?></td>
		<td><input type = 'checkbox' name = 'ticlock' value = '1' <?php if($data['info']['ticlock'] == 1) echo 'Checked';?>></td>
	</tr>
	<tr>
		<th colspan = '2' align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew'>&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
		</th>
	</tr>	
</table>
</form>
