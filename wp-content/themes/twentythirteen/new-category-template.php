<?php 
/* Template Name: new-category-template  */ 
?>

<?php new_header(); ?>

<?php 
/* Slider  */ 
$isSlider = true;
$cat = "";
$postId = "";
$pageId = 1;
$offset = 0;
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


if(isset($_REQUEST['pageid'])) {
	$pageId = $_REQUEST['pageid'];
	if(strlen($pageId."") == 0) {
		$pageId = 1;
	}
}

$backgrounds = array('art_culture'=>'background: #0031ff;', 'food_travel'=>'background: #ff3aff;', 'science_tech'=>'background: #00f600;', 'health_sports'=>'background: #ff1f00;');
$colors = array('art_culture'=>'fff', 'food_travel'=>'000', 'science_tech'=>'000', 'health_sports'=>'fff');

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
		$isFirst = true;
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
// slider builder
	$the_ID = get_the_ID();
	$cate = get_the_category( $the_ID ); 
	$slug_ = $cate[0]->slug;
	$background = $backgrounds[$slug_];
	$color = 'color: #'.$colors[$slug_].';';

	$attachment_size = apply_filters( 'twentythirteen_attachment_size', array( 604, 270 ) );
	$full_img = wp_get_attachment_image_src(get_post_thumbnail_id(), $attachment_size); 
	
?>
		<li class="page-slider item-slider <?php if($isFirst === true) { echo 'item-active '; $isFirst=false;} ?>clearfix" id="select<?php echo $the_ID; ?>">
			<div class="left-detail-post" style="<?php echo $background; ?>">
				<h2 style="<?php echo $color; ?>"><?php the_title(); ?></h2>
				<div style="<?php echo $color; ?>" class="the_excerpt"><?php the_excerpt(); ?></div>
				<div class="left-row while-left-row"><a href="<?php echo site_url(); ?>/blog/?post=<?php echo $the_ID; ?>"></a></div>
			</div>

			<div class="right-image">
				<img src="<?php echo $full_img[0] ?>" height="327px" width="732px"/>
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
	$slug_ = $category[0]->slug;

	$background = $backgrounds[$slug_];
	$color = 'color: #'.$colors[$slug_].';';

?>
	<div class="post-container clearfix">
		<div class="left-detail-post" style="<?php echo $background;?>">
			<h2 style="<?php echo $color;?>"><?php the_title(); ?></h2>
			<div style="<?php echo $color;?>" class="post-content"><?php the_content();?></div>
			<div class="share-content">
				<a class="share" href="#fb"><img src="<?php echo site_url(); ?>/wp-content/themes/twentythirteen/images/fb-icon-32x32.png" height="32px"/></a>
				<a class="share" href="#wr"><img src="<?php echo site_url(); ?>/wp-content/themes/twentythirteen/images/wr-icon-32x32.png" height="32px"/></a>
				<a class="share" href="#h"><img src="<?php echo site_url(); ?>/wp-content/themes/twentythirteen/images/h-icon-42x32.png" height="32px"/></a>
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

$perPage = 16;
$catName = "art_culture,food_travel,science_tech,health_sports";
//case 1: for home
if ($isSlider == true) {
	//$strQuery = array( 'posts_per_page' => 16, 'offset' => $offset, 'category_name' => 'art_culture,food_travel,science_tech,health_sports', 'orderby' => 'date', 'order' => 'ASC' ); rand
  $strQuery = array( 'posts_per_page' => $perPage, 'offset' => $offset, 'category_name' => $catName, 'orderby' => 'rand' );
}
// case 2: for category
if (strlen($cat) > 0) {
  $catName = $cat;
	$strQuery = array( 'posts_per_page' => $perPage, 'offset' => $offset, 'category_name' => $catName, 'orderby' => 'rand' );
}

// case 2: for post
if (strlen($postId) > 0 && strlen($post_in_cat) > 0) {
  $perPage = 8;
  $catName = $post_in_cat;
	$strQuery = array( 'posts_per_page' => $perPage, 'offset' => $offset, 'category_name' => $catName, 'orderby' => 'rand' );
}


//NUDEGE
echo '<div class="nodege-container clearfix">';
$clazzNude = "";
if (strlen($cat) > 0) {
  $category = get_category_by_slug($cat);
  echo '<div class="cat-name alignleft"><i class="icon-cate icon-'.substr($cat, 0, strrpos($cat, '_', 0)).'"></i>'.$category->cat_name .'</div>';
  $clazzNude = ' alignright';
}
echo '<a class="icon-nudege'.$clazzNude .'" href="javascript:Load.loadPost('.$perPage.', \''.$catName.'\');"></a>';
echo '</div>';

echo '<div class="container">';
$nextPost = '';
$the_query = new WP_Query( $strQuery );
	// The Loop
	if ( $the_query->have_posts() ) {
		// have post
		echo '<ul class="posts-container clearfix">';
		$hasNext = 1;
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$the_ID = get_the_ID();
			if(strlen($postId) > 0 && $the_ID*1 === $postId*1 ) {
				$hasNext = 2;
				continue;
			}
			if($hasNext > 0) {
				$nextPost = $the_ID;
				if($hasNext === 2) {
					$hasNext = -1;
				}
			}

// slider builder
	$hasThum = has_post_thumbnail( $the_ID );
	$cate = get_the_category( $the_ID ); 
	$slug_ = $cate[0]->slug;
	$background = $backgrounds[$slug_];
	$color = 'color: #'.$colors[$slug_].';';
	$img_open = $colors[$slug_];

	$full_img = array();
	if($hasThum === true) {
		$full_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail'); 
	}
?>
		<li class="post-item clearfix" id="post<?php echo $the_ID; ?>">
<?php
$sizeH = 'height:300px;';
$ptop = 'margin-top:0px;';
$pIconOpen='icon-open-d';
if($hasThum === true) {
$sizeH = 'height:64px;';
$ptop = 'margin-top:6px;';
$pIconOpen='icon-open';
?>	
			<div class="post-image">
				<a href="<?php echo site_url(); ?>/blog/?post=<?php echo get_the_ID(); ?>">
					<img src="<?php echo $full_img[0] ?>" height="230px" width="230px"/>
				</a>
			</div>
<?php
}

?>
			<div class="post-title <?php echo ($hasThum === true) ? 'thumbnail' : 'no-thumbnail'; ?>" style="<?php echo $sizeH .$ptop .$background;?>">
				<div style="<?php echo $color; ?>" class="title"><?php the_title(); ?></div>
				<div style="<?php echo $color; ?>" class="excerpt"><?php ($hasThum === true) ? the_excerpt_max_charlength(25) : the_excerpt(); ?></div>
				<div class="<?php echo $pIconOpen; ?>">
					<a href="<?php echo site_url(); ?>/blog/?post=<?php echo get_the_ID(); ?>">
						<img src="<?php echo site_url(); ?>/wp-content/themes/twentythirteen/images/mini-open-<?php echo $img_open;?>.png"/>
					</a>
				</div>
			</div>
			<div class="the-social clearfix">
				<div style="float:right;padding: 2px 5px 0px 0px;">
					<a class="share" href="#wr"><img src="<?php echo site_url(); ?>/wp-content/themes/twentythirteen/images/wr-icon-32x32.png" height="24px"/></a>
					<a class="share" href="#h"><img src="<?php echo site_url(); ?>/wp-content/themes/twentythirteen/images/h-icon-42x32.png" height="24px"/></a>
				</div>
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

echo '</div>';
echo '<div style="display:none" data-id="'.$nextPost.'" id="nextPost"></div>';
?>

<?php new_footer(); ?>
