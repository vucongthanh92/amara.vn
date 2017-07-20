<div class="wrapper_submenu">
	<div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>catnews/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-square.png">
        </div>
        <div class="text">Chủ đề</div>
        </div>
        </a>
	</div>
    <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>news/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-write.png">
        </div>
        <div class="text">Bài viết</div>
        </div>
        </a>
	</div>
     <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>news/duyettin">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-publish.png">
        </div>
        <div class="text">Duyệt Tin</div>
        </div>
        </a>
	</div>
    <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>news/laytin">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-canbang.png">
        </div>
        <div class="text">Lấy tin</div>
        </div>
        </a>
	</div>
    <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>pagehtml/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-paper.png">
        </div>
        <div class="text">Mở Rộng</div>
        </div>
        </a>
	</div>
	<div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>commentnew/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-comment.png">
        </div>
        <div class="text">Bình luận</div>
        </div>
        </a>
	</div>
    <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>hoidap/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-faq.png">
        </div>
        <div class="text">Hỏi đáp</div>
        </div>
        </a>
	</div>
</div>
<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
    <tbody>
    <tr>
    <td width="25">
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-square.png" style="width:23px; height: 23px">
    </td>
    <td> Quản lý nội dung / lấy tin dân trí </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
        

<div class="content">
<div class="list_button">
<a href = '<?php echo BASE_URL_ADMIN;?>news/laytin' class="button" ><img src="<?=ADMIN_PATH_IMG ?>icon-10-blue-arrow.png" style="margin-top:-5px;" /> Lấy tin từ Danttri.com.vn</a>
<a href = '<?php echo BASE_URL_ADMIN;?>news/duyettin' class="button" ><img src="<?=ADMIN_PATH_IMG ?>icon-16-session.png"  /> Duyệt tin đã lấy</a>
</div>
<table class="view">
<tr>
	<th width="50">STT</th>
    <th>Tiêu đề tin</th>
</tr>
<?php
include("simplehtmldom/simple_html_dom.php");
function LuuTinVaoDB($tin, $url, $source){
	$tieude = trim(mysql_real_escape_string(strip_tags($tin['tieude'])));
	$tomtat = trim(mysql_real_escape_string(strip_tags($tin['tomtat'])));
	$content = trim(mysql_real_escape_string($tin['content']));
$urlHinh = trim(mysql_real_escape_string(strip_tags($tin['urlHinh'])));

$sql = "SELECT idTin from mn_tinmoi where urlGoc='{$url}'";
	$rs = mysql_query($sql) or die (mysql_error());
	if (mysql_num_rows($rs) >0 ) return false;

	$sql="INSERT INTO mn_tinmoi (TieuDe,TomTat, Content, urlGoc, Source, Ngay, urlHinh)
		VALUES ('$tieude','$tomtat', '$content', '$url', '$source', Now(),'$urlHinh')";
	mysql_query($sql) or die (mysql_error());
	return true;
}
function DanTri_TrangChu($url) {
	$linkarray=array();
	$html = file_get_html($url);
	foreach ($html->find(".fon1") as $link){		
		if ($link->href==NULL)  continue;
		if ($link->plaintext==NULL) continue;
		$text=str_replace("&nbsp;"," ",$link->plaintext);
		$text=trim($text);		
		if ($text=="") continue;
		if (substr($link->href,0,1)=="/") $link->href=$url. $link->href;
		if (in_array($link->href,$linkarray)==false) $linkarray[$text]=$link->href;
	}
	foreach ($html->find(".ul1 li a") as $link){	
		if ($link->href==NULL)  continue;
		if ($link->plaintext==NULL) continue;
		$text=str_replace("&nbsp;"," ",$link->plaintext);
		$text=trim($text);		
		if ($text=="") continue;
		if (substr($link->href,0,1)=="/")  $link->href=$url. $link->href;
		if (in_array($link->href,$linkarray)==false) $linkarray[$text]=$link->href;
	}
	foreach ($html->find(".fon4") as $link){
		if ($link->href==NULL)  continue;
		if ($link->plaintext==NULL) continue;
		$text=str_replace("&nbsp;"," ",$link->plaintext);
		$text=trim($text);		
		if ($text=="") continue;
		if (substr($link->href,0,1)=="/") $link->href=$url. $link->href;
		if (in_array($link->href,$linkarray)==false) $linkarray[$text]=$link->href;
	}

	$html->clear();
	unset($html);
	return $linkarray;
}
function Dantri_Lay1Tin($urlwebsite,$url) {
	$html = file_get_html($url);
	$tin = array();
	$td = $html->find('.fon31',0);
	$tin['tieude']=$td->innertext;
	$td->outertext='';
	$tt = $html->find('.fon33',0);
	$tin['tomtat']=$tt->innertext;
	$tt->outertext = '';
	$content = $html->find('div.fon34',0);		
	///$content_img = $content->find('div');
	if ($content!=NULL) 
	$i=0;
	foreach($content->find('img') as $img) {	
		$i++;
		if($i==1){	
			if (substr($img->src,0,1) == "/") $img->src = $urlwebsite.$img->src;
			$tenfile = basename($img->src);
			$pathfile = "../data/News/".$tenfile;
			file_put_contents($pathfile, file_get_contents($img->src));
			$img->src = "data/News/".$tenfile;
			$tin["urlHinh"] = $tenfile;	
		}
	} 
	
	$tin['content'] = $content->innertext;
	$html->clear();
	unset($html);
	return $tin;
}

$urlwebsite="http://dantri.com.vn";
$links=DanTri_TrangChu($urlwebsite);
$i=0;
foreach ($links as $td => $url){
$tin=DanTri_Lay1Tin($urlwebsite,$url);
$i++;
echo "<tr><td>".$i."</td><td align='left'>";
echo $tin['tieude'];
   //echo $tin['content']; 
echo "</tr>";
   flush();
   LuuTinVaoDB($tin, $url,"dantri");
next($links);
}
?>
</table>
<div class="list_button">
<a href = '<?php echo BASE_URL_ADMIN;?>news/laytin' class="button" ><img src="<?=ADMIN_PATH_IMG ?>icon-10-blue-arrow.png" style="margin-top:-5px;" /> Lấy tin từ Danttri.com.vn</a>
<a href = '<?php echo BASE_URL_ADMIN;?>news/duyettin' class="button" ><img src="<?=ADMIN_PATH_IMG ?>icon-16-session.png"  /> Duyệt tin đã lấy</a>
</div>
</div>