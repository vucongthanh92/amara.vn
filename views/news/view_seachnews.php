<div class="main">
<div class = 'noidung'>
<h2 class="title"><?php echo $data['map_title'];?></h2>

<?php
	
if(!empty($data['info'])){
	foreach($data['info'] as $k=>$item)
	{
?>
		<div class="news">
        <div class="images">
			<a href="<?=BASE_URL.unicode_convert2(stripslashes($item['title_'.lang]))."-n".$item['Id'].".html"?>" title="<?php echo stripslashes($item['title_'.lang])?>">
           <?php
		   	if($item['images']!=""){
				if(file_exists(PATH_IMG_NEWS.$item['images'])){
		   ?>
            <img src = "<?=PATH_IMG_NEWS.$item['images']?>" width = "120" height="90" class="img_left" alt="<?php echo $item['title_'.lang]?>">
            <?php }
				else {echo '<img src="'.USER_PATH_IMG.'no_image.jpg" border="0" class="img_left"  >';}
			
			} else{ 
				echo '<img src="'.USER_PATH_IMG.'no_image.jpg" border="0" class="img_left"  >';
			} ?>
            
            </a>
            </div>
			<h3><a  href="<?=BASE_URL.unicode_convert2(stripslashes($item['title_'.lang]))."-n".$item['Id'].".html" ?>" title="<?php echo stripslashes($item['title_'.lang])?>"><?php echo stripslashes($item['title_'.lang])?></a></h3>
            <h2 class="date_news">Ngày đăng: <?=date("d/m/Y",strtotime($item['date'])) ?> - Lượt xem: <?=$item["visit"] ?></h2>
			<p><?php echo stripslashes($item['description_'.lang]);?> </p>
            <div class="xemtep">
               <a  href="<?=BASE_URL.unicode_convert2(stripslashes($item['title_'.lang]))."-n".$item['Id'].".html"?>" title="<?php echo stripslashes($item['title_'.lang])?>">Chi tiết</a>
              
               </div>
			<div class="clear"></div> 
		</div>
<?php 
	}
}else{
	echo "updating...";
}

?>

<?php
//xuat phan trang
if($data['page'] != "")
	echo "<div class = 'paging'>". $data['page']. "</div>";
?>
<div class = "clear"></div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$(".news:last").css("border","none");
})
</script>
