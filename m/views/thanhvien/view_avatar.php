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
        <p class="text_top">ĐỔI THÔNG TIN CÁ NHÂN</p>
    </div>
</div>

<?php if($data['error'] == 1) echo '<div class="error">'.$data['message']."</div>"; ?>
<?php if($data['secessfull'] == 1) echo '<div class="sercesful">'.$data['message']."</div>"; ?>
<form method="post" action="" novalidate="novalidate">       
	
<div class="form form_acc">
                    <div class="row">
                        <span class="row_L">HỌ TÊN<font class="other_color_star">*</font></span>
                        <input type="text" value="<?=$data['user']['realname'] ?>" name="Name" id="Name" data-val-required="Vui lòng nhập họ tên" data-val="true" class="text">
                        <span data-valmsg-replace="true" data-valmsg-for="Name" class="field-validation-valid"></span>
                    </div>
                    <div class="row">
                        <span class="row_L">ĐIỆN THOẠI<font class="other_color_star">*</font></span>
                        <input type="tel" value="<?=$data['user']['mobile'] ?>" name="Mobile" id="Mobile" data-val-required="Vui lòng nhập số điện thoại" data-val-regex-pattern="(^(09)\d{8}$)|(^(01)\d{9}$)" data-val-regex="Không hợp lệ, số di động bắt đầu bằng 09 hoặc 01 và đủ số" data-val="true" class="text valid" >
                        <span data-valmsg-replace="true" data-valmsg-for="Mobile" class="field-validation-valid"></span>
                    </div>
                    <div class="row">
                        <span class="row_L">GIỚI TÍNH<font class="other_color_star">*</font></span>
                        <select name="Gender" id="Gender" data-val-required="Vui lòng chọn giới tính" data-val-number="The field Gender must be a number." data-val="true" class="gioitinh">
                        <option value="M" <?php if($data['user']['gender']=='M') echo 'selected="selected"'; ?> >Nam</option>

							<option value="F" <?php if($data['user']['gender']=='F') echo 'selected="selected"'; ?>>Nữ</option>
					</select>
                    </div>
                    <div class="row">
                        <span class="row_L">NGÀY SINH<font class="other_color_star">*</font></span>
                        <span><select style="margin-right: 2px;" name="BirthDate_Day" id="BirthDate_Day" data-val-requiredifferent-param="0" data-val-requiredifferent="" data-val-required="The BirthDate_Day field is required." data-val-range-min="1" data-val-range-max="31" data-val-range="The field BirthDate_Day must be between 1 and 31." data-val-number="The field BirthDate_Day must be a number." data-val="true" class="ngaysinh valid"><option value="0">Ngày</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3" >3</option>
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
</select></span><span><select style="margin-right: 2px;" name="BirthDate_Month" id="BirthDate_Month" data-val-requiredifferent-param="0" data-val-requiredifferent="" data-val-required="The BirthDate_Month field is required." data-val-range-min="1" data-val-range-max="12" data-val-range="The field BirthDate_Month must be between 1 and 12." data-val-number="The field BirthDate_Month must be a number." data-val="true" class="ngaysinh"><option value="0">Tháng</option>
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
</select></span><span><select name="BirthDate_Year" id="BirthDate_Year" data-val-requiredifferent-param="0" data-val-requiredifferent="" data-val-required="The BirthDate_Year field is required." data-val-number="The field BirthDate_Year must be a number." data-val="true" class="ngaysinh"><option value="0">Năm</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995" >1995</option>
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
</select></span>
                        <span data-valmsg-replace="true" data-valmsg-for="Birthday" class="field-validation-valid"></span>
                        <br class="clean">

                    </div>
                    <div class="row">
                        <span class="row_L title">EMAIL<font class="other_color_star">*</font></span>
                        <span class="email"><?=$data["user"]['email'] ?></span>
                    </div>
                </div>
            <div class="space_10"></div>
            <div class="space_10"></div>  
        <div class="bg_button">
            <input type="submit" class="btn_green_big" value="CẬP NHẬT" name="btnupdate">
        </div>
</form>
</div>
</div>
<?php 
list($day, $month, $year) = explode("-",$data['user']['birthday']);
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#BirthDate_Day').val(<?=$day ?>);
	$('#BirthDate_Month').val(<?=$month ?>);
	$('#BirthDate_Year').val(<?=$year ?>);
})
</script>