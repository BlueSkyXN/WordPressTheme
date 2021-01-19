<?php $class = ( $wp_query->current_post + 1 === $wp_query->post_count ) ? 'clear last' : 'clear'; ?>

<div id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>	

	<?php if ( (get_theme_mod('loop-featured-on', true) == true) && (strpos($post->post_content,'[gallery') === false) ) { ?>

		<a class="thumbnail-link" href="<?php the_permalink(); ?>">
			<div class="thumbnail-wrap">
				<?php if( has_post_thumbnail() ) { ?>
					<?php 
						the_post_thumbnail('post_thumb'); 
					?>
				<?php } else { ?>
					<img src="<?php echo get_template_directory_uri();?>/thumb.php?src=<?php echo catch_that_image(); ?>&w=300&h=180" alt="<?php the_title(); ?>"/>
				<?php } ?>
			</div><!-- .thumbnail-wrap -->
		</a>

	<?php } ?>	

	<div class="entry-header">

		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h2>

		<?php get_template_part( 'template-parts/entry', 'meta' ); ?>
		
	</div><!-- .entry-header -->

	<?php if ( (strpos($post->post_content,'[gallery') === false) && (get_theme_mod('loop-excerpt-on', true) == true )) : ?>		
	
	<div class="entry-summary">
		<?php
			if ( has_excerpt() ) {
				the_excerpt();
			} else {
				echo wp_trim_words( get_the_content(), get_theme_mod('loop-excerpt-length', '90'), '...' );
			}
		?>
	</div><!-- .entry-summary -->
	
	<?php endif; ?>

		<?php if ( (get_theme_mod('loop-featured-on', true) == true) && (strpos($post->post_content,'[gallery') !== false) ) { ?>

			<ul class="gallery-list">
			    <?php /* Time to create a new loop that pulls out  the first 3 image attachments for this post */
			    $args = array( 'post_type' => 'attachment', 'numberposts' => 3, 'post_status' => null, 'post_parent' => $post->ID );
			    $attachments = get_posts( $args );
			    if ( $attachments ) {
			        foreach ( $attachments as $attachment ) {
			            $image_attributes = wp_get_attachment_image_src( $attachment->ID, 'post_thumb' );
			            echo '<li class="ht_fixed_grid_1_3"><a target="_blank" class="thumb" href="';
			            the_permalink();
			            echo '">';
			            echo wp_get_attachment_image( $attachment->ID, 'post_thumb' );
			            echo '</a></li>'; 
			        }
			       
			    } ?>
	 		</ul>

		<?php } ?>	

</div><!-- #post-<?php the_ID(); ?> -->