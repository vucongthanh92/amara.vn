<?php
if($data['mess'] != NULL)
{
	if(is_array($data['mess']))
	{
		foreach($data['mess'] as $item)
		{
			echo $item . "</br>";
		}
	}
	else
	{
		$data['mess'];
	}
}
?>

<div id = 'frame_add'>
<form action = 'index.php?mod=config&act=addsupport' method = 'post'>
	<p><label>Email</label><input type = 'text' name = 'email' value = '<?=$data['info']['email']?>'></p>
	<p><label>Thứ tự</label><input type = 'text' name = 'sort' value = '<?=$data['info']['sort']?>'/></p>
	<p><label>&nbsp;</label>
		<input type = 'submit' name = 'submit' value = 'Thêm mới' style = 'width:100px;'/>
		<input type = 'reset' name = 'lamlai' value = 'Làm lại' style = 'width:100px;'/>	
	</p>
</form>
</div>