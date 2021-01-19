<?php $class = ( $wp_query->current_post + 1 === $wp_query->post_count ) ? 'clear last' : 'clear'; ?>

<div id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>	


	<?php if ( (get_theme_mod('loop-featured-on', true) == true) && (strpos($post->post_content,'[gallery') === false) ) { ?>

		<a class="thumbnail-link" href="<?php the_permalink(); ?>">
			<div class="thumbnail-wrap">
				<?php if( has_post_thumbnail() ) { ?>
					<?php 
						the_post_thumbnail('boke_2_list_thumb'); 
					?>
				<?php } else { ?>
					<img src="<?php echo get_template_directory_uri();?>/thumb.php?src=<?php echo catch_that_image(); ?>&w=243&h=156" alt="<?php the_title(); ?>"/>
				<?php } ?>
			</div><!-- .thumbnail-wrap -->
		</a>

	<?php } ?>

	<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	
	<div class="entry-overview 	<?php if ( strpos($post->post_content,'[gallery') !== false ) { echo 'block-div'; } ?>">

		<?php if ( (get_theme_mod('loop-featured-on', true) == true) && (strpos($post->post_content,'[gallery') !== false) ) { ?>

			<ul class="gallery-list">
			    <?php /* Time to create a new loop that pulls out  the first 3 image attachments for this post */
			    $args = array( 'post_type' => 'attachment', 'numberposts' => 3, 'post_status' => null, 'post_parent' => $post->ID );
			    $attachments = get_posts( $args );
			    if ( $attachments ) {
			        foreach ( $attachments as $attachment ) {
			            $image_attributes = wp_get_attachment_image_src( $attachment->ID, 'boke_2_list_thumb' );
			            echo '<li class="ht_fixed_grid_1_3"><a class="thumb" href="';
			            the_permalink();
			            echo '">';
			            echo wp_get_attachment_image( $attachment->ID, 'boke_2_list_thumb' );
			            echo '</a></li>'; 
			        }
			       
			    } ?>
	 		</ul>

		<?php } ?>


		<?php if ( (strpos($post->post_content,'[gallery') === false) && (get_theme_mod('loop-excerpt-on', true) == true )) : ?>

			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

		<?php endif; ?>

	<?php get_template_part( 'template-parts/entry', 'meta' ); ?>
			
	</div><!-- .entry-overview -->

</div><!-- #post-<?php the_ID(); ?> -->