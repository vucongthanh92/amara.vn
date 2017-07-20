<?php

$mcomment = new Models_MComment();

if(isset($_GET['id'])){
	$id = intval($_GET['id']);
	
	$mcomment->editNew('active  = "1"', $id);
	
	echo '<script type="text/javascript">
			alert("Đã duyệt thành công.");
		</script>
	';
}

?>