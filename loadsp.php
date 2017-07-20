<?php
include('header.php'); 
$db = new Models_MProduct;

$select = "*";
$where = "end_time >= '".time()."' AND begin_time <= '".time()."' AND ticlock = '0'";
$where1 = $where." AND hot != 1";
$orderby = "sort asc, id desc";
	
$page = $_GET['page'];
$numrow = $page+10;
$limit = "$page,$numrow";	

$data['tinh'] = $_GET['tinh'];

$data['info'] = $db->listdata($select,$where1,$orderby,$limit);
?>
   	<?php
		if(!empty($data['info'])){
			foreach($data['info'] as $item){
				$i++;
				//echo date('d-m-y H:i:s',$item['end_time']);
				$time = $item['end_time']-time();
	?>
 <div class="span3  product-item">
    <div class="meta">
    <div class="buy_number"><span><?=$item['pre_number'].$item['hot']?></span><em> đã mua</em></div>
    <div class="time">                    
    <span class="key hasCountdown">
    	       	<script type="text/javascript">

                            countdown_time(

                                <?=$time ?>,

                                "<?php echo "gio_".$item['id']; ?>",

                                "<?php echo "phut_".$item['id'] ; ?>",

                                "<?php echo "giay_".$item['id'] ; ?>"

                            );

                        </script>
                        <?php   	 echo "<span class='number_time'>";

							echo "<span  id='gio_".$item['id']."''>";

								echo "00";

						

							echo "</span>";	echo" : ";

						echo "</span>";

						echo "<span class='number_time'>";

							echo "<span   id= 'phut_".$item['id']."'>";

								echo "00";

								

							echo "</span>";echo " : ";

						echo "</span>";

						echo "<span class='number_time'>";

							echo "<span   id= 'giay_".$item['id']."'>";

								echo "00";

								

							echo "</span>";

						echo "</span>";?>
    </span>
    </div>
    </div>
    <?php
		if($item['delivery']=="express"){
	?>
    <div class="type-product sp_01" > <img src="<?=USER_PATH_IMG."sp.png" ?>" /></div>
    <?php } else { ?>
    <div class="type-product sp_01" > <img src="<?=USER_PATH_IMG."vc.png" ?>" /></div>
    <?php } ?>
    <div class="thumb">
    <a rel="nofollow" href="<?=$data['tinh'] ?>/<?=substr(strtoseo($item['title']),0,-1)."_".$item['id'].".html" ?>">
    <img width="240" border="0" height="240" alt="<?=$item['title'] ?>"  src="<?=PATH_IMG_PRODUCT.$item['image'] ?>"  title="<?=$item['product'] ?>" style="display: inline; visibility: visible;">                                            </a>
    </div>
    <div class="meta-icon-deal-new"></div>
    <div class="title">
    <h2><a title="<?=$item['product'] ?>" href="<?=$data['tinh'] ?>/<?=substr(strtoseo($item['title']),0,-1)."_".$item['id'].".html" ?>"><?=$item['product'] ?></a></h2>
    <span class="sell-price"><?=bsVndDot($item['team_price']) ?><sup>đ</sup></span>
    <span class="original-price"><?=bsVndDot($item['market_price']) ?><sup>đ</sup></span>
    	<a rel="nofollow" class="view" href="<?=$data['tinh'] ?>/<?=substr(strtoseo($item['title']),0,-1)."_".$item['id'].".html" ?>"></a>
    </div>
    </div>
<?php } ?>
    
<script type="text/javascript">
$(document).ready(function(){
	$('.span3').hover(function(){
		$(this).find('.meta').stop().animate({opacity:1, easing: 'easeOutQuad'});
	},function(){
		$(this).find('.meta').stop().animate({opacity:0, easing: 'easeInQuad'});
	}
	);
	$('.span3').hover(function(){
		$(this).find('.sp_01').stop().animate({opacity:1, easing: 'easeOutQuad'});
	},function(){
		$(this).find('.sp_01').stop().animate({opacity:0, easing: 'easeInQuad'});
	}
	);
})
</script>

<?php }  else echo 1;?>