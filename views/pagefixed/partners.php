<!-----------bắt đầu comment------------->  
      <div class="cmt_comment">Đánh Giá</div>
	  <?php
          $idcat=$_SESSION['id_cmt'];
		  $idpa=$_SESSION['loai_cmt'];
          $sql="select * from mn_comment where ticlock='0' and idpa='$idpa' and idcat='$idcat' and idrep='0' order by Id desc";
          $ds=mysql_query($sql) or die(mysql_error());
          while($row=mysql_fetch_assoc($ds)) {
      ?>
      <div class="cmt_box">
           <div class="cmt_info"><?=$row['hoten']?> - <span class="cmt_ngaydang"><?=$row['date']?></span>
                <div id="cmt_reply_<?=$row['Id']?>" class="cmt_reply">Trả Lời</div>
                <div style="clear:both"></div>
           </div>
           <div class="cmt_content"><?=$row['content']?></div>
                 <!-- phần trả lời của các comment-->
                 <?php
                      $idrep=$row['Id'];
                      $sql2="select * from mn_comment where ticlock='0' and idpa='$idpa' and idcat='$idcat' and idrep='$idrep' order by Id desc";
                      $ds2=mysql_query($sql2) or die(mysql_error());
                      while($row2=mysql_fetch_assoc($ds2)) {
                 ?>
                      <div class="reply_box">
                           <div class="reply_info"><?=$row2['hoten']?> - <span class="reply_ngaydang"><?=$row['date']?></span></div>
                           <div class="reply_content"><?=$row2['content']?></div>
                      </div>
                 <?php } ?>
           
           <form action="" method="post" name="reply" class="reply" id="reply_<?=$row['Id']?>">
                 <input type="text" name="rep_hoten" class="rep_hoten" value="Họ Tên" onclick="if(this.value=='Họ Tên') this.value=''" 
                        onblur="if(this.value=='') this.value='Họ Tên'" />
                 <input type="text" name="rep_email" class="rep_email" value="Email" onclick="if(this.value=='Email') this.value=''" 
                        onblur="if(this.value=='') this.value='Email'" />
                 <input type="text" name="rep_phone" class="rep_phone" value="Số Điện Thoại" onclick="if(this.value=='Số Điện Thoại') this.value=''" 
                        onblur="if(this.value=='') this.value='Số Điện Thoại'" onkeyup="this.value = FormatNumber(this.value);" />
                 <textarea onclick="if(this.value=='Nội dung') this.value=''" onblur="if(this.value=='') this.value='Nội dung'" class="rep_noidung" 
                        name="rep_noidung">Nội dung</textarea>
                 <input type="hidden" name="idrep" value="<?=$row['Id']?>" />
                 <input type="submit" name="rep_goi" class="rep_goi" value="Gởi" />
                 <div style="clear:both"></div>
           </form>
           <script>
                $("#cmt_reply_<?=$row['Id']?>").click(function()
                {
                    $("#reply_<?=$row['Id']?>").toggle("slow");
                })
           </script>
      </div>
      <?php } ?>
      
      <div class="cmt_form">
           <form action="" method="post" name="cmt_post">
                 <div><input type="text" name="cmt_hoten" onclick="if(this.value=='Họ Tên') this.value=''" onblur="if(this.value=='') this.value='Họ Tên'"
                       class="cmt_hoten" value="Họ Tên" /></div>
                 <div><input type="text" name="cmt_email" onclick="if(this.value=='Email') this.value=''" onblur="if(this.value=='') this.value='Email'" 
                       class="cmt_email" value="Email" /></div>
                 <div><input type="text" onclick="if(this.value=='Số Điện Thoại') this.value=''" onkeyup="this.value= FormatNumber(this.value);" 
                       onblur="if(this.value=='') this.value='Số Điện Thoại'" class="cmt_phone" value="Số Điện Thoại" name="cmt_phone" /></div>
                 <div><textarea onclick="if(this.value=='Nội dung') this.value=''" onblur="if(this.value=='') this.value='Nội dung'" name="cmt_noidung" class="cmt_noidung">Nội dung</textarea></div>
                 <div><input type="submit" name="cmt_goi" class="cmt_goi" value="Gởi" /></div>
                 <div style="clear:both"></div>
           </form>
      </div>
      
      <script>
          $(document).ready(function(e) {
               $(".cmt_goi").click(function()
               {
                   if(($(".cmt_hoten").val()=="")||($(".cmt_hoten").val()=="Họ Tên"))
                   {
                       alert('bạn chưa nhập họ tên');
                       return false;
                   }
                   if(($(".cmt_noidung").val()=="")||($(".cmt_noidung").val()=="Nội dung"))
                   {
                       alert('bạn chưa nhập nội dung');
                       return false;
                   }
                   if(($(".cmt_email").val()=="")||($(".cmt_email").val()=="Email"))
                   {
                       alert('bạn chưa nhập địa chỉ Email');
                       return false;
                   }
				   if(($(".cmt_phone").val()=="")||($(".cmt_phone").val()=="Số Điện Thoại"))
                   {
                       alert('bạn chưa nhập số điện thoại');
                       return false;
                   }
               })
               
               $(".rep_goi").click(function()
               {
                   if(($(".rep_hoten").val()=="")||($(".rep_hoten").val()=="Họ Tên"))
                   {
                       alert('bạn chưa nhập họ tên');
                       return false;
                   }
                   if(($(".rep_noidung").val()=="")||($(".rep_noidung").val()=="Nội dung"))
                   {
                       alert('bạn chưa nhập nội dung');
                       return false;
                   }
                   if(($(".rep_email").val()=="")||($(".rep_email").val()=="Email"))
                   {
                       alert('bạn chưa nhập địa chỉ email');
                       return false;
                   }
				   if(($(".rep_phone").val()=="")||($(".rep_phone").val()=="Số Điện Thoại"))
                   {
                       alert('bạn chưa nhập số điện thoại');
                       return false;
                   }
               })
          });
      </script>
      <!-----------kết thúc comment------------->