<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> <?php echo FORUM_EDIT_TITLE; ?></h1>
<br/>
<hr/>

<?php

if(isset($data['error']))
{
	echo 'div id = "error">';
	echo '<h2>Lỗi!</h2>';
	echo '<ul>';
	echo getError($data['error']);
	echo '</ul>';
	echo '</div>';
}
?>

<form action = '<?php echo BASE_URL_ADMIN;?>forum/edit/<?php echo $data['info']['Id'];?>' method = 'post' enctype = "multipart/form-data">
<table>
	<tr>
		<td class = 'title_td'><?php echo FR_FULLNAME;?></td>
		<td><input type = 'text' name = 'fullname' value = '<?php echo $data['info']['fullname'];?>' size = '50'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Email</td>
		<td><input type = 'text' name = 'email' value = '<?php echo $data['info']['email'];?>' size = '50'></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo TITLE;?></td>
		<td><input type = 'text' name = 'title' value = '<?php echo $data['info']['title'];?>' size = '50'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Ý kiến</td>
		<td><?php getFCKeditor("question",$data['info']["question"],350) ?></td>
	</tr>
	<!-- 
	<tr>
		<td class = 'title_td'>Trả lời</td>
		<td><?php getFCKeditor("reply",$data['info']["reply"]) ?></td>
	</tr>
	
	<tr>
		<td class = 'title_td'>Ngôn ngữ</td>
		<td>
			<select name = "lang">
				<option value = "vn" <?php if($item['info']['lang'] == "vn") echo "selected";?>>Việt Nam</option>
				<option value = "en" <?php if($item['info']['lang'] == "en") echo "selected";?>>English</option>
			</select>
		</td>
	</tr>
	 -->
	<tr>
		<td class = 'title_td'><?php echo TICLOCK;?></td>
		<td><input type = 'checkbox' name = 'ticlock' value = '1' <?php if($data['info']['ticlock'] == 1) echo "checked";?>></td>
	</tr>
	<tr>
		<th colspan = '2' align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew'>&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
		</th>
	</tr>	
</table>
</form>
