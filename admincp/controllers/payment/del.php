<?php
$db = new Models_MPayment;

if(isset($_POST['check_list']))
{
	$db -> del_allcheck($_POST['check_list']);
}

else
{
	$id=$_GET['id'];
	$db -> del_onecheck($id);
	$sql="delete from mn_customer_cart where idcustomer='$id'";
	$ds=mysql_query($sql) or die(mysql_error());
}
redirect(BASE_URL_ADMIN."payment/list");
?>