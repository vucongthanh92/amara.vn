<div class="main">
<div class="menu_theloaideal ">
    <a class="a_menudeal" href="#">
         <span class="spn_dealcat">Chào, <?=$_SESSION['login_username']; ?> !</span>
    </a>
</div>
<div class="space_10"></div>
<div class="index_middle">


<div class="index_header1">
    <div class="header">
        <p class="logo">
            <input type="button" onclick="window.location='<?=BASE_URL ?>thong-tin-tai-khoan.html';" class="btn_back"></p>
        <p class="text_top">ĐỔI MẬT KHẨU</p>
    </div>
</div>

<?php if($data['error'] == 1) echo '<div class="error">'.$data['message']."</div>"; ?>
<?php if($data['secessfull'] == 1) echo '<div class="sercesful">'.$data['message']."</div>"; ?>
<form method="post" action="" novalidate="novalidate">       
 <div class="form">

                <div class="row">
                    <span class="row_L" style="padding-top: 2px !important;">MẬT KHẨU<font class="other_color_star">*</font><br>
                        <font style="font-size: 12px; color: #a9a9a9;">cũ</font></span>
                    <input type="password" placeholder="NHẬP LẠI MẬT KHẨU CŨ" name="OldPassword" id="OldPassword" data-val-required="Vui lòng nhập mật khẩu hiện tại" data-val="true" class="text">
                </div>
                <div class="login_err"><span data-valmsg-replace="true" data-valmsg-for="OldPassword" class="field-validation-valid"></span></div>
            <div class="row">
                <span class="row_L" style="padding-top: 2px !important;">MẬT KHẨU<font class="other_color_star">*</font><br>
                    <font style="font-size: 12px; color: #a9a9a9;">mới</font></span>
                <input type="password" placeholder="NHẬP MẬT KHẨU MỚI" name="NewPassword" id="NewPassword" data-val-required="Vui lòng nhập mật khẩu mới" data-val-length-min="6" data-val-length-max="50" data-val-length="Mật khẩu phải có ít nhất 6 ký tự" data-val="true" class="text">
            </div>
            <div class="login_err"><span data-valmsg-replace="true" data-valmsg-for="NewPassword" class="field-validation-valid"></span></div>

            <div class="row">
                <span class="row_L" style="padding-top: 2px !important;">MẬT KHẨU<font class="other_color_star">*</font><br>
                    <font style="font-size: 12px; color: #a9a9a9;">nhập lần 2</font></span>
                <input type="password" placeholder="NHẬP LẠI MẬT KHẨU" name="RetypePassword" id="RetypePassword" data-val-equalto-other="*.NewPassword" data-val-equalto="Mật khẩu bạn nhập không khớp" data-val="true" class="text">
            </div>
            <div class="login_err"><span data-valmsg-replace="true" data-valmsg-for="RetypePassword" class="field-validation-valid"></span></div>
        </div>
        <div class="bg_button">
            <input type="submit" class="btn_green_big" value="CẬP NHẬT" name="btnupdate">
        </div>
</form>
</div>
</div>