<?php
#####################################
#									#
# class hàm thường dùng PHP 		#
# code by VanQuyen                  #
# yahoo: vangtrang_codon2755    	#
# email: vquyen2790@gmail.com    	#
# tel: 0988 550 385					#
# date: 20/7/2010					#
#									#
#####################################
// gui mail
function smtpmailer($to, $from, $from_name, $subject, $body) {
	global $error;
	$mail = new PHPMailer();  // tạo một đối tượng mới từ class PHPMailer
	$mail->IsSMTP(); // bật chức năng SMTP
	$mail->SMTPDebug = 0;  // kiểm tra lỗi : 1 là  hiển thị lỗi và thông báo cho ta biết, 2 = chỉ thông báo lỗi
	$mail->SMTPAuth = true;  // bật chức năng đăng nhập vào SMTP này
	$mail->SMTPSecure = "ssl"; // sử dụng giao thức SSL vì gmail bắt buộc dùng cái này
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->Username = $_SESSION['email_send'];
	$mail->Password = $_SESSION['pass_send'];
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		//$error = "Gởi mail bị lỗi: ".$mail->ErrorInfo;
	return false;
	} else {
		//$error = "thư của bạn đã được gởi đi ";
	return true;
	}
}

function strtoseo($value){ 
	$value = mb_strtolower(trim($value), "UTF-8");
	/*a à ả ã á ạ ă ằ ẳ ẵ ắ ặ â ầ ẩ ẫ ấ ậ b c d đ e è ẻ ẽ é ẹ ê ề ể ễ ế ệ	      f g h i ì ỉ ĩ í ị j k l m n o ò ỏ õ ó ọ ô ồ ổ ỗ ố ộ ơ ờ ở ỡ ớ ợ	      p q r s t u ù ủ ũ ú ụ ư ừ ử ữ ứ ự v w x y ỳ ỷ ỹ ý ỵ z*/		/*$filter = new Zend_Filter_StringToLower('utf-8');		$value = $filter->filter($value);*/     
	$value = str_replace(' ','-',$value);

	$value = str_replace('?','',$value);
	$value = str_replace('/','-',$value);	$value = str_replace('%','',$value);	
	$charaterA = '#(à|ả|ã|á|ạ|ă|ằ|ẳ|ẵ|ắ|ặ|â|ầ|ẩ|ẫ|ấ|ậ)#imsU';     
	$replaceCharaterA = 'a';     
	$value = preg_replace($charaterA, $replaceCharaterA, $value);      	      	
	$charaterD = '#(đ)#imsU';      $replaceCharaterD = 'd';      
	$value = preg_replace($charaterD,$replaceCharaterD,$value);            
	$charaterE = '#(è|ẻ|ẽ|é|ẹ|ê|ề|ể|ễ|ế|ệ)#imsU';      
	$replaceCharaterE = 'e';      
	$value = preg_replace($charaterE,$replaceCharaterE,$value);         
	$charaterI = '#(ì|ỉ|ĩ|í|ị)#imsU';      
	$replaceCharaterI = 'i';      
	$value = preg_replace($charaterI,$replaceCharaterI,$value);            
	$charaterO = '#(ò|ỏ|õ|ó|ọ|ô|ồ|ổ|ỗ|ố|ộ|ơ|ờ|ở|ỡ|ớ|ợ)#imsU';      
	$replaceCharaterO = 'o';      
	$value = preg_replace($charaterO,$replaceCharaterO,$value);                  
	$charaterU = '#(ù|ủ|ũ|ú|ụ|ư|ừ|ử|ữ|ứ|ự)#imsU';      
	$replaceCharaterU = 'u';      
	$value = preg_replace($charaterU,$replaceCharaterU,$value);            
	$charaterY = '#(ỳ|ỷ|ỹ|ý|ỵ)#imsU';      
	$replaceCharaterY = 'y';      
	$value = preg_replace($charaterY,$replaceCharaterY,$value); 
	$value = str_replace(':','',$value); 
	$value = str_replace('!','',$value); 
	$value = str_replace(',','',$value); 
	$value = str_replace('---','-',$value);   
	$value = str_replace('--','-',$value);   
	$value = str_replace('-–-','-',$value);    
	$value = str_replace('_','-',$value); 
	$value = str_replace('(','',$value); 
	$value = str_replace(')','',$value); 
	$value = str_replace('{','',$value); 
	$value = str_replace('&','',$value); 
	$value = str_replace('}','',$value); 
	$value = str_replace('.','-',$value); 
	$value = str_replace('--','-',$value);    		
	return $value;	
}

