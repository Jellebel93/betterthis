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
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/betterthis-base.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.cookie.js"></script>
<script type="text/javascript">

var date = new Date();
var timestamp = date.getTime();

jQuery.noConflict();
jQuery(document).ready(function($){
    $.ajaxSetup({cache:false});
    $(".like_page").click(function(){  
		var cookieValue = $.cookie("liked");
		//alert( $.cookie("liked") );
			if(cookieValue) {
				alert('you voted , can not vote again !')
			}
			else {
				var post_id = $(this).attr("rel");	
				var elm = $(this);		
				elm.next('span').html('loading...')	;
				$.ajax({
					url:'http://<?php echo $_SERVER[HTTP_HOST]; ?>/<?php echo $_SERVER['PHP_SELF'] ?>/like-page/?PostId=' + post_id,
					type: 'GET',
					cache: false,			
					success:function(data) {
						$(".like_page").html(data);	
					  $(".like_page").next('span').html('');
					  $.cookie("liked", 1,{ expires : 30 });
					  
					}
					,
					  error: function(e) 
					  {
						//called when there is an error
						console.log(e.message);
					  }
				});
			}
     
    return false;
    });
});


</script>

</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</a>
			<div class="sologan">
				We're better this . A source that makes your day better.  browser through our products to learn more things about us.
			</div>
			
		</header><!-- #masthead -->
		
	
		<div id="main" class="site-main">
