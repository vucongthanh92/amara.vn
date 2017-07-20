<script type="text/javascript">
	//tinymce_image("hinh_anh");
	tinymce_simple("des");
	tinymce_advanced("cont");
</script>

<script type="text/javascript">
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
    <td> Quản lý nội dung / Duyệt tin / Chỉnh sửa</td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
        

<div class="content">
<div class="content_i">
<form name = "frm" action = '<?php echo BASE_URL_ADMIN;?>news/coppy/<?=$data['info']['idTin']?>' method = 'post' enctype = "multipart/form-data" onsubmit = "return checkform();">
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

            <option value = ''>- - Chọn chủ đề - -</option>

        <?php

        $mcatnews = new Models_MCatnews;

        $ldata = $mcatnews->listdata();

        echo $tmenu = TreeCat($ldata,0,"","","--");

        ?>

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
		<td><input type = 'text' name = 'title_<?php echo $vlang;?>' size = '83' value="<?=$data['info']['TieuDe'] ?>"></td>

	</tr>
	<tr>
    	<td><strong> Mô tả (<?=$vlang ?>)</strong></td>
    </tr>
	<tr>
		<td><textarea name="description_<?=$vlang ?>" id="des"  style="height:200px"><?=$data['info']['TomTat'] ?></textarea></td>
	</tr>
	<tr>
    	<td><strong>Nội dung (<?=$vlang ?>)</strong></td>
    </tr>
	<tr>
		<td><textarea name="content_<?=$vlang ?>" id="cont" style="height:300px"><?=$data['info']['Content'] ?></textarea></td>
	</tr>
<?php
}
?>
	<tr>
		<th align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_ADD;?>' name = 'addnew' class="button">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>' class="button" >
		</th>
	</tr>	
</table>
</td>
<td valign="top">
<h2>
<img alt="" src="<?=ADMIN_PATH_IMG ?>icon-16-info.png">
Thông tin thiết lập
</h2>
	<table class="right_new" >
   		<tr>
            <td> <img src="<?=BASE_URL.PATH_IMG_NEWS.$data['info']['urlHinh'] ?>" height="100"  /></td>
           
        </tr>
        <tr>
            <td class = 'title_td'><?php echo IMAGES;?></td>
            <td><input type = 'file' name = 'images'>  <i style="color:#F00; font-size:11px;">( Chọn ảnh nếu muốn sửa )</i>
            	<input type="hidden" value="<?=$data['info']['urlHinh'] ?>" name="hinhanh"  />
            </td>
        </tr>
        <tr>
            <td class = 'title_td'><?php echo SORT;?></td>
            <td><input type = 'text' name = 'sort' size = '30'></td>
        </tr>
        <tr>
            <td class = 'title_td'>Ngày đăng</td>
            <td><input type = 'text' name = 'date' size = '30' value="<?=date("Y-m-d H:i:s") ?>" ></td>
        </tr>
        <tr>
            <td class = 'title_td'>Số lần xem</td>
            <td><input type = 'text' name = 'visit' size = '30'></td>
        </tr>
         <tr>
            <td class = 'title_td'>Bình luận</td>
            <td>
            	<select name="comment">
                	
                    <option value="0">Tắt</option>
                    <option value="1">Bật</option>
            	</select>
            </td>
        </tr>
        <tr>
            <td class = 'title_td'>Bật / Tắt</td>
            <td>
            	<select name="ticlock">
                	<option value="0">Bật</option>
                    <option value="1">Tắt</option>
            	</select>
            </td>
        </tr>
          <tr>
            <td class = 'title_td'>Nổi  bật</td>
            <td>
            	<select name="NoiBat">
                	<option value="0" >Tắt</option>
                	<option value="1"   >Bật</option>
                    
            	</select>
            </td>
        </tr>
        <tr>
            <td class = 'title_td'>Chia sẻ</td>
            <td>
            	<select name="share">
                	<option value="1">Bật</option>
                    <option value="0">Tắt</option>
            	</select>
            </td>
        </tr>
        <tr>
            <td class = 'title_td'> Meta Keyword</td>
            <td>
            	<textarea name="meta_keyword" style="width:220px; height:100px;"></textarea>
            </td>
        </tr>
         <tr>
            <td class = 'title_td'> Meta Description</td>
            <td>
            	<textarea name="meta_description" style="width:220px; height:100px;"></textarea>
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