function safe($string, $html = 0) {
	if ($html == 0) {
		$string = htmlspecialchars ( $string, ENT_QUOTES );
		$string = str_replace ( "<", "&lt;", $string );
		$string = str_replace ( ">", "&gt;", $string );
		$string = str_replace ( "\\", "&#92;", $string );
	} else {
		$string = addslashes ( $string );
		$string = str_replace ( "\\\\", "&#92;", $string );
	}
	$string = str_replace ( "\r", "<br/>", $string );
	$string = str_replace ( "\n", "", $string );
	$string = str_replace ( "\t", "&nbsp;&nbsp;", $string );
	$string = str_replace ( "  ", "&nbsp;&nbsp;", $string );
	$string = str_replace ( '|', '&#124;', $string );
	$string = str_replace ( "&amp;#96;", "&#96;", $string );
	$string = str_replace ( "&amp;#92;", "&#92;", $string );
	$string = str_replace ( "&amp;#91;", "&#91;", $string );
	$string = str_replace ( "&amp;#93;", "&#93;", $string );
	return $string;
}

// ranh thi ngoi code doi tien
function bsVndDot($strNum)
{
    $result = number_format($strNum,0,',','.');
    return $result;
}

function bsVndDot2($strNum)
{
    $result = number_format($strNum,1,',','.');
    return $result;
}

//counter theo session_id()
function counter_sessionid()
{
	$c_id = session_id(); // Bien s_id
	$time = time(); // Lay thoi gian hien tai
	$time_secs = 900; // Thoi gian tinh bang seconds de delete & insert cai $s_id moi, test tren localhost thi cho no bang 3 seconds de nhanh thay ket qua, ch?y trên host th? đ? 900 = 15 phút là v?a
	$time_out = $time - $time_secs; // Lay thoi gian hien tai

	@mysql_query("DELETE FROM ".TBL_COUNTER." WHERE c_time < '$time_out'"); // Delete tat ca nhung rows trong khoang thoi gian qui dinh san
	@mysql_query("DELETE FROM ".TBL_COUNTER." WHERE c_id = '$c_id'"); // Delete cai $s_id cua chinh thang nay
	@mysql_query("INSERT INTO ".TBL_COUNTER." (c_id, c_time) VALUES ('$c_id', '$time')"); // Delete no xong lai insert chinh no
	
	
	$user_online = @mysql_num_rows(@mysql_query("SELECT id FROM ".TBL_COUNTER."")); // Dem so dong trong table counter, chinh la so nguoi dang online
	// Them 1 cai, xem page nay da duoc mo bao nhieu lan:
	list($page_visited) = @mysql_fetch_array(@mysql_query("SELECT MAX(id) FROM ".TBL_COUNTER.""));
	// Xong rui, cho no ra thui
	$counter['online'] = $user_online;
	$counter['total'] = $page_visited;
	
	return $counter;
}

