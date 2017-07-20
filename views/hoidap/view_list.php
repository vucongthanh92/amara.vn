<div class="main">
<div class="noidung">
<h2 class="title"><?=$data["map_title"] ?></h2>
<div class="images"><img src="<?=USER_PATH_IMG ?>datcauhoi.jpg"  usemap="#Map"  width="700" border="0"/></div>
<map name="Map" id="Map">
  <area shape="rect" coords="441,60,539,81" href="dat-cau-hoi.html" alt="dat cau hoi" />
</map>
<div class="space_5"></div>
<?php
if(!empty($data['info'])){
	foreach($data['info'] as $item){
		$sql = "select count(*) from mn_hoidap where parentid=".$item['Id'];
		$kq = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_row($kq);
		
?>
<div class="for_hoidap">
<div class="images"><img src="<?=USER_PATH_IMG ?>chamhoi.jpg" /></div>
<div class="descript">
	<h4 class="title"><a href="<?=BASE_URL?>hoidap/<?=$item['Id']?>-<?=unicode_convert($item['title_'.lang])?>"><?=$item['title_vn'] ?></a></h4>
    <p class="date">Người viết: <strong><?=$item['name'] ?></strong> - <?=date("H:m:s - d/m/Y",strtotime($item['date'])) ?></p>
    <?=stripslashes($item['content_vn']) ?>
    <p class="xemtiep"><a href="<?=BASE_URL?>hoidap/<?=$item['Id']?>-<?=unicode_convert($item['title_'.lang])?>">(<?=$row[0] ?>) Trả lời</a></p>
</div>
</div>
<?php
	}}
?>
<?php
//xuat phan trang
if($data['page'] != "")
	echo "<div class = 'paging'>". $data['page']. "</div>";
?>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$(".for_hoidap:last").css("border","none");
})
</script>