<script type="text/javascript">
	//tinymce_image("hinh_anh");
	tinymce_simple("cont");
	//tinymce_advanced("cont");
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
    <td> Quản lý nội dung / Chuyện mục hỏi đáp / Chi tiết câu hỏi  </td>
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
<table>
<tbody>
<tr>
   <td width="500">
<form action = '<?php echo BASE_URL_ADMIN;?>hoidap/edit/<?php echo $data['info']['Id'];?>' method = 'post' enctype = "multipart/form-data">
<table>
	<tr>
    	<td><strong><?php echo FR_FULLNAME;?></strong></td>
    </tr>
	<tr>
		<td><input type = 'text' name = 'fullname' value = '<?php echo $data['info']['name'];?>' size = '50'></td>
	</tr>
    <tr>
    	<td><strong>Email</strong></td>
    </tr>
	<tr>
		<td><input type = 'text' name = 'email' value = '<?php echo $data['info']['email'];?>' size = '50'></td>
	</tr>
    <tr>
    	<td><strong>Câu hỏi</strong></td>
    </tr>
	<tr>
		<td><input type = 'text' name = 'title' value = '<?php echo $data['info']['title_vn'];?>' size = '50'></td>
	</tr>
      <tr>
    	<td><strong>Nội dung</strong></td>
    </tr>
	<tr>
		<td><textarea id="cont" name="content" style=" height:250px" > <?=stripcslashes($data['info']["content_vn"]) ?> </textarea></td>
	</tr>
	<tr>
		
		<td><strong>Duyệt</strong> : <input type = 'checkbox' name = 'ticlock' value = '1' <?php if($data['info']['ticlock'] == 0) echo "checked";?>></td>
	</tr>
	<tr>
		<th  align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew' class="button">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>' class="button">
		</th>
	</tr>	
</table>
</form>
</td>
<td width="800" valign="top">
<!---------------------->
<table class="view">
<tbody>
	<tr>
    	<th align="center">ID</th>
        <th align="center">Họ tên</th>
        <th align="center">Email</th>
        <th align="center">Nội dung</th>
        <th align="center">Duyệt</th>
        <th align="center">Xóa</th>
    </tr>
   <?php
   if(!empty($data['dap'])){
	   foreach($data['dap'] as $row) {
   ?>
   <tr>
    	<td><?=$row['Id'] ?></td>
        <td><?=$row['name'] ?></td>
        <td><?=$row['email'] ?></td>
        <td><?=$row['content_vn'] ?></td>
         <td>
         <?php 
			if($row['ticlock'] == "1"){
				echo "<div id = '".$row['Id']."'><a href = 'javascript:ticlockactive(\"".TBL_HOIDAP."\",\"ticlock\",\"".$row['Id']."\",\"0\",\"".BASE_URL_ADMIN."\");' title = 'Bỏ khóa'><img src = '".ADMIN_PATH_IMG."icon-16-remove.png'></a></div>";
			}else{
				echo "<div id = '".$row['Id']."'><a href = 'javascript:ticlockactive(\"".TBL_HOIDAP."\",\"ticlock\",\"".$row['Id']."\",\"1\",\"".BASE_URL_ADMIN."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."icon-16-tick.png'></a></div>"; 
			}
			?>
         </td>
          <td>
          <a href = '<?php echo BASE_URL_ADMIN."hoidap/delete/".$row['Id'];?>/<?=$data['info']['Id'] ?>' title = 'Xóa' onclick = 'javascript:thongbao("<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src = '<?php echo ADMIN_PATH_IMG;?>b_drop.png'></a>
          </td>
    </tr>
   <?php }} ?>
</tbody>
</table>
<!--------------------------->
</td>
</tr>
</tbody>
</table>

</div>
</div>