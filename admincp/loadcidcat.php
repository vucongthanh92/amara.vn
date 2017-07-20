<?php
include ('header.php');
 $mcatelog = new Models_MCatelog;
 $id = $_GET['id'];
 if($id==0) $id=-1;
   $ldata = $mcatelog->listdata_where('parentid="'.$id.'" AND ticlock = "0"');
?>
<option value = ''>- - Chọn danh mục - -</option>
<?php
   if(!empty($ldata)){
	   foreach($ldata as $item){
?>
	<option value = '<?=$item['id'] ?>'><?=$item['name'] ?></option>
<?php 
	 $sub = $mcatelog->listdata_where('parentid="'.$item['id'].'" AND ticlock = "0"');
	 if(!empty($sub)){
		 foreach($sub as $row){
?>
	<option value = '<?=$row['id'] ?>'> --- <?=$row['name'] ?></option>
<?php }}}} ?>

	
