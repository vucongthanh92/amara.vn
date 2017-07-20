<style type="text/css">
.info2 {width:530px; min-height:200px; background-color:#edebec; padding:10px; padding-top:5px; float:left; margin-top:10px; margin-left:5px; font-size:12px !important;}
.lienhe td { font-size:12px !important;}
#change-image { cursor:pointer; margin:0px; }
#btngui { padding:5px;  border:solid 1px #CCC; border-radius:15px; padding-left:10px; font-weight:bold; padding-right:10px;  margin-top:5px; margin-bottom:10px;}
#btngui:hover { color:#F00;}
.frmlienhe{ width:320px; height:auto; float:left; padding-left:20px}
</style>


<div id="page_lienhe">

    <div id="news_banner"><a href="<?=$data['banner']['link']?>">
         <img src="<?=BASE_URL.PATH_IMG_FLASH.$data['banner']['file_vn']?>"  /></a>
    </div>
    
	<div id="prodhot">
    <div id="prodhot_info">Sản Phẩm Nổi Bật</div>
    <?php
		if(!empty($data['prod_hot'])){
			 while($row=mysql_fetch_assoc($data['prod_hot'])){
	?>
        <div class="span3  product-item">
        <div class="thumb">
        <?php
		    if($row['hot']==1) {
			   echo '<img src="'.BASE_URL.USER_PATH_IMG.'icon-hot.png" border="0"  class="hot_icon"/>';
		    }
		    if($row['ticnew']==1) {
			   echo '<img src="'.BASE_URL.USER_PATH_IMG.'icon-hot.gif" border="0"  class="sale_icon"/>';
		    }
	    ?>
        <a rel="nofollow" href="<?=BASE_URL.$row['alias'].".htm" ?>">
           <img class="thumb_image" alt="<?=$row['title'] ?>"  src="<?=BASE_URL.PATH_IMG_PRODUCT.$row['image'] ?>"  title="<?=$row['product'] ?>">                </a>
        </div>
        <div class="title">
        <h2><a title="<?=$row['product'] ?>" href="<?=BASE_URL.$row['alias'].".htm" ?>"><?=$row['product'] ?></a></h2>
        <span class="sell-price"><?=bsVndDot($row['team_price']) ?><sup>đ</sup></span>
            <a rel="nofollow" class="view" href="<?=BASE_URL.$row['alias'].".htm" ?>"></a>
        </div>
        </div>
    <?php }} ?>
    <div style="clear:both"></div>
    </div>

<div class="lienhe">
     <div class="mappage"><span class="title_"><?php echo $data['map_title'];?></span></div>
     <div class = 'noidung_contact'>
		  <?php if($data['error']==1) { ?>
          <div class="error"><?=$data['mesage'] ?></div>
          <? } ?>
          <form action="" name="formlienhe" method="post">
              <table border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><?=HOTEN;?>(<span style="color:#F00">*</span>):</td>
              <td><input name="hoten" value="<?=$data['hoten'] ?>" type="text" /></td>
            </tr>
            <tr>
              <td><?=DIACHI;?>(<span style="color:#F00">*</span>):</td>
              <td><input name="diachi" value="<?=$data['add'] ?>" type="text" /></td>
            </tr>
            <tr>
              <td>Email(<span style="color:#F00">*</span>):</td>
              <td><input name="email" value="<?=$data['email'] ?>" type="text" /></td>
            </tr>
            <tr>
              <td><?=DIENTHOAI ?>(<span style="color:#F00">*</span>):</td>
              <td><input name="dienthoai" id="ct_dienthoai" value="<?=$data['tell'] ?>" type="text" /></td>
            </tr>
            <tr>
              <td><?=NOIDUNG ?>(<span style="color:#F00">*</span>):</td>
              <td><textarea name="noidung" id="noidung"><?=$data["cont"] ?></textarea></td>
            </tr>
            <tr>
            <td>
            </td>
             <td>
             <input type="submit" name="btngui" id="btngui" value="<?=GUI ?>" />
            </td>
            </tr>
          </table>
                          
          </form>								
          <p style="margin-top:10px;">Quý khách có thể liên hệ với chúng tôi bằng cách điền thông tin theo mẫu trên. .</p>					
          </div>
          
          <div id="info_contact">
               <?php echo $data['thongtin']['content_vn']?>
          </div>
          
          </div>
          <div style="clear:both"></div>
</div>
<div style="clear:both"></div>


<script>
   $(document).ready(function(e) {
       $("#btngui").click(function()
	   {
		   if($("#ct_dienthoai").val()=="")
		   {
			   alert("Bạn chưa nhập số điện thoại");
			   $("#ct_dienthoai").focus()
			   return false;
		   }
	   })
   });
</script>