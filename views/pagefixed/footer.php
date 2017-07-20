<?php
if(isset($_POST['dk_submit']))
{
	$to=$_SESSION['emaillienhe_vn'];
	$email=$_POST['dk_email'];
	if (get_magic_quotes_gpc()== false) 
	{
		$email=trim(mysql_real_escape_string($email));
	}
	
	$sql3="select * from mn_email where email='$email'";
	$ds3=mysql_query($sql3) or die(mysql_error());
	$row3=mysql_num_rows($ds3);
	if($row3>=1)
	{
		echo '<script> alert("Email của bạn đã được đăng ký");
	               location.href="home.html";
	      </script>';
	}
	
	else
	{
		$from=$email;
		$tieude="Đăng Ký Nhận Bản Tin Điện Tử";
		ob_start();
		echo file_get_contents("mail/emaillienhetukhachhang.html");
		$noidung1 .="Chào bạn, chúng tôi đã nhận được đăng ký email nhận bản tin của bạn<br> ";
		echo $to." - ".$from;
		smtpmailer($from,$to,"Siêu Thị Sức Khỏe",$tieude,$noidung1);
		
		$ngaydang=date("d-m-Y");
		$sql2="insert into mn_email(email,date) values ('$email','$ngaydang')";
		$ds2=mysql_query($sql2) or die(mysql_error());
		
		echo '<script> alert("Đăng ký nhận bản tin thành công");
					   location.href="home.html";
			  </script>';
	}
}
?>

<style type="text/css">
<!--
.style1 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
	color: #CCCCCC;
}
-->
</style>
<div class="footer">
	<div class="infooter">
    
    	<div class="box">
        	<h2><span>Hỗ Trợ Khách Hàng</span></h2>
            <ul>
                <li><a href="<?=BASE_URL?>bai-viet/4-huong-dan-mua-hang.html">Hướng Dẫn Mua Hàng</a></li>
                <li><a href="<?=BASE_URL?>bai-viet/5-phuong-thuc-thanh-toan.html">Phương Thức Thanh Toán</a></li>
                <li><a href="<?=BASE_URL?>bai-viet/6-giao-hang.html">Chính Sách Khách Hàng</a></li>
            </ul>
        </div>
        

        <div class="box">
        	<h2><span>Về Chúng Tôi</span></h2>
            <ul>
                <li><a href="<?=BASE_URL?>bai-viet/2-gioi-thieu.html">Giới thiệu</a></li>
                <li><a href="<?=BASE_URL?>bai-viet/7-he-thong-cua-hang.html">Hệ Thống Cửa Hàng</a></li>
                <li><a href="<?=BASE_URL?>lien-he.html">Liên Hệ</a></li>
             </ul>
        </div>
        
        <div class="box">
        	<h2><span>Hệ Thống Cửa Hàng</span></h2>
            <div id="box_content">
            <?php
			     $sql="select * from mn_pagehtml where Id='3'";
				 $ds=mysql_query($sql) or die(mysql_error());
				 $ds_row=mysql_fetch_assoc($ds);
				 echo $ds_row['content_vn'];
			?>
            </div>
        </div>
        <div style="clear:both"></div>
    </div>
    
    <div id="footer_info">
         <div id="dk_nhanmail">
              <span>đăng ký nhận bản tin điện tử</span>
              <form action="" method="post" enctype="multipart/form-data">
              <input type="text" value="Email của bạn" name="dk_email" id="dk_email" onclick="if(this.value=='Email của bạn') this.value=''" 
                     onblur="if(this.value=='') this.value='Email của bạn'" />
              <input type="submit" value="Đăng Ký" name="dk_submit" id="dk_submit" />
              </form>
              <div id="ft_thanhtoan">
                   <div>Chấp nhận thanh toán</div>
                   <img src="<?=BASE_URL?>public/template/images/thanhtoan_1.jpg" />
                   <img src="<?=BASE_URL?>public/template/images/thanhtoan_2.jpg" />
                   <img src="<?=BASE_URL?>public/template/images/thanhtoan_3.jpg" />
                   <img src="<?=BASE_URL?>public/template/images/thanhtoan_4.jpg" />
                   <img src="<?=BASE_URL?>public/template/images/thanhtoan_5.jpg" />
              </div>
         </div>
         
         <div id="time_work">
              <div id="ft_ttlh">Tư vấn miễn phí: <span>0966 100 300 - 0969 100 300</span>/Giờ làm việc 8h00 - 21h00 - cả ngày chủ nhật</div>
              <div id="ft_fb">
                   <div>Kết nối với chúng tôi</div>
                   <img src="<?=BASE_URL?>public/template/images/icon_fb.jpg" />
                   <img src="<?=BASE_URL?>public/template/images/icon_ts.jpg" />
                   <img src="<?=BASE_URL?>public/template/images/icon_gg.jpg" />
                   <img src="<?=BASE_URL?>public/template/images/icon_ut.jpg" />
 <script src="//images.dmca.com/Badges/DMCABadgeHelper.min.js"></script> 
 <a href="http://www.dmca.com/Protection/Status.aspx?ID=cf85f9ed-78ae-4ad5-b53d-7c06e9d23651" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="//images.dmca.com/Badges/dmca_protected_sml_120b.png?ID=cf85f9ed-78ae-4ad5-b53d-7c06e9d23651"  alt="DMCA.com Protection Status" /></a> 
              </div>
         </div>
	<div id="time_work1" style="
    float: left;
    width: 100%;
    padding-left: 20px;
