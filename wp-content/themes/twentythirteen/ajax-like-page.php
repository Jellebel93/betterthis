<?php 
/* Template Name: ajax-like-page  */ 
?>

<?php 
	
    $status = $_GET['satus'];  // get the hits from AJAX and save it for PHP  
	$hits = (int) get_post_meta(2, 'like_page', true);
	$st = "";
	$response = "";
	$response["status"] = "liked";
	$response["hit"] = "";
	if($status=='liked') {
		$newhits = $hits + 1;
		$st=1;
	} elseif($status=='unliked') {
		$newhits = $hits - 1;
	}
	else {
		echo "";
		exit();
	}
	
	$response["hit"] = $newhits;
	update_post_meta(2, 'like_page', $newhits);
    
	if ($st) {
		$response["status"] = "unliked";
	}
    
    
	echo json_encode($response);
?>