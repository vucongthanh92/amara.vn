<h2 class="tieude"><?php echo $data['map_title'];?></h2>
<div class="space_10"></div>
<div class = 'noidung-sp'>
<div class = 'detailnews'>
	<h1 class = "title_new"><?php echo stripslashes($data['news']['title_'.lang]);?></h1>
    <div class="space_10"></div>
	<div><?php echo stripslashes($data['news']['content_'.lang]);?></div>
</div>

<div class = 'thanhtienich'>
	<!-- AddThis Button BEGIN -->
	<div class="addthis_toolbox addthis_default_style ">
	<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
	<a class="addthis_button_tweet"></a>
	<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
	<a class="addthis_counter addthis_pill_style"></a>
	<a href = 'javascript:window.history.go(-1);'><img src = '<?php echo USER_PATH_IMG;?>back.png' style = "vertical-align:middle;"> <?php echo H_TROVE;?></a>
	</div>
	<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4ee308cf5da86d1c"></script>
	<!-- AddThis Button END -->
	
</div>
<?php if(!empty($data['othernews'])){?>
<div class = 'cac-tin-khac'>
	<span  class = "title_new"><?=CACBAIVIETKHAC ?></span>
	<?php
		echo "<ul class = 'tinkhac'>";
		foreach($data['othernews'] as $item)
		{
			echo "<li><a href = '".$_GET['mod']."/chi-tiet/".$item['Id']."-".unicode_convert($item['title_'.lang])."' title = '".$item['title_'.lang]."'>".$item['title_'.lang]."</a></li>";
		}
		echo "</ul>";
	?>
</div>
<?php }?>
</div>
