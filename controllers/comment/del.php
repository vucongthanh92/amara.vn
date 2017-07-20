<?php

$mcomment = new Models_MComment();

if(isset($_GET['id'])){
	$id = intval($_GET['id']);
	
	$mcomment->del_onecheck($id);
	
	echo '<script type="text/javascript">
			alert("Đã xoá ý kiến thành công.");
		</script>
	';
}

?>