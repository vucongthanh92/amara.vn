<h2 class="tieude"><?php echo $data['map_title'];?></h2>
<div class="space_10"></div>
<div class = 'noidung-sp'>
<?php echo stripslashes($data['content_'.lang]);?>

<div class="space_10"></div>
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
</div>