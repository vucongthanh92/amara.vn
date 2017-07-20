<?php include("header.php"); 

		/*$new_date = strtotime ( '+1 month' , time() ) ;
		$sql2 = "Update team set end_time = '".$new_date."'" ;*/
		$sql2 = "delete from team where group_id!=1 AND group_id!=2 AND  group_id!=3 AND  group_id!=4 AND  group_id!=6 AND  group_id!=6";
		mysql_query($sql2) or die(mysql_error());

?>