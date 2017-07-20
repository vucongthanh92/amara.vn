<div class="main">
<script type="text/javascript" src="<?php echo USER_PATH_JS;?>jquery.flexslider.js"></script>

<div class="index_middle">
<div class="menu_theloaideal ">
    <a class="a_menudeal" href="#">
        <span class="spn_dealcat"><?=$data['cat']['name']?></span>
    </a>
</div>
					
<div class="space_10"></div>
<!----------------slider anh --------------->
<div class="detail_img flex-container">
            <div class="flexslider">
            <div class="flex-viewport" style="overflow: hidden; position: relative;">
            <ul class="slide_deal_detail slides" style="width: 100%; transition-duration: 0s; transform: translate3d(-312px, 0px, 0px);">
            	<?php
				if($data['prod']['image']!=""){
				?>
                        <li style="width: 312px; float: left; display: block;" class="">
                           <img src="<?=BASE_URL_DATA.PATH_IMG_PRODUCT.$data['prod']['image'] ?>">
                        </li>
                  <?php } ?>
                      
              </ul></div></div>
 </div>
 <h1 class="detail_name"><?=$data['prod']['product'] ?></h1>  
 <h2 class="detail_name_long"><?=$data['prod']['title'] ?></h2>   
<div class="detail_price">
    <p class="deal_price_buy"><?=bsVndDot($data['prod']['team_price']) ?> đ</p>
</div> 
<?php
	$daytime = strtotime(date('Y-m-d H:i:s'));
	//echo $data['prod']['state'];
?>
<div class="bg_button">    
   
 <input type="button" onclick="window.location = 'gio-hang.html/<?=$data['prod']['id'] ?>'" value="MUA NGAY" class="btn_organge btn_buy">  

</div>
<!---------------------->
<div class="detail_co">

    <div class="acc_trigger " >
        <div class="detail_co_T">
    	 <span class="detail_L"></span><span class="detail_M">GIỚI THIỆU CHI TIẾT</span>
        <span class="detail_R"></span>
        </div>
    </div>
        <div class="acc_container detail_text content " style="display: none;" >
        <div class="block">
        	 <?=str_replace('src="../../','src="http://dealhot.vn/',stripcslashes($data['prod']['detail'])); ?>
        </div>
    </div>
</div>
<!------------------------->
    
   <input type="button" onclick="window.location = 'gio-hang.html/<?=$data['prod']['id'] ?>'" value="MUA NGAY" class="btn_organge btn_buy">  

</div>

</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	 $('.acc_trigger:first').addClass('active').next().show(); //Add "active" class to first trigger, then show/open the immediate next container

        //On Click
        $('.acc_trigger').click(function() {
            if ($(this).next().is(':hidden')) { //If immediate next container is closed...
                $('.acc_trigger').removeClass('active').next().slideUp(); //Remove all .acc_trigger classes and slide up the immediate next container
				$('.contemt-facebook').hide();
                $(this).toggleClass('active').next().slideDown(); //Add .acc_trigger class to clicked trigger and slide down the immediate next container
            }
            else if ($(this).is(':visible')) { //If immediate next container is open...
                $(this).toggleClass('active').removeClass('active').next().slideUp();
				$('.contemt-facebook').hide();
            }
            return false; //Prevent the browser jump to the link anchor
        });
		$('.click_view_comment').click(function(){
			$('.contemt-facebook').toggle(500);
		});

		
});
 $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide",
                controlsContainer: ".flex-container",
                slideshow: true,                //Boolean: Animate slider automatically
                slideshowSpeed: 5000,
                controlNav: false,
            });
            
        }); 
</script>	