function unicode_convert($str){
	if(!$str) return false;

	$str = str_replace("\"","",$str);
	$marTViet=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
	"ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề"
	,"ế","ệ","ể","ễ",
	"ì","í","ị","ỉ","ĩ",
	"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
	,"ờ","ớ","ợ","ở","ỡ",
	"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
	"ỳ","ý","ỵ","ỷ","ỹ",
	"đ",
	"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
	,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
	"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
	"Ì","Í","Ị","Ỉ","Ĩ",
	"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
	,"Ờ","Ớ","Ợ","Ở","Ỡ",
	"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
	"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
	"Đ",
	" ","?",":","\"","'",",",".","!","#","@","$","(",")","[","]","{","}","|","+","`","&","/","%","\\","<",">");

	$marKoDau=array("a","a","a","a","a","a","a","a","a","a","a"
	,"a","a","a","a","a","a",
	"e","e","e","e","e","e","e","e","e","e","e",
	"i","i","i","i","i",
	"o","o","o","o","o","o","o","o","o","o","o","o"
	,"o","o","o","o","o",
	"u","u","u","u","u","u","u","u","u","u","u",
	"y","y","y","y","y",
	"d",
	"A","A","A","A","A","A","A","A","A","A","A","A"
	,"A","A","A","A","A",
	"E","E","E","E","E","E","E","E","E","E","E",
	"I","I","I","I","I",
	"O","O","O","O","O","O","O","O","O","O","O","O"
	,"O","O","O","O","O",
	"U","U","U","U","U","U","U","U","U","U","U",
	"Y","Y","Y","Y","Y",
	"D",
	"-","","","","","","","","","","","","","","","","","","","","","","","-","","");
	$str = str_replace($marTViet,$marKoDau,$str);
	$str = str_replace("---","-",$str);
	$str = str_replace("--","-",$str);
	$str = str_replace('"',"",$str);
	$str = str_replace("'","",$str);
	$str = str_replace("”","",$str);
	$str = str_replace("“","",$str);
	$str = str_replace("–","",$str);
	return $str . ".html";
}  
function unicode_convert2($str){
	if(!$str) return false;

	$str = str_replace("\"","",$str);
	$marTViet=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
	"ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề"
	,"ế","ệ","ể","ễ",
	"ì","í","ị","ỉ","ĩ",
	"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
	,"ờ","ớ","ợ","ở","ỡ",
	"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
	"ỳ","ý","ỵ","ỷ","ỹ",
	"đ",
	"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
	,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
	"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
	"Ì","Í","Ị","Ỉ","Ĩ",
	"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
	,"Ờ","Ớ","Ợ","Ở","Ỡ",
	"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
	"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
	"Đ",
	" ","?",":","\"","'",",",".","!","#","@","$","(",")","[","]","{","}","|","+","`","&","/","%","\\","<",">");

	$marKoDau=array("a","a","a","a","a","a","a","a","a","a","a"
	,"a","a","a","a","a","a",
	"e","e","e","e","e","e","e","e","e","e","e",
	"i","i","i","i","i",
	"o","o","o","o","o","o","o","o","o","o","o","o"
	,"o","o","o","o","o",
	"u","u","u","u","u","u","u","u","u","u","u",
	"y","y","y","y","y",
	"d",
	"A","A","A","A","A","A","A","A","A","A","A","A"
	,"A","A","A","A","A",
	"E","E","E","E","E","E","E","E","E","E","E",
	"I","I","I","I","I",
	"O","O","O","O","O","O","O","O","O","O","O","O"
	,"O","O","O","O","O",
	"U","U","U","U","U","U","U","U","U","U","U",
	"Y","Y","Y","Y","Y",
	"D",
	"-","","","","","","","","","","","","","","","","","","","","","","","-","","");
	$str = str_replace($marTViet,$marKoDau,$str);
	$str = str_replace("---","-",$str);
	$str = str_replace("--","-",$str);
	$str = str_replace('"',"",$str);
	$str = str_replace("'","",$str);
	$str = str_replace("”","",$str);
	$str = str_replace("“","",$str);
	$str = str_replace("–","",$str);
	$str = str_replace("‘","",$str);
	$str = str_replace("'","",$str);
	return $str;
}  

