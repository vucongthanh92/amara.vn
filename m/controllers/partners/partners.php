<?php
	
	$db = new Models_MPartners();
	$data = $db->listdata();

	loadview('partners/partners',$data);
?>