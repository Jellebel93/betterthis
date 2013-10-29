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
<?php while ( have_posts() ) : the_post(); ?>

				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>

				

				

			<?php endwhile; // end of the loop. ?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		
			<div class="portfolio-box first-section " id="section1">
				<div class="social khaki">
					<div class="container">
						<a class="iconSocial twitter" href="http://twitter.com/share?text=test&amp;url=<?php echo $_SERVER['PHP_SELF'] ?>" target="_blank">&nbsp;</a>
						<a class="iconSocial facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $_SERVER['PHP_SELF'] ?>" target="_blank">&nbsp;</a>
					</div>
				</div>
				<div class="container">
					<div class="section-home">
						<?php get_sidebar(); ?>
					</div>
					<nav id="site-navigation" class="navigations main-navigations" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menus' ) ); ?>
				
					</nav><!-- #site-navigation -->
					
					
						<div class="wti-clear"></div>	
						<div class="navigation">
							<a href="#section1">down</a>
						</div>
				</div>
				
			
			</div>	
			<!--end section 1-->
			
			<div class="portfolio-box " id="section2">
							
				
				<div class="social khaki">				
					<div class="container">
						<div class="watch-action">
							<div class="watch-position align-left">
							<div class="action-like"><a data-nonce="2d640a2630" data-post_id="16" data-task="like" href="http://localhost/betterthis/wp-admin/admin-ajax.php?action=wti_like_post_process_vote&amp;task=like&amp;post_id=16&amp;nonce=2d640a2630" class="lbg-style3 like-16 jlk"><img title="Like" src="http://localhost/betterthis/wp-content/plugins/wti-like-post/images/pixel.gif"><span class="lc-16 lc">+2</span></a></div>
							<div class="action-unlike"><a data-nonce="2d640a2630" data-post_id="16" data-task="unlike" href="http://localhost/betterthis/wp-admin/admin-ajax.php?action=wti_like_post_process_vote&amp;task=unlike&amp;post_id=16&amp;nonce=2d640a2630" class="unlbg-style3 unlike-16 jlk"><img title="Unlike" src="http://localhost/betterthis/wp-content/plugins/wti-like-post/images/pixel.gif"><span class="unlc-16 unlc">0</span></a></div>
							<p></p></div>
							<div class="status-16 status align-left">&nbsp;&nbsp;You have already voted.</div>
						</div>
						<a class="iconSocial twitter" href="http://twitter.com/share?text=test&amp;url=<?php echo $_SERVER['PHP_SELF'] ?>" target="_blank">&nbsp;</a>
						<a class="iconSocial facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $_SERVER['PHP_SELF'] ?>" target="_blank">&nbsp;</a>
					</div>
				</div>
				
				<div class="container container-2">
					<div class="title_section"><h3>Daily dose of selft improvement</h3></div>	
					<nav id="site-navigation" class="navigations main-navigations" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menus' ) ); ?>
				
					</nav><!-- #site-navigation -->	
					<div class="wrap-section2">
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
										   <a class="sectionItem" id="select<?php echo get_the_ID(); ?>" href="#<?php echo get_the_ID(); ?>" title="<?php the_title_attribute(); ?>" >
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
						<h4>there are no secrets</h4>
						<p> <?php echo category_description( 3 ); ?> </p>
					</div>
					<div class="wti-clear"></div>			
					<div class="navigation">
						<a href="#section1">up</a>
						<a href="#section3">down</a>
					</div>
				</div>
			</div>		
			<!--end section 2-->
			
			
			<div class="portfolio-box "  id="section3">
				
				<div class="social khaki"><div class="watch-action">
					<div class="watch-position align-left">
					<div class="action-like"><a data-nonce="2d640a2630" data-post_id="16" data-task="like" href="http://localhost/betterthis/wp-admin/admin-ajax.php?action=wti_like_post_process_vote&amp;task=like&amp;post_id=16&amp;nonce=2d640a2630" class="lbg-style3 like-16 jlk"><img title="Like" src="http://localhost/betterthis/wp-content/plugins/wti-like-post/images/pixel.gif"><span class="lc-16 lc">+2</span></a></div>
					<div class="action-unlike"><a data-nonce="2d640a2630" data-post_id="16" data-task="unlike" href="http://localhost/betterthis/wp-admin/admin-ajax.php?action=wti_like_post_process_vote&amp;task=unlike&amp;post_id=16&amp;nonce=2d640a2630" class="unlbg-style3 unlike-16 jlk"><img title="Unlike" src="http://localhost/betterthis/wp-content/plugins/wti-like-post/images/pixel.gif"><span class="unlc-16 unlc">0</span></a></div>
					<p></p></div>
					<div class="status-16 status align-left">&nbsp;&nbsp;You have already voted.</div>
					</div>
					<a class="iconSocial twitter" href="http://twitter.com/share?text=Daily dose of selft improvement&amp;url=http://localhost/betterthis" target="_blank">t</a>
					<a class="iconSocial facebook" href="http://www.facebook.com/sharer.php?u=http://localhost/betterthis=Daily dose of selft improvement" target="_blank">f</a>
				</div>
				<nav id="site-navigation" class="navigations main-navigations" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menus' ) ); ?>
					<div class="navigation">
						<a href="#section2">up</a>
						<a href="#section4">down</a>
					</div>
				</nav><!-- #site-navigation -->	
				<div class="wrap-section3 ">
					<div class="list-item-thumb">
						<ul class="list-thumnail">
						<?php
							$index = 0;
							while($catquery->have_posts()) : $catquery->the_post();
							  $display="display:block";
								if($index === 0) {$display="display:none";}
								$index ++;
							?>
							
							 <li style="<?php echo  $display; ?>">
								
								<?php  
									$full_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full-size'); 
									if ( !empty($full_img )) : ?>
									   <a href="" title="<?php the_title_attribute(); ?>" >
										 <img src="<?php echo $full_img[0] ?>" width="<?php echo $full_img[1] ?>" height="<?php echo $full_img[2] ?>"/>
									   </a>
									 <?php else :?>
									 <div  class="no-thumb">no thumnail</div>
									 <?php endif; ?>
								<p><?php the_title(); ?></p>
								
							</li>
							
							<?php endwhile; ?>
							
						
						</ul>
					</div>
					
					<div class="list-item-content">
						<?php
							$catquery = new WP_Query( 'cat=3&posts_per_page=4' );
							$index = 0;
							while($catquery->have_posts()) : $catquery->the_post();
							  $display="display:none";
								if($index === 0) {$display="display:block";}
								$index ++;
							?>
							<div class="main-frame" style="<?php echo  $display; ?>">
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
			<!--end section 3-->
			
			
			
			<?php 
			$page_id = 91; 
			$page_data = get_page( $page_id ); 

			?>
			<div class="portfolio-box " id="section4">
			    
				<div class="title_section"><h3><?php echo $page_data->post_title; ?></h3></div>
					<div class="social khaki">				
						<div class="container">
							<div class="watch-action">
								<div class="watch-position align-left">
								<div class="action-like"><a data-nonce="2d640a2630" data-post_id="16" data-task="like" href="http://localhost/betterthis/wp-admin/admin-ajax.php?action=wti_like_post_process_vote&amp;task=like&amp;post_id=16&amp;nonce=2d640a2630" class="lbg-style3 like-16 jlk"><img title="Like" src="http://localhost/betterthis/wp-content/plugins/wti-like-post/images/pixel.gif"><span class="lc-16 lc">+2</span></a></div>
								<div class="action-unlike"><a data-nonce="2d640a2630" data-post_id="16" data-task="unlike" href="http://localhost/betterthis/wp-admin/admin-ajax.php?action=wti_like_post_process_vote&amp;task=unlike&amp;post_id=16&amp;nonce=2d640a2630" class="unlbg-style3 unlike-16 jlk"><img title="Unlike" src="http://localhost/betterthis/wp-content/plugins/wti-like-post/images/pixel.gif"><span class="unlc-16 unlc">0</span></a></div>
								<p></p></div>
								<div class="status-16 status align-left">&nbsp;&nbsp;You have already voted.</div>
							</div>
							<a class="iconSocial twitter" href="http://twitter.com/share?text=test&amp;url=<?php echo $_SERVER['PHP_SELF'] ?>" target="_blank">&nbsp;</a>
							<a class="iconSocial facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $_SERVER['PHP_SELF'] ?>" target="_blank">&nbsp;</a>
						</div>
					</div>
				
							
					<nav id="site-navigation" class="navigations main-navigations" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menus' ) ); ?>
				
					</nav><!-- #site-navigation -->
					<div class="data-content">
						<div class="tivi_icon"></div>
					<?php echo apply_filters('the_content', $page_data->post_content); ?></div>									
					<div class="navigation">
						<a href="#section3">down</a>
						<a href="#section5">up</a>
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
				</div>
				<div class="social khaki ">				
					<div class="container ">
						<div class="watch-action">
							<div class="watch-position align-left">
							<div class="action-like">
								<a data-nonce="2d640a2630" data-post_id="16" data-task="like" href="http://localhost/betterthis/wp-admin/admin-ajax.php?action=wti_like_post_process_vote&amp;task=like&amp;post_id=16&amp;nonce=2d640a2630" class="lbg-style3 like-16 jlk">
								<img title="Like" src="http://localhost/betterthis/wp-content/plugins/wti-like-post/images/pixel.gif"><span class="lc-16 lc">+2</span></a>
							</div>
							<div class="action-unlike">
								<a data-nonce="2d640a2630" data-post_id="16" data-task="unlike" href="http://localhost/betterthis/wp-admin/admin-ajax.php?action=wti_like_post_process_vote&amp;task=unlike&amp;post_id=16&amp;nonce=2d640a2630" class="unlbg-style3 unlike-16 jlk">
								<img title="Unlike" src="http://localhost/betterthis/wp-content/plugins/wti-like-post/images/pixel.gif"><span class="unlc-16 unlc">0</span></a>
							</div>
							<p></p>
							</div>
							<div class="status-16 status align-left">&nbsp;&nbsp;You have already voted.</div>
						</div>
						<a class="iconSocial twitter" href="http://twitter.com/share?text=test&amp;url=<?php echo $_SERVER['PHP_SELF'] ?>" target="_blank">&nbsp;</a>
						<a class="iconSocial facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $_SERVER['PHP_SELF'] ?>" target="_blank">&nbsp;</a>
					</div>
				</div>
				
				<div class="data-content"><?php echo apply_filters('the_content', $page_data->post_content); ?>		</div>									
				<div class="navigation">
					<a href="#page">up</a>
				</div>	
			</div>
			<!--end section 5-->
		</div>
	</div><!-- #primary -->


<?php get_footer(); ?>