<div class="main_corner">
<div class="main_top"><img src = '<?php echo USER_PATH_IMG;?>full_t.png' /></div>
<div class="main_mid">
<h2 class="title"><?=$data['map_title']?></h2>
<div class="form_dangky">
<center>
<?php
 if($data['error']==1) {
	 	echo "<div class='error'>".$data['message']."</div>";
}
?>
</center>
<!------------------------------------------>
<div class="space_10"></div>
 <form action="" method="post">    
  
    <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr>
        	<td width="35%" align="right">
            	Nhập địa chỉ email <span class="red">*</span>
            </td>
            <td width="65%">
				<input   size="42" type="text" value="<?=$data['email'] ?>" name="email" />			</td>
        </tr>
		    
      
      
        <tr>
         <td></td>
            <td >
				<input size="42" type="submit" value="Gửi" name="btndangnhap" />             </td>
        </tr>
    </table><!-- end table thong tin dang nhao -->
    
 
        
        </form>
</div>
<!----------------------------------------->
</div>
<div class="main_bottom"><img src = '<?php echo USER_PATH_IMG;?>full_c.png' /></div>
</div>

	