//ngay thang
function ngaythang()
{	
	date_default_timezone_set('UTC');
	if($_SESSION['lang']=='en')
	{
		$ngaythang = date('jS F Y h:i:s A');
	}
	else
	{
		$ngay = str_replace("th","",date('jS'));
		$ngay = str_replace("st","",$ngay);
		$ngay = str_replace("nd","",$ngay);
		$ngay = str_replace("rd","",$ngay);
		$thang = date('F');
		$nam = date('Y');
		$gio = date('h:i:s');
		
		switch($thang)
		{
			case "January": $thang = "01"; break;
			case "February": $thang = "02"; break;
			case "March": $thang = "03"; break;
			case "April": $thang = "04"; break;
			case "May": $thang = "05"; break;
			case "June": $thang = "06"; break;
			case "July": $thang = "07"; break;
			case "August": $thang = "08"; break;
			case "September": $thang = "09"; break;
			case "October": $thang = "10"; break;
			case "November": $thang = "11"; break;
			case "December": $thang = "12"; break; 
		}
		
		$n = jddayofweek(cal_to_jd(CAL_GREGORIAN, date($thang),date($ngay), date($nam)) );
		switch($n)
		{
			case "0": $thu = "Chủ nhật"; break;
			case "1": $thu = "Thứ hai"; break;
			case "2": $thu = "Thứ ba"; break;
			case "3": $thu = "Thứ tư"; break;
			case "4": $thu = "Thứ năm"; break;
			case "5": $thu = "Thứ sáu"; break;
			case "6": $thu = "Thứ bảy"; break;
		}
		
		$ngaythang = "$thu, ngày $ngay / $thang / $nam";	
	}
	return $ngaythang;
}

//id max
function idMax($table)
{
	$sql_idMax = mysql_query("select MAX(Id) from $table") or die (mysql_error());
	if($rows_idMax = mysql_fetch_array($sql_idMax))
		return $rows_idMax['MAX(Id)'];
	else
		return false;	
}

//config fckeditor

function getFCKeditor($name,$value = "",$height = 250, $width = 580)
{
	$FCKeditor->Config["CustomConfigurationsPath"] = BASE_URL."public/FCKeditor/fckconfig.js";
	$FCKeditor->ToolbarSet = 'Custom';

	$oFCKeditor = new FCKeditor($name) ;
	$oFCKeditor->BasePath = BASE_URL."public/FCKeditor/" ;
	$oFCKeditor->Height = $height;
	$oFCKeditor->Width = $width;
	$oFCKeditor->Value = $value;
	$oFCKeditor->Create() ;
}

//cat chuoi 
function limit_text($text,$maxlen){
  $sentenceSymbol=array(".","!","?"," ");  // di?m k?t thúc câu
  $text=strip_tags($text,"<br /><br/><br><b><i>"); // nh?ng tag mu?n gi? l?i
  for ($i=$maxlen; $i>0; $i--)  {
      $ch=substr($text,$i,1);
      if (in_array($ch,$sentenceSymbol)){
         $pos=$i;
         $i=0;
      }
  }
  $temp=substr($text,0,$pos+1);
  return $temp;
}
function limit_text2($text,$maxlen){
  $sentenceSymbol=array(".","!","?"," ");  // di?m k?t thúc câu
  $text=strip_tags($text,"<br /><br/><br><b><i>"); // nh?ng tag mu?n gi? l?i
  for ($i=$maxlen; $i>0; $i--)  {
      $ch=substr($text,$i,1);
      if (in_array($ch,$sentenceSymbol)){
         $pos=$i;
         $i=0;
      }
  }
  $temp=substr($text,0,$pos+1);
  $temp = str_replace("'","",$temp);
  $temp = str_replace('"','',$temp);
  $temp = str_replace('>','',$temp);
  return $temp;
}


