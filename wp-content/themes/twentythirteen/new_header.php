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
	<link rel='stylesheet' id='twentythirteen-style-css'
			href='<?php echo get_template_directory_uri(); ?>/style.css?ver=2.7'
			type='text/css' media='all' />

<link rel='stylesheet' id='twentythirteen-style-css'  href='<?php echo get_template_directory_uri(); ?>/css/animate.min.css' type='text/css' media='all' />


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
	<script type="text/javascript"
			src="<?php echo get_template_directory_uri(); ?>/js/simple-js.js?v=1.4"></script>
  
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

  
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/jquery.easing.1.3.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/jquery.jAccordion.min.js"></script>
  <link rel='stylesheet' id='jAccordion-style-css'  href='<?php echo get_template_directory_uri(); ?>/css/jAccordion/default.css' type='text/css' media='all' />

  <script src="<?php echo get_template_directory_uri(); ?>/lib/jquery.slimscroll.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/lib/imagesloaded.pkgd.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/lib/jquery-imagefill.js"></script>
  
  <script type="text/javascript">
	jQuery(document).ready(function( $ ) {
		$('.accordion').jAccordion({
			vertical: false,
			activeSlideSize : 663,
			sticky : true,
			autoplay : true,
			event: 'click',
			scaleImgs: 'fitHeight',
			autoplayInterval : 5000,
			arrowKeysNav : false,
			transitionSpeed : 500,
			nextBtn : $('.nextBtn'),
			prevBtn : $('.prevBtn'),
			onReady : function() {
				//Comment this line to see the preloader if testing locally.
				$('.preloader', this.$accordion).remove();
				//.append('<div class="timer"></div>');	//Include timer inside every slide
				$('.jAccordion-slideWrapper', this.$accordion);
				$('.prevBtn', this.$accordion).animate({left : 0}, 500);
				$('.nextBtn', this.$accordion).animate({right : 0}, 500);
			},
			onSlideStartClosing: function(e) {
				//Fade out timer of closing slide
				$('.timer', e.$slide).stop(true).fadeTo(200, 0);
				$('.jAccordion-img', e.$slide).unwrap();
			},
			onSlideOpened: function(e) {
				var current_ = e.$slide;
				var id_ = current_.attr('id').replace('select', '');
				var datas = current_.find('.data-info:first');
				var color = datas.data('color').replace(';', '');
				var backg = datas.data('backg');
				var excerpt = datas.text();
				var title = current_.find('.data-title:first').text();
				//
				var detail = $('#left-detail-post');
				//


				detail.attr('style', backg);

				var title_tag = detail.find('.item-title:first');
				title_tag.text(title).css('color', color);

				var excerpt_tag = detail.find('.item-excerpt:first');
				excerpt_tag.text(excerpt).css('color', color);
				/*
				 * The title and the excerpt's height should not be more than
				 * 140 pixels, a line in the excerpt is 18px high, and it can
				 * contain 35 characters.
				 */
				var title_tag_height = title_tag.height();
				if (title_tag_height < 140) {
					var excerpt_tag_height = excerpt_tag.height();
					if ((title_tag_height + excerpt_tag_height) > 140) {
						var new_excerpt_length = parseInt(((140 - title_tag_height)/18)*35);
						// cut the excerpt
						excerpt = excerpt
							.substring(0, excerpt.substring(0,
										new_excerpt_length)
									.lastIndexOf(' ')) + "...";
						excerpt_tag.text(excerpt);
					}
					excerpt_tag.show(); // in case it was hidden previously while
									// cutting.
				}
				else
					excerpt_tag.hide();

				var a = detail.find('a:first');
				a.attr('href', a.data('href') + id_);

				var post_url = a.data('href') + id_;
				var img_link = $('<a href=""></a>');
				img_link.attr('href', post_url);
				$('.jAccordion-img', e.$slide).wrap(img_link);
        
				//Set timer to starting state
				$('.timer', e.$slide).css({width : 0, 'opacity' : 0.5}).stop(true);

				/* If option 'pauseOnHover' is enabled and cursor is not over
				 * accordion start timer of active slide
			 	 * or option 'pauseOnHover' is disabled.
				 * Note: Value 5000 has to be same as value of option
				 * 'autoplayInterval' which is set a few lines above.
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
				 * Note: It's necessary to resume the animation only if no
				 * slide is animated, imagine this situation:
				 * User moves his cursor over non-open slide - cursor is over
				 * accordion so autoplay pauses and then user
				 * moves his cursor off accordion before the opening slide is
				 * fully open so autoplay starts and event onResume
				 * is triggered and animation of timer starts, which is too
				 * early because opening slide is not fully open.
				 */
				if (!this.isAnimated()) {
					$('.timer', this.getActiveSlide()).stop(true)
						.animate({'width' : '100%'}, e.remainingTime,
								'linear');
				}
			},
		});


		$('.post-content').slimScroll({
			alwaysVisible: true,
			color: '#ffffff',
			opacity: 1,
			distance: '0px',
			height: '530px',
		});

		$('.right-image').imagefill();
		$('.social_update').imagefill();
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
</head>

<body class="blog-body">
	<div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '621495787905796',
          status     : true,
          xfbml      : true
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/all.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
	<div id="page" class="blog-page">
		<header id="masthead" class="site-header" role="banner">
			<div class="top-header">
				<div class="header-link">
					<ul class="h-menu">
						<li class="h-item"><a href="javascript:void(0);" id="open-what">WHAT?</a></li>
						<li class="h-item"><a target="_blank" href="http://better-this.com">BETTER THIS</a></li>
						<li class="h-item" style="display:none"><a href="<?php echo site_url(); ?>/blog">PULSE</a></li>
						<li class="h-item"><a href="javascript:void(0);" id="open-contact">SAY IT HERE</a></li>
						<li class="h-item"><a href="javascript:void(0);" id="open-glued">GET GLUED!</a></li>
					</ul>
				</div>
			</div>
			<div class="main-header clearfix">
				<div class="blog-logo"><a class="opacity" href="<?php echo site_url(); ?>"></a></div>
				<div class="main-menu">
					<ul class="m-menu">
						<li class="m-item out">
							<a href="?cate=art_culture" class="a-icon"><i class="icon icon-art"></i></a>
							<a href="?cate=art_culture" class="a-text art">ART & CULTURE</a>
						</li>
						<li class="m-item out">
							<a href="?cate=food_travel" class="a-icon"><i class="icon icon-food"></i></a>
							<a href="?cate=food_travel" class="a-text food">FOOD & TRAVEL</a>
						</li>
						<li class="m-item out">
							<a href="?cate=science_tech" class="a-icon"><i class="icon icon-science"></i></a>
							<a href="?cate=science_tech" class="a-text science">SCIENCE & TECH</a>
						</li>
						<li class="m-item out">
							<a href="?cate=health_sports" class="a-icon"><i class="icon icon-health"></i></a>
							<a href="?cate=health_sports" class="a-text health">HEALTH & SPORTS</a>
						</li>
					</ul>
				</div>
			</div>
			<script type="text/javascript">Load.pdTop();</script>
		</header>
		<div id="main" class="site-main">