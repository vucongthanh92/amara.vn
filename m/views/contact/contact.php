<style type="text/css">
.info2 {width:530px; min-height:200px; background-color:#edebec; padding:10px; padding-top:5px; float:left; margin-top:10px; margin-left:5px; font-size:12px !important;}
.lienhe { width:480px; float:left; overflow:hidden; padding:5px; margin-left:10px; padding-left:0px; margin-top:10px; font-size:12px !important; margin-left:40px;}
.lienhe input[type=text] { border:solid 1px #CCC; width:300px; height:20px; margin-top:10px; }
#noidung {  border:solid 1px #CCC; width:300px; margin-top:10px; margin-bottom:10px; height:100px;}
.lienhe td { font-size:12px !important;}
#change-image { cursor:pointer; margin:0px; }
#btngui { padding:5px;  border:solid 1px #CCC; border-radius:15px; padding-left:10px; font-weight:bold; padding-right:10px;  margin-top:5px; margin-bottom:10px;}
#btngui:hover { color:#F00;}
.frmlienhe{ width:320px; height:auto; float:left; padding-left:20px}
</style>
<h2 class="tieude"> <?php echo $data['map_title'];?></h2>
<div class = 'noidung-sp'>

<div class="info2">	
	<?php
		echo stripslashes($data['ttlienhe']['content_'.lang]);
	?>
</div>

<div class="lienhe">
<?Php if($data['error']==1) { ?>
<div class="error"><?=$data['mesage'] ?></div>
<? } ?>
<form action="lien-he.htm" name="formlienhe" method="post">
	<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><?=HOTEN ?>(<span style="color:#F00">*</span>):</td>
    <td><input name="hoten" value="<?=$data['hoten'] ?>" type="text" /></td>
  </tr>
  <tr>
    <td><?=DIACHI ?>(<span style="color:#F00">*</span>):</td>
    <td><input name="diachi" value="<?=$data['add'] ?>" type="text" /></td>
  </tr>
  <tr>
    <td>Email(<span style="color:#F00">*</span>):</td>
    <td><input name="email" value="<?=$data['email'] ?>" type="text" /></td>
  </tr>
  <tr>
    <td><?=DIENTHOAI ?>(<span style="color:#F00">*</span>):</td>
    <td><input name="dienthoai" value="<?=$data['tell'] ?>" type="text" /></td>
  </tr>
  <tr>
    <td><?=NOIDUNG ?>(<span style="color:#F00">*</span>):</td>
    <td><textarea name="noidung" id="noidung"><?=$data["cont"] ?></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><img src="<?=USER_PATH_CAPTCHA ?>captcha.php" id="captcha" /><br />
    	<p onclick="
    document.getElementById('captcha').src='<?=USER_PATH_CAPTCHA ?>captcha.php?'+Math.random();
    document.getElementById('codecapcha').focus();"
    id="change-image"><?=HINHANHMOI ?></p>
    <input name="codecapcha" value="" type="text" id="codecapcha" style="width:150px; margin-top:5px;" />
    </td>
  </tr>
  <tr>
  <td>
  </td>
   <td>
   <input type="submit" name="btngui" id="btngui" value="<?=GUI ?>" />
  </td>
  </tr>
</table>
				
</form>				
<hr />					
<p style="margin-top:10px;"><?=GHICHU ?></p>					
	
</div>

<div style="clear:both; width:99%; margin-top:10px; text-align:center; overflow:hidden;">

		<?php echo stripslashes($data['googlemap']['content_'.lang]);?>
	
</div>


<div style = 'clear:left;'></div>
</div>