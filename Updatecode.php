<?php include("header.php"); 
$sql = "select * from team";
$kq = mysql_query($sql);
while($row = mysql_fetch_assoc($kq)){
	echo $cont = str_replace("147 Nguyễn Thị Định,","34 Nguyễn Duy Trinh,",stripcslashes($row['detail']));
	//echo $cont = addslashes($cont,'',1);
	$sql2 = "Update team set detail ='".$cont."' where id = ".$row['id'];
	mysql_query($sql2);
}
?>
