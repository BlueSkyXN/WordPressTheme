<div id="post-<?php the_ID(); ?>" <?php post_class('ht_grid_1_3'); ?>>	

	<?php if ( has_post_thumbnail() ) { ?>
		<a class="thumbnail-link" href="<?php the_permalink(); ?>">
			<div class="thumbnail-wrap">
				<?php 
					the_post_thumbnail('post_thumb'); 
				?>
			</div><!-- .thumbnail-wrap -->
		</a>
	<?php } ?>

	<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	
	<?php if ( get_theme_mod('entry-excerpt-on', false) ) : ?>

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

	<?php endif; ?>

	<?php get_template_part( 'template-parts/entry', 'meta' ); ?>
	
</div><!-- #post-<?php the_ID(); ?> -->