<?php
/*
# ------------------------------------------------------------------------
# Swiper Animated Module with Custom Slides
# ------------------------------------------------------------------------
# Copyright(C) 2020 www.intergraphix.com.ar. All Rights Reserved.
# @license http://www.gnu.org/licenseses/gpl-3.0.html GNU/GPL
# Author: http://intergraphix.com.ar
------------------------------------------------------------------------
*/// no direct access
defined('_JEXEC') or die('Restricted access');
$doc = JFactory::getDocument();

?>

<?php 

$doc = JFactory::getDocument();

     $i = 0;
     $item = $params->get('items'); 
     $ht =  $params->get('sliderheight');
     $htsm =  $params->get('sliderheightsm');
     $bgpos = $params->get('bgpos');
     $bgpossm = $params->get('bgpossm');
     $fade = $params->get('fade',0);
     $contentbgcolor = $params->get('content-bg-color');
     $titleColor = $params->get('title-color');
     $titleSize = $params->get('title-size');
     $titleSizeSmall = $params->get('title-size-sm');
     $textColor = $params->get('text-color');
     $textSize = $params->get('text-size');
     $button1Style = $params->get('button1style');
     $button2Style = $params->get('button2style');
     
     $buttonSize = ($params->get('button-size')) ? 'btn-'.$params->get('button-size'): '';
  
        $style = '.swiper-container {
          width: 100%;
          height:'.$ht.';}';
        
        $style .= '.swiper-slide{ background-repeat: no-repeat;background-position: '.$bgpos.';}'.PHP_EOL;
        $style .= '.swiper-slide .content{ background-color: '.$contentbgcolor.';}'.PHP_EOL;
        
        $style .= '.swiper-slide h1{font-size:'.$titleSize.'; color:'.$titleColor.'; }'.PHP_EOL;
        
        $style .= '.swiper-slide .introtext{font-size:'.$textSize.'; color:'.$textColor.';}'.PHP_EOL.PHP_EOL;
        
        $style.='@media(max-width:1024px) and (orientation:portrait){'.PHP_EOL.PHP_EOL;
        
        $style .= '.swiper-slide{background-position: '.$bgpossm.';}'.PHP_EOL;
        
        $style .= '.swiper-container { height:'.$htsm.';}'.PHP_EOL;
        
        $style .= '.swiper-slide h1{font-size:'.$titleSizeSmall.'; }'.PHP_EOL;
        
        $style .= '.swiper-slide .introtext{font-size: 16px;}'.PHP_EOL;
        
        $style .= '.swiper-slide .btn{ padding: 8px 12px; font-size:90%;}'.PHP_EOL;
        
        $style .= '.swiper-button-next, .swiper-button-prev{display:none;}'.PHP_EOL;
        
        $style .='}'.PHP_EOL;



?>
<?php
if(empty($item))
{
	echo 'No item found! Please check your config!';
	return;
}?>

<div class="swiper-container" id="swipper-<?php echo $module->id; ?>">
    <div class="swiper-wrapper"> 
    <?php
    
    $ht=$params->get('slider-height'); 
               foreach ( $item as $datos ) :
            $title = $datos->title;
            $bg = $datos->bg;
            $bgsm = $datos->bgsm;
            $introText = $datos->text;          
            $link2 = $datos->link2;



            ?>
        <div class="swiper-slide slide-<?php echo $i; ?>">
        <?php 
        
           
   $style .= '.slide-'.$i.'{';
   $style .='background-image: url('.$bg.'); '.PHP_EOL;
   
   $style .='}'.PHP_EOL;
   
   
   
   $style.='@media(max-width:1024px) and (orientation:portrait){';
     
       
        $style .='.slide-'.$i.'{background-image: url('.$bgsm.');'.PHP_EOL;
        $style .='background-position:'.$bgpossm.';'.PHP_EOL;
       
       $style .='}'.PHP_EOL;
     
     $style .= '}'.PHP_EOL; ?>

     
<div class="swiper-content">
    <div class="container">
        <div class="content" data-swiper-animation="animate__fadeIn">
            <h1 data-swiper-animation="animate__fadeInDown" data-duration="1.5s" data-delay="1s"
                data-swiper-out-animation="animate__fadeOut" data-out-duration=".4s">
                <?php echo $title; ?>
            </h1>

            <?php if($introText) { ?>
            <div class="introtext" data-swiper-animation="animate__fadeInUp" data-duration="1.5s" data-delay="2s" data-swiper-out-animation="animate__fadeOut" data-out-duration=".2s">
                <?php  echo $introText; ?>
            </div>
            <?php } ?>

            <?php if($datos->link || $datos->link2) { 

                    $link = explode(',', $datos->link);
                    $link2 = explode(',', $datos->link2);
             
             ?>
            <div class="btn-group" data-swiper-animation="animate__fadeIn" data-duration="1.5s" data-delay="3s"
                data-swiper-out-animation="animate__fadeOut" data-out-duration=".4s">

                <a href="<?php echo $link[1];?>" class="btn btn-<?php echo $button1Style;?> <?php echo $buttonSize;?>">
                    <?php echo $link[0];?></a>
               
            </div>
            <?php } ?>
           
        </div>
    </div>
</div>

        
         
        </div> 

        <?php $i++; endforeach; ?>
    </div>
    <div class="swiper-pagination swiper-pagination-white"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next swiper-button-white"></div>
    <div class="swiper-button-prev swiper-button-white"></div>
</div>


<?php 


$doc->addStyleDeclaration($style);

?>

<!-- Initialize Swiper -->
<script>
const swiperAnimation = new SwiperAnimation();
const swiper = new Swiper('#swipper-<?php echo $module->id; ?>', {

  autoHeight: false,  
  spaceBetween: 0,
  loop:true,
  observer: true,
observeParents: true,
<?php if($fade=='1'){ ?>  effect: 'fade',<?php } ?>
   autoplay: {
		delay: 4500,
		loop: true,
        disableOnInteraction: true,
	  },
	  mousewheel: {
      enabled: false,
    invert: true,
  },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
	  },
	  speed: 600,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      on: {
    init: function () {
      swiperAnimation.init(this).animate();
    },
    slideChange: function () {
     
      swiperAnimation.init(this).animate();
    }
  }
    });
    swiper.init();
</script>