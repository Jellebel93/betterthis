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
if(isset($_REQUEST['cate'])) {
	$cat = $_REQUEST['cate'];
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

$order="rand";
if(isset($_REQUEST['getglued'])) {
  $getglued = $_REQUEST['getglued'];
  if($getglued === 'true') {
    $order = 'date';
  }
}

if(isset($_REQUEST['pageid'])) {
	$pageId = $_REQUEST['pageid'];
	if(strlen($pageId."") == 0) {
		$pageId = 1;
	}
}

$backgrounds = array(
	'art_culture'=>'background: #00f600;',
	'food_travel'=>'background: #ff1b00;',
	'science_tech'=>'background: #fc00ff;',
	'health_sports'=>'background: #0043fe;'
);

$colors = array(
	'art_culture'=>'000',
	'food_travel'=>'fff',
	'science_tech'=>'fff',
	'health_sports'=>'fff'
);

/* show slider */
$social_update = "";
if ($isSlider == true) {
  $social_update = yarq_get();
  
	echo '<div class="post-slider-container">';

	// query post for slider
	$strQuery = array( 'posts_per_page' => 8, 'category_name' => 'art_culture,food_travel,science_tech,health_sports', 'orderby' => $order );
	$the_query = new WP_Query( $strQuery );
	// The Loop
	if ( $the_query->have_posts() ) {
		// have post
		//echo '<ul class="slider-content slider clearfix" id="post-slider-content">';
    
?>


    <div class="slider-content" style="height: 362px;">
      <div class="left-detail-post" id="left-detail-post">
        <h2 class="item-title"></h2>
        <div class="item-excerpt the_excerpt"></div>
        <div class="left-row while-left-row"><a class="opacity" data-href="<?php echo site_url(); ?>/?post=" href="#"></a></div>
      </div>
      <div class="accordion right-image" tabindex="-1" style="">
        <div class="jAccordion-slidesWrapper" style="display: block;">
          <div class="prevBtn hidden" style="left: 0px;"></div>
          <div class="nextBtn hidden" style="right: 0px;"></div>
    
<?php    
		$isFirst = true;$active=""; $t = 0;
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
// slider builder
      $the_ID = get_the_ID();
      $cate = get_the_category( $the_ID ); 
      $slug_ = $cate[0]->slug;
      $background = $backgrounds[$slug_];
      $color = '#'.$colors[$slug_].';';

      $attachment_size = apply_filters( 'twentythirteen_attachment_size', array( 604, 270 ) );
      $full_img = wp_get_attachment_image_src(get_post_thumbnail_id(), $attachment_size); 
      if(strlen($full_img[0]) === 0 || $t === 5) {
        continue;
      }
      $t = $t + 1;
      if($isFirst === true)  {$active = " active_slide"; $isFirst = false;}
      else {$active = "";}
?>
            
          <div class="jAccordion-slide<?php echo $active; ?>" style="position: absolute;" id="select<?php echo $the_ID; ?>">
            <div class="jAccordion-slideWrapper" style="position: relative; filter: inherit; ">
              <img src="<?php echo $full_img[0] ?>" class="jAccordion-img" height="350px">
            </div>
            <div class="data-info hidden" 
                 data-color="<?php echo $color; ?>" 
                 data-backg="<?php echo $background; ?>" 
                 ><?php the_excerpt(); ?></div>
            <div class="data-title hidden"><?php the_title(); ?></div>
          </div>
    
<?php 			
		}
?>    
        </div>
      </div>
    </div>
<?php    
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
				<a class="share fb" href="javascript:;"
						data-name="<?php the_title(); ?>"
						data-link="<?php echo site_url(); ?>/?post=<?php echo get_the_ID(); ?>"
						<?php if (!empty($full_img)):?>
						data-pic="<?php echo $full_img[0] ?>"
						<?php endif; ?>
						data-desc="<?php echo strip_tags(get_the_excerpt());?>" >
					<img src="<?php echo site_url(); ?>/wp-content/themes/twentythirteen/images/fb-icon-32x32.png" height="32px"/></a>
				<a class="share"
						href="https://twitter.com/intent/tweet?url=<?php echo urlencode(site_url().'/?post='.get_the_ID());?>&text=<?php echo urlencode(get_the_title());?>"
						style="margin-left:-5px"><img src="<?php echo site_url(); ?>/wp-content/themes/twentythirteen/images/wr-icon-32x32.png" height="32px"/></a>
			</div>
		</div>
		<div class="right-image">
      <div class="container">
        <a href="<?php echo $full_img[0] ?>" class="fancybox-blog">
          <img src="<?php echo $full_img[0] ?>"/>
        </a>
      </div>
		</div>
		<script type="text/javascript">Load.postLoad();</script>
	</div>
<?php
// end view post
}

if(strlen($social_update) > 0) {
  $perPage = 15;
} else {
  $perPage = 16;  
}

$catName = "art_culture,food_travel,science_tech,health_sports";
//case 1: for home
if ($isSlider == true) {
  
	//$strQuery = array( 'posts_per_page' => 16, 'offset' => $offset, 'category_name' => 'art_culture,food_travel,science_tech,health_sports', 'orderby' => 'date', 'order' => 'ASC' ); rand
  $strQuery = array( 'posts_per_page' => $perPage, 'category_name' => $catName, 'orderby' => $order );
}

$perPage = 16;  
// case 2: for category
if (strlen($cat) > 0) {
  $catName = $cat;
	$strQuery = array( 'posts_per_page' => $perPage, 'category_name' => $catName, 'orderby' => 'rand' );
}

// case 2: for post
if (strlen($postId) > 0 && strlen($post_in_cat) > 0) {
  $perPage = 8;
  $catName = $post_in_cat;
	$strQuery = array( 'posts_per_page' => $perPage, 'category_name' => $catName, 'orderby' => 'rand' );
}


//NUDEGE
echo '<div class="nodege-container clearfix">';
$clazzNude = "";
if (strlen($cat) > 0) {
  $category = get_category_by_slug($cat);
  echo '<div class="cat-name alignleft"><i class="icon-cate icon-'.substr($cat, 0, strrpos($cat, '_', 0)).'"></i>'.$category->cat_name .'</div>';
  $clazzNude = ' alignright';
}

//echo '<a class="icon-nudege'.$clazzNude .'" href="javascript:Load.loadPost('.$perPage.', \''.$catName.'\');"></a>';
echo '<a class="icon-nudege'.$clazzNude .'" href="javascript:Load.nextPage();">';
echo '<i class="text-nude"></i>';
echo '</a>';
echo '</div>';

echo '<div class="container">';
$nextPost = '';
$the_query = new WP_Query( $strQuery );
$size = $the_query->found_posts;
$index = $size > 11 ? rand(0, 11) : rand(0, $size - 1);
/*
if($size > 12) {
  $index = rand(0, 12);
} else {
  $index = rand(0, $size);
}
*/

	// The Loop
	if ( $the_query->have_posts() ) {

		// have post
		echo '<ul class="posts-container clearfix">';
		$hasNext = 1;
		$i = 0;
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
      <div class="post-info" data-link="<?php echo site_url(); ?>/?post=<?php echo get_the_ID(); ?>">
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
          <img src="<?php echo $full_img[0] ?>" height="230px" width="230px"/>
        </div>
<?php
}

?>
        <div class="post-title <?php echo ($hasThum === true) ? 'thumbnail' : 'no-thumbnail'; ?>" style="<?php echo $sizeH .$ptop .$background;?>">
          <div style="<?php echo $color; ?>" class="title"><?php the_title(); ?></div>
          <div style="<?php echo $color; ?>" class="excerpt"><?php ($hasThum === true) ? the_excerpt_max_charlength(25) : the_excerpt(); ?></div>
          <div class="<?php echo $pIconOpen; ?>">
            <img src="<?php echo site_url(); ?>/wp-content/themes/twentythirteen/images/mini-open-<?php echo $img_open;?>.png"/>
          </div>
        </div>
      </div>
			<div class="the-social clearfix">
				<div style="padding: 2px 5px 0px 5px;">
					<a class="share fb" href="javascript:;"
						data-name="<?php the_title(); ?>"
						data-link="<?php echo site_url(); ?>/?post=<?php echo get_the_ID(); ?>"
						<?php if (!empty($full_img)):?>
						data-pic="<?php echo $full_img[0] ?>"
						<?php endif; ?>
						data-desc="<?php echo strip_tags(get_the_excerpt());?>"
					><img src="<?php echo site_url(); ?>/wp-content/themes/twentythirteen/images/fb-icon-24x24.png" height="24px"/></a>
					<a class="share"
						href="https://twitter.com/intent/tweet?url=<?php echo urlencode(site_url().'/?post='.get_the_ID());?>&text=<?php echo urlencode(get_the_title());?>"
						target="_blank"
						style="margin-left:-3px;"><img src="<?php echo site_url(); ?>/wp-content/themes/twentythirteen/images/wr-icon-24x24.png" height="24px"/></a>
				</div>
			</div>
		</li>
<?php
   // social_update
    if(strlen($social_update) > 0 && $i === $index) {
      echo "<li class=\"post-item social_update clearfix\" data-index=\"". $i ."\" id=\"social_update\">";
      echo "<div class=\"social_update_text\"><a href='http://better-this.com'>". $social_update ."</a></div>";
      echo "</li>";
    }
    $i = $i + 1;


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

<div class="info-content" id="what-info" style="display:none">
  <div style="position: relative">
    <div class="close-what"></div>
    <div class="content-what">
      <div class="what">WHAT</div>
      <div class="content">Better This is what 4 guys wanted in their lives, but couldn't find on the supermarket shelves.
       They were in search of a healthier lifestyle without the drama. And that's when it hit them. There must be more like them.
       Good, honest, hardworking citizens of DreamVille who de served something better, since the best out there just wasn't cutting it.
       And thats when they decided to create a drink loaded with functional benefits from natural ingredients minus the extra sugar and preservatives.<br/>
       Look, we're not promising you the world in a bottle but we will say this: Better This is the single most awesome combination of the healthiest fruits with a purpose to give you a better lifestyle choice.<br/>
       - See more at: <a href="http://better-this.com">BETTER-THIS.COM</a></div>
    </div>
  </div>
</div>

<div class="say-here" id="say-here" style="display:none">
  <div style="position: relative">
    <div class="close-say"></div>
    <div class="content-say">
      <div class="say">SAY IT HERE</div>
      <div class="content">
        <div>TELL US A STORY</div>
        <div>GIVE US A FEEDBACK</div>

<form action="<?php echo site_url(); ?>/" method="post" class="wpcf7-form sayFrom" >
<div style="display: none;">
<input type="hidden" name="_wpcf7" value="26"><br>
<input type="hidden" name="_wpcf7_version" value="3.5.3"><br>
<input type="hidden" name="_wpcf7_locale" value="en_US"><br>
<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f26-p88-o1"><br>
<input type="hidden" name="_wpcf7_is_ajax_call" value="1"><br>
<input type="hidden" name="_wpnonce" value="5db32a1a0b">
</div>
<div class="colgroup"><span class="wpcf7-form-control-wrap your-message">
  <textarea name="your-message" class="wpcf7-form-control wpcf7-textarea" required="required"></textarea></span>
</div>
<div class="colgroup" style="text-align:right;"><span style="padding-right: 10px">NAME</span><span class=""><span class="wpcf7-form-control-wrap your-name"><input required="required" type="text" name="your-name" value="" size="40" class="text wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true"></span> </span> </div>
<div class="colgroup" style="text-align:right;"><span style="padding-right: 10px">EMAIL ADDRESS</span><span class=""><span class="wpcf7-form-control-wrap your-email"><input required="required" type="email" name="your-email" value="" size="40" class="text wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true"></span> </span></div>
<div class="colgroup">
  <input type="submit" value="SUBMIT" class="submit"/>
</div>

</form>
      </div>
    </div>
  </div>
</div>

<div class="get-glued" id="get-glued" style="display:none">
  <div style="position: relative">
    <div class="close-glued"></div>
    <div class="content-glued">
      <div class="glued">GET GLUED.</div>
      <div class="content">
        <div>SUBSCRIBE TO THE MOST AWESOME BLOG ABOUT YOU.</div>
		<div>Subscribe and win a fitnessFirst membership.</div>
        <div style="height: 40px"></div>
<form action="<?php echo site_url(); ?>/glued/#wpcf7-f348-p349-o1" method="post" class="wpcf7-form glued">
<div style="display: none;">
  <input type="hidden" name="_wpcf7" value="348"><br>
  <input type="hidden" name="_wpcf7_version" value="3.5.3"><br>
  <input type="hidden" name="_wpcf7_locale" value="en_US"><br>
  <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f348-p349-o1"><br>
  <input type="hidden" name="_wpnonce" value="c5f56263fb">
</div>
<div class="colgroup" style="text-align:right;"><span style="padding-right: 10px">NAME</span><span class=""><span class="wpcf7-form-control-wrap your-name"><input required="required" type="text" name="your-name" value="" size="40" class="text wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true"></span> </span> </div>
<div class="colgroup" style="text-align:right;"><span style="padding-right: 10px">EMAIL ADDRESS</span><span class=""><span class="wpcf7-form-control-wrap your-email"><input required="required" type="email" name="your-email" value="" size="40" class="text wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true"></span> </span></div>
<div class="colgroup">
  <input type="submit" value="SUBMIT" class="submit"/>
</div>

</form>
      </div>
    </div>
  </div>
</div>

<?php new_footer(); ?>
