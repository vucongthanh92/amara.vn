
<?php

	
	$db = new Models_MStyleProduct;
	$pg = new Paging;

	$orderby = "sort asc";
	$partner = new Models_MPartners();
	$infopic['info'] = $mpartners->listdata('','','sort asc');

	//tieu de trang
	$title_page .= " - ".PT_TITLEPAGE;
	$map_title = NHACUNGCAP;
	$infopic['map_title'] =  $map_title;
	
	loadview("styleproduct/view_list",$infopic);

?>