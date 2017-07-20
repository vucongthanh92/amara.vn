<div class="main">
<div class="menu_theloaideal ">
    <a class="a_menudeal" href="#">
        <span class="spn_dealcat">ĐĂNG NHẬP</span>
    </a>
</div>
<div class="space_10"></div>
<div class="index_middle">
<?php if($data['errordn']==1) echo '<div class="error">'.$data['messagedn'].'</div>';?>
<form action="dang-nhap.html"  method="post">
<div class="form">
    <span data-valmsg-replace="true" data-valmsg-for="IsValidUser" class="field-validation-valid"></span>
    <div class="row"><span class="row_L">EMAIL<font class="other_color_star">*</font></span><input type="email" value="" title="Email không hợp lệ" placeholder="ĐỊA CHỈ EMAIL" name="email" id="Email" data-val-required="Vui lòng nhập email" data-val="true" class="text"></div>
    <div class="login_err"><span data-valmsg-replace="true" data-valmsg-for="Email" class="field-validation-valid"></span></div>
    <div class="row">
        <span class="row_L">MẬT KHẨU<font class="other_color_star">*</font></span>
        <input type="password" placeholder="NHẬP MẬT KHẨU" name="password" id="Password" data-val-required="Vui lòng nhập mật khẩu" data-val="true" class="text">
    </div>
    <div class="login_err"><span data-valmsg-replace="true" data-valmsg-for="Password" class="field-validation-valid"></span></div>
</div>
<div class="bg_button">
        <input type="submit" value="ĐĂNG NHẬP" class="btn_green_big">
 </div>
</form>
   <p class="note4"><a href="quen-mat-khau.html">Bạn quên mật khẩu?</a></p> 
    <p class="note">Chưa có tài khoản? <a href="dang-ky.html">Đăng ký ngay</a></p>
</div>
</div>