<div class="wrapper_submenu">

  	<div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>titlepage/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-support.png">
        </div>
        <div class="text">Support online</div>
        </div>
        </a>
	</div>
    
    <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>email/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-smtp.png">
        </div>
        <div class="text">Quản Lý Email</div>
        </div>
        </a>
	</div>
    
    <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>comment/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-paper.png">
        </div>
        <div class="text">Comment</div>
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
    <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-image.png" style="width:23px; height: 23px">
    </td>
    <td> Quản lý Comment / Danh Sách </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>


<div class="content">
<div class="content_i">
<form method = 'post' action = "">
<table>
	<tr>
		<td class = 'title_td'>Tìm theo chủ đề</td>
		<td>
			<select name = 'id'>
				<option style="color:#F00; font-weight:bold" value = ''>- - - Nhóm Sản Phẩm - - -</option>
                <?php
				     $sql2="select * from category where ticlock='0' and parentid='0' order by id asc";
					 $ds2=mysql_query($sql2) or die(mysql_error());
					 while($row2=mysql_fetch_assoc($ds2)) {
				?>
                     <option value="fr_<?=$row2['Id']?>"><?=$row2['name']?></option>
                <?php } ?>
                <option style="color:#F00; font-weight:bold" value = ''>- - - Nhóm Tin Tức - - -</option>
                <?php
				     $sql3="select * from mn_catnews where ticlock='0' order by Id asc";
					 $ds3=mysql_query($sql3) or die(mysql_error());
					 while($row3=mysql_fetch_assoc($ds3)) {
				?>
                     <option value="sp_<?=$row3['Id']?>"><?=$row3['title_vn']?></option>
                <?php } ?>
			</select>
		</td>
		<td>
			<input type = 'submit' value = 'Tìm' name = 'tim'>
		</td>
	</tr>
</table>
</form>

<hr />
<form action = '<?php echo BASE_URL_ADMIN;?>comment/del' method = 'post'  name="rowsForm" id="rowsForm">
<table class="view">
	<caption>Danh sách</caption>
	<tr>
		<th><input type="checkbox" name="Check_ctr" id = 'Check_ctr' value="yes" onClick="Check(document.rowsForm.check_list)"></th>
		<th>ID</th>
		<th>Họ Tên</th>
		<th>Nội Dung</th>
		<th>Ngày Đăng</th>
        <th>Email</th>
        <th>Điện Thoại</th>
		<th>Nhóm</th>
        <th>Tiêu Đề</th>
        <th>ID Trả Lời</th>
		<th>Khóa</th>
		<th colspan = '2'><?php echo G_ACTION; ?></th>
	</tr>
	<?php
	if(empty($data['info'])){ //neu khong co du lieu
	?>
	<tr>
		<td colspan = '8' class = 'emptydata'><?php echo G_EMPTYDATA; ?></td>
	</tr>
	<?php
	}
	else //neu co du lieu xuat du lieu ra
	{
		foreach($data['info'] as $item)
		{
		?>
		<tr>
			<td align = 'center'><input type="checkbox" id = 'check_list' name="check_list[]" value="<?php echo $item['Id'];?>"><br></td>
			<td><?php echo $item['Id']; ?></td>
			<td><?php echo $item['hoten']; ?></td>
			<td><?php echo $item['content']; ?></td>
			<td><?php echo $item['date'];?></td>
            <td><?php echo $item['email'];?></td>
            <td><?php echo $item['phone'];?></td>
			<td><?php if($item['idpa']==1) echo "Sản Phẩm"; 
			          else if($item['idpa']==2) echo "Bài Viết"?>
            </td>
            <td><?php 
			     $id=$item['idcat'];
			     if($item['idpa']==1)
				 { 
				    $from="team";
					$where="id='$id'";
				 }
				 else 
				 {
					 $from="mn_news";
					 $where="Id='$id'";
				 }
			     $sql="select * from $from where $where";
				 $ds=mysql_query($sql) or die(mysql_error());
				 $row=mysql_fetch_assoc($ds);
				 //echo $row['title_vn'];
				 if($item['idpa']==1) echo $row['product'];
				 else echo $row['title_vn'];
			?>
            </td>
            
            <td><?php echo $item['idrep']; ?></td>
            
			<td align = 'center'>
			<?php 
			if($item['ticlock'] == "1"){
				echo "<div id = '".$item['Id']."'><a href = 'javascript:ticlockactive(\"".TBL_COMMENT."\",\"ticlock\",\"".$item['Id']."\",\"0\",\"".BASE_URL_ADMIN."\");' title = 'Bỏ khóa'><img src = '".ADMIN_PATH_IMG."icon-16-remove.png'></a></div>";
			}else{
				echo "<div id = '".$item['Id']."'><a href = 'javascript:ticlockactive(\"".TBL_COMMENT."\",\"ticlock\",\"".$item['Id']."\",\"1\",\"".BASE_URL_ADMIN."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."icon-16-tick.png'></a></div>"; 
			}
			?>
			</td>
			<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN;?>comment/edit/<?php echo $item['Id'];?>' title = 'Sửa'><img src = '<?php echo ADMIN_PATH_IMG;?>b_edit.png'></a></td>
			<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN."comment/del/".$item['Id'];?>' title = 'Xóa' onclick = 'javascript:thongbao("<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src = '<?php echo ADMIN_PATH_IMG;?>b_drop.png'></a></td>
		</tr>
		<?php
		}
	}
	?>
</table>
<?php 
if(isset($data['page']) && $data['page'] != "")
{
	echo "<hr/>Trang: ";
	echo $data['page'];
}
?>
<hr/>
<a href = 'javascript:CheckAll(document.rowsForm.check_list)'>Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'javascript:UnCheckAll(document.rowsForm.check_list)'>Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmDelete('<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>',document.rowsForm.check_list)"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_drop.png" alt="Delete" title="Xóa các dòng check" /></A>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmSave('<?php echo JSM_DO_YOU_REALLY_WANT_TO_SAVE;?>','<?php echo BASE_URL_ADMIN;?>comment/save')"><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_save.png" alt="Update" title="Cập nhật thứ tự" /></A>
</form>
<hr/>
