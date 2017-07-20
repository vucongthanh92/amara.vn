<style type="text/css">
.noidung-sp td { font-size:12px; padding:3px; padding-left:10px; padding-right:5px;}
.backgr { background-color:#E5ECF4}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$(".noidung-sp tr:even").addClass("backgr");
})
</script>
<div class="mappage"><span class="title_"> <img src="<?=USER_PATH_IMG?>trangchu.jpg"/> Download driver</span></div>
<div class="noidung-sp">
<table border="0" cellpadding="0" cellspacing="0" width="100%">

	<?php 
	if(!empty($data)){
		$i=0;
		foreach ($data as $item){
			$i++;
	?>
    <tr >
    	<td width="20" align="center"><b><?=$i ?></b>.</td>
		<td width="90%">&nbsp;<a href="<?=$item['link'] ?>" target="_blank"><b><?=$item["title_".lang] ?> </b></a></td>
        <td width="100"><a href="<?=$item['link'] ?>" target="_blank"><img src="<?=USER_PATH_IMG ?>Download.png" border="0" /> </a></td>
  </tr>
	<?php 
			
		}
	}
	?>
 </table>
</div>