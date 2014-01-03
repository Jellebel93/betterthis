<?php 
/* Template Name: ajax-load-post  */ 
?>

<?php 

 $data = "{posts:[]}";
$cat = "";
$size= 16;
if(isset($_REQUEST['cats'])) {
	$cat = $_REQUEST['cats'];
}
if(isset($_REQUEST['size'])) {
	$size = $_REQUEST['size'];
}

  $data = "{posts:[], size:'".$size."', cate:'".$cat."'}";

  $strQuery = array( 'posts_per_page' => $size, 'offset' => 0, 'category_name' => $cat, 'orderby' => 'rand' );
  $the_query = new WP_Query( $strQuery );
  
  // The Loop
	if ( $the_query->have_posts() ) {
		// have post
    $posts = "";
		while ( $the_query->have_posts() ) {
      if(strlen($posts) > 0) {
         $posts .= ",";
      }
      
			$the_query->the_post();
      $post = "\"id\": \"".get_the_ID()."\"";
      if(has_post_thumbnail( get_the_ID() ) === true) {
        $full_img = array();
        $full_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail'); 
        $post .= ", \"img\":\"".$full_img[0]."\"";
      }
      $post .= ", \"title\":\"".get_the_title()."\"";
      $post .= ", \"excerpt\":\"".(($hasThum === true) ? get_excerpt_max_charlength(25) : get_the_excerpt())."\"";
      
      $posts .= "{" . $post . "}";
		}
    
    $data = "{\"posts\":[".$posts."], \"size\":\"".$size."\", \"cate\":\"".$cat."\"}";
	}
  
  
  
  wp_reset_postdata();
  
  header("HTTP/1.1 200 OK");
  header("Content-Type:application/json");
  echo $data;
  exit;
?>
