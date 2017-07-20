<script type="text/javascript">
	//tinymce_image("hinh_anh");
	//tinymce_simple("des");
	//tinymce_advanced("cont");
</script>
<script type="text/javascript">
<!--
function checkform(){

	var frm = document.frm;
	if(frm.idcat.value == ""){
		alert("Vui lòng chọn chủ đề");
		return false;
	}
	if(frm.title_vn.value == ""){
		alert("Vui lòng nhận tiêu đề tin");
		frm.title_vn.focus();
		return false;
	}
}
//-->
</script>
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
        <a href="<?=BASE_URL_ADMIN ?>weblink/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-paper.png">
        </div>
        <div class="text">Phụ Lục</div>
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
    <td> Quản lý nội dung / Bài viết / Sửa bài viết</td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
        

<div class="content">
<div class="content_i">
<form name = "frm" action = '<?php echo BASE_URL_ADMIN;?>news/edit/<?php echo $data['info']['Id'];?>' method = 'post' enctype = "multipart/form-data" onsubmit = "return checkform();">
<table>
<tbody>
<tr>
   <td width="700">
   <h2>
<img alt="" src="<?=ADMIN_PATH_IMG ?>icon-16-info.png">
Thông tin bài viết
</h2>
<table>
	<tr>
    	<td><strong>Chủ đề</strong></td>
    </tr>
	<tr>
		<td>
			<select name = 'idcat'>
				<option value = '0'>- - - Là chủ đề gốc - - -</option>
			<?php
			    $sql="select * from mn_catnews where parentid='0' and ticlock='0' order by Id asc";
				$ds=mysql_query($sql) or die(mysql_error());
				while($row=mysql_fetch_assoc($ds)) {
			?>
                <option <?php if($data['info']['idcat']==$row['Id']) echo "selected"; ?> value="<?=$row['Id']?>"><?=$row['title_vn'];?></option>
                <?php
				     $idpa=$row['Id'];
					 $sql2="select * from mn_catnews where parentid='$idpa' and ticlock='0' order by Id asc";
					 $ds2=mysql_query($sql2) or die(mysql_error());
					 while($row2=mysql_fetch_assoc($ds2)) {
				?>
                     <option <?php if($data['info']['idcat']==$row2['Id']) echo "selected"; ?> value="<?=$row2['Id'] ?>" >
                          ---<?=$row2['title_vn'];?>---</option>
                <?php } ?>
            <?php } ?>
			</select>
		</td>
	</tr>
<?php
foreach($config_lang as $klang => $vlang)
{
?>
	<tr>
    	<td><strong>Tiêu đề (<?=$vlang ?>)</strong></td>
    </tr>
	<tr>
		<td><input type = 'text' name = 'title_<?php echo $vlang;?>' value = '<?php echo stripcslashes($data['info']['title_'.$vlang]);?>' size = '83'></td>
	</tr>
    <tr>
    	<td><strong> Mô tả (<?=$vlang ?>)</strong></td>
    </tr>
	<tr>
		<td>
		<textarea name="description_<?=$vlang ?>" id="des" style="height:150px;width:520px;"><?=stripslashes($data['info']["description_".$vlang])?>
        </textarea>
        </td>
	</tr>
    <tr>
    	<td><strong>Nội dung (<?=$vlang ?>)</strong></td>
    </tr>
	<tr>
		<td>
        	<!--<textarea name="content_<?=$vlang ?>" id="cont" style="height:300px"><?=str_replace("../../","../../../",stripslashes($data['info']["content_".$vlang])); ?></textarea>-->
            <?php getFCKeditor("content_".$vlang,stripslashes($data['info']["content_".$vlang]),500); ?>
        </td>
	</tr>
<?php
}
?>
	<tr>
		<th align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew' class="button">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'  class="button">
		</th>
	</tr>	
</table>

</td>
<td valign="top">
<h2>
<img alt="" src="<?=ADMIN_PATH_IMG ?>icon-16-info.png">
Thông tin thiết lập
</h2>
	<table class="right_new">
        <tr>
            <td class = 'title_td'>Alias</td>
            <td><input type = 'text' name = 'alias' size = '50' value="<?=$data['info']['alias'] ?>"></td>
        </tr>
        
        <tr>
            <td> <img src="<?=BASE_URL.PATH_IMG_NEWS.$data['info']['images'] ?>" height="100" /></td>
        </tr>
        <tr>
            <td class = 'title_td'><?php echo IMAGES;?></td>
            <td><input type = 'file' name = 'images'></td>
        </tr>
        <tr>
            <td class = 'title_td'><?php echo SORT;?></td>
            <td><input type = 'text' name = 'sort' size = '50' value="<?=$data['info']['sort'] ?>"></td>
        </tr>
        <tr>
            <td class = 'title_td'>Ngày đăng</td>
            <td><input type = 'text' name = 'date' size = '50' value="<?=$data['info']['date'] ?>" ></td>
        </tr>
        <tr>
            <td class = 'title_td'>Số lần xem</td>
            <td><input type = 'text' name = 'visit' size = '50' value="<?=$data['info']['visit'] ?>"></td>
        </tr>
        <tr>
            <td class = 'title_td'>Bật / Tắt</td>
            <td>
            	<select style="width:325px;" name="ticlock">
                	<option value="0" <?php if($data['info']['ticlock']==0) echo 'selected="selected"';?> >Bật</option>
                    <option value="1" <?php if($data['info']['ticlock']==1) echo 'selected="selected"';?>>Tắt</option>
            	</select>
            </td>
        </tr>
        <tr>
            <td class = 'title_td'>Nổi  bật</td>
            <td>
            	<select style="width:325px;" name="NoiBat">
                	<option value="1" <?php if($data['info']['NoiBat']==1) echo 'selected="selected"';?> >Bật</option>
                    <option value="0" <?php if($data['info']['NoiBat']==0) echo 'selected="selected"';?> >Tắt</option>
            	</select>
            </td>
        </tr>
        <tr>
            <td class = 'title_td'> Meta Keyword</td>
            <td>
            	<textarea name="meta_keyword" style="width:325px; height:100px;"> <?=$data['info']['meta_keyword'] ?></textarea>
            </td>
        </tr>
         <tr>
            <td class = 'title_td'> Meta Description</td>
            <td>
            	<textarea name="meta_description" style="width:325px; height:100px;"><?=$data['info']['meta_description'] ?></textarea>
            </td>
        </tr>
    </table>
</td>
</tr>
</tbody>
</table>
</form>

</div>
</div>