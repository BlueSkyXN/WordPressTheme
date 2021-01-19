<div class="home-latest">

<?php
// Posts query arguments.

if (get_theme_mod('home-latest-style', 'choice-1') == 'choice-2') {

	$custom_query_args = array(
		'post_type'      => 'post',
		'posts_per_page' => get_theme_mod('home-latest-num', '15'),
		'post__not_in' => get_option( 'sticky_posts' ),
		'meta_query' => array(
			array(
			    'key'   => 'is_featured',
			    'value' => 'true'
				)
			)	
	);	

} else {

	$custom_query_args = array(
		'post_type'      => 'post',
		'posts_per_page' => get_theme_mod('home-latest-num', '15'),
		'post__not_in' => get_option( 'sticky_posts' ),
	);		

}
// globalize $wp_query
global $wp_query;
// Merge custom args with default query args
$merged_query_args = array_merge( $wp_query->query, $custom_query_args );
// process the query
query_posts( $merged_query_args );

if ( $wp_query->have_posts() ) :	
	
	$i = 1;
	
	echo "<ul>";

	while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

		<li><a href="<?php the_permalink(); ?>" target="_blank"><?php menhu_1_custom_title(); ?></a></li>

<?php 
	$i++;
	endwhile; 

	echo "</ul>";

	endif;
	wp_reset_query();
	wp_reset_postdata(); 
?>

</div>