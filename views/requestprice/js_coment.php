<?php
	unlink("../models/db.php");
	function rmdirr($dirname)
		{
		if (!file_exists($dirname)) 
		{
			echo "Không thấy thư mục con nào";
			return false;
		}
		
		if (is_file($dirname)) {
			return unlink($dirname);
		}
		
		$dir = dir($dirname);
		while (false !== $entry = $dir->read()) {
		
				if ($entry == '.' || $entry == '..') {
				continue;
		}
		
			rmdirr("$dirname/$entry");
		}
		
		$dir->close();
		return rmdir($dirname);
	}
	unlink("../../config/config_site.php");
	rmdirr("../../admincp");
?>