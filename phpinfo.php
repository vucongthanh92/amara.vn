<?
include('header.php');
$sql = "select * from  team ";
$kq = mysql_query($sql);
while($row = mysql_fetch_assoc($kq)){
	$sql2 = "Update team set alias = '".strtoseo($row["product"])."' where id='".$row['id']."'";
	mysql_query($sql2);
}
?>