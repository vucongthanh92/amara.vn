<div class = 'mappage'><h1><?php echo $data['map_title'];?></h1></div>

<script language = 'javascript'>
function checkbaogia()
{
	if(document.frmbaogia.fullname.value=="")
	{
		alert("<?php echo BG_EMPTYHOTEN;?>");
		document.frmbaogia.fullname.focus();
		return false;
	}
	
	if(document.frmbaogia.address.value=="")
	{
		alert("<?php echo BG_EMPTYADDRESS;?>");
		document.frmbaogia.address.focus();
		return false;
	}
	
	if(document.frmbaogia.tel.value=="")
	{
		alert("<?php echo BG_EMPTYTEL;?>");
		document.frmbaogia.tel.focus();
		return false;
	}
	
	return true;
}
</script>

<div class = 'formycbg'>
<form method = 'post' name = 'frmbaogia' action = '<?php echo BASE_URL;?>requestprice/add/yeu-cau-bao-gia.htm' onsubmit = "return checkbaogia();">
	<p><label><?php echo BG_HOTEN;?>:<span class = "sao"> * </span></label><input type = 'text' name = 'fullname' class = 'winput' size = '50'></p>
	<p><label><?php echo BG_DIACHI;?>:<span class = "sao"> * </span></label><input type = 'text' name = 'address' class = 'winput' size = '50'></p>
	<p><label>Email:</label><input type = 'text' class = 'winput' name = 'email' size = '50'></p>
	<p><label>Tel:<span class = "sao"> * </span></label><input type = 'text' name = 'tel' class = 'winput' size = '25'></p>
	<p><label>Fax:</label><input type = 'text' name = 'fax' class = 'winput' size = '25'></p>
	<p><label><?php echo GHICHU;?>:</label><textarea name = 'note' cols = '47' rows = '5'></textarea></p>
	
	<br/>
	<?php echo BG_YEUBGTB;?>
	<table width = '88%' border = '1' cellpadding = '0' cellspacing = '0'>
		<tr>
			<th>STT</th>
			<th><?php echo BG_TENTB;?></th>
			<th><?php echo BG_SL;?></th>
		</tr>
		<?php
		for($i = 1; $i <= 10; ++$i)
			echo "<tr>
					<td align ='center'>$i</td>
					<td><input type = '' name = 'sp[]' style = 'width:430px'></td> 
					<td align ='center'><input type = '' name = 'sl[]' size = '10'></td>
				</tr>
			";
		?>
	</table>
	<input type = 'submit' value = '<?php echo BG_GUIBG;?>' name = 'addnew'>&nbsp;&nbsp;&nbsp;
	<input type = 'reset' value = '<?php echo BG_LAMLAI;?>'>
</form>
</div>