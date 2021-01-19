<div class="section-heading">

<?php
	if ( $cat_id == 0 ) {
		echo '<h3 class="section-title"><span>' . __( '最新文章', 'menhu-1' ) . '</span></h3>';
	} else {
		echo '<h3 class="section-title"><a target="_blank" href="' . esc_url( $cat_link ) . '">' . esc_attr( $category->name ) . '</a></h3>';
	}	
?>

<ul class="section-more">

	<?php if ( ( ! empty( $instance['text2_1'] ) ) && ( ! empty( $instance['link2_1'] ) ) ) { ?>
	<li><a href="<?php echo esc_url($instance['link2_1']); ?>" target="_blank"><?php echo esc_html($instance['text2_1']); ?></a></li>
	<?php } ?>

	<?php if ( ( ! empty( $instance['text2_2'] ) ) && ( ! empty( $instance['link2_2'] ) ) ) { ?>
	<li><a href="<?php echo esc_url($instance['link2_2']); ?>" target="_blank"><?php echo esc_html($instance['text2_2']); ?></a></li>
	<?php } ?>

	<?php if ( ( ! empty( $instance['text2_3'] ) ) && ( ! empty( $instance['link2_3'] ) ) ) { ?>
	<li><a href="<?php echo esc_url($instance['link2_3']); ?>" target="_blank"><?php echo esc_html($instance['text2_3']); ?></a></li>
	<?php } ?>
</ul>

</div><!-- .section-heading -->				

<div class="posts-wrap">

<?php
	// The Loop

	while ( $wp_query->have_posts() ) : $wp_query->the_post();

	if ($i < 3) {
?>	


<div class="post-big hentry">

	<a class="thumbnail-link" href="<?php the_permalink(); ?>" target="_blank">
		<div class="thumbnail-wrap">
			<?php if( has_post_thumbnail() ) { ?>
				<?php 
					the_post_thumbnail('block_large_thumb');
				?>
			<?php } else { ?>
				<img src="<?php echo get_template_directory_uri();?>/thumb.php?src=<?php echo catch_that_image(); ?>&w=187&h=112" alt="<?php the_title(); ?>"/>
			<?php } ?>				
		</div><!-- .thumbnail-wrap -->
	</a>

	<div class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" target="_blank"><?php menhu_1_home_post_title(); ?></a></h2>
	</div><!-- .entry-header -->

</div><!-- .hentry -->

<?php } else { ?>

<div class="post-small hentry clear <?php echo( $wp_query->current_post + 1 === $wp_query->post_count ) ? 'last' : ''; ?>">

	<div class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" target="_blank"><?php menhu_1_custom_title(); ?></a></h2>				
	</div><!-- .entry-header -->

</div><!-- .hentry -->

<?php

	} 

	$i++;
	endwhile;

?>

</div><!-- .posts-wrap -->