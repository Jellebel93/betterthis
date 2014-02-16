<?php 
/* Template Name: slider-template  */
/* Mailto: duytucntt@gmail.com  */ 
?>

<div class="active">
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
        $pad="";
        if($isFirst === true)  {$active = " active_slide"; $pad="padding-left: 0px;"; $isFirst = false;}
        else {$active = "";}
?>
      <div class="jAccordion-slide<?php echo $active; ?>" style="position: absolute;" id="post<?php echo $the_ID; ?>">
        <div class="jAccordion-slideWrapper" style="position: relative; filter: inherit; <?php echo $pad; ?>">
          <a href="http://betterthis.tv/?post=<?php echo $the_ID; ?>">
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
</div>

