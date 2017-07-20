<div class="clear"></div>
<div class="index_middle">

<div class="login_new_form">
            <dl class="login_new_form_item">
    <dt>Đăng nhập </dt>
    <dd class="login_col1">
<form method="post" action="<?=BASE_URL.'dang-nhap.html' ?>" novalidate="novalidate"><input type="hidden" value="~/" name="ReturnUrl" id="ReturnUrl">            <div class="login_form">
              
                <div class="row">
                    <span class="row_L">EMAIL<font class="other_color_star">*</font></span>
                    <input type="text" value="" placeholder="Địa chỉ email" name="email" id="Email" data-val-required="Vui lòng nhập email" data-val="true" class="text"><br class="clean">
                </div>
              
                <div class="row">
                    <span class="row_L">MẬT KHẨU<font class="other_color_star">*</font></span>
                    <input type="password" placeholder="Mật khẩu" name="password" id="password" data-val-required="Vui lòng nhập mật khẩu" data-val="true" class="text"><br class="clean">
                </div>
                <div class="err_lo"><span data-valmsg-replace="true" data-valmsg-for="Password" class="field-validation-valid"></span></div>
                <div style="margin-top: 25px;" class="row">
                    <input type="checkbox" value="true" name="RememberMe" id="RememberMe" data-val-required="The RememberMe field is required." data-val="true" checked="checked"><input type="hidden" value="false" name="RememberMe">
                    <span class="title_item_note2">&nbsp;Tự động đăng nhập vào lần sau</span>
                </div>
                <div class="row">
                    <input type="submit" value="" class="btn_login">
                </div>
                <div style="margin-top: 0px;" class="row">
                    <a href="<?=BASE_URL."quen-mat-khau.html" ?>">Bạn quên mật khẩu</a>
                </div>
              
            </div>
</form>    </dd>
</dl>



<dl class="login_new_form_item changew">
    <dt>Tạo tài khoản mới</dt>
    <dd>
<form method="post" action="<?=BASE_URL.'dang-ky.html' ?>" novalidate="novalidate">
	<?php if($data['error']) echo '<div class="error">'.$data['message']."</div>"; ?>
           <div class="re_form">
                <div>
                    <span data-valmsg-replace="true" data-valmsg-for="ErrorMessage" class="field-validation-valid"></span>
                </div>
                <div class="row">
                    <span class="row_L">EMAIL<font class="other_color_star">*</font></span>
                    <input type="text" value="<?=$data['email'] ?>" placeholder="Địa chỉ email" name="email" id="RegisterEmail" class="text"><br class="clean">
                </div>

                <div class="row">
                    <span class="row_L">MẬT KHẨU<font class="other_color_star">*</font></span>
                    <input type="password" placeholder="Mật khẩu" name="password" id="password" class="text"><br class="clean">
                </div>
               
                <div class="row">
                    <span style="padding-top: 0 !important;" class="row_L">MẬT KHẨU<font class="other_color_star">*</font><br>
                        <font style="font-size: 12px; color: #a9a9a9;">Nhập lại lần 2</font></span>
                    <input type="password" placeholder="Nhập lại mật khẩu" name="RetypePassword" id="RetypePassword"  class="text"><br class="clean">
                </div>
              
            </div>
            <div class="re_form1">
                <div class="row">
                    <span class="row_L1">HỌ TÊN<font class="other_color_star">*</font></span>
                    
                    <select name="Gender" id="Gender" data-val="true"><option value="" selected="selected">--</option>
<option value="0" <?php  if($data['gender']==0) echo 'selected'; ?> >Anh</option>
<option value="1" <?php  if($data['gender']==1) echo 'selected'; ?> >Chị</option>
</select>
                    <input type="text" value="<?=$data['name'] ?>" style="width: 130px !important;" placeholder="Họ tên" name="name" id="name"  class="text"><br class="clean">
                </div>
                
                <div class="row">
                    <span class="row_L1">ĐIỆN THOẠI<font class="other_color_star">*</font></span>
                    <input type="text" value="<?=$data['phone'] ?>" placeholder="Điện thoại di động" name="Mobile" id="Mobile" data-val="true" class="text"><br class="clean">
                </div>
               
                <div class="row">
                    <span class="row_L1">NGÀY SINH<font class="other_color_star">*</font></span>
                    <span>
                    <select name="BirthDate_Day" id="BirthDate_Day" >
                    <option value="0" selected="selected">Ngày</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select></span>&nbsp;&nbsp;<span><select name="BirthDate_Month" id="BirthDate_Month" data-val-requiredifferent-param="0" data-val-requiredifferent="" data-val-required="The BirthDate_Month field is required." data-val-range-min="1" data-val-range-max="12" data-val-range="The field BirthDate_Month must be between 1 and 12." data-val-number="The field BirthDate_Month must be a number." data-val="true"><option value="0" selected="selected">Tháng</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select></span>&nbsp;&nbsp;<span><select name="BirthDate_Year" id="BirthDate_Year" data-val-requiredifferent-param="0" data-val-requiredifferent="" data-val-required="The BirthDate_Year field is required." data-val-number="The field BirthDate_Year must be a number." data-val="true"><option value="0" selected="selected">Năm</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
</select>
                    </span>
                    <br class="clean">
                </div>
                <div class="err_re">
                    <span data-valmsg-replace="true" data-valmsg-for="Birthday" class="field-validation-valid"></span>
                </div>
            </div>
            <div class="re_form_B">
                <p>
                    <input type="checkbox" value="true" name="AcceptTerms" id="AcceptTerms" data-val-required="The AcceptTerms field is required." data-val-requireacceptterms-param="title_item_note" data-val-requireacceptterms=" " data-val="true" checked="checked"><input type="hidden" value="false" name="AcceptTerms">
                    <span class="title_item_note2">&nbsp;&nbsp;Tôi đã xem và đồng ý với<a href="" target="_blank"> quy chế của </a> dealhot.com </span>
                </p>
            </div>
            <div>
                <p style="padding-top: 15px; text-align: left;">
                    <input type="submit" value="" class="btn_register">
                </p>
            </div>
</form>    </dd>
 <div class="space_10"></div>
</dl>

 </div>
 <div class="space_10"></div>
 </div>
<script type="text/javascript">
$(document).ready(function(){
	$('#BirthDate_Year').val('<?=$data['BirthDate_Year'] ?>'); 
	$('#BirthDate_Month').val('<?=$data['BirthDate_Month'] ?>'); 
	$('#BirthDate_Day').val('<?=$data['BirthDate_Day'] ?>'); 
})
</script>