<?php $class = ( $wp_query->current_post + 1 === $wp_query->post_count ) ? 'ht_grid_1_3 last' : 'ht_grid_1_3'; ?>

<div id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>	

<a class="thumbnail-link" href="<?php the_permalink(); ?>" target="_blank">

	<?php if (get_theme_mod('loop-featured-on', true) == true) { ?>

		<div class="thumbnail-wrap">

			<?php if( has_post_thumbnail() ) { ?>
				<?php 
					the_post_thumbnail('post_thumb');
				?>
			<?php } else { ?>
				<img src="<?php echo get_template_directory_uri();?>/thumb.php?src=<?php echo catch_that_image(); ?>&w=300&h=180" alt="<?php the_title(); ?>"/>
			<?php } ?>

		</div><!-- .thumbnail-wrap -->

	<?php } ?>

	<div class="entry-header">

		<h2 class="entry-title"><?php the_title(); ?></h2>
		
	</div><!-- .entry-header -->

</a>

</div><!-- #post-<?php the_ID(); ?> -->