<div class="mappage"><span class="title_"> <img src="<?=USER_PATH_IMG?>trangchu.jpg"/>THÔNG TIN KHÁCH HÀNG</span></div>
<div class = 'noidung-sp'>

<script language = 'javascript'>
function isEmail(s)
{
	if(s.indexOf(" ")>0) return false;
	if(s.indexOf("@")==-1)return false;
	var i=1; var sLength=s.length;
	if(s.indexOf(".")==-1) return false;
	if(s.indexOf("..")!=-1)return false;
	if(s.indexOf("@")!=s.lastIndexOf("@")) return false;
	if(s.lastIndexOf(".")==s.length-1)return false;
	var str="abcdefghikjlmnopqrstuvwxyz-@._0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	for(var j=0;j<s.length;j++)
		if(str.indexOf(s.charAt(j))==-1)
	return false;
	return true;
}

function thanhtoan()
{
	if(document.ftt.fullname.value=="")
	{
		alert("<?php echo KH_EMPTYHOTEN;?>");
		return false;
	}
	if(document.ftt.email.value=="")
	{
		alert("<?php echo KH_EMPTYEMAIL;?>.");
		return false;
	}
	else if(isEmail(document.ftt.email.value)==false)
	{
		alert("<?php echo KH_WRONGEMAIL;?>");
		return false;
	}
	if(document.ftt.address.value=="")
	{
		alert("<?php echo KH_EMPTYADD;?>");
		return false;
	}
	if(document.ftt.tel.value=="")
	{
		alert("<?php echo KH_EMPTYTEL;?>");
		return false;
	}
	if(document.ftt.methodpay.value=="")
	{
		alert("<?php echo KH_EMPTYTT;?>");
		return false;
	}
}
</script>

<form method = "post" action = "<?php echo BASE_URL;?>payment/showorder/dat-hang.htm" name = "ftt" onSubmit="return thanhtoan()">
	<div class = 'formtt'>
		<p><label><?php echo KH_HOTEN;?>:<span class = "sao"> * </span></label><input type = "text" name = "fullname" size = "50" maxlength = "100" value = "<?php if(isset($_SESSION['infocus']['fullname'])) echo $_SESSION['infocus']['fullname'];?>" class = 'formttinput'/></p>
		<p><label>Email:<span class = "sao"> * </span></label><input type = "text" name = "email" size = "50" maxlength = "100" value = "<?php if(isset($_SESSION['infocus']['email'])) echo $_SESSION['infocus']['email'];?>" class = 'formttinput'/></p>
		<p><label><?php echo KH_ADDTT;?>:<span class = "sao"> * </span></label><input type = "text" name = "address" size = "50" maxlength = "100" value = "<?php if(isset($_SESSION['infocus']['address'])) echo $_SESSION['infocus']['address'];?>" class = 'formttinput'/></p>
		<p><label><?php echo KH_ADDGH;?>:</label><input type = "text" name = "deliveryaddress" size = "50" maxlength = "100" value = "<?php if(isset($_SESSION['infocus']['deliveryaddress'])) echo $_SESSION['infocus']['deliveryaddress'];?>" class = 'formttinput'/></p>
		<p><label><?php echo KH_SDT;?>:<span class = "sao"> * </span></label><input type = "text" name = "tel" size = "50" maxlength = "100" value = "<?php if(isset($_SESSION['infocus']['tel'])) echo $_SESSION['infocus']['tel'];?>" class = 'formttinput'/></p>
		<p><label>Fax:</label><input type = "text" name = "fax" size = "50" maxlength = "100" value = "<?php if(isset($_SESSION['fax'])) echo $_SESSION['fax'];?>" class = 'formttinput'/></p>
		<div style = 'clear:left;'><label><?php echo KH_PTTT;?>:<span class = "sao"> * </span></label>
			<select name = 'methodpay' style = 'margin-top:15px;'>
				<option value = ''>-- <?php echo KH_CHONPTTT;?> -- </option>
				<option value = '<?php echo KH_CHUYENKHOAN1;?>'  <?php if(isset($_SESSION['infocus']['methodpay']) && $_SESSION['infocus']['methodpay'] == KH_CHUYENKHOAN1) echo "selected";?>><?php echo KH_CHUYENKHOAN1;?></option>
				<option value = '<?php echo KH_CHUYENKHOAN2;?>'  <?php if(isset($_SESSION['infocus']['methodpay']) && $_SESSION['infocus']['methodpay'] == KH_CHUYENKHOAN2) echo "selected";?>><?php echo KH_CHUYENKHOAN2;?></option>
				<option value = '<?php echo KH_CHUYENKHOAN3;?>'  <?php if(isset($_SESSION['infocus']['methodpay']) && $_SESSION['infocus']['methodpay'] == KH_CHUYENKHOAN3) echo "selected";?>><?php echo KH_CHUYENKHOAN3;?></option>
			</select>
		</div>
		<p><label style = 'padding-top:20px;'><?php echo KH_TTT;?>:</label><textarea name = "note" rows = "5" class = 'yeucauk'><?php if(isset($_SESSION['infocus']['note'])) echo $_SESSION['infocus']['note'];?></textarea></p>
	</div>
	
	<br/>
	<div class = 'formtt'><i><span class = "sao">*</span><?php echo KH_TTBB;?> </i></div>
	<div style = 'text-align:right;padding-right:30px;'><input type = 'submit' value = '<?php echo CART_NEXT;?>' name = 'guidonhang'></div>	
</form>	
</div>