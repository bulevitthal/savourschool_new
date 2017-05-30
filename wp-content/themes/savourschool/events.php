<?php // - standalone json feed -
 
header('Content-Type:application/json');

// - grab wp load, wherever it's hiding -
if(file_exists('../../../../wp-load.php')) :
    include '../../../../wp-load.php';
else:
    include 'wp-load.php';
endif;
 
global $wpdb;
// List of events
 $json = array();


 $args = array(
	'post_type' => 'class',
	'post_status' => 'publish',
	'posts_per_page' => -1,
);

 $the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
	
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo "<pre>";
		echo get_the_title();
		echo "</pre>";
	}
	
} else {
	// no posts found
}

 // sending the encoded result to success page
 //echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));


?>