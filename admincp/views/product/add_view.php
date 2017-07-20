<script type="text/javascript">
	tinymce_simple("des");
	tinymce_advanced("khuyenmai");
	tinymce_advanced("cont");
</script>
<script type = 'text/javascript'>
/*
$(document).ready(function(){
	$('#city_id').change(function(){
		url = "<?=BASE_URL_ADMIN ?>loadcidcat.php?id="+$(this).val();
		$('#groupid').load(url);
	});

	
});
*/
function checkform(){

	var frm = document.frm1;

	if(frm.groupid.value == 0){

		alert("Vui lòng chọn danh mục");
		return false;

	}

	if(frm.product.value == ""){

		alert("Vui lòng nhận tên sản phẩm");

		frm.product.focus();
		return false;
	}
}

</script>
<div class="wrapper_submenu">

	 <div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>catelog/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-folder.png">
        </div>
        <div class="text">Danh mục</div>
        </div>
        </a>
	</div>
	<div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>product/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-pro.png">
        </div>
        <div class="text">Sản Phẩm</div>
        </div>
        </a>
	</div>
   
  	<div class="wrapper_item">
        <a href="<?=BASE_URL_ADMIN ?>payment/list">
        <div class="item">
        <div class="image">
        <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-checklist.png">
        </div>
        <div class="text">Đơn hàng</div>
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
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-pro.png" style="width:23px; height: 23px">
    </td>
    <td> Quản lý Shop / Deal / Thêm mới </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
<div class="content">
<div class="content_i">
<form name = "frm1" action = '<?php echo BASE_URL_ADMIN;?>product/add' method = 'post' enctype = "multipart/form-data" onsubmit = "return checkform();" >
<table>
<tbody>
<tr>
   <td width="700" valign="top">
      <h2>
    <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-16-info.png">
    Thông tin sản phẩm
    </h2>
<table>
	<tr>
    <td colspan="2">
    	<table>
        	<tr>
               <td><strong>Danh mục</strong></td>
               <td><strong>Hãng sản xuất</strong></td>
            </tr>
            <tr>
               <td>
                  <select name = 'groupid' id="groupid">
				          <option value = '0'>- - Chọn danh mục - -</option>
					      <?php
                               $mcatelog = new Models_MCatelog;
						       $ldata = $mcatelog->listdata();
						       echo $tmenu = TreeCat($ldata,0,"","","--",'name');
						  ?>
                  </select>
                </td>
                
                <td>
                    <select name="hangsx" id="">
                            <option>- - Chọn hãng sản xuất - -</option>
                            <?php
							     $sql="select * from mn_manufacturer where ticlock='0' order by Id asc";
								 $ds=mysql_query($sql) or die(mysql_error());
								 while($row=mysql_fetch_assoc($ds)) {
							?>
                                 <option value="<?=$row['Id']?>"><?=$row['title_vn']?></option>
                            <?php } ?>
                    </select>
                </td>
            </tr>
        </table>
    
    </td>
    </tr>
    <tr>
    	<td>
        
        <table>
       
         <tr>
        	<td><strong>Giá gốc</strong></td>

           <td><strong>Giá</strong></td>
        </tr>
        <tr>
        	<td><input type = 'text' name = 'team_priceold' onkeyup="this.value = FormatNumber(this.value);"  size = '50' value = ''> VNĐ</td>
           <td><input type = 'text' name = 'team_price' value = ''  onkeyup="this.value = FormatNumber(this.value);" size="40"> VNĐ</td>
        </tr>
     
        
        </table>
        
        
        </td>
    </tr>
		

<?php
foreach($config_lang as $klang => $vlang)
{
?>
	<tr>
    	<td><strong>Tên sản phẩm ( <?=$vlang ?>)</strong></td>
    </tr>
    
	<tr>
		<td><input type = 'text' name = 'product' value = '' size = '83'></td>
	</tr>
    <tr>
    	<td><strong>Alias</strong></td>
    </tr>
    
	<tr>
		<td><input type = 'text' name = 'alias' value = '' size = '83'></td>
	</tr>
    <tr>
    	<td><strong>Xuất xứ ( <?=$vlang ?>)</strong></td>
    </tr>
    
	<tr>
		<td><input type = 'text' name = 'xuatxu' value = '' size = '83'></td>
	</tr>
    <tr>
    	<td><strong>Quy cách ( <?=$vlang ?>)</strong></td>
    </tr>
    
	<tr>
		<td><input type = 'text' name = 'quycach' value = '' size = '83'></td>
	</tr>

    <tr>
    	<td><strong>Khuyến mãi ( <?=$vlang ?>)</strong></td>
    </tr>
	<tr>
		<td><?php getFCKeditor("khuyenmai","",500); ?></td>
	</tr>
    <tr>
    	<td><strong>Thông tin deal ( <?=$vlang ?>)</strong></td>
    </tr>
	<tr>
		<td><?php getFCKeditor("detail","",500); ?></td>
	</tr>
<?php
}
?>

	<tr>
		<th align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_ADD;?>' name = 'addnew' class="button" style="margin-left:250px;">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>' class="button">
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
		<td class = 'title_td'><?php echo IMAGES;?></td>
		<td><input type = 'file' name = 'image' size = "50"></td>
	</tr>

		<tr>
			<td class = 'title_td'><?php echo IMAGES;?> 1</td>
			<td><input type = 'file' name = 'image1' size = "50"></td>
		</tr>
	
		<tr>
			<td class = 'title_td'><?php echo IMAGES;?> 2</td>
			<td><input type = 'file' name = 'image2' size = "50"></td>
		</tr>
	
		<tr>
			<td class = 'title_td'><?php echo IMAGES;?> 3</td>
			<td><input type = 'file' name = 'image3' size = "50"></td>
		</tr>
	
		<tr>
			<td class = 'title_td'><?php echo IMAGES;?> 4</td>
			<td><input type = 'file' name = 'image4' size = "50"></td>
		</tr>

	


        <tr>
            <td class = 'title_td'><?php echo SORT;?></td>
            <td><input type = 'text' name = 'sort' size = '30' value=""></td>
        </tr>
        <tr>
            <td class = 'title_td'>Ngày đăng</td>
            <td><input type = 'text' name = 'date' size = '30' value="<?=date("Y-m-d",time()); ?>" ></td>
        </tr>

         
        <tr>
            <td class = 'title_td'>Bật / Tắt</td>
            <td>
            	<select name="ticlock">
                	<option value="0"  >Bật</option>
                    <option value="1" >Tắt</option>
            	</select>
            </td>
        </tr>
         <tr>
            <td class = 'title_td'>Nổi bật</td>
            <td>
            	<select name="hot">
              		<option value="0"  >Tắt</option>
                	<option value="1"   >Bật</option>
                    
            	</select>
            </td>
        </tr>
        
        <tr>
            <td class = 'title_td'>Meta Title</td>
            <td><input type = 'text' name = 'seo_title' size = '30' value="" ></td>
        </tr>
        
        <tr>
            <td class = 'title_td'> Meta Keyword</td>
            <td>
            	<textarea name="seo_keyword" style="width:220px; height:100px;"> </textarea>
            </td>
        </tr>
         <tr>
            <td class = 'title_td'> Meta Description</td>
            <td>
            	<textarea name="seo_description" style="width:220px; height:100px;"></textarea>
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