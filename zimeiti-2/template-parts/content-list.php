<?php $class = ( $wp_query->current_post + 1 === $wp_query->post_count ) ? 'clear last' : 'clear'; ?>

<div id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>	

	<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

	<?php if ( (get_theme_mod('loop-featured-on', true) == true) && (strpos($post->post_content,'[gallery') === false) ) { ?>

		<a class="thumbnail-link" href="<?php the_permalink(); ?>">
			<div class="thumbnail-wrap">
				<?php if( has_post_thumbnail() ) { ?>
					<?php 
						the_post_thumbnail('zimeiti_2_list_thumb'); 
					?>
				<?php } else { ?>
					<img src="<?php echo get_template_directory_uri();?>/thumb.php?src=<?php echo catch_that_image(); ?>&w=280&h=180" alt="<?php the_title(); ?>"/>
				<?php } ?>
			</div><!-- .thumbnail-wrap -->
		</a>

	<?php } ?>
	
	<div class="entry-overview 	<?php if ( strpos($post->post_content,'[gallery') !== false ) { echo 'block-div'; } ?>">
		
		<div class="entry-meta first-line">

		<?php if( ( get_theme_mod('loop-author-avatar-on', true) == true ) || ( get_theme_mod('loop-author-name-on', true) == true ) ) : ?>

			<span class="entry-author">
				
				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">

					<?php 
						if( get_theme_mod('loop-author-avatar-on', true) == true ) :
							echo get_avatar( get_the_author_meta( 'ID' ), 80 );
						endif; 
					?>

					<?php 
						if( get_theme_mod('loop-author-name-on', true) == true ) : 
							echo get_the_author_meta('nickname'); 
						endif; 
					?>

				</a>

			</span><!-- .entry-author -->

		<?php endif; ?>

		<?php if( get_theme_mod('loop-date-on', true) == true ) : ?>

			<span class="entry-date">
				发布于 <?php echo esc_html(get_the_date()); ?>
			</span><!-- .entry-date -->

		<?php endif; ?>

		</div>

		<?php if ( (get_theme_mod('loop-featured-on', true) == true) && (strpos($post->post_content,'[gallery') !== false) ) { ?>

			<ul class="gallery-list">
			    <?php /* Time to create a new loop that pulls out  the first 3 image attachments for this post */
			    $args = array( 'post_type' => 'attachment', 'numberposts' => 3, 'post_status' => null, 'post_parent' => $post->ID );
			    $attachments = get_posts( $args );
			    if ( $attachments ) {
			        foreach ( $attachments as $attachment ) {
			            $image_attributes = wp_get_attachment_image_src( $attachment->ID, 'zimeiti_2_list_thumb' );
			            echo '<li class="ht_fixed_grid_1_3"><a class="thumb-link" href="';
			            the_permalink();
			            echo '"><div class="thumbnail-wrap">';
			            echo wp_get_attachment_image( $attachment->ID, 'zimeiti_2_list_thumb' );
			            echo '</div></a></li>'; 
			        }
			       
			    } ?>
	 		</ul>

		<?php } ?>


		<?php if ( (strpos($post->post_content,'[gallery') === false) && (get_theme_mod('loop-excerpt-on', true) == true )) : ?>

			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

		<?php endif; ?>
			
	</div><!-- .entry-overview -->

	<?php get_template_part( 'template-parts/entry', 'meta' ); ?>

</div><!-- #post-<?php the_ID(); ?> -->