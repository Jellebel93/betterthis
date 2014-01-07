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
						<li class="h-item"><a href="#what">WHAT?</a></li>
						<li class="h-item"><a href="#betterthis">BETTER THIS</a></li>
						<li class="h-item"><a href="#pluse">PULSE</a></li>
						<li class="h-item"><a href="#sayithere">SAY IT HERE</a></li>
						<li class="h-item"><a href="#getglued">GET GLUED!</a></li>
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
