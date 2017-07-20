<?php 
$mcatelog = new Models_MCatelog();
$mproduct = new Models_MProduct(); 
$mnews = new Models_MNews;
if($_GET["mod"]=="tin-tuc")
{
	$idcatmenu = $_GET["id"];
	$danhmuc=0; 
}

else if($_GET["mod"]=="payment") $danhmuc=0;
else if($_GET["mod"]=="lien-he") $danhmuc=0;
else if($_GET["mod"]=="bai-viet") $danhmuc=0;
else if(($_GET['mod']=='sanpham'))
{
	if($_GET['act']=='danhmuc') $danhmuc=0;
	if($_GET['act']=='timkiem') $danhmuc=0;
}
else if(isset($_GET['mod'])) $danhmuc=1;
else $danhmuc=1;

?>

<?php if($danhmuc==0) { ?>
<script>
    $(document).ready(function(e) {
        $("#li_danhmuc").hover(function()
		{
			$("li ul").css("display","block");
		},
		function()
		{
			$("li ul").css("display","none");
		})
    });
</script>
<?php } ?>
<div style="clear:both"></div>


<!--menu mobi-->
<div id="menu_mobi" class="bar_dm">Danh Mục</div>


<div class="wap_menu">
<div id="menu">
<div id="smoothmenu1" class="ddsmoothmenu">
<ul>
    <!--menu desktop-->
    <li id="li_danhmuc"><a href="" onclick="return false" id="menu_danhmuc" class='selected'>Tất Cả Sản Phẩm</a>
    <ul <?php 
	         if($danhmuc==0) echo "style='display:none'";
			 else if($danhmuc==1) echo "style='display:block'";
	    ?> >
    <?php
	    $sql2="select * from category where ticlock='0' and parentid='0' order by sort_order asc, Id desc";
		$ds2=mysql_query($sql2) or die(mysql_error());
		while($row=mysql_fetch_assoc($ds2)) {
	?>
        <li class="menu_ds"><a href="<?=BASE_URL.strtoseo($row['name'])."-".$row['id'].".html"?>"><?=$row['name'];?></a> 
        <?php
		     $idpa=$row['id'];
		     $sql3="select * from category where parentid='$idpa' and ticlock='0' order by sort_order asc, id desc";
			 $ds3=mysql_query($sql3) or die(mysql_error());
			 $ds_row3=mysql_num_rows($ds3);
			 if($ds_row3>0) {
			 echo "<ul class='submenu'>";
			 while($row3=mysql_fetch_assoc($ds3)) {
		?>
             <li class="submenu_ds"><a href="<?=BASE_URL.strtoseo($row3['name'])."-".$row3['id'].".html"?>"><?=$row3['name'];?></a></li>
        <?php } echo "</ul>"; } ?>
        </li>
    <?php } ?>
    </ul>
    </li>
    
    <li><a href="<?=BASE_URL?>bai-viet/2-gioi-thieu.html">Giới Thiệu</a> </li>
    <?php
	    $sql="select * from mn_catnews where ticlock='0' and parentid='0' order by sort asc, Id desc";
		$ds=mysql_query($sql) or die(mysql_error());
		while($item=mysql_fetch_assoc($ds)) {
	?>
<li><a href="<?=BASE_URL."c2-".$item['alias'].".html";?>"><?=$item['title_vn']?></a></li>
    <?php } ?>
    <li><a href="<?=BASE_URL?>bai-viet/7-he-thong-cua-hang.html">Hệ Thống Cửa Hàng</a> </li>
    <li><a href="<?=BASE_URL?>lien-he.html">Liên Hệ</a></li>
    <!--giỏ hàng menu-->
    <a href="<?=BASE_URL."gio-hang.html"?>"><div id="topcart">
    <?php
	    $i=0;
		if(!empty($_SESSION['cart2']))
		{
				 foreach($_SESSION['cart2'] as $k=>$v){$i=$i+1;}
		}
		echo $i;
	?></div></a>
    <!----------------->
</ul>
</div>


</div>
</div>


<script>
     $(document).ready(function(e) {
          $(".title_main_img:odd").attr("src","public/template/images/bg_default_title2.png");
     });
</script>

<script>
    $(document).ready(function(e) {
		 var i=browserName();
		 if(i=='Chrome')
		 {
			 $(".menu_ds a").css("padding-top","9px");
		 }
		 if(i=='MSIE')
		 {
			 $(".menu_ds a").css("padding-top","9px");
		 }
		 if(i=='UNKNOWN')
		 {
			 $(".menu_ds a").css("padding-top","8px");
			 $(".menu_ds a").css("padding-bottom","7px");
		 }
    });
	
	function browserName(){
		 var Browser = navigator.userAgent;
		 if (Browser.indexOf('MSIE') >= 0){
			 Browser = 'MSIE';
		 }
		 else if (Browser.indexOf('Firefox') >= 0){
			 Browser = 'Firefox';
		 }
		 else if (Browser.indexOf('Chrome') >= 0){
			 Browser = 'Chrome';
		 }
		 else if (Browser.indexOf('Safari') >= 0){
			 Browser = 'Safari';
		 }
		 else if (Browser.indexOf('Opera') >= 0){
			 Browser = 'Opera';
		 }
		 else{
			 Browser = 'UNKNOWN';
		 }
	 return Browser;
	}
</script>