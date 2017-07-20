<?php

/* Creating Simple Water in PHP
 * Author : Arun Kumar Sekar
 */

$image_path = "9lesson.png";
$font_path = "GILSANUB.TTF";
$font_size = 30;       // in pixcels
//$water_mark_text_1 = "9";
$water_mark_text_2 = "9lessons";

function watermark_image($oldimage_name, $new_image_name){
    global $image_path;
    list($owidth,$oheight) = getimagesize($oldimage_name);
    $width = $height = 300;    
    $im = imagecreatetruecolor($width, $height);
    $img_src = imagecreatefromjpeg($oldimage_name);
    imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
    $watermark = imagecreatefrompng($image_path);
    list($w_width, $w_height) = getimagesize($image_path);        
    $pos_x = $width - $w_width; 
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
    $width = $height = 300;    
    $image = imagecreatetruecolor($width, $height);
    $image_src = imagecreatefromjpeg($oldimage_name);
    imagecopyresampled($image, $image_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
   // $black = imagecolorallocate($image, 0, 0, 0);
    $blue = imagecolorallocate($image, 79, 166, 185);
   // imagettftext($image, $font_size, 0, 30, 190, $black, $font_path, $water_mark_text_1);
    imagettftext($image, $font_size, 0, 68, 190, $blue, $font_path, $water_mark_text_2);
    imagejpeg($image, $new_image_name, 100);
    imagedestroy($image);
    unlink($oldimage_name);
    return true;
}
$demo_image= "";
if(isset($_POST['createmark']) and $_POST['createmark'] == "Submit"){
    $path = "uploads/";
    $valid_formats = array("jpg",  "bmp","jpeg");
	$name = $_FILES['imgfile']['name'];
	if(strlen($name))
{
   list($txt, $ext) = explode(".", $name);
   if(in_array($ext,$valid_formats)&& $_FILES['imgfile']['size'] <= 256*1024)
	{
    $upload_status = move_uploaded_file($_FILES['imgfile']['tmp_name'], $path.$_FILES['imgfile']['name']);
    if($upload_status){
        $new_name = $path.time().".jpg";
        if(watermark_image($path.$_FILES['imgfile']['name'], $new_name))
                $demo_image = $new_name;
                
    }
	}
	else
	$msg="File size Max 256 KB or Invalid file format supports .jpg and .bmp";
	}
}
?>
<html>
    <head>
        <title>
PHP Image Water Mark
        </title>
        
        <style type="text/css">
            body{ width:800px; margin: 15px auto; padding:0px; font-family: arial}    
            
        </style>
        
    </head>
    <body>
	
    <h1>Simple Image WaterMark</h1>
        <form name="imageUpload" id="imageUpload" method="post" enctype="multipart/form-data" >
            <fieldset>
                <legend>Upload Image</legend>
                Image :<input type="file" name="imgfile" id="imgfile"/><br />
                <input type="submit" name="createmark" id="createmark" value="Submit" />
            </fieldset>   
            <?php
                if(!empty($demo_image))
                    echo '<br/><center><img src="'.$demo_image.'" /></center>';
				else
				    echo '<h3>'.$msg.'</h3>';
            ?>
        </form>
    
   
    </body>
</html>
