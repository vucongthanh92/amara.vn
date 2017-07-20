<?php
	#####################################
	#								    #	
	# Class đóng dấu chỉnh sửa image	#	
	# Author: Phan Văn  Quyền           #
	# email	: vquyen2790@gmail.com      #
	# date	: 10/12/2012		        #
	#									#
	#####################################

	$image_path = "../watermark/9lesson.png";
	$font_path = "../watermark/GILSANUB.TTF";
	$font_size = 30;       // in pixcels
	//$water_mark_text_1 = "9";
	$water_mark_text_2 = "9lessons";
	include("mimes.php");
class uploadImg
{
	//doi ten file anh
	function renameImg($image){	
		$img = $image;
		$ext = strtolower(substr(strrchr($img, '.'), 1));// lay duoi anh
		$img_tmp = substr($img,0,strrpos($img,".")) . "_" . time() . "." . $ext;
		return $img_tmp;
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
	function Upload_NoReSize($f,$name,$uploadDir, &$error ){
		$error="";	
		$choUpload = array("image/gif","image/jpeg","image/pjpeg","image/png","image/jpg",);
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

	function watermark_image($oldimage_name, $new_image_name,$ext){
		
		global $image_path;
		list($owidth,$oheight) = getimagesize($oldimage_name);
		$width = $owidth;
		$height = $oheight;    
		$im = imagecreatetruecolor($width, $height);
		if($ext == 'jpg') {
			$img_src = imagecreatefromjpeg($oldimage_name);
		} 
		else if($ext == 'jpeg') {
			$img_src = imagecreatefromjpeg($oldimage_name);
		} 
		else if($ext == 'png'){
			$img_src = imagecreatefrompng($oldimage_name);
		}else { $img_src = imagecreatefromgif($oldimage_name); }
		imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
		$watermark = imagecreatefrompng($image_path);
		list($w_width, $w_height) = getimagesize($image_path);        
		$pos_x = $width - $w_width - 2; 
		$pos_y = $height - $w_height;
		imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
		
		imagejpeg($im, $new_image_name, 100);
		
		imagedestroy($im);
		unlink($oldimage_name);
		return true;
	}
	
	
	function watermark_text($oldimage_name, $new_image_name){
		global $font_path, $font_size, $water_mark_text_1, $water_mark_text_2;
		list($owidth,$oheight) = getimagesize($oldimage_name);
		$width = $owidth;
		$height = $oheight;  
		$image = imagecreatetruecolor($width, $height);
		$image_src = imagecreatefromjpeg($oldimage_name);
		imagecopyresampled($image, $image_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
		$blue = imagecolorallocate($image, 79, 166, 185);
		imagettftext($image, $font_size, 0, 68, 190, $blue, $font_path, $water_mark_text_2);
		imagejpeg($image, $new_image_name, 100);
		imagedestroy($image);
		unlink($oldimage_name);
		return true;
	}
	function Upload_dongdau($file,$name2,$path,&$error){
		$valid_formats = array("jpg","bmp","jpeg","png");
		$name = $file['name'];
		if(strlen($name))
		{
		   list($txt, $ext) = explode(".", $name);
		   
		   if(in_array($ext,$valid_formats)&& $file['size'] <= 1024*1024)
			{
			$upload_status = move_uploaded_file($file['tmp_name'], $path.$file['name']);
			if($upload_status){
				$new_name = $path.$name2.".".$ext;
				$namesql = $name2.".".$ext;
				$this->watermark_image($path.$file['name'], $new_name,$ext);	
			}
			}
		 }
		return $namesql;
	}
}	
?>