<?php
if(is_array($data['mess']))
{
	foreach($data['mess'] as $key => $value)
	{
		echo "$value<br/>";
	}
}
?>

<div id = 'frame_add'>
<form action = 'index.php?mod=config&act=editsupport&id=<?=$data['info']['ID']?>' method = 'post'>
	<p><label>Email</label><input type = 'text' name = 'email' value = '<?=$data['info']['Email']?>'></p>
	<p><label>Thứ tự</label><input type = 'text' name = 'sort' value = '<?=$data['info']['sort']?>'/></p>
	<p><label>&nbsp;</label>
		<input type = 'submit' name = 'save' value = 'Save' style = 'width:100px;'/>
		<input type = 'reset' name = 'lamlai' value = 'Làm lại' style = 'width:100px;'/>	
	</p>
</form>
</div>