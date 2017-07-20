<?php
include('header.php');
$id = $_GET['id'];
$sq2 = "select * from `ward-dist` where  parent= '".$id."'";
$kq = mysql_query($sq2) or die(mysql_error());
while($row = mysql_fetch_assoc($kq)){
?>
<option value="<?=$row['id'] ?>"><?=$row['name'] ?></option>
<?php } ?>