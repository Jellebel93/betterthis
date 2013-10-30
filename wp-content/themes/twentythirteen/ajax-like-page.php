<?php 
/* Template Name: ajax-like-page  */ 
?>

<?php 
	
    $postid = $_GET['PostId'];  // get the hits from AJAX and save it for PHP  
	
    $hits = (int) get_post_meta($postid, 'like_page', true);
    $newhits = $hits + 1;
    update_post_meta($postid, 'like_page', $newhits);
	echo $newhits;
?>