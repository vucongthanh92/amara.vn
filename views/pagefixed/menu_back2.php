<script type="text/javascript" src="<?=BASE_URL ?>public/jsparnter/jquery.jcarousel.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=BASE_URL ?>public/jsparnter/skin.css" />
<script>
	stepcarousel.setup({
		galleryid: 'mygallery', //id of carousel DIV
		beltclass: 'belt', //class of inner "belt" DIV containing all the panel DIVs
		panelclass: 'panel', //class of panel DIVs each holding content
		autostep: {enable:true, moveby:1, pause:5000},
		panelbehavior: {speed:500, wraparound:false,persist:true},
		defaultbuttons: {enable: true, moveby: 1, 
		leftnav: ['<?=BASE_URL ?>public/jsparnter/left.png',965,-28], 
		rightnav: ['<?=BASE_URL ?>public/jsparnter/right.png',-15,-28]},
		statusvars: ['statusA', 'statusB', 'statusC'],
		contenttype: ['inline'] 
	})
</script>
<div class="query_news">
<div class="main_top"><img src = '<?php echo USER_PATH_IMG;?>full_t.png' /></div>
<div class="main_mid" style="height:180px; overflow:hidden; padding-top:2px; padding-bottom:0px; padding-left:10px; padding-right:10px; width:1130px">
<h2 class="title_defaul">Tin nổi bật</h2>

<div id="mygallery" class="stepcarousel">
<div class="belt">
<?php
    if(!empty($data["new"])){
	foreach($data["new"] as $item){
?>
<div class="panel">
		<a href="<?=BASE_URL.strtoseo($item['title_'.lang])."-n".$item['Id'].".html" ?>" style="margin-left:10px;"><?=$item["title_".lang] ?></a>
        <div class="space_10"></div>
      <div class='hinh'>
     	<a href="<?=BASE_URL.strtoseo($item['title_'.lang])."-n".$item['Id'].".html" ?>"><img src="<?=PATH_IMG_NEWS.$item["images"]?> " border="0" /></a>
      </div>
      <?=limit_text($item["description_".lang],300) ?>
      <p class="xemtiep" ><a href="<?=BASE_URL.strtoseo($item['title_'.lang])."-n".$item['Id'].".html" ?>">Chi tiết</a></p>
</div>
<? }} ?>
</div>
</div>

</div>
<div class="main_bottom"><img src = '<?php echo USER_PATH_IMG;?>full_c.png' /></div>
</div>