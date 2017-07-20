<div><h1 class = 'title_lienhe'><?php echo $data['map_title'];?></h1></div>

<div class = 'hoidap'>
<?php
if(!empty($data['info']))
{
	foreach($data['info'] as $item)
	{
		$title = unicode_convert($item['title']);
?>
	<h1><?php echo stripslashes($item['title']);?></h1>	
	<div><?php echo stripslashes($item['question']);?></div>
	<p style = 'text-align:right;'>
		<b><?php echo stripslashes($item['fullname']);?></b><br/>
		<?php echo stripslashes($item['email']);?>
	</p>
	<div class = "phancach">&nbsp;</div>
<?php
	}
}

//xuat phan trang
if($data['page'] != "")
	echo "<div class = 'paging'>Trang: ". $data['page']. "</div>";
?>
</div>


<script language = "javascript">
function ten()
{
	var ht = document.f1.fullname.value;
	var bm = /[^a-z ]$/i;
	if(ht.length=="")
	{
		alert("<?php echo FR_EMPTYNAME;?>");
		return false;
	}
	if(bm.test(ht)==true)
	{
		alert("<?php echo FR_ERRORNAME;?>");
		return false;
	}
}

function email()
{
	var mt = document.f1.email.value
	var bm = /^.+@.+\..+$/;
	if(mt.length=="")
	{
		alert("<?php echo FR_EMPTYEMAIL;?>")
		return false;
	}
	if(bm.test(mt)==false)
	{
		alert("<?php echo FR_ERROREMAIL;?>")
		return false;
	}
	return true;
}

function tentitle()
{
	var ht = document.f1.title.value;
	var bm = /[^a-z ]$/i;
	if(ht.length=="")
	{
		alert("<?php echo FR_EMPTYTITLE;?>");
		return false;
	}
}

function noidung()
{
	var ht = document.f1.question.value;
	if(ht.length=="")
	{
		alert("<?php echo FR_EMPTYCONTENT;?>");
		return false;
	}
}
		
function xuly()
{
	if(ten()==false) return false;
	if(email()==false) return false;
	if(tentitle()==false) return false;
	if(noidung()==false) return false;
	return true;
}
</script>

<div class = "formlienhe">
	<form method = "post" action = "y-kien-khach-hang/gui-y-kien.htm" name = "f1" onsubmit="javascript:return xuly();">
		<br/>
		<p><label><?php echo FR_HOTEN;?><span class = "sao"> * </span></label><input type = "text" name = "fullname" maxlength = "250" class = 'inputtext'/></p>
		<p><label>Email<span class = "sao"> * </span></label><input type = "text" name = "email" maxlength = "250" class = 'inputtext'/></p>
		<p><label><?php echo FR_TITLE;?><span class = "sao"> * </span></label><input type = "text" name = "title" maxlength = "250" class = 'inputtext'/></p>
		<p><label><?php echo FR_NOIDUNG;?><span class = "sao"> * </span></label><textarea name = "question" class = 'bgtextarea'></textarea></p>
		<label>&nbsp;</label><input type = "submit" value = "&nbsp;&nbsp;&nbsp;<?php echo GUI;?>&nbsp;&nbsp;&nbsp;" name = "addnew"/>
							&nbsp;&nbsp;<input type = "reset" value = "<?php echo RESET;?>" name = "reset"/>
	</form>
</div>
<div class = "clear"></div>