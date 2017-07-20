<?php
	if($_SESSION['login_id']!=1) redirect(BASE_URL."/dang-nhap.html");
	$mpayment = new Models_MPayment;
	$mproduct = new Models_MProduct;
	if(isset($_POST["name"])){
		$error =0;
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$thanhtoan = $_POST['thanhtoan'];
		$housenumber = $_POST['housenumber'];
		$streetname = $_POST['streetname'];
		$buildingname = $_POST['buildingname'];
		$cityid = $_POST['cityid'];
		$quanhuyen = $_POST['quanhuyen'];
		$note = $_POST['note'];
		$soluong = $_POST['soluong'];
		$tong  = $_POST['tong'];
		
		if($thanhtoan ==""){
			$error = 1;
			$message .= "Bạn chưa chọn phương thức thanh toán <br>";
		}
		if($name ==""){
			$error = 1;
			$message .= "Bạn  chưa nhập họ tên <br>";
		}
		if($email ==""){
			$error =1;
			$message .= "Bạn  chưa nhập họ tên <br>";
		}
		if( isValidEmail($email) == false){
			$error =1;
			$message .= "Email không hợp lệ <br />"; 	
		}
		if($housenumber ==""){
			$error = 1;
			$message .= "Bạn chưa nhận số nhà <br>";
		}
		if($streetname ==""){
			$error = 1;
			$message .= "Bạn chưa nhập tên đường <br>";
		}
		if($cityid ==0){
			$error = 1;
			$message .= "Bạn chưa chọn thành phố <br>";
		}
		if($quanhuyen ==0){
			$error = 1;
			$message .= "Bạn chưa chọn quận huyện <br>";
		}
		else if ($error == 0)
		{
			
			$sq2 = "select * from `ward-dist` where  id= '".$quanhuyen."'";
			$kq = mysql_query($sq2) or die(mysql_error());
			$row = mysql_fetch_assoc($kq);
			
			$ship = "Phí giao hàng trong ".$row['name']." là : ".number_format($row['ship'],0,",",".")." VNĐ";
			
			$address = "Tòa nhà ".$note_address." ,  ".$house_number."  đường ".$street_name." , Quận ".$quan.", ".$city;
			
			if($buildingname=="") {
				$address =   $housenumber."  đường ".$streetname." , ".$row['name'].", TP. Hồ Chí Minh";
			}
			else {
				$address =   "Tòa nhà ".$buildingname.", ".$housenumber."  đường ".$streetname." , ".$row['name'].", TP. Hồ Chí Minh";
			}
				$sql = "INSERT INTO  `order` (
						`id` ,
						`pay_id` ,
						`service` ,
						`user_id` ,
						`admin_id` ,
						`team_id` ,
						`city_id` ,
						`card_id` ,
						`state` ,
						`quantity` ,
						`realname` ,
						`mobile` ,
						`zipcode` ,
						`address` ,
						`express` ,
						`express_xx` ,
						`express_id` ,
						`express_no` ,
						`price` ,
						`money` ,
						`origin` ,
						`credit` ,
						`card` ,
						`fare` ,
						`condbuy` ,
						`remark` ,
						`create_time` ,
						`ship` ,
						`pay_time`
						)
						VALUES (
						NULL , NULL ,  'alipay',  '".$_SESSION['login_user_id']."',  '0',  '0',  '".$cityid."', NULL ,  'unpay',  '".$soluong."',  '".$name."', '".$mobile."' , NULL , '".$address."' ,  'Y', NULL ,  '0', NULL ,  '".$tong."',  '".$tong."',  '".$tong."',  '0.00',  '0.00',  '0.00', '".$thanhtoan."' , '".$note."' ,  '".time()."', '".$ship."', '".$date."'
						);";
			
		
			mysql_query($sql) or die(mysql_error());
			$idorder = mysql_insert_id();
			foreach($_SESSION['cart2'] as $k=>$v){
				$sql = "select * from  `team` where id= ".$k;
				$mproduct ->countView($k);
				$kq = mysql_query($sql);
				$row= mysql_fetch_assoc($kq);
				$sql = "insert into `cart`(order_id,team_id,price,soluong) values (".$idorder.",".$k.",".$row['team_price'].",".$v.")";
				mysql_query($sql) or die(mysql_error());
			} 
			unset($_SESSION['cart2']);
			
			redirect(BASE_URL."xac-nhan.html");
			
		}
		
		$data["error"] =$error;
		$data["message"] = $message;
		$data["hoten"] = $hoten;
		$data["housenumber"] = $housenumber;
		$data["streetname"] = $streetname;
		$data["buildingname"] = $buildingname;
		$data["note"] = $note;

	
	}
