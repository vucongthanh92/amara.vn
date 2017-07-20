<div class="main">
<div class ='noidung'>
<h2 class="title"><?=$data["map_title"] ?></h2>

<div class="question">
<p class="btnhoi">Câu hỏi:</p>
<p style="font-weight:bold; color:#0AA619; margin-bottom:5px;"><?=$data['detail']['title_vn']; ?></p>
<?=stripcslashes($data['detail']['content_vn']); ?>
<p class="nguoigui"><strong><?=$data['detail']['name'] ?></strong> - <?=$data['detail']['email'] ?></p>
</div>

<div class="div_wap_travoi">
<p class="btnhoi">Trả lời:</p>
<?php
	if(!empty($data['traloi'])) {
		foreach($data['traloi'] as $item){ 
?>
<div class="for_tl" style="line-height:1.5em;">
<?=stripcslashes($item['content_vn']); ?>
</div>
<?php }} else { ?>
<p  style="color:#F00;"><i>Hiện chưa có câu  trả lời</i></p>
<? } ?>
</div>
<div class="otherquestion">
<p class="btnhoi">Câu hỏi khác:</p>
<ul>
<?php
if(!empty($data['other'])){
	foreach($data['other'] as $row){
?>
<li><a href="<?=BASE_URL ?>hoidap/<?=$row['Id'] ?>-<?=unicode_convert($row['title_'.lang])?>"><?=$row['title_vn'] ?></a></li>
<?php }} ?>
</ul>
</div>

</div>
</div>