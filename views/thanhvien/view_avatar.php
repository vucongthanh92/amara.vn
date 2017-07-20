<div class="index_middle">
<div class="leff_canhan">
<div class="avatar">
<?php
	if(file_exists(PATH_IMG_USER.$data['user']['avatar'])&& strlen($data['user']['avatar']) >0) {
		
?>
<div class="inva"><img src="<?=PATH_IMG_USER.$data['user']['avatar'] ?>" width="100"  /></div>
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
</div>
<div class="space_10"></div>
<!---------------------->
</div>
<div class="right_canhan">
<h2 class="tieudecanhan">Đổi ảnh đại diện</h2>

<div class="form_dangky">
<center>
<?php
 if($data['error']==1) {
	 	echo "<div class='error'>".$data['message']."</div>";
}
?>
</center>
<!------------------------------------------>
 <form action="" method="post" enctype="multipart/form-data">    

    
    <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr>
        	<td width="35%" align="right">
            	Ảnh đại diện:
            </td>
            <td width="65%">
            <?php
			//echo PATH_IMG_USER.$data['user']['avarar'];
				if(file_exists(PATH_IMG_USER.$data['user']['avatar'])&& strlen($data['user']['avatar']) >0) {
					
			?>
			<div class="inva"><img src="<?=PATH_IMG_USER.$data['user']['avatar'] ?>" width="100" align="left" /></div>
			<? } else { ?>
			<img src="<?=USER_PATH_IMG ?>noavatar.gif" width="100" />
			<? }?>
			</td>
        </tr>
		    
        <tr>
        
            <td  align="right">
                Đổi ảnh khác <span class="red">*</span>
            </td>
        
            <td>
                <input size="42" type="file" value="" name="images" id="images" />      
              </td>
        </tr>
        
  
          
      
          
		  <tr>
			<td>&nbsp;</td>
			<td>
			<input id="bt_submitregister" type="submit" value="Cập nhật" name="btncapnhat" />&nbsp;			</td>
		  </tr>
		</table>
        
        </form>
</div>
</div>
<div class="space_10"></div>
</div>

	