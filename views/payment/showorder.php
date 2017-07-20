<?php
	$to = $_SESSION['emaillienhe_vn'];
	$mpayment = new Models_MPayment;
	if(isset($_POST["thongtin"]))
	{
		$error =0;
		$hoten = $_POST["hoten"];
		$email = $_POST["email"];
		$diachi = $_POST["diachi"];
		$dienthoai = $_POST["dienthoai"];
		$thuongtucthanhtoan = $_POST["phuongthucthanhtoan"];
		$thongtin =$_POST["thongtin"];
		$dienthoai1 = $_POST["mdienthoai"]." ".$_POST["dienthoai"];
		if($hoten ==""){
			$error = 1;
			$message .= "Bạn  chưa nhập họ tên <br>";
		}
		if($email ==""){
			$error =1;
			$message .= "bạn  chưa nhập họ tên <br>";
		}
		/*if( isValidEmail($email) == false){
			$error =1;
			$message .= "Email không hợp lệ <br />"; 	
		}*/
		if($diachi ==""){
			$error = 1;
			$message .= "Bạn chưa nhạp địa chỉ <br>";
		}
		if($thuongtucthanhtoan ==0){
			$error = 1;
			$message .= "Bạn chưa chọn phương thức thanh toán <br>";
		}
		else if ($error == 0)
		{
			if($thuongtucthanhtoan == 1) $pt ="Chuyển khoản ngân hàng ";
			if($thuongtucthanhtoan == 2) $pt ="Thanh toán trực tiếp";
			if($thuongtucthanhtoan == 3) $pt ="Thanh toán khi nhận hàng";
			
				$i =1;
				$dongdonhang = 0;
				foreach($_SESSION["cart2"] as $k=>$v) {
				$sql = "SELECT * FROM team WHERE id = '$k'";
				$rw= mysql_query($sql) or die(mysql_error());
				$row = mysql_fetch_assoc($rw);	
				$dongdonhang = $dongdonhang + ($row["team_price"] *$v);
			 
			    $sanpham .= '<tr>
				<td>'.$i.'</td>
				
				<td>'.$row["product"].'</td>
				<td>'.$v.'</td>
				<td style="color:#FF0000; font-size:12px; font-weight:bold;">'. number_format($row["team_price"],0,",",".").' VNĐ</td>
				
			  </tr>';
			
			  } 
			///--------------------------------
			ob_start();
			echo file_get_contents("mail/emaidathang_admin.html");
			$noidung = ob_get_clean();
			$noidung =str_replace("{thongtinsanpham}", $sanpham ,$noidung);
			$noidung = str_replace("{tongdonhang}", bsVndDot($dongdonhang) , $noidung);
			$noidung = str_replace("{email}", $email, $noidung);
			$noidung = str_replace("{dienthoai}", $dienthoai , $noidung);
			$noidung =str_replace("{noidung}", $thongtin , $noidung);
			$noidung =str_replace("{phuongthucthanhtoan}", $pt , $noidung);
			$noidung =str_replace("{diachi}", $diachi , $noidung);
			$noidung =str_replace("{hoten}", $hoten , $noidung);
			$tieude = "Thông tin đơn đặt hàng từ amara.vn";
			smtpmailer($to,$email,$hoten,$tieude,$noidung);
			// end goi mail admin
			ob_start();
			echo file_get_contents("mail/emaidathang_khachhang.html");
			$noidung1 = ob_get_clean();
			$noidung1 =str_replace("{thongtinsanpham}", $sanpham ,$noidung1);
			$noidung1 = str_replace("{tongdonhang}", bsVndDot($dongdonhang) , $noidung1);
			$noidung1 = str_replace("{email}", $email, $noidung1);
			$noidung1 = str_replace("{dienthoai}", $dienthoai , $noidung1);
			$noidung1 =str_replace("{noidung}", $thongtin , $noidung1);
			$noidung1 =str_replace("{phuongthucthanhtoan}", $pt , $noidung1);
			$noidung1 =str_replace("{diachi}", $diachi , $noidung1);
			$noidung1 =str_replace("{hoten}", $hoten , $noidung1);
			$tieude = "Thông tin đơn đặt hàng từ amara.vn";
			smtpmailer($email,$to,'amara.vn',$tieude,$noidung1);
			
			/*lưu thông tin của khách hàng*/
				
			$infokh = array();
			$infokh['fullname'] = $hoten;
			$infokh['email'] = $email;
			$infokh['address'] = $diachi;
			$infokh['tel'] = $dienthoai;
			$infokh['fax'] = $dienthoai1;
			$infokh['methodpay'] = $thuongtucthanhtoan;
			$infokh['note'] = $thongtin;
			$infokh['date'] = date("Y-m-d H:i:s");
			$infokh['idUser'] = $_SESSION['login_user_id'];
			$mpayment->addCustomer($infokh);
			$idmax = mysql_insert_id();
			//them vao gio hang
			foreach($_SESSION['cart2'] as $k => $v)
			{
				if($k>0)
				{
				    $infocart[] = array
					(
					   "idcustomer"	=> $idmax,
					   "idpro"			=> $k,
					   "amount"		=> $v,
				    );
					$_SESSION['id_cus']=$idmax;
				}
			}
			
			$mpayment->addCustomerCart($infocart);
			redirect(BASE_URL."thong-tin-dat-hang.html");
		}
		
		
		$data["error"] =$error;
		$data["message"] = $message;
		$data["hoten"] = $hoten;
		$data["thuongtucthanhtoan"] = $thuongtucthanhtoan;
		$data["email"] = $email;
		$data["diachi"] = $diachi;
		$data["dienthoai"] = $dienthoai;
		$data["thongtin"] = $thongtin;
	}
