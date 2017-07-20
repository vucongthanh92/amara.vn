<div class="main">
<div class = 'noidung'>
<h2 class="title"><?php echo $data['map_title'];?></h2>

<?php
	
if(!empty($data['info'])){
	$i=0;
	foreach($data['info'] as $k=>$item)
	{
		$i++;
?>
		<div class="news" <?php if($i==1) echo 'style="font-size:13px;"'; ?>>
        	<div class="images" <?php if($i==1) echo 'style="width:300px;height:200px;"'; ?>>
			<a  href="<?=BASE_URL ?><?php echo unicode_convert2(stripslashes($item['title_'.lang]))?>-n<?php echo $item['Id']?>.html" title="<?php echo stripslashes($item['title_'.lang])?>">
           <?php
		   	if($item['images']!=""){
				if(file_exists(PATH_IMG_NEWS.$item['images'])){
		   ?>
            <img src = "<?=BASE_URL.PATH_IMG_NEWS.$item['images']?>" width = "120" height="90" class="img_left" alt="<?php echo $item['title_'.lang]?>" <?php if($i==1) echo 'style="width:300px;"'; ?> >
            <?php }
				else {echo '<img src="'.BASE_URL.USER_PATH_IMG.'no_image.jpg" border="0" class="img_left"  >';}
			
			} else{ 
				echo '<img src="'.BASE_URL.USER_PATH_IMG.'no_image.jpg" border="0" class="img_left"  >';
			} ?>
            </a>
            </div>
			<h3><a  href="<?=BASE_URL.unicode_convert2(stripslashes($item['title_'.lang]))?>-n<?php echo $item['Id']?>.html" title="<?php echo stripslashes($item['title_'.lang])?>" <?php if($i==1) echo 'style="font-size:16px; margin-bottom:5px; color:#F00"'; ?> ><?php echo stripslashes($item['title_'.lang])?></a></h3>
            <h2 class="date_news">Ngày đăng: <?=date("d/m/Y",strtotime($item['date'])) ?> - Lượt xem: <?=$item["visit"] ?></h2>
			<p><?php echo stripslashes($item['description_'.lang]);?> </p>
            <div class="xemtep">
               <a  href="<?=BASE_URL.unicode_convert2(stripslashes($item['title_'.lang]))?>-n<?php echo $item['Id']?>.html" title="<?php echo stripslashes($item['title_'.lang])?>">Chi tiết</a>
              
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
<h1 style="display:none">tin tuc suc khoe, tin tuc gia dinh, thuoc giam can, thuoc no nguc</h1>