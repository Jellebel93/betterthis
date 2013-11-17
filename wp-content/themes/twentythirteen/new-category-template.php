<?php 
/* Template Name: new-category-template  */ 
?>

<?php new_header(); ?>

<?php 
/* Slider  */ 
$isSlider = true;
$cat = "";
$postId = "";
if(isset($_REQUEST['cat'])) {
	$cat = $_REQUEST['cat'];
	if(strlen($cat) == 0) {
		$cat = "";
	} else {
		$isSlider = false;
	}
}

if(isset($_REQUEST['post'])) {
	$postId = $_REQUEST['post'];
	if(strlen($postId) == 0) {
		$postId = "";
	} else {
		$isSlider = false;
	}
}

/* show slider */

if ($isSlider == true) {
	echo '<div class="post-slider-container" id="BlogSlider">';

	// query post for slider
	$strQuery = array( 'posts_per_page' => 10, 'category_name' => 'art_culture,food_travel,science_tech,health_sports', 'orderby' => 'date', 'order' => 'ASC' );
	$the_query = new WP_Query( $strQuery );
	// The Loop
	if ( $the_query->have_posts() ) {
		// have post
		echo '<ul class="slider-content slider clearfix" id="post-slider-content">';
		
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
// slider builder
	$full_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full-size'); 
?>
		<li class="page-slider item-slider item-active clearfix" id="select<?php echo get_the_ID(); ?>">
			<div class="left-detail-post">
				<h2><?php the_title(); ?></h2>
				<div class="the_excerpt"><?php the_excerpt(); ?></div>
				<div class="left-row while-left-row"><a href="<?php echo site_url(); ?>/blog/?post=<?php echo get_the_ID(); ?>"></a></div>
			</div>

			<div class="right-image">
				<img src="<?php echo $full_img[0] ?>" height="330px"/>
			</div>		
		</li>
<?php 			
		}
		echo '</ul>';
	} else {
		// no posts found
	}
	/* Restore original Post Data */
	wp_reset_postdata();

// end slider
	echo '</div>';
}

$post_in_cat = "";
if(strlen($postId) > 0) {
	$the_query = new WP_Query( 'p='.$postId );
	$the_query->the_post();
	$full_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full-size');
	
	$category = get_the_category($postId); 
	$post_in_cat = $category[0]->category_nicename;
?>
	<div class="post-container clearfix">
		<div class="left-detail-post">
			<h2><?php the_title(); ?></h2>
			<div class="post-content"><?php the_content();?></div>
			<div class="share-content">
				<a class="share" href="#fb"><img src="<?php echo site_url(); ?>/wp-content/themes/twentythirteen/images/fb-icon-32x32.png" height="32px"/></a>
				<a class="share" href="#wr"><img src="<?php echo site_url(); ?>/wp-content/themes/twentythirteen/images/wr-icon-32x32.png" height="32px"/></a>
				<a class="share" href="#h"><img src="<?php echo site_url(); ?>/wp-content/themes/twentythirteen/images/h-icon-42x32.png" height="32px"/></a>
				<a class="share" href="#lk"><img src="<?php echo site_url(); ?>/wp-content/themes/twentythirteen/images/lk-icon-36x36.png" height="32px"/></a>
			</div>
		</div>
		<div class="right-image">
			<img src="<?php echo $full_img[0] ?>"/>
		</div>
		<script type="text/javascript">Load.postLoad();</script>
	</div>
<?php
// end view post
}

//NUDEGE

//case 1: for home
if ($isSlider == true) {
	$strQuery = array( 'posts_per_page' => 16, 'category_name' => 'art_culture,food_travel,science_tech,health_sports', 'orderby' => 'date', 'order' => 'ASC' );
}
// case 2: for category
if (strlen($cat) > 0) {
	$strQuery = array( 'posts_per_page' => 16, 'category_name' => $cat, 'orderby' => 'date', 'order' => 'ASC' );
}

// case 2: for post
if (strlen($postId) > 0 && strlen($post_in_cat) > 0) {
	$strQuery = array( 'posts_per_page' => 8, 'category_name' => $post_in_cat, 'orderby' => 'date', 'order' => 'ASC' );
}

$the_query = new WP_Query( $strQuery );
	// The Loop
	if ( $the_query->have_posts() ) {
		// have post
		echo '<ul class="posts-container clearfix" id="post-slider-content">';
		
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
// slider builder
	$full_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full-size'); 
?>
		<li class="page-slider item-slider item-active clearfix" id="select<?php echo get_the_ID(); ?>">
			<div class="left-detail-post">
				<h2><?php the_title(); ?></h2>
				<div class="the_excerpt"><?php the_excerpt(); ?></div>
				<div class="left-row while-left-row"><a href="<?php echo site_url(); ?>/blog/?post=<?php echo get_the_ID(); ?>"></a></div>
			</div>

			<div class="right-image">
				<img src="<?php echo $full_img[0] ?>" height="330px"/>
			</div>		
		</li>
<?php 			
		}
		echo '</ul>';
	} else {
		// no posts found
	}
	/* Restore original Post Data */
	wp_reset_postdata();



?>

<?php new_footer(); ?>