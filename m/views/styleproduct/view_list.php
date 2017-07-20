<style type="text/css">
.for_ct img {
	border: solid 1px #CCC;
	width:165px;
	height:89px;
}
</style>
<div class="main">
<h2 class = 'tieude'><?php echo $data['map_title'];?></h2>
<div class = 'picture' style="width:760px; margin-left:-8px;">
	
	<?php
	if(!empty($data['info'])) {
		foreach($data['info'] as $item)
		{
	?>
   
		<?php if(strlen($item['link']) > 0) { ?>
        <div class="for_ct">
         <a href="<?=$item['link'] ?>"  target="_blank" ><img src="<?=PATH_IMG_PARTNERS.$item['images']?>" width="175" height="137"></a>
        <a href="<?=$item['link'] ?>"  target="_blank"><?=cut_string(stripslashes($item['title_'.lang]), 200, 3)?></a>
        </div>
		<? } else { ?>
     <div class="for_ct">
         <img src="<?=PATH_IMG_PARTNERS.$item['images']?>" width="175" height="137">
         <a href="#"  target="_blank"><?=cut_string(stripslashes($item['title_'.lang]), 200, 3)?></a>
        </div>
	<?php
		}} }
	?>

</div>
</div>