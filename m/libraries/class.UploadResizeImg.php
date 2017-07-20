<?php
class uploadImg
{
	//doi ten file anh
	function renameImg($image){	
		$img = $image;
		$ext = strtolower(substr(strrchr($img, '.'), 1));// lay duoi anh
		$img_tmp = substr($img,0,strrpos($img,".")) . "_" . time() . "." . $ext;
		return $img_tmp;
	}

	function Upload_NoReSize($f,$name,$uploadDir, &$error ){
		$error="";	
		$choUpload = array("image/gif","image/jpeg","image/pjpeg","image/png");
		$maxsize = 1024*1024; //1MB
		$tmp_name = $f["tmp_name"];
		if ($tmp_name == "") return "";
		$kieuFile = $f["type"];
		$coCuaFile = $f["size"]; //Tinh bang byte		
		$error="";
		if (in_array($kieuFile,$choUpload)==false) $error = "<br>Kiểu file không chấp nhận";
		elseif ($coCuaFile>$maxsize) $error = "<br>Kích thước file quá lớn";
		if ($error!="") return "";
		
		if ($kieuCuaFile=="image/gif") $ext=".gif";  else $ext = ".jpg";
	
		$pathfile = $uploadDir.$name.$ext; 
		$tenhinhluu = $name.$ext;
		if (file_exists($uploadDir)==false) mkdir($uploadDir, NULL ,true);
		move_uploaded_file($tmp_name, $pathfile);	
		return $tenhinhluu;
	}
	//upload và resize anh
	function Upload($image,$image_root,$dir,$dir_save,$w,$h){
		$img_tmp = $this->renameImg($image);
		if($image)
		{
			move_uploaded_file($image_root,$dir.$image);
			list($width, $height) = getimagesize($dir.$image); 
			if($width < $w){
				$w = $width;
			}
			$this->img_resize($image,$dir,$w,$h,$dir_save,$img_tmp);
			unlink($dir.$image);
		}
	}
	
	//Thay đổi kích thước file (thumbs)
	//ví dụ File gốc là D:/1.jpg ,file resize là D:/thumbs/1.jpg
	//$tmpname => tên file gốc cần resize
	//$save_dir => tên thư mục chứa file
	//$ah => Chiều cao cần resize(để auto nếu muốn tự động thay đổi tỷ lệ theo chiều rộng)
	//$aw => Chiều rộng cần resize(để auto nếu muốn tự động thay đổi tỷ lệ theo chiều cao)
	//Lưu ý chỉ một trong 2 tham số $aw và $ah để auto
	//sử dụng :
	//img_resize('3.jpg','D:/a/',180,180,'thumbs/');//ko auto size
	//img_resize('3.jpg','D:/a/','auto',180,'');//auto size chiều cao
	//img_resize('3.jpg','D:/a/',180,'auto','');//auto size chiều rộng
	
	function img_resize( $tmpname,$save_dir,$aw,$ah,$dir,$img_tmp) {
	$save_dir .= ( substr($save_dir,-1) != "/") ? "/" : "";
	$gis = getimagesize($save_dir.$tmpname);
	$type = $gis[2];
	switch($type) {
		case "1": $imorig = imagecreatefromgif($save_dir.$tmpname); break;
		case "2": $imorig = imagecreatefromjpeg($save_dir.$tmpname);break;
		case "3": $imorig = imagecreatefrompng($save_dir.$tmpname); break;
		default: $imorig = imagecreatefromjpeg($save_dir.$tmpname);
	}
	$x = imagesx($imorig);
	$y = imagesy($imorig);
	if($ah=='auto' && is_numeric($aw)){
		$ah=($aw/$x*100)*($y/100);
	}
	if($aw=='auto' && is_numeric($ah)){
		$aw=($ah/$y*100)*($x/100);
	}
	$im = imagecreatetruecolor($aw,$ah);
	if (imagecopyresampled($im,$imorig , 0,0,0,0,$aw,$ah,$x,$y)) {
		imagejpeg($im, $save_dir.$dir.$img_tmp);
	}
	
}
}	
?>