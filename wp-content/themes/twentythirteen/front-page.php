<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<?php
	global $post; 
	$posthome=$post->ID;
	$meta_values = get_post_meta($posthome ,'like_page'); ?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div class="portfolio-box first-section " id="section1">
				<div class="social khaki">				
					<div class="container">		
						<span class='st_facebook_hcount iconSocial facebook' displayText='Facebook'></span>
						<span class='st_twitter_hcount iconSocial twitter' displayText='Tweet'></span>					
							<span class="iconSocial heart">
							<a class="like_page" rel="<?php  echo $posthome; ?>"><?php 	echo $meta_values[0]; ?> </a><span class="notice"></span>
						</span>	
					</div>
				</div>
				<div class="container container-body">
					<div class="section-home">
						<?php get_sidebar(); ?>
					</div>
					<nav id="site-navigation" class="navigations main-navigations" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menus' ) ); ?>
					</nav><!-- #site-navigation -->
					
					<div class="navigation " >
						<a href="#section2">down</a>
					</div>
				</div>			
			</div>	
			<!--end section 1-->
			
			<div class="portfolio-box " id="section2">				
				<div class="container ">	
					<div class="wrap-2">	
						<div class="wrap-section2">
							<div class="title_section"><h3>Daily dose of selft improvement</h3></div>	
							<div class="product-section2">
								<ul>
								<?php
								$catquery = new WP_Query( 'cat=3&posts_per_page=4' );
								while($catquery->have_posts()) : $catquery->the_post();
								?>								
									<li>									
										<?php  
										$full_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full-size'); 
										if ( !empty($full_img )) : ?>
										<a class="sectionItem" data-id="select<?php echo get_the_ID(); ?>" href="#<?php echo get_the_ID(); ?>" title="<?php the_title_attribute(); ?>" >
											<img src="<?php echo $full_img[0]; ?>" width="<?php echo $full_img[1] ?>" height="<?php echo $full_img[2] ?>"/>
										</a>
										<?php else :?>
										<div class="no-thumb">no thumnail</div>
										 <?php endif; ?>
										<p><?php the_title(); ?></p>
									</li>								
									<?php endwhile; ?>
								</ul>
							</div>
						</div>				
						<div class="content-section2">
							<div class="social khaki">										
								<span class='st_facebook_hcount iconSocial facebook' displayText='Facebook'></span>
								<span class='st_twitter_hcount iconSocial twitter' displayText='Tweet'></span>
								<span class="iconSocial heart">
									<a class="like_page" rel="<?php  echo $posthome; ?>"><?php 	echo $meta_values[0]; ?> </a><span class="notice"></span>
								</span>	
							</div>	
							<nav id="site-navigation" class="navigations main-navigations" role="navigation">
								<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menus' ) ); ?>
							</nav><!-- #site-navigation -->	
							<h4>there are no secrets</h4>
							<p> <?php echo category_description(3); ?> </p>
						</div>
					</div>			
					<div class="navigation">
						<a href="#section1">up</a>
						<a href="#section3">down</a>
					</div>
				</div>
			</div>		
			<!--end section 2-->
			
			<div class="portfolio-box "  id="section3">
				
				<div class="container wrap3 " >
				<div class="wrap-section3 ">
					<div class="list-item-thumb">
					
						<div class="social khaki">				
										
								<span class='st_facebook_hcount iconSocial facebook' displayText='Facebook'></span>
								<span class='st_twitter_hcount iconSocial twitter' displayText='Tweet'></span>
								<span class="iconSocial heart">
									<a class="like_page" rel="<?php  echo $posthome; ?>"><?php 	echo $meta_values[0]; ?> </a><span class="notice"></span>
								</span>	
						
						</div>
					
						<nav id="site-navigation" class="navigations main-navigations" role="navigation">
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menus' ) ); ?>
							<div class="navigation">
								<a href="#section2">up</a>
								<a href="#section4">down</a>
							</div>
						</nav><!-- #site-navigation -->	
				
				
						<ul class="list-thumnail">
						<?php
							$index = 0;
							while($catquery->have_posts()) : $catquery->the_post();
							  $display="display:block";
								if($index === 0) {$display="display:none";}
								$index ++;
							?>
							
							 <li data-id="select<?php echo get_the_ID(); ?>" class="sectionItem" id="thumnail_select<?php echo get_the_ID(); ?>" style="<?php echo  $display; ?>">
								<?php  
									$full_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full-size'); 
									if ( !empty($full_img )) : ?>
									   <a href="#" title="<?php the_title_attribute(); ?>" >
                       <img src="<?php echo $full_img[0] ?>" width="<?php echo $full_img[1] ?>px" height="<?php echo $full_img[2] ?>px"/>
									   </a>
									 <?php else :?>
									 <div  class="no-thumb">no thumnail</div>
									 <?php endif; ?>
								<p><?php the_title(); ?></p>
								
							</li>							
							<?php endwhile; ?>							
						</ul>
					</div>
					<div class="list-item-content slider-container slider clearfix">
						<?php
							$catquery = new WP_Query( 'cat=3&posts_per_page=4' );
							$index = 0;
							while($catquery->have_posts()) : $catquery->the_post();
							  $display="";
								if($index === 0) {$display="item-active";}
								$index ++;
							?>
							<div class="main-frame page-slider item-slider <?php echo $display;?>" id="select<?php echo get_the_ID(); ?>">
								 <div class="thumnail">
									<h3><?php the_title(); ?></h3>
									<?php  
									$full_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full-size'); 
									if ( !empty($full_img )) : ?>
										<a href="" title="<?php the_title_attribute(); ?>" >
										  <img src="<?php echo $full_img[0] ?>" width="<?php echo $full_img[1] ?>" height="<?php echo $full_img[2] ?>"/>
										</a>
									 <?php else :?>
									 <div class="no-thumb"></div>
									 <?php endif; ?>
									<div class="the_excerpt"><?php the_excerpt(); ?></div>
								</div>
								 <div class="content-data fadein">
									<?php the_content(); ?>
								</div>
							</div>
							<?php endwhile; ?>
					</div>				
				</div>				
				</div>				
			</div>		
			<!--end section 3-->
			
			
			
			<?php 
			$page_id = 91; 
			$page_data = get_page( $page_id ); 

			?>
			<div class="portfolio-box " id="section4">			    
				<div class="container ">				
					<div class="title_section"><h3><?php echo $page_data->post_title; ?></h3></div>
				</div>
				
				<div class="social khaki">				
					<div class="container">							
						<span class='st_facebook_hcount iconSocial facebook' displayText='Facebook'></span>
						<span class='st_twitter_hcount iconSocial twitter' displayText='Tweet'></span>
						<span class="iconSocial heart">
							<a class="like_page" rel="<?php  echo $posthome; ?>"><?php 	echo $meta_values[0]; ?> </a><span class="notice"></span>
						</span>	
					</div>
				</div>
				<div class="container">				
					<nav id="site-navigation" class="navigations main-navigations" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menus' ) ); ?>
				
					</nav><!-- #site-navigation -->
				</div>
				<div class="data-content">
					<div class="tivi_icon"></div>
					<?php echo apply_filters('the_content', $page_data->post_content); ?>
				</div>	
				<div class="container">
					<div class="navigation">
						<a href="#section3">up</a>
						<a href="#section5">down</a>
						
					</div>
				</div>
					
			</div>
			<!--end section 4-->

			<?php 
			$page_id = 88; 
			$page_data = get_page( $page_id ); 

			?>
			<div class="portfolio-box" id="section5">
				<div class="container ">
					<div class="clearfix">
						<nav id="site-navigation" class="navigations main-navigations" role="navigation">
								<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menus' ) ); ?>
						
						</nav><!-- #site-navigation -->
						
						<div class="title_section"><h3><?php echo $page_data->post_title; ?></h3></div>
					</div>
				</div><div class="social khaki">				
					<div class="container">							
						<span class='st_facebook_hcount iconSocial facebook' displayText='Facebook'></span>
						<span class='st_twitter_hcount iconSocial twitter' displayText='Tweet'></span>
						<span class="iconSocial heart">
							<a class="like_page" rel="<?php  echo $posthome; ?>"><?php 	echo $meta_values[0]; ?> </a><span class="notice"></span>
						</span>	
					</div>
				</div>				
				<div class="data-content"><?php echo apply_filters('the_content', $page_data->post_content); ?>		</div>									
				<div class="container">				
					<div class="navigation">
						<a href="#page">up</a>
					</div>	
				</div>
			</div>
			<!--end section 5-->
		</div>
	</div><!-- #primary -->


<?php get_footer(); ?>
