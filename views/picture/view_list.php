<h1 class = 'title_map'><?php echo $data['map_title'];?></h1>
<div class = 'picture'>
	<div class="highslide-gallery">
	<?php
		foreach($data['info'] as $item)
		{
	?>
			<a href="<?php echo BASE_URL;?>data/Picture/<?php echo $item['images']?>" class="highslide" onclick="return hs.expand(this)">
				<img src="<?php echo BASE_URL;?>data/Picture/<?php echo $item['images']?>"  width = '150' alt="<?php echo $item['title_'.lang]?>" title ="<?php echo $item['title_'.lang]?>" />
			</a>
			
			<div class="highslide-caption">
				<?php echo $item['title_'.lang]?>
			</div>
	<?php
		}
	?>
	</div>
</div>