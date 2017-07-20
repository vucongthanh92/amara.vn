<!--<script>
	$(document).ready(function(e) {
	   // Ẩn tất cả .accordion trừ accordion đầu tiên
	   $("#accordiondemo .accordion").hide();
	   // Áp dụng sự kiện click vào thẻ h3
	   $(".according_box").hover(function()
	   {
	      // chọn .accordion (do phần tử đi đi ngay sau phần tử h3 nên ta dùng .next())
	      $accordion = $(this).children(".accordion");
	      // Kiểm tra nếu đang ẩn thì sẽ hiện và ẩn các phần tử khác
	      // Nếu đang hiện thì click vào h3 sẽ ẩn
	      if ($accordion.is(':hidden') === true) 
		  {
	         $(".according_box:not('#according_show') .accordion").slideUp();
	         $accordion.slideDown();
		  } 
		  else if($(this).attr("id")!="according_show")
		  {
		     $accordion.slideUp();
	      }
	   });
	   
	   $("#according_show").children(".accordion").show();
	   
	});
</script>
-->
<div id="accordiondemo">
<div id="menu_accor">Danh Mục Sản Phẩm</div>
     <!--menu loại sản phẩm-->
	 <?php
         $sql="select * from category where parentid='0' order by sort_order asc, id desc";
         $ds=mysql_query($sql) or die(mysql_error());
         while($ds_row=mysql_fetch_assoc($ds)) {
             //menu con
             $idpa = $ds_row['id'];
             $sql2="select * from category where ticlock='0' and parentid='$idpa' order by sort_order asc, id desc";
             $ds2=mysql_query($sql2) or die(mysql_error());
             $row=mysql_num_rows($ds2);
             if($row==0) $click=0;
             else $click=1;
     ?>
     <div id="<?php if($_SESSION['id_listprod']==$ds_row['id']) echo "according_show" ?>" class="according_box">
         <h3 class="according_parent">
             <a onClick="<?php if($click==1) echo "return false" ?>" href="<?=strtoseo($ds_row['name'])."-".$ds_row['id'].".html";?>">
                <?=$ds_row['name'];?>
             </a>
         </h3>
         <div class="accordion">
         <?php
		     $line=mysql_num_rows($ds2);
			 if($line>0) {
             while($ds_row2=mysql_fetch_assoc($ds2)) {
         ?>
             <p class="according_child"><a href="<?=strtoseo($ds_row2['name'])."-".$ds_row2['id'].".html";?>">
             <?=$ds_row2['name'];?></a></p>
         <?php }} ?>
         </div>
     </div>
     <?php } ?>
     
     
     <?php
	      $sql3="select * from mn_flash where location='5' and ticlock='0' limit 1";
		  $ds3=mysql_query($sql3) or die(mysql_error());
		  $ds_row3=mysql_fetch_assoc($ds3);
		  if($ds_row3['file_vn']!="") {
	 ?>
          <img id="banner_left" src="<?=BASE_URL."data/Flash/".$ds_row3['file_vn']?>" />
     <?php } ?>
</div>