">
 <div id="ft_ttlh1" style="
    float: left;
    text-align: justify;
    padding-top: 30px;
">© 2011 - Amara Việt Nam </div>
              <div id="ft_fb1" style="
    float: left;
"> <img src="http://amara.vn/data/image/banner/bcthuong.png"></div>
         </div>
  
</div>																																							




<!--menu bottom mobie-->
<span class="mb_right_hotline">
    <span class="mb_bar">
    <ul>
    <li>
      <span class="bar_dm">Danh mục</span>
    </li>
    <li>
     <a href="tel:<?=$_SESSION['dienthoai1'];?>"><span><?=$_SESSION['dienthoai1'];?></span></a>
    </li>
    <li>
      <a href="/"> <span>Trang chủ</span></a>
    </li>
    <li>
     <a href="sms:<?=$_SESSION['dienthoai1'];?>"> <span id="bar_zopim">Gửi tin nhắn</span></a>
    </li>
    <li>
       <!--đếm số lượng sản phẩm-->
       <?php
	       if(!isset($_SESSION["cart2"])) $soluong=0;
		   else
		   {
			  $soluong=0;
			  foreach($_SESSION['cart2'] as $k=>$v)
			  {
				  $soluong=$soluong+1;
			  }
		   }
	   ?>
       <a href="<?=BASE_URL."gio-hang.html"?>">
       <div id="cart_soluong"><?=$soluong?></div>
       <!------------------------>
       <span id="bar_cart">Giỏ hàng</span></a>
    </li>
    </ul>
    <img class="icon_bottom" style="width:100%;z-index:0;" src="<?=BASE_URL.USER_PATH_IMG;?>mb_bar_bgsk.png">
    </span>
</span>
<div class="overlay-open-menu "></div>
<!----------------------->


<!-----------menu left mobi------------>
<script>
	$(document).ready(function(e) {
	   // Ẩn tất cả .accordion trừ accordion đầu tiên
	   $("#accordiondemo4 .accordion").hide();
	   // Áp dụng sự kiện click vào thẻ h3
	   $("#accordiondemo4 h3").click(function(){
	   // chọn .accordion (do phần tử đi đi ngay sau phần tử h3 nên ta dùng .next())
	   $accordion = $(this).next();
	   // Kiểm tra nếu đang ẩn thì sẽ hiện và ẩn các phần tử khác
	   // Nếu đang hiện thì click vào h3 sẽ ẩn
	   if ($accordion.is(':hidden') === true) {
	   $("#accordiondemo4 .accordion").slideUp();
	   $accordion.slideDown();
		} else {
		$accordion.slideUp();
	  }
	});
	});
</script>
<div class="slidebarmenu">
    <div id="accordiondemo4">
         <div id="menu_accor1" class="iconx"><img src="http://amara.vn/icon-x.png"></div>
         <!--menu loại sản phẩm-->
         <?php
             $sql="select * from category where parentid='0' order by sort_order asc, id desc";
             $ds=mysql_query($sql) or die(mysql_error());
             while($ds_row=mysql_fetch_assoc($ds)) {
                 //menu con
                 $idpa = $ds_row['id'];
                 $sql2="select * from category where ticlock='0' and parentid='$idpa' order by sort_order asc, id desc";
                 $ds2 = mysql_query($sql2) or die(mysql_error());
                 $row=mysql_num_rows($ds2);
                 if($row==0) $click=0;
                 else $click=1;
         ?>
         <div id="<?php if($_SESSION['id_listprod']==$ds_row['id']) echo "according_show" ?>" class="according_box">
             <h3 <?php if($row>0) echo "style='background-image:url(".BASE_URL."public/template/images/lib-v2.png)'";?> class="according_parent">
             <a onClick="<?php if($click==1) echo "return false" ?>" href="<?=BASE_URL.strtoseo($ds_row['name'])."-".$ds_row['id'].".html";?>">
                <?=$ds_row['name'];?>
             </a>
             </h3>
             <div class="accordion">
             <?php
                 $line=mysql_num_rows($ds2);
                 if($line>0) {
                 while($ds_row2=mysql_fetch_assoc($ds2)) {
             ?>
                 <p class="according_child"><a href="<?=BASE_URL.strtoseo($ds_row2['name'])."-".$ds_row2['id'].".html";?>">
                 <?=$ds_row2['name'];?></a></p>
             <?php }} ?>
             </div>
         </div>
         <?php } ?>
         
    </div>
    
    <div id="accordiondemo5">
         <?php
            $sql="select * from mn_catnews where ticlock='0' and parentid='0' order by sort asc, Id desc";
            $ds=mysql_query($sql) or die(mysql_error());
            while($item=mysql_fetch_assoc($ds)) {
         ?>
         <div class="according_box">
            <h3 class="according_parent"><a href="<?=BASE_URL."c".$item['Id']."-".$item['alias'].".html";?>"><?=$item['title_vn']?></a></h3>
         </div>
         <?php } ?>
    </div>
    <div style="clear:both;"></div>
</div>
<!------------------------------------------------>