<div class="index_middle">

<div class="leff_canhan">
<div class="avatar">
<?php
	if(file_exists(PATH_IMG_USER.$data['user']['avatar']) && strlen($data['user']['avatar']) >0) {
		
?>
<div class="inva"><img src="<?=PATH_IMG_USER.$data['user']['avatar'] ?>" width="100" /></div>
<? } else { ?>
<img src="<?=USER_PATH_IMG ?>noavatar.gif" width="100" />
<? }?>
</div>
<div class="title"><?=$data['user']['username'] ?></div>
<div class="menu">
<a href="<?=BASE_URL ?>doi-anh-dai-dien.html"><img src="<?=USER_PATH_IMG?>icon_student.png"/>Đổi ảnh đại diện</a>
<a href="<?=BASE_URL ?>doi-mat-khau.html"><img src="<?=USER_PATH_IMG?>icon_password.png"/>Đổi mật khẩu</a>
<a href="<?=BASE_URL ?>trang-ca-nhan.html"><img src="<?=USER_PATH_IMG?>icon_thongtin.png"/>Thông tin cá nhân</a>
<a href="<?=BASE_URL ?>lich-su-giao-dich.html"><img src="<?=USER_PATH_IMG?>icon-voice.png"/>Lịch sử giao dich</a>
<a href="<?=BASE_URL ?>thoat.html"><img src="<?=USER_PATH_IMG?>logout.png"/>Thoát</a>
<Div class="space_10"></Div>
</div>
<!---------------------->
</div>

<div class="right_canhan">

<h2 class="tieudecanhan">THÔNG TIN CÁ NHÂN</h2>
<div class="space_10"></div>
<div class="form_dangky">
<center>
<?php
 if($data['error']==1) {
	 	echo "<div class='error'>".$data['message']."</div>";
}
?>
</center>
<!------------------------------------------>
 <form action="" method="post">    

    
    <table width="100%" border="0" cellspacing="1" cellpadding="3">
		<tr>
            <td width="35%"  align="right">
                Họ và tên <span class="red">*</span>
            </td>
            
			<td>
				<input size="50" type="text" value="<?=$data['user']['fullname'] ?>" name="full_name" id="full_name" />             </td>
         </tr>
          <tr>
        	<td width="35%" align="right">
            	Email <span class="red">*</span>
            </td>
            <td width="65%">
				<input size="50" type="text" value="<?=$data['user']['email'] ?>" name="email" />			</td>
        </tr>
         <tr>
         	<td align="right">
            	Địa chỉ <span class="red">*</span>
            </td>
            
			<td>
				<input size="50" type="text" value="<?=$data['user']['address'] ?>" name="address" id="address" />             </td>
		  </tr>

          <tr>
			<td  align="right">
            	Điện thoại 
            </td>
				<td>
					<input size="50" type="text" value="<?=$data['user']['phone'] ?>" name="phone" id="phone" />              	</td>
		  </tr>
          
           <tr height="10px">
				<td  align="right" valign="top" height="10px"></td>
				<td  height="10px">
					<div style='color:#555; font-size:11px; padding:0px 0 5px 10px'>Vui lòng nhập chính xác thông tin để chúng tôi phục vụ quý khách tốt hơn. </div>              	</td>
		  </tr>
          
		  <tr>
			<td  align="right">Ngày sinh </td>
			<td>
				<input size="3" type="text" value="<?=$data['user']['ngay'] ?>" name="ngay" id="ngay" />&nbsp;&nbsp;Tháng <input size="3" type="text" value="<?=$data['user']['thang'] ?>" name="thang" id="thang" />&nbsp;&nbsp;Năm <input size="5" type="text" value="<?=$data['user']['nam'] ?>" name="nam" id="nam" /> 
                 <!-- <span style="color:#f00"><em>yyyy-mm-dd</em></span> -->
			
			</td>
		  </tr>
          
		  <tr>
			<td  align="right">Giới tính</td>
			<td> 
					<img src="<?=USER_PATH_IMG ?>man.png"  />
						<input value="1" <?php if($data['user']['gioitinh']==1) echo 'checked="checked"'; ?> type="radio" name="gender" id="gender" /> 
					<img src="<?=USER_PATH_IMG ?>women.png"  />
					<input value="0" type="radio" name="gender" id="gender" <?php if($data['user']['gioitinh']==0) echo 'checked="checked"'; ?> /> 
			
			</td>
		  </tr>
          
      
          
		  <tr>
			<td>&nbsp;</td>
			<td>
			<input id="bt_submitregister" type="submit" name="yt0" value="Cập nhật" />&nbsp;			</td>
		  </tr>
		</table>
        
        </form>
</div>


</div>

<div class="space_10"></div>
</div>