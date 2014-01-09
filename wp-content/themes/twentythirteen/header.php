<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>   
  <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.cookie.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/jquery.mousewheel-3.0.6.pack.js"></script>
	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/source/jquery.fancybox.css?v=2.1.5" media="screen" />
	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>


  <script type="text/javascript" src="http://3.s3.envato.com/files/66280320/utils/jquery.easing.1.3.min.js"></script>
  <script type="text/javascript" src="http://3.s3.envato.com/files/66280320/utils/jquery.jAccordion.min.js"></script>
  <link rel='stylesheet' id='jAccordion-style-css'  href='<?php echo get_template_directory_uri(); ?>/css/jAccordion/default.css' type='text/css' media='all' />
  
    <script type="text/javascript">
  jQuery.noConflict();
	jQuery(document).ready(function( $ ) {
		$('.accordion').jAccordion({
      vertical: false,
			activeSlideSize : 666,
      accordionAutoSize: true,
			sticky : true,
			autoplay : true,
			autoplayInterval : 5000,
			arrowKeysNav : true,
			transitionSpeed : 1500,
			nextBtn : $('.nextBtn'),
			prevBtn : $('.prevBtn'),
			onReady : function() {
				$('.preloader', this.$accordion).remove();	//Comment this line to see the preloader if testing locally.
				$('.jAccordion-slideWrapper', this.$accordion).append('<div class="timer"></div>');	//Include timer inside every slide
				$('.prevBtn', this.$accordion).animate({left : 0}, 500);
				$('.nextBtn', this.$accordion).animate({right : 0}, 500);
			},
			onSlideStartClosing: function(e) {
        console.log('onSlideStartClosing ' + (new Date().getTime()));
				$('.timer', e.$slide).stop(true).fadeTo(200, 0);	//Fade out timer of closing slide
			},
			onSlideOpened: function(e) {
        console.log('onSlideOpened ' + e.$slide.attr('id'));
        
        var current_ = e.$slide;
        
        var id_ = current_.attr('id').replace('select', '');
        var datas = current_.find('.data-info:first');        
        var color = datas.data('color');
        var backg = datas.data('backg');
        var excerpt = datas.text();
        var title = current_.find('.data-title:first').text();
        //
        var detail = $('#left-detail-post');
        //
        detail.attr('style', backg);
        detail.find('.item-title:first').text(title).css('color', color);
        detail.find('.item-excerpt:first').text(excerpt).css('color', color);
        var a = detail.find('a:first');
        a.attr('href', a.data('href') + id_);
        
				$('.timer', e.$slide).css({width : 0, 'opacity' : 0.5}).stop(true);		//Set timer to starting state
				/* If option 'pauseOnHover' is enabled and cursor is not over accordion start timer of active slide
			 	 * or option 'pauseOnHover' is disabled.
				 * Note: Value 5000 has to be same as value of option 'autoplayInterval' which is set a few lines above.
				 */
         
				if (!this.isPaused()) {
					$('.timer', e.$slide).animate({width : '100%'}, 5000, 'linear');
				}
			},
			onPause : function() {
				$('.timer', this.getActiveSlide()).stop(true);	//Pause animation of timer
			},
			onResume : function(e) {
				/* Resume animation of timer.
				 * Note: It's necessary to resume the animation only if no slide is animated, imagine this situation:
				 * User moves his cursor over non-open slide - cursor is over accordion so autoplay pauses and then user
				 * moves his cursor off accordion before the opening slide is fully open so autoplay starts and event onResume
				 * is triggered and animation of timer starts, which is too early because opening slide is not fully open.
				 */
				if (!this.isAnimated()) {
					$('.timer', this.getActiveSlide()).stop(true).animate({'width' : '100%'}, e.remainingTime, 'linear');
				}
			}
		});
	});
  
  window.rootPath = window.rootPath || "<?php echo site_url(); ?>";
</script>
  
<script type="text/javascript">

var date = new Date();
var timestamp = date.getTime();
jQuery(document).ready(function($){
    $.ajaxSetup({cache:false});
    $(".like_page").click(function(){  
				var satus = $(this).attr("rel");	
				var elm = $(this);		
				elm.next('span').html('loading...')	;
				$.ajax({
					url:'http://<?php echo $_SERVER[HTTP_HOST].$_SERVER['PHP_SELF'];?>/like-page/?satus=' + satus,
					type: 'GET',
					cache: false,	
					success:function(data) {
						response = JSON.parse(data);						
						$(".like_page").html(response.hit);
							if(response.status=="unliked") {
								$(".like_page").attr("rel","unliked");						
								$(".like_page").next('span').html('liked');		
							} else {
								$(".like_page").attr("rel","liked");						
								$(".like_page").next('span').html('unliked');		
							}
					},
          error: function(e) {
            console.log(e.message);
          }
				});
     
		return false;
    });
});


</script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "2cc6a5b8-6f47-4831-95ae-8368305bb28f", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
			
			
			<div class="sologan">
      <?php 
        $page_id = 2; 
        $page_data = get_page( $page_id ); 
        echo apply_filters('the_content', $page_data->post_content); 
      ?>
			</div>
			</a>
		</header><!-- #masthead -->
		
	
		<div id="main" class="site-main">