function cut_string($str,$len,$more){
	if ($str=="" || $str==NULL) return $str;
	if (is_array($str)) return $str;
	$str = trim($str);
	if (strlen($str) <= $len) return $str;
	$str = substr($str,0,$len);
	if ($str != "") {
		if (!substr_count($str," ")) {
			if ($more) $str .= " ...";
			return $str;
		}
		while(strlen($str) && ($str[strlen($str)-1] != " ")) {
			$str = substr($str,0,-1);
		}
		$str = substr($str,0,-1);
		if ($more) $str .= " ...";
	}
	return $str;
} 
function isValidEmail($email)
{
	return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
}
function getError($data)
{
	if(is_array($data))
	{
		foreach($data as $item)
		{
			$mess_error .= "<li>- ".$item."</li>";
		}
	}
	else
	{
		$mess_error = "<li>- ".$data."</li>";
	}
	
	return $mess_error;
}

function listTreeMenu($table,$parent,$feildid,$text)
{
	$mmenu = new Models_Mmenuadmin;
	$mmenu->where("ParentId = '$parent'");
	$mmenu->getdata($table);
	
	foreach($mmenu->fetchall() as $item)
	{
		$list_menu .= "<option value = '$item[ID]'>$text$item[Title]</option>";
		$list_menu .= listTreeMenu($table,$item['ID'],"","$text---");
	}
	return $list_menu;
}

// lay gia tri bien post
function varPost($var_name, $value_default = "", $origin = false)
{
	if (isset($_POST[$var_name])){
		$value = $_POST[$var_name];
	}
	else {
		$value = $value_default;
	}
	
	if ($origin == false)
		$value = trim(strip_tags($value));
		
	return $value;
}

// lay gia tri bien get
function varGet($var_name, $value_default = "", $origin = false)
{
	if (isset($_GET[$var_name])){
		$value = $_GET[$var_name];
	}
	else {
		$value = $value_default;
	}
	
	if ($origin == false)
		$value = trim(strip_tags($value));
		
	return $value;
}

function varGetPost($var_name, $value_default = "", $origin = false)
{
	if (isset($_POST[$var_name])){
		$value = $_POST[$var_name];
	}
	elseif (isset($_GET[$var_name])){
		$value = $_GET[$var_name];
	}
	else
		$value = $value_default;
	
	if ($origin == false)
		$value = trim(strip_tags($value));
		
	return $value;
}

//lay danh sach cac option cua danh sach chu de tin da cap
function TreeCat($data,$pid,$tcat,$id,$text,$colum = "title_vn",$idr = 'id')
{
	if(!empty($data))
	{
		foreach($data as $item)
		{
			if($pid == $item['parentid']){
				if($id == $item[$idr]){
					$str = '<option value = "'.$item[$idr].'" selected >'.$text.$item[$colum].'</option>';
				}else{
					$str = '<option value = "'.$item[$idr].'">'.$text.$item[$colum].'</option>';
				}
				$tcat .= TreeCat($data,$item[$idr],$str,$id,$text." --- ",'name');
			}
		}
	}
	return $tcat;
}
function OutText($data)
{
	$data = stripcslashes($data);
	$data = str_replace('"',"",$data);
	$data = html_entity_decode($data,ENT_QUOTES,'UTF-8');
	$data = str_replace("../../../","",$data);
	return $data;
}
function OutText2($data)
{
	$data = stripcslashes($data);
	$data = html_entity_decode($data,ENT_QUOTES,'UTF-8');
	$data = str_replace("../../../","",$data);
	return $data;
}
function OutText_Alt($data)
{
	$data = stripcslashes($data);
	$data = str_replace('"',"",$data);
	$data = str_replace("'","",$data);
	return $data;
}

function rand_string( $length ) 
{
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) 
	{
	   $str .= $chars[ rand( 0, $size - 1 ) ];
	}
	return $str;
}

?>