?>
<div class="main">
<div class="menu_theloaideal ">
    <a class="a_menudeal" href="#" onclick="return false">
        <span class="spn_dealcat">Giỏ hàng</span>
    </a>
</div>
<div class="space_10"></div>
<div class="index_middle">
<form action="<?=BASE_URL ?>thanh-toan.html" method="post">
<table cellspacing="0" cellpadding="0" border="0" class="shopping_cart_detail">
<tbody>
<?php
	$mproduct = new Models_MProduct;
	$tong=0;
	$soluong = 0;
	foreach($_SESSION['cart2'] as $k=>$v){
		if($k>0){
		$pro = $mproduct->getOneProduct($k);
		$tong = $tong+$pro['team_price']*$v;
		$soluong = $soluong +$v;
		$prionce = $pro['team_price']*$v;
		$i++;
?>
<tr class="active">
    <th valign="top" align="right" class="left_col" colspan="5">
    <a href="" onclick="return false"><?=$pro['product'] ?></a>
    </th>
</tr>
<tr>
	<td width="9%" valign="top" align="left" class="left_col">
	<a><img width="71" alt="" src="<?=BASE_URL_DATA.PATH_IMG_PRODUCT.$pro['image'] ?>"></a></td>
	<td width="24%" valign="middle" align="left" class="bg_price">
   <p class="book_price"><?=bsVndDot($pro['team_price']) ?> đ</p>
    </td>
    <td>x</td>
    <td width="20%" valign="middle" align="right">
		<?=$v ?>
    </td>
    <td align="right"> = <span style="color:#F00; font-family:Arial, Helvetica, sans-serif; font-size:11px;"><?=bsVndDot($prionce) ?> đ </span> </td>
 </tr>
 <tr class="line_null"><td valign="top" align="right" colspan="5"></td></tr>
<?php }} ?>
</tbody>
 </table>

<input type="hidden" name="tong22" value="<?=$tong ?>" id = "tong22" />
<input type="hidden" name="soluong" value="<?=$soluong ?>"  />
<?php
if($soluong<=0) redirect(BASE_URL);
?>
<div class="div_ship">

<div class="detail_sum">
    <div class="sum_L">Thành tiền:</div>
    <div class="sum_R" id="cartPriceByQuantity"><?=bsVndDot($tong) ?>  đ</div>
</div>
<div class="detail_sum"><div class="sum_L"> Phí vận chuyển:</div><div class="sum_R" id="shippingFee">Miễn phí</div></div>
<div class="detail_sum">
    <div class="sum_L"><strong>Cần thanh toán</strong>:</div>
    <div class="sum_R">
        <p id="cartTotalPrice" class="book_price"><?=bsVndDot($tong) ?> đ</p>
    </div>
</div>
<input type="hidden" name="tong" value="<?=$tong ?>"  />
</div>

<div class="menu_theloaideal ">
    <a class="a_menudeal" href="#" onclick="return false">
        <span class="spn_dealcat">Thông tin khách hàng</span>
    </a>
</div>
<div class="space_10"></div>
<div class="index_middle">
<?php if($data["error"] == 1) echo '<div class="error">'.$data["message"]."</div>"; ?>

