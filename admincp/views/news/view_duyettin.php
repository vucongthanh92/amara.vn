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
    <td> Quản lý nội dung / Duyệt tin đã lấy</td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
        

<div class="content">
<div class="list_button">
<a href = 'javascript:CheckAll(document.rowsForm.check_list)' class="button" >Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'javascript:UnCheckAll(document.rowsForm.check_list)' class="button" >Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmDelete('<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>',document.rowsForm.check_list)" class="button" ><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_drop.png" alt="Delete" title="Xóa các dòng check" />Delete</A>

<a href = '<?php echo BASE_URL_ADMIN;?>news/laytin' class="button" ><img src="<?=ADMIN_PATH_IMG ?>icon-10-blue-arrow.png" style="margin-top:-5px;" /> Lấy tin từ Danttri.com.vn</a>
<a href = '<?php echo BASE_URL_ADMIN;?>news/duyettin' class="button" ><img src="<?=ADMIN_PATH_IMG ?>icon-16-session.png"  /> Duyệt tin đã lấy</a>
</div>

<form action = '<?php echo BASE_URL_ADMIN;?>news/delete' method = 'post'  name="rowsForm" id="rowsForm">
<table class="view">
	<tr>
		<th><input type="checkbox" name="Check_ctr" id = 'Check_ctr' value="yes" onClick="Check(document.rowsForm.check_list)"></th>
		<th>ID</th>
		<th><?php echo TITLE; ?></th>
		<th><?php echo IMAGES; ?></th>
		<th>Nguồn</th>
		<th width="200">URL gốc</th> 
		<th>Ngày</th>
        <th>Xem</th>
		<th colspan = '2'><?php echo G_ACTION; ?></th>
	</tr>
	<?php
	if(empty($data['info'])){ //neu khong co du lieu
	?>
	<tr>
		<td colspan = '10' class = 'emptydata'><?php echo G_EMPTYDATA; ?></td>
	</tr>
	<?php
	}
	else //neu co du lieu xuat du lieu ra
	{
		foreach($data['info'] as $item)
		{
		?>
		<tr>
			<td align = 'center'><input type="checkbox" id = 'check_list' name="check_list[]" value="<?php echo $item['idTin'];?>"><br></td>
			<td><?php echo $item['idTin']; ?></td>
			<td align="left"><a href="#" onClick="return popitup('<?=BASE_URL_ADMIN ?>xemtintruockhiduyet.php?id=<?=$item['idTin'] ?>')"><?php echo $item['TieuDe']; ?></a></td>
			<td><img src = '<?php echo BASE_URL;?>/data/News/<?php echo $item['urlHinh']; ?>' width = '60'></td>
			<td align = 'center'><?php echo $item['source']; ?></td>
			<td align = 'center'>
			<a href="<?php echo $item['urlGoc']; ?>" target="_blank"><?php echo $item['urlGoc']; ?></a>
			</td>
			<td align = 'center'>
			<?php echo date("d-m-Y",strtotime($item['Ngay'])); ?>
			</td>
            <td><img src = '<?php echo ADMIN_PATH_IMG;?>icon-16-comment.gif' align="Click để xem chi tiết" style="cursor:pointer" onClick="return popitup('<?=BASE_URL_ADMIN ?>xemtintruockhiduyet.php?id=<?=$item['idTin'] ?>')"></td>
			<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN;?>news/coppy/<?php echo $item['idTin'];?>' title = 'Duyệt tin'><img src = '<?php echo ADMIN_PATH_IMG;?>ok.png'></a></td>
			<td align = 'center'><a href = '<?php echo BASE_URL_ADMIN."news/delete/".$item['idTin'];?>' title = 'Xóa' onclick = 'javascript:thongbao("<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src = '<?php echo ADMIN_PATH_IMG;?>b_drop.png'></a></td>
		</tr>
		<?php
		}
	}
	?>
</table>
<?php 
if(isset($data['page']) && $data['page'] != "")
{
	echo '<div class="space_10"></div>';
	echo "<div class='page'>";
	echo "<span>Trang:</span> ";
	echo $data['page'];
	echo "</div>";
}
?>

<div class="list_button">

<a href = 'javascript:CheckAll(document.rowsForm.check_list)' class="button" >Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'javascript:UnCheckAll(document.rowsForm.check_list)' class="button" >Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmDelete('<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>',document.rowsForm.check_list)" class="button" ><img class="icon" src="<?php echo ADMIN_PATH_IMG;?>/b_drop.png" alt="Delete" title="Xóa các dòng check" />Delete</A>

<a href = '<?php echo BASE_URL_ADMIN;?>news/laytin' class="button" ><img src="<?=ADMIN_PATH_IMG ?>icon-10-blue-arrow.png" style="margin-top:-5px;" /> Lấy tin từ Danttri.com.vn</a>
<a href = '<?php echo BASE_URL_ADMIN;?>news/duyettin' class="button" ><img src="<?=ADMIN_PATH_IMG ?>icon-16-session.png"  /> Duyệt tin đã lấy</a>
</div>

</div>
<script language="javascript" type="text/javascript">
<!--
function popitup(url) {
	newwindow=window.open(url,'xemtin','height=480,width=520,top=100,left=250');
	if (window.focus) {newwindow.focus()}
	return false;
}
// -->
</script>