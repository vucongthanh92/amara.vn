<h1><img src = '<?php echo ADMIN_PATH_IMG;?>s_db.png'> <?php echo FORUM_ADD_TITLE; ?></h1>
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

<form action = '<?php echo BASE_URL_ADMIN;?>forum/add' method = 'post' enctype = "multipart/form-data">
<table>
	<tr>
		<td class = 'title_td'><?php echo FR_FULLNAME;?></td>
		<td><input type = 'text' name = 'fullname' size = '50'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Email</td>
		<td><input type = 'text' name = 'email' size = '50'></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo TITLE;?></td>
		<td><input type = 'text' name = 'title' size = '50'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Ý kiến</td>
		<td><?php getFCKeditor("question","",350) ?></td>
	</tr>
	<!-- 
	<tr>
		<td class = 'title_td'>Trả lời</td>
		<td><?php getFCKeditor("reply","") ?></td>
	</tr>
	<tr>
		<td class = 'title_td'>Ngôn ngữ</td>
		<td>
			<select name = "lang">
				<option value = "vn">Việt Nam</option>
				<option value = "en">English</option>
			</select>
		</td>
	</tr>
	 -->
	<tr>
		<td class = 'title_td'><?php echo TICLOCK;?></td>
		<td><input type = 'checkbox' name = 'ticlock' value = '1' ></td>
	</tr>
	<tr>
		<th colspan = '2' align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_ADD;?>' name = 'addnew'>&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'>
		</th>
	</tr>	
</table>
</form>
