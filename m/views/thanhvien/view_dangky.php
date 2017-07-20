<div class="main">
<div class="menu_theloaideal ">
    <a class="a_menudeal" href="#">
        <span class="spn_dealcat">ĐĂNG KÝ THÀNH VIÊN</span>
    </a>
</div>
<div class="space_10"></div>
<div class="index_middle">

<div class="form">
<?PHP
if($data['error']==1) echo '<div class="error">'.$data['message'].'</div>';
?>
<form action="<?=BASE_URL ?>dang-ky.html" method="post" >
    <div class="row">
        <span class="row_L">HỌ TÊN<font class="other_color_star">*</font></span>
        <input type="text" value="<?=$data['name'] ?>" placeholder="NHẬP HỌ TÊN" name="name" id="Name" data-val-required="Vui lòng nhập họ tên" data-val="true" class="text">
    </div>
    <div class="login_err"><span data-valmsg-replace="true" data-valmsg-for="Name" class="field-validation-valid"></span></div>
    <div class="row"><span class="row_L">EMAIL<font class="other_color_star">*</font></span><input type="email" value="<?=$data['email'] ?>" title="Email không hợp lệ" placeholder="ĐỊA CHỈ EMAIL" name="email" id="RegisterEmail" data-val-required="Vui lòng nhập email" data-val-regex-pattern="^[-!#$%&amp;'*+/0-9=?A-Z^_a-z{|}~](\.?[-!#$%&amp;'*+/0-9=?A-Z^_a-z{|}~])*@[a-zA-Z](-?[a-zA-Z0-9])*(\.[a-zA-Z](-?[a-zA-Z0-9])*)+$" data-val-regex="Email không hợp lệ." data-val="true" class="text"></div>
    <div class="login_err">
        <span class="field-validation-error "><span id="emailValidationMessage" data-valmsg-replace="true" data-valmsg-for="RegisterEmail" class="field-validation-valid"></span>
            
        </span>
    </div>
    <div class="row">
        <span class="row_L">MẬT KHẨU<font class="other_color_star">*</font></span>
        <input type="password" placeholder="NHẬP MẬT KHẨU" name="password" id="RegisterPassword" data-val-required="Vui lòng nhập mật khẩu" data-val-length-min="6" data-val-length-max="50" data-val-length="Mật khẩu phải có ít nhất 6 ký tự" data-val="true" class="text">
    </div>
    <div class="login_err"><span data-valmsg-replace="true" data-valmsg-for="RegisterPassword" class="field-validation-valid"></span></div>            
    <div class="row">
        <span style="padding-top: 2px !important;" class="row_L">MẬT KHẨU<font class="other_color_star">*</font><br>
            <font style="font-size: 12px; color: #a9a9a9;">nhập lần 2</font></span>
        <input type="password" placeholder="NHẬP LẠI MẬT KHẨU" name="repassword" id="RetypePassword" data-val-equalto-other="*.RegisterPassword" data-val-equalto="Mật khẩu bạn nhập không khớp" data-val="true" class="text">
    </div>
    <div class="login_err"><span data-valmsg-replace="true" data-valmsg-for="RetypePassword" class="field-validation-valid"></span></div>

    <div class="row">
        <span style="padding-top: 2px !important;" class="row_L">ĐIỆN THOẠI<font class="other_color_star">*</font><br>
            <font style="font-size: 12px; color: #a9a9a9;">di động</font></span>
        <input type="tel" value="<?=$data['phone'] ?>" placeholder="ĐIỆN THOẠI DI ĐỘNG" name="phone" id="Mobile" data-val-required="Vui lòng nhập số ĐTDĐ" data-val-regex-pattern="09\d{8}|01\d{9}" data-val-regex="Không hợp lệ, số di động bắt đầu bằng 09 hoặc 01 và đủ số" data-val="true" class="text">
    </div>
    <div class="login_err"><span data-valmsg-replace="true" data-valmsg-for="Mobile" class="field-validation-valid"></span></div>

    <div class="row">
        <span class="row_L">GIỚI TÍNH<font class="other_color_star">*</font></span>
        <select name="gender" id="gender" data-val-requiredifferent-param="-1" data-val-requiredifferent="Vui lòng chọn giới tính" data-val="true" class="gioitinh"><option value="-1">CHỌN GIỚI TÍNH</option>
<option value="M"  <?php if($data['gender']=='M') echo 'selected="selected"'; ?> >Nam</option>
<option value="F" <?php if($data['gender']=='F') echo 'selected="selected"'; ?>  >Nữ</option>
</select>
    </div>
    <div class="login_err"><span data-valmsg-replace="true" data-valmsg-for="Gender" class="field-validation-valid"></span></div>
    	<div class="bg_button">
            <input type="submit" value="ĐĂNG KÝ" class="btn_green_big">
        </div>
      </form>
   <p class="note">Đã có tài khoản <a href="dang-nhap.html">Đăng nhập tại đây</a></p>
    
</div>

</div>