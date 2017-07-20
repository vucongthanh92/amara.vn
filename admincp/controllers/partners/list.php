<?php

$db = new Models_MPartners;

$data = $db->listdata();

loadview("partners/list_view",$data);

?>