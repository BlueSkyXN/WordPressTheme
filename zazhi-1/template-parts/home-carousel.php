<h3 class="section-heading">
	<?php
		if ( $cat_id == 0 ) {
			echo __( '最新文章', 'zazhi-1' );
		} else {
			echo '<a href="' . esc_url( $cat_link ) . '">' . esc_attr( $category->name ) . '</a>';
		}
	?>				
</h3>

<img src="<?php echo get_template_directory_uri();?>/assets/img/ajax-loader.gif" class="ajax-loader" alt="正在加载..."/>

<div class="home-carousel">

<?php
	while ( $wp_query->have_posts() ) : $wp_query->the_post();
?>	

<div class="hentry <?php echo( $posts->current_post + 1 === $posts->post_count ) ? 'last' : ''; ?>">

	<?php if ( has_post_thumbnail() && ( get_the_post_thumbnail() != null ) ) { ?>
		<a class="thumbnail-link" href="<?php the_permalink(); ?>">
			<figure><?php the_post_thumbnail('post_thumb'); ?></figure>
			<span class="gradient"></span>
		</a>
	<?php } else { ?>

		<a class="thumbnail-link" href="<?php the_permalink(); ?>">
			<figure><img src="<?php echo get_template_directory_uri(); ?>/assets/img/block_large_thumb.png" alt="" /></figure>
			<span class="gradient"></span>			
		</a>

	<?php } ?>

	<div class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>						
	</div><!-- .entry-header -->

</div><!-- .hentry -->

<?php
	$i++;
	endwhile;
?>

</div><!-- .home-carousel -->
