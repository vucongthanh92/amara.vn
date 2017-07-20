<div class = 'mappage'><h1><?php echo $data['map_title'];?></h1></div>

<div class = 'hoidap'>
<?php
if(!empty($data['info']))
{
	$title = unicode_convert($data['info']['title']);
?>
	<h1><a href = '<?php echo BASE_URL;?>forum/detail/<?php echo $data['info']['Id']."/".$title?>'><?php echo stripslashes($data['info']['title']);?></a></h1>	
	<div style = 'margin-top:5px;'><i><b><?php echo FR_CAUHOI;?></b>: <?php echo stripslashes($data['info']['question']);?></i></div>
	<div style = 'margin-top:10px;'><b><?php echo FR_DAP;?></b>: <?php echo stripslashes($data['info']['reply']);?></div>
	<p style = 'text-align:right;'>
		<b><?php echo stripslashes($data['info']['fullname']);?></b><br/>
		<?php echo stripslashes($data['info']['email']);?>
	</p>
<?php
}
?>
</div>

<div class = 'cac-tin-khac'>
	<p class = 'title'><span>Câu hỏi khác</span></p>
	<?php
	if(!empty($data['othernews'])){
		echo "<ul>";
		foreach($data['othernews'] as $item)
		{
			$title = unicode_convert($item['title']);
			echo "<li><a href = '".BASE_URL."forum/detail/".$item['Id']."/".$title."'>".$item['title']."</a></li>";
		}
		echo "</ul>";
	}
	?>
</div>