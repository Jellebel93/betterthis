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

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			
			
		<div class="portfolio-box first-section " id="section1">
						<div class="social khaki">
							<a class="iconSocial twitter" href="http://twitter.com/share?text=test&amp;url=http://localhost/betterthis" target="_blank">t</a>
							<a class="iconSocial facebook" href="http://www.facebook.com/sharer.php?u=http://localhost/betterthis=test" target="_blank">f</a>
						</div>
							<nav id="site-navigation" class="navigations main-navigations" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menus' ) ); ?>
				
					</nav><!-- #site-navigation -->
							<div class="section-home"><span>Social update :</span> we just launched our new campaign , checkit out!</div>
							<div class="navigation">
								<a href="#section1">down</a>
							</div>
					</div>	
			
			<?php 
			$page_id = 91; 
			$page_data = get_page( $page_id ); 

			?>
			<div class="portfolio-box  broadcasting-awesomess  " rel="broadcasting-awesomess" id="section4">
				<div class="title_section"><h3><?php echo $page_data->post_title; ?></h3></div>
					<div class="social khaki">
					
						<div class="watch-action">
							<div class="watch-position align-left">
							<div class="action-like"><a data-nonce="2d640a2630" data-post_id="22" data-task="like" href="http://localhost/betterthis/wp-admin/admin-ajax.php?action=wti_like_post_process_vote&amp;task=like&amp;post_id=22&amp;nonce=2d640a2630" class="lbg-style3 like-22 jlk"><img title="Like" src="http://localhost/betterthis/wp-content/plugins/wti-like-post/images/pixel.gif"><span class="lc-22 lc">+5</span></a></div>
							<div class="action-unlike"><a data-nonce="2d640a2630" data-post_id="22" data-task="unlike" href="http://localhost/betterthis/wp-admin/admin-ajax.php?action=wti_like_post_process_vote&amp;task=unlike&amp;post_id=22&amp;nonce=2d640a2630" class="unlbg-style3 unlike-22 jlk"><img title="Unlike" src="http://localhost/betterthis/wp-content/plugins/wti-like-post/images/pixel.gif"><span class="unlc-22 unlc">0</span></a></div>
							<p></p></div>
							<div class="status-22 status align-left">&nbsp;&nbsp;You have already voted.</div>
						</div>
						<a class="iconSocial twitter" href="http://twitter.com/share?text=is just next to&amp;url=http://localhost/betterthis" target="_blank">t</a>
						<a class="iconSocial facebook" href="http://www.facebook.com/sharer.php?u=http://localhost/betterthis=is just next to" target="_blank">f</a>
					</div>
							
					<nav id="site-navigation" class="navigations main-navigations" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menus' ) ); ?>
				
					</nav><!-- #site-navigation -->
					<div class="data-content"><?php echo apply_filters('the_content', $page_data->post_content); ?></div>									
					<div class="navigation">
						<a href="#section4">up</a>
					</div>	
			</div><!-- #content -->
			

			<?php 
			$page_id = 88; 
			$page_data = get_page( $page_id ); 

			?>
			<div class="portfolio-box  is-just-next-to  " rel="is-just-next-to" id="section5">
				<div class="title_section"><h3><?php echo $page_data->post_title; ?></h3></div>
					<div class="social khaki">
					
						<div class="watch-action">
							<div class="watch-position align-left">
							<div class="action-like"><a data-nonce="2d640a2630" data-post_id="22" data-task="like" href="http://localhost/betterthis/wp-admin/admin-ajax.php?action=wti_like_post_process_vote&amp;task=like&amp;post_id=22&amp;nonce=2d640a2630" class="lbg-style3 like-22 jlk"><img title="Like" src="http://localhost/betterthis/wp-content/plugins/wti-like-post/images/pixel.gif"><span class="lc-22 lc">+5</span></a></div>
							<div class="action-unlike"><a data-nonce="2d640a2630" data-post_id="22" data-task="unlike" href="http://localhost/betterthis/wp-admin/admin-ajax.php?action=wti_like_post_process_vote&amp;task=unlike&amp;post_id=22&amp;nonce=2d640a2630" class="unlbg-style3 unlike-22 jlk"><img title="Unlike" src="http://localhost/betterthis/wp-content/plugins/wti-like-post/images/pixel.gif"><span class="unlc-22 unlc">0</span></a></div>
							<p></p></div>
							<div class="status-22 status align-left">&nbsp;&nbsp;You have already voted.</div>
						</div>
						<a class="iconSocial twitter" href="http://twitter.com/share?text=is just next to&amp;url=http://localhost/betterthis" target="_blank">t</a>
						<a class="iconSocial facebook" href="http://www.facebook.com/sharer.php?u=http://localhost/betterthis=is just next to" target="_blank">f</a>
					</div>
							
					<nav id="site-navigation" class="navigations main-navigations" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menus' ) ); ?>
				
					</nav><!-- #site-navigation -->
					<div class="data-content"><?php echo apply_filters('the_content', $page_data->post_content); ?>		</div>									
					<div class="navigation">
						<a href="#section4">up</a>
					</div>	
			</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>