?>
<div class="index_middle">
<div class="content_cart">

<h2 class="tieude">Thông tin thanh toán</h2>
<div class="space_10"></div>
<div class="header-cart">
<span class="title-cart">Giỏ hàng của bạn</span>
<span class="step-cart step2-cart">Cập nhật giỏ hàng</span>
</div>
<div class="info2">	
<p class="title_cat">Thông tin người nhận</p>
<div class="space_10" style="height:24px;"></div>

<form id="form_desktop" action="" method="post">
<div class="info_customer">
<?php
	if($error == 1 ){
		echo '<div class="space_10"></div>';
		echo "<div class='error'>".$data["message"]."</div>";
		echo '<div class="space_10"></div>';
	}
?>

<table width="700" border="0" cellspacing="0" cellpadding="0" style="margin-left:40px; margin-top:10px; text-align:left;">
<tbody>
  <tr>
    <td ><?=HOTEN ?><span style="color:#FF0000">*</span>: <br />
    	<input type="text" name="hoten" value="<?=$data["hoten"] ?>"  />
    </td>
    <td>
    	<?=DIENTHOAI ?><span style="color:#FF0000">*</span>:<br />
  	 <input type="text" id="desktop_dienthoai" name="dienthoai" value="<?=$data['dienthoai'] ?>" />
    </td>
    <td>
    	Email<span style="color:#FF0000">*</span>:<br />
  	 	<input type="text" name="email" value="<?=$data['email'] ?>"  />
    </td>
  </tr>
  <tr>
  	<td><?=DIACHI ?><span style="color:#FF0000">*</span>:<br />
     <input type="text" name="diachi" value="<?=$data['diachi'] ?>" /> 
     </td>
     <td> 
     	Phương thức thanh toán<span style="color:#FF0000">*</span>:<br />
        <select name="phuongthucthanhtoan">
			<option value="0">Phương thức thanh toán</option>
			<option value="1">Chuyển khoản qua ngân hàng</option>
            <option value="3">Thanh toán khi nhận hàng</option>	
			<option value="2">Thanh toán trực tiếp</option>	
		</select>
     </td>
 
  </tr>
  <tr>
   <td colspan="3"> Ghi chú <span style="color:#FF0000">nếu có</span> <br />
    <textarea name="thongtin" id="thongtin_order"><?=$data['thongtin'] ?></textarea></td>
  </tr>
  
 </tbody>
</table>
</div>
<div style="text-align:right; margin-top:10px;" class="list_btn_cart">
    <a href="gio-hang.html"><img src="<?=USER_PATH_IMG ?>btn_quaylaigiohang.png" border="0"  style="margin-bottom:-2px; margin-bottom:5px;" /></a>
    <input name="btndathang" type="image"  src="<?=USER_PATH_IMG ?>btn_tieptuc_vn.png" id="btndathang_desktop" />
</div>
</form>
</div>
<div class="hd_thanhtoan pay_desktop">
<p class="title_hd"><img src="<?=USER_PATH_IMG ?>den.png" /> Hướng dẫn mua hàng</p>
<div class="noidunguongdanmuahang">
<p>Vui lòng đưa sản phẩm muốn mua vào giỏ hàng.</p>
<p>Chọn số lượng và kiểm tra lại số tiền cần thanh toán ở mục thành tiền.</p>
<p>Cập nhật thông tin đầy đủ trong mục thông tin đặt hàng.</p>
<p> Công ty sẽ liên hệ để xác nhận đơn hàng, thỏa thuận phương thức thanh toán và giao hàng.</p>
<p>Hoặc bạn có thể chủ động liên hệ trực tiếp với công ty bằng điện thoại, chat, email để xác nhận đơn hàng.</p>
</div>
</div>



