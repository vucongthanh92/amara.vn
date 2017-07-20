<script type="text/javascript">
	//tinymce_image("hinh_anh");
	//tinymce_simple("des");
	tinymce_advanced("cont");
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
    <td> Quản lý nội dung / Bình luận / Xem</td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
<div class="content">
<div class="content_i">

<?php

if(isset($data['error']))
{
	echo 'div id = "error">';
	echo '<h2>Lỗi!</h2>';
	echo '<ul>';
	echo getError($data['error']);
	echo '</ul>';
	echo '</div>';
}
?>

<form action = '<?php echo BASE_URL_ADMIN;?>commentnew/edit/<?php echo $data['info']['Id'];?>' method = 'post' enctype = "multipart/form-data">
<table>
	<tr>
		<td class = 'title_td'><?php echo FR_FULLNAME;?></td>
		<td><input type = 'text' name = 'fullname' value = '<?php echo $data['info']['fullname'];?>' size = '50'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Email</td>
		<td><input type = 'text' name = 'email' value = '<?php echo $data['info']['email'];?>' size = '50'></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo TITLE;?></td>
		<td><input type = 'text' name = 'title' value = '<?php echo $data['info']['title'];?>' size = '50'></td>
	</tr>
	<tr>
		<td class = 'title_td'>Ý kiến</td>
		<td><textarea id="cont" name="content" style=" height:250px" > <?=$data['info']["content"] ?> </textarea></td>
	</tr>
	<tr>
		<td class = 'title_td'>Duyệt</td>
		<td><input type = 'checkbox' name = 'active' value = '1' <?php if($data['info']['active'] == 1) echo "checked";?>></td>
	</tr>
	<tr>
    	<th></th>
		<th  align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew' class="button">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>' class="button">
		</th>
	</tr>	
</table>
</form>
</div>
</div>