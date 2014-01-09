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
?>
<!DOCTYPE html>
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
	<script src="<?php echo get_template_directory_uri();?>/js/html5.js"></script>
	<![endif]-->
	
	<meta name='robots' content='noindex,nofollow'/>
	<link rel="alternate" type="application/rss+xml" title="better this &raquo; Feed" href="<?php echo site_url(); ?>/feed/" />
	<link rel="alternate" type="application/rss+xml" title="better this &raquo; Comments Feed" href="<?php echo site_url(); ?>/comments/feed/" />
	<link rel="alternate" type="application/rss+xml" title="better this &raquo; home Comments Feed" href="<?php echo site_url(); ?>/home/feed/" />
	<link rel='stylesheet' id='contact-form-7-css'  href='<?php echo plugins_url(); ?>/contact-form-7/includes/css/styles.css?ver=3.5.3' type='text/css' media='all' />
	<link rel='stylesheet' id='twentythirteen-fonts-css'  href='<?php echo get_template_directory_uri(); ?>/css/font-google.css' type='text/css' media='all' />
	<link rel='stylesheet' id='genericons-css'  href='<?php echo get_template_directory_uri(); ?>/fonts/genericons.css?ver=2.09' type='text/css' media='all' />
	<link rel='stylesheet' id='twentythirteen-style-css'  href='<?php echo get_template_directory_uri(); ?>/style.css?ver=2013-07-18' type='text/css' media='all' />
	<!--[if lt IE 9]>
	<link rel='stylesheet' id='twentythirteen-ie-css'  href='<?php echo get_template_directory_uri(); ?>/css/ie.css?ver=2013-07-18' type='text/css' media='all' />
	<![endif]-->
	<script type='text/javascript' src='<?php echo includes_url(); ?>/js/jquery/jquery.js?ver=1.10.2'></script>
	<script type='text/javascript' src='<?php echo includes_url(); ?>/js/jquery/jquery-migrate.min.js?ver=1.2.1'></script>
	<script type='text/javascript' src='<?php echo includes_url(); ?>/js/comment-reply.min.js?ver=3.6.1'></script>
	<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo site_url();?>/xmlrpc.php?rsd" />
	<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo includes_url(); ?>/wlwmanifest.xml" /> 
	<link rel='next' title='like page' href='<?php echo site_url(); ?>/like-page/' />
	<meta name="generator" content="WordPress 3.6.1" />
	<link rel='canonical' href='<?php echo site_url(); ?>' />
	<style type="text/css" id="twentythirteen-header-css">
		.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}
	</style>

	<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.cookie.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/simple-js.js"></script>
  
  
  <script type="text/javascript" src="http://3.s3.envato.com/files/66280320/utils/jquery.easing.1.3.min.js"></script>
  <script type="text/javascript" src="http://3.s3.envato.com/files/66280320/utils/jquery.jAccordion.min.js"></script>
  <link rel='stylesheet' id='jAccordion-style-css'  href='<?php echo get_template_directory_uri(); ?>/css/jAccordion/default.css' type='text/css' media='all' />
  
  <script type="text/javascript">
	jQuery(document).ready(function( $ ) {
		$('.accordion').jAccordion({
      vertical: false,
			activeSlideSize : 663,
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
</script>
  

<script type="text/javascript">

var date = new Date();
var timestamp = date.getTime();
window.rootPath = '<?php echo site_url(); ?>';
jQuery.noConflict();
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

<body class="blog-body">
	<div id="page" class="blog-page">
		<header id="masthead" class="site-header" role="banner">
			<div class="top-header">
				<div class="header-link">
					<ul class="h-menu">
						<li class="h-item"><a href="<?php echo site_url(); ?>/about">WHAT?</a></li>
						<li class="h-item"><a href="<?php echo site_url(); ?>">BETTER THIS</a></li>
						<li class="h-item"><a href="<?php echo site_url(); ?>/blog">PULSE</a></li>
						<li class="h-item"><a href="<?php echo site_url(); ?>/contact">SAY IT HERE</a></li>
						<li class="h-item"><a href="<?php echo site_url(); ?>/blog?getglued=true">GET GLUED!</a></li>
					</ul>
				</div>
			</div>
			<div class="main-header clearfix">
				<div class="blog-logo"><a class="opacity" href="<?php echo site_url(); ?>/blog/"></a></div>
				<div class="main-menu">
					<ul class="m-menu">
						<li class="m-item">
							<a href="?cat=art_culture" class="a-icon"><i class="icon icon-art"></i></a>
							<a href="?cat=art_culture" class="a-text">ART & CULTURE</a>
						</li>
						<li class="m-item">
							<a href="?cat=food_travel" class="a-icon"><i class="icon icon-food"></i></a>
							<a href="?cat=food_travel" class="a-text">FOOD & TRAVEL</a>
						</li>
						<li class="m-item">
							<a href="?cat=science_tech" class="a-icon"><i class="icon icon-science"></i></a>
							<a href="?cat=science_tech" class="a-text">SCIENCE & TECH</a>
						</li>
						<li class="m-item">
							<a href="?cat=health_sports" class="a-icon"><i class="icon icon-health"></i></a>
							<a href="?cat=health_sports" class="a-text">HEALTH & SPORTS</a>
						</li>
					</ul>
				</div>
			</div>
			<script type="text/javascript">Load.pdTop();</script>
		</header>
		<div id="main" class="site-main">