<form id="form_mobi" action="" method="post">
<div class="info_customer">
<?php
	if($error == 1 ){
		echo '<div class="space_10"></div>';
		echo "<div class='error'>".$data["message"]."</div>";
		echo '<div class="space_10"></div>';
	}
?>
<table>
<tbody>
    <tr>
        <td><?=HOTEN ?><span style="color:#FF0000">*</span>:</td>
        <td><input type="text" name="hoten" value="<?=$data["hoten"] ?>"  /></td>
    </tr>
    
    <tr>
        <td class="tab_title"><?=DIENTHOAI ?><span style="color:#FF0000">*</span>:</td>
        <td><input type="text" id="mobi_dienthoai" name="dienthoai" value="<?=$data['dienthoai'] ?>" /><input type="hidden" name="mdienthoai" value="+" /></td>
    </tr>

    <tr>
        <td class="tab_title">Email<span style="color:#FF0000">*</span>:</td>
        <td><input type="text" name="email" value="<?=$data['email'] ?>"  /></td>
    </tr>
     
  	<tr>
	    <td class="tab_title"><?=DIACHI ?><span style="color:#FF0000">*</span>:</td>
        <td><input type="text" name="diachi" value="<?=$data['diachi'] ?>" /></td>
    </tr>

    <tr>
        <td class="tab_title">Phương thức thanh toán<span style="color:#FF0000">*</span>:</td>
        <td><select name="phuongthucthanhtoan">
                <option value="0">Phương thức thanh toán</option>
                <option value="1">Chuyển khoản qua ngân hàng</option>
                <option value="3">Thanh toán khi nhận hàng</option>	
                <option value="2">Thanh toán trực tiếp</option>	
            </select></td>
    </tr>

    <tr>
        <td>Ghi chú <span style="color:#FF0000">nếu có</span></td>
        <td><textarea name="thongtin" id="thongtin_order"><?=$data['thongtin'] ?></textarea></td>
    </tr>
</tbody>
</table>

<div style="text-align:right; margin-top:10px;" class="list_btn_cart">
    <a href="gio-hang.html"><img src="<?=USER_PATH_IMG ?>btn_quaylaigiohang.png" border="0"  style="margin-bottom:-2px; margin-bottom:5px;" /></a>
    <input name="btndathang" type="image" src="<?=USER_PATH_IMG ?>btn_tieptuc_vn.png" id="btndathang_mobi" />
</div>
</form>

<div class="hd_thanhtoan">
<p class="title_hd"><img src="<?=USER_PATH_IMG ?>den.png" /> Hướng dẫn mua hàng</p>
<div class="noidunguongdanmuahang">
<p>Vui lòng đưa sản phẩm muốn mua vào giỏ hàng.</p>
<p>Chọn số lượng và kiểm tra lại số tiền cần thanh toán ở mục thành tiền.</p>
<p>Cập nhật thông tin đầy đủ trong mục thông tin đặt hàng.</p>
<p> Công ty sẽ liên hệ để xác nhận đơn hàng, thỏa thuận phương thức thanh toán và giao hàng.</p>
<p>Hoặc bạn có thể chủ động liên hệ trực tiếp với công ty bằng điện thoại, chat, email để xác nhận đơn hàng.</p>
</div>
</div>

<div class="space_10"></div>
</div>
</div>

<div id="loading">
     <div>Xin chờ trong giây lát...</div>
     <img src="public/template/images/Progress_bar.gif" />
</div>


<script>
    $(document).ready(function(e) {
        $("#btndathang_desktop").click(function()
		{
			if($("#desktop_dienthoai").val()=="")
			{
				alert('Bạn chưa nhập số điện thoại');
				$("#desktop_dienthoai").focus();
				return false;
			}
			else
			{
			    $("#loading").css("display","block");
		        $("#btndathang_desktop").css("display","none");
			}
		})
		
		$("#btndathang_mobi").click(function()
		{
			if($("#mobi_dienthoai").val()=="")
			{
				alert('Bạn chưa nhập số điện thoại');
				$("#mobi_dienthoai").focus();
				return false;
			}
			else
			{
			    $("#loading").css("display","block");
		        $("#btndathang_mobi").css("display","none");
			}
		})
    });
</script>