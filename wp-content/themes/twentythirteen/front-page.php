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
					<div class="container clearfix">		
						<span class='st_twitter_hcount iconSocial twitter-green' displayText='Tweet'></span>					
						<span class="iconSocial heart heart-green" title="Liked <?php echo $meta_values[0];?>">
							<a class="like_page" rel="liked"></a><span class="notice"></span>
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
				<div class="container">	
					<div class="wrap-2">	
						<div class="wrap-section2">
							<div class="title_section"><h3>WE’RE BETTER THIS AND THIS IS OUR STORY.</h3></div>	
							<div class="product-section2">
								<ul class="clearfix">
								<?php
								$catquery = new WP_Query( 'cat=3&posts_per_page=4' );
								while($catquery->have_posts()) : $catquery->the_post();
								?>								
									<li>									
										<?php  
										$full_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full-size'); 
										if ( !empty($full_img )) : ?>
										<a class="sectionItem" data-id="select<?php echo get_the_ID(); ?>" href="#<?php echo get_the_ID(); ?>" title="<?php the_title_attribute(); ?>" >
											<img src="<?php echo $full_img[0]; ?>" width="auto" height="200px"/>
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
								<span class='st_twitter_hcount iconSocial twitter' displayText='Tweet'></span>					
								<span class="iconSocial heart" title="Liked <?php echo $meta_values[0];?>">
									<a class="like_page" rel="liked"></a><span class="notice"></span><span class="notice"></span>
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
				
				<div class="container wrap3">
				<div class="wrap-section3 clearfix">
					<div class="list-item-thumb">
					
							<div class="social khaki clearfix">				
								<span class='st_twitter_hcount iconSocial twitter' displayText='Tweet'></span>					
								<span class="iconSocial heart" title="Liked <?php echo $meta_values[0];?>">
									<a class="like_page" rel="liked"></a><span class="notice"></span><span class="notice"></span>
								</span>	
							</div>
					
						<nav id="site-navigation" class="navigations main-navigations" role="navigation">
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menus' ) ); ?>
							<div class="navigation">
								<a href="#section2">up</a>
								<a href="#section4">down</a>
							</div>
						</nav><!-- #site-navigation -->	
				
				
						<ul class="list-thumnail clearfix">
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
											<img src="<?php echo $full_img[0] ?>" width="auto" height="122px"/>
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
								<div class="top-content">
									<div class="product-sologan">
										<?php the_content(); ?>
									</div>
									<div class="excerpt"><?php the_excerpt(); ?></div>
									<div class="the_title"><?php the_title(); ?></div>
								</div>
								<script type="text/javascript">
									var p_ = jQuery('#select<?php echo get_the_ID(); ?>');
									var color = p_.find('.product-sologan').find('.sologan').attr('class').replace('sologan', '');
									p_.find('.the_title').addClass(color);
								</script>
								<div class="dotted-line-new"></div>
								<div class="main-content clearfix">
									<div class="dot-lengthwise"></div>
									<div class="thumnail">
									<?php  
									$full_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full-size'); 
									if ( !empty($full_img )) : ?>
										<a href="<?php echo $full_img[0] ?>" class="fancybox" title="<?php the_title_attribute(); ?>" >
										  <img src="<?php echo $full_img[0] ?>" width="142px" height="<?php echo $full_img[2] ?>px"/>
										</a>
									 <?php else :?>
										<div class="no-thumb"></div>
									 <?php endif; ?>
									
									</div>
									<div class="content">
										<div class="content-center">
											<?php the_content(); ?>
										</div>
									</div>
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
					<div class="container clearfix">
						<span class='st_twitter_hcount iconSocial twitter' displayText='Tweet'></span>					
						<span class="iconSocial heart" title="Liked <?php echo $meta_values[0];?>">
							<a class="like_page" rel="liked"></a><span class="notice"></span>
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
          <u>
            <li class="active">
              <div class="accordion" tabindex="-1" style="height: 270px; width: 829px">
                <div class="jAccordion-slidesWrapper" style="display: block;">
                  <div class="prevBtn hidden" style="left: 0px;"></div>
                  <div class="nextBtn hidden" style="right: 0px;"></div>
<?php 
                $strQuery = array( 'posts_per_page' => 7, 'category_name' => 'art_culture,food_travel,science_tech,health_sports', 'orderby' => 'rand' );
                $the_query = new WP_Query( $strQuery );
                // The Loop
                if ( $the_query->have_posts() ) {
                  $isFirst = true; $active="";
                  while ( $the_query->have_posts() ) {
                    $the_query->the_post();
              // slider builder
                    $the_ID = get_the_ID();
                    $cate = get_the_category( $the_ID ); 
                    $attachment_size = apply_filters( 'twentythirteen_attachment_size', array( 604, 270 ) );
                    $full_img = wp_get_attachment_image_src(get_post_thumbnail_id(), $attachment_size); 
                    if($isFirst === true)  {$active = " active_slide"; $isFirst = false;}
                    else {$active = "";}
?>
                  <div class="jAccordion-slide<?php echo $active; ?>" style="position: absolute;" id="post<?php echo $the_ID; ?>">
                    <div class="jAccordion-slideWrapper" style="position: relative; filter: inherit; ">
                      <a href="<?php echo site_url(); ?>/blog/?post=<?php echo $the_ID; ?>">
                        <img src="<?php echo $full_img[0] ?>" class="jAccordion-img" height="350px">
                      </a>
                    </div>
                    <div class="data-info hidden"><?php the_excerpt(); ?></div>
                    <div class="data-title hidden"><?php the_title(); ?></div>
                  </div>
<?php 
                  }
                }
?>              
                </div>
              </div>
            </li>
          </u>
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
					<div class="container clearfix">							
						<span class='st_twitter_hcount iconSocial twitter' displayText='Tweet'></span>					
							<span class="iconSocial heart">
							<a class="like_page" rel="liked"></a><span class="notice"></span>
						</span>	
					</div>
				</div>				
				<div class="data-content"><?php echo apply_filters('the_content', $page_data->post_content); ?></div>									
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
