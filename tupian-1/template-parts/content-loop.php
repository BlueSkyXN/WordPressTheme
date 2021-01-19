<div id="post-<?php the_ID(); ?>" <?php post_class('ht_grid_1_3'); ?>>	

	<a class="thumbnail-link" href="<?php the_permalink(); ?>">
		<div class="thumbnail-wrap">
			<?php if( has_post_thumbnail() ) { ?>
				<?php 
					the_post_thumbnail('post_thumb'); 
				?>
			<?php } else { ?>
				<?php if( get_theme_mod('timthumb-on', false) == true ) : ?>
				<img src="<?php echo get_template_directory_uri();?>/thumb.php?src=<?php echo catch_that_image(); ?>&w=365&h=220" alt="<?php the_title(); ?>"/>
				<?php endif; ?>
			<?php } ?>
		</div><!-- .thumbnail-wrap -->
	</a>

	<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	
	<?php if ( get_theme_mod('loop-excerpt-on', true) == true ) : ?>

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

	<?php endif; ?>

	<?php get_template_part( 'template-parts/entry', 'meta' ); ?>
	
</div><!-- #post-<?php the_ID(); ?> -->