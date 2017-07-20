<h2 class="tieude"><?php echo $data['map_title'];?></h2>
<div class="space_10"></div>
<div class = 'noidung-sp'>
<?php
	
if(!empty($data['info'])){
	foreach($data['info'] as $k=>$item)
	{
?>
		<div class="news">
			<a href="<?=$_GET['mod']?>/chi-tiet/<?php echo $item['Id']?>-<?php echo unicode_convert(stripslashes($item['title_'.lang]))?>" title="<?php echo stripslashes($item['title_'.lang])?>"><img src = "<?=PATH_IMG_NEWS.$item['images']?>" width = "120" height="90" class="img_left" alt="<?php echo $item['title_'.lang]?>"></a>
			<h1><a href="<?=$_GET['mod']?>/chi-tiet/<?php echo $item['Id']?>-<?php echo unicode_convert(stripslashes($item['title_'.lang]))?>" title="<?php echo stripslashes($item['title_'.lang])?>"><?php echo stripslashes($item['title_'.lang])?></a></h1>
			<p><?php echo cut_string(strip_tags($item['description_'.lang]), 300, 3);?> </p>
            <div class="xemtep">
                <a href="<?=$_GET['mod']?>/chi-tiet/<?php echo $item['Id']?>-<?php echo unicode_convert(stripslashes($item['title_'.lang]))?>" title="<?php echo stripslashes($item['title_'.lang])?>">Chi tiết</a>
              
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