<table>
<form action = '<?=URL_SELF?>?mod=config&act=delsupport' method = 'post' name = 'myform'>
<th><input type="checkbox" name="Check_ctr" value="yes" onClick="Check(document.myform.check_list)"></th>
<th>ID</th>
<th>Email</th>
<th>Sort</th>
<th>Edit</th>
<th>Del</th>
<?php

if($data['info'] != NULL)
{
	foreach($data['info'] as $item)
	{
	?>
		<tr>
			<td align = 'center'><input type="checkbox" id = 'check_list' name="check_list[]" value="<?=$item['ID']?>"><br></td>
			<td align = 'center'><?=$item['ID']?></td>
			<td><?=$item['Email']?></td>
			<td><input type = 'text' size = '4' value = '<?=$item['Sort']?>' style = 'text-align:center;'></td>
			<td align = 'center'><a href = '<?=URL_SELF?>?mod=config&act=editsupport&id=<?=$item['ID']?>'><img src = '<?=ADMIN_PATH_IMG?>b_edit.png'></a></td>
			<td align = 'center'><a href = '<?=URL_SELF?>?mod=config&act=delsupport&id=<?=$item['ID']?>' onclick = 'javascript:return warning();'><img src = '<?=ADMIN_PATH_IMG?>b_drop.png'></a></td>
		</tr>
	<?
	}
}
?>
</table>
	<img src = '<?=ADMIN_PATH_IMG?>arrow_ltr.png'>
	<input type = "button" name ="Check_All" value="Check All" onClick="CheckAll(document.myform.check_list)" class = 'checkdata'>
	<input type = "button" name ="Un_CheckAll" value="Uncheck All" onClick="UnCheckAll(document.myform.check_list)" class = 'checkdata'>
	<input type = 'image' name = 'Del' value = 'del' src = '<?=ADMIN_PATH_IMG?>b_drop.png' style = 'vertical-align:middle' onclick = 'javascript:return warning_2(document.myform.check_list);'/>
</form>