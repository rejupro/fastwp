<?php 

if ( ! defined('ABSPATH') ) {
    exit; // Exit if accessed directly.
}

$fastwp_switch_value = get_theme_mod('slider_switch');
$fastwp_sliders = get_theme_mod('slider_item');

if($fastwp_switch_value == 1 && $fastwp_sliders) : 
?>


<!-- Slider Section -->
<div class="container-fluid no-left-padding no-right-padding slider-section">
	<div id="mm-slider-1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="mm-slider-1" data-source="gallery">
		<!-- START REVOLUTION SLIDER 5.4.1 fullwidth mode -->
		<div id="mm-slider-1" class="rev_slider fullwidthabanner" data-version="5.4.1">
			<ul>	

				<?php
					
					$i = 1;
					foreach($fastwp_sliders as $single_slide) :  ?>
					    <!-- SLIDE  -->
						<li data-index="rs-<?php echo $i++ ?>" data-transition="random-static,random-premium,random,boxslide,slotslide-horizontal,slotslide-vertical,boxfade,slotfade-horizontal,slotfade-vertical" data-slotamount="default,default,default,default,default,default,default,default,default,default" data-hideafterloop="0" data-hideslideonmobile="off"  data-randomtransition="on" data-easein="default,default,default,default,default,default,default,default,default,default" data-easeout="default,default,default,default,default,default,default,default,default,default" data-masterspeed="default,default,default,default,default,default,default,default,default,default"  data-rotate="0,0,0,0,0,0,0,0,0,0"  data-saveperformance="off"  class="slide-overlay" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
							<!-- MAIN IMAGE -->
							<!-- <img src=" ?>"  alt="" title="slide-1"  width="1920" height="600" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
							 -->
							<img src="<?php echo $single_slide['slider_img']; ?>" alt="image">

							<!-- LAYER NR. 1 -->
							<span class="slidecnt1 tp-caption tp-layer-selectable tp-resizeme category-link" href="#" target="_self" rel="nofollow"			 id="slide-26-layer-1" 
								data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								data-y="['middle','middle','middle','middle']" data-voffset="['-56','-70','-70','-57']" 
								data-fontsize="['14','14','18','18']"
								data-height="none"
								data-whitespace="nowrap"					 
								data-type="text" 
								data-actions=''
								data-responsive_offset="on"
								data-frames='[{"delay":0,"speed":1000,"frame":"0","from":"z:0;rX:0deg;rY:0;rZ:0;sX:2;sY:2;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);br:0px 0px 0px 0px;"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"><?php echo esc_html($single_slide['slider_cat']); ?> </span>

							<!-- LAYER NR. 2 -->
							<a class="slidecnt2 tp-caption tp-layer-selectable tp-resizeme post-title" href="<?php echo esc_url($single_slide['slider_url']); ?>" target="_self" rel="nofollow" id="slide-26-layer-2" 
								data-x="['center','center','center','center']" data-hoffset="['0','-1','-1','-1']" 
								data-y="['middle','middle','middle','middle']" data-voffset="['6','-5','-5','-5']" 
								data-fontsize="['40','30','30','23']"
								data-lineheight="['40','40','40','30']"
								data-width="['601','601','601','435']"
								data-height="['81','81','81','none']"
								data-whitespace="normal"
					 			data-type="text" 
								data-actions=''
								data-responsive_offset="on" 
								data-frames='[{"delay":0,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
								data-textAlign="['center','center','center','center']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"><?php echo esc_html($single_slide['slider_title']); ?></a>

							<!-- LAYER NR. 3 -->
							<a class="slidecnt3 tp-caption rev-btn tp-layer-selectable" href="<?php echo esc_url($single_slide['slider_url']); ?>" target="_self" rel="nofollow" id="slide-26-layer-3" 
								data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								data-y="['middle','middle','middle','middle']" data-voffset="['80','73','73','59']" 
								data-width="none"
								data-height="none"
								data-whitespace="nowrap"						 
								data-type="button" 
								data-actions=''
								data-responsive_offset="on" 
								data-responsive="off"
								data-frames='[{"delay":0,"speed":1000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(21,21,21);bg:rgba(255,255,255,1);"}]'
								data-textAlign="['inherit','inherit','inherit','inherit']"
								data-paddingtop="[2,2,2,2]"
								data-paddingright="[20,20,20,20]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[20,20,20,20]">READ MORE </a>
						</li>
					    <?php endforeach; ?>


				
			</ul>
			<div class="tp-bannertimer tp-bottom"></div>
		</div>
	</div><!-- END REVOLUTION SLIDER -->
</div><!-- Slider Section /- -->

<?php  endif;