<div id="BoxAddress">
        <div class="form buy1">
            <div class="row">
                    <span class="row_L">THANH TOÁN <font class="other_color_star">*</font></span>
                    <select class="gioitinh valid" id="ddthanhtoan" name="thanhtoan" style="margin-right:5px">
                		<option value="Thu tiền tại nhà">Thu tiền tại nhà</option>
                        <option value="Thanh toán tại công ty">Thanh toán tại công ty</option>
                        <option value="Chuyển khoản qua ngân hàng">Chuyển khoản qua ngân hàng</option>
                        <option value="Thanh toán qua Ngân Lượng">Thanh toán qua Ngân Lượng</option>
                         <option value="Thanh toán qua Bảo Kim">Thanh toán qua Bảo Kim</option>
					</select>
                </div>
            <div class="row form_diachi">
                <span class="row_L">HỌ VÀ TÊN<font class="other_color_star">*</font></span>
                <input class="text valid" data-val="true" data-val-required="Họ và tên không hợp lệ" id="CustomerAddressModel_ReceiverName" name="name" placeholder="HỌ TÊN NGƯỜI NHẬN" type="text" value="<?=$data['user']['realname'] ?>">
            </div>
           
            <div class="row">
                <span class="row_L" style="padding-top: 2px !important;">EMAIL<font class="other_color_star">*</font></span>
                <input class="text valid" data-val="true" data-val-regex="Email không hợp lệ" data-val-regex-pattern="^[-!#$%&amp;'*+/0-9=?A-Z^_a-z{|}~](\.?[-!#$%&amp;'*+/0-9=?A-Z^_a-z{|}~])*@[a-zA-Z](-?[a-zA-Z0-9])*(\.[a-zA-Z](-?[a-zA-Z0-9])*)+$" data-val-required="Email không hợp lệ" id="CustomerAddressModel_Email" name="email" placeholder="EMAIL NGƯỜI NHẬN HÀNG" title="Email không hợp lệ" type="email" value="<?=$data['user']['email'] ?>">
            </div>
            <div class="row">
                <span class="row_L" style="padding-top: 2px !important;">ĐIỆN THOẠI<font class="other_color_star">*</font><br>
                    <font style="font-size: 12px; color: #a9a9a9;">di động</font></span>
                <input class="text valid" data-val="true" data-val-regex="Không hợp lệ, số di động bắt đầu bằng 09 hoặc 01 và đủ số" data-val-regex-pattern="(^(09)\d{8}$)|(^(01)\d{9}$)" data-val-required="Điện thoại không hợp lệ" id="CustomerAddressModel_Mobile" name="mobile" placeholder="ĐIỆN THOẠI NGƯỜI NHẬN HÀNG" type="tel" value="<?=$data['user']['mobile'] ?>">
            </div>

            <div class="row">
                <span class="row_L">SỐ NHÀ<font class="other_color_star">*</font></span>
                <input class="text" data-val="true" data-val-required="Vui lòng nhập số nhà" id="CustomerAddressModel_HouseNumber" name="housenumber" placeholder="SỐ NHÀ / NGÕ / HẺM / NGÁCH" type="text" value="<?=$data['housenumber'] ?>">
            </div>
            <div class="row">
                <span class="row_L">TÊN ĐƯỜNG<font class="other_color_star">*</font></span>
                <input class="text" data-val="true" data-val-required="Vui lòng nhập tên đường" id="CustomerAddressModel_StreetName" name="streetname" placeholder="TÊN ĐƯỜNG" type="text" value="<?=$data['streetname'] ?>">
                <br class="clean">
            </div>
            <div class="buy_1_err">
                <span class="field-validation-valid" data-valmsg-for="CustomerAddressModel.StreetName" data-valmsg-replace="true"></span>
            </div>
         
              
            <div class="row">
                <span class="row_L">TÒA NHÀ</span>
                <input class="text" id="CustomerAddressModel_BuildingName" name="buildingname" placeholder="TÊN TÒA NHÀ (NẾU CÓ)" type="text" value="<?=$data['buildingname'] ?>">
            </div>
            <div id="divLoadingCityDistrict">
                <div class="row">
                    <span class="row_L">THÀNH PHỐ<font class="other_color_star">*</font></span>
                    <select class="gioitinh valid" id="ddlCity" name="cityid" style="margin-right:5px">
                    <option value="0"> -- Chọn tỉnh /thành phố -- </option>
                    <?php /*
						$sql = "select * from `ward-dist` where parent = 1";
						$kq = mysql_query($sql) or die(mysql_error());
						while($row = mysql_fetch_assoc($kq)){
					?>
                    	<option value="<?=$row['id'] ?>" > <?=$row['name'] ?> </option>
              		<?php } */ ?>
                    <option value="3">Hồ Chí Minh</option>
					</select>
                </div>
                <div class="row">
                    <span class="row_L">QUẬN - HUYỆN<font class="other_color_star">*</font></span>
                    <select class="gioitinh input-validation-error" data-val="true"  data-val-requiredifferent-param="0" id="ddlDistrict" name="quanhuyen" style="margin-right:5px">
     
           		 </select>
                </div>
                <div id="divWard" class="row" style="display: none;">
                    <span class="row_L">PHƯỜNG - XÃ<font class="other_color_star">*</font></span>
                    <select class="gioitinh" data-val="true" data-val-number="The field WardID must be a number." data-val-requiredifferent="Vui lòng chọn Quận / Huyện" data-val-requiredifferent-param="0" id="ddlWard" name="CustomerAddressModel.WardID"></select>
                    <br class="clean">
                </div>
            </div>
              
            <div class="row" style="position: relative;">
                <span class="row_L">Ghi chú</span>
              	<textarea name="note" class="text_are"> <?=$data['note'] ?></textarea>
            </div>
        </div>
    </div>
	<div class="bg_button">
        <input id="SaveAddress" class="btn_green_big" type="submit" value="Đặt hàng">
    </div>
 </form>   
</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('#ddlCity').change(function(){
		id = $(this).val();
		$('#ddlDistrict').load('loadquanhuyen.php?id='+id);
	});
	$('#ddlDistrict').change(function(){
		id = $(this).val();
		tt = $('#tong22').val();
		url = "loadship.php?id="+id+'&tt='+tt;
		$('.div_ship').load(url);
		
	});
})
</script>