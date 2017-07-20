<?php
if(is_array($data))
{
	$item = $data['info'][0];
?>
<form action = '' method = 'post'>
	<div class = 'info'>
		<div class = 'rows'>
			<label>Title</label>
			<input type = 'text' name = 'title' value ='<?=$item['CF_Title']?>' />
		</div>
		<div class = 'rows'>
			<label>Keywords</label>
			<textarea name = 'keywords' rows = '1'><?=$item['Keywords']?></textarea>
		</div>
		<div class = 'rows'>
			<label>Description</label>
			<textarea name = 'description' rows = '1'><?=$item['Description']?></textarea>
		</div>
		<div class = 'rows'>
			<label>Abstract</label>
			<textarea name = 'abstract' rows = '1'><?=$item['Abstract']?></textarea>
		</div>
		<div class = 'rows'>
			<label>Email</label>
			<input type = 'text' name = 'email' value = '<?=$item['Email']?>' />
			<p class = 'note'>(Khi gửi liên hệ sẽ đến email này)</p>
		</div>
		<div class = 'rows'>
			<label>Password email</label>
			<input type = 'password' name = 'password' value = '<?=$item['Password']?>' />
		</div>
		<div class = 'rows'>
			<label>Tel</label>
			<input type = 'text' name = 'tel' value = '<?=$item['Tel']?>' />
		</div>
		<input type = 'hidden' name = 'id' value = '<?=$item['ID']?>'/>
		<div class = 'rows'>
			<label>&nbsp;</label>
			<input type = 'submit' name = 'save' value = 'Save' class = 'submit'/>
			<input type = 'reset' value = 'Reset' name = 'reset' class = 'submit' />
		</div>
	</div>
</form>
<?php
}
?>