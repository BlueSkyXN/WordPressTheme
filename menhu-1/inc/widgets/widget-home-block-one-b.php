<?php
/**
 * Home block one widget.
 *
 * @package    menhu-1
 * @author     Zhutibaba
 * @copyright  Copyright (c) 2017, Zhutibaba
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class menhu_1_Block_One_B_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget-menhu-1-home-block-one-b',
			'description' => __( '只能添加到“首页内容(栏目)”', 'menhu-1' )
		);

		// Create the widget.
		parent::__construct(
			'zhutibaba-home-block-one-b',          // $this->id_base
			__( '&raquo; 首页内容 - 1个栏目(图片模式)', 'menhu-1' ), // $this->name
			$widget_options                    // $this->widget_options
		);
	}

	/**
	 * Outputs the widget based on the arguments input through the widget controls.
	 *
	 * @since 1.0.0
	 */
	function widget( $args, $instance ) {
		extract( $args );

		// Output the theme's $before_widget wrapper.
		echo $before_widget;

			// Theme prefix
			$prefix = 'menhu-1-';

			// Pull the selected category.
			$cat_id = isset( $instance['cat'] ) ? absint( $instance['cat'] ) : 0;

			// Get the category.
			$category = get_category( $cat_id );

			// Get the category archive link.
			$cat_link = get_category_link( $cat_id );

			// Limit to category based on user selected tag.
			if ( ! $cat_id == 0 ) {
				$args['cat'] = $cat_id;
			}

 ?>

				<div class="content-block content-block-square clear">

					<div class="section-heading">

					<?php
						if ( ( ! empty( $instance['title'] ) ) && ( $cat_id != 0 ) ) {
							echo '<h3 class="section-title"><a target="_blank" href="' . esc_url( $cat_link ) . '">' . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . '</a></h3>';
						} elseif ( $cat_id == 0 ) {
							echo '<h3 class="section-title"><span>' . __( '最新文章', 'menhu-1' ) . '</span></h3>';
						} else {
							echo '<h3 class="section-title"><a target="_blank" href="' . esc_url( $cat_link ) . '">' . esc_attr( $category->name ) . '</a></h3>';
						}
					?>
					<ul class="section-more">

						<?php if ( ( ! empty( $instance['text1'] ) ) && ( ! empty( $instance['link1'] ) ) ) { ?>
						<li><a href="<?php echo esc_url($instance['link1']); ?>" target="_blank"><?php echo esc_html($instance['text1']); ?></a></li>
						<?php } ?>

						<?php if ( ( ! empty( $instance['text2'] ) ) && ( ! empty( $instance['link2'] ) ) ) { ?>
						<li><a href="<?php echo esc_url($instance['link2']); ?>" target="_blank"><?php echo esc_html($instance['text2']); ?></a></li>
						<?php } ?>

						<?php if ( ( ! empty( $instance['text3'] ) ) && ( ! empty( $instance['link3'] ) ) ) { ?>
						<li><a href="<?php echo esc_url($instance['link3']); ?>" target="_blank"><?php echo esc_html($instance['text3']); ?></a></li>
						<?php } ?>
					</ul>

					</div><!-- .section-heading -->			
					<div class="block-loop clear">

					<?php

						// Define custom query args
						$args = array( 
							'post_type'      => 'post',
							'posts_per_page' => ( ! empty( $instance['limit'] ) ) ? absint( $instance['limit'] ) : 8,
							//'posts_per_page' => 4,
							'post__not_in' => get_option( 'sticky_posts' ),
							'cat' => $cat_id
						);  

						global $wp_query;

						$merged_query_args = array_merge( $wp_query->query, $args );

						query_posts( $merged_query_args );

						$i = 1;

						if ( $wp_query->have_posts() ) :

						while ( $wp_query->have_posts() ) : $wp_query->the_post(); 

						//if ($i < 5) { 
					?>

					<div class="ht_grid_1_4 hentry">

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

					<?php 
						//}
						$i++;
						endwhile; 
					?>

				</div>
				</div><!-- .content-block-1 -->

			<?php 
			endif;
			wp_reset_query();
			wp_reset_postdata();

		// Close the theme's widget wrapper.
		echo $after_widget;

	}

	/**
	 * Updates the widget control options for the particular instance of the widget.
	 *
	 * @since 1.0.0
	 */
	function update( $new_instance, $old_instance ) {

		$instance = $new_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['limit'] = (int) $new_instance['limit'];
		$instance['cat']   = (int) $new_instance['cat'];
		$instance['text1']   = strip_tags( $new_instance['text1'] );
		$instance['text2']   = strip_tags( $new_instance['text2'] );
		$instance['text3']   = strip_tags( $new_instance['text3'] );
		$instance['link1']   = strip_tags( $new_instance['link1'] );
		$instance['link2']   = strip_tags( $new_instance['link2'] );
		$instance['link3']   = strip_tags( $new_instance['link3'] );

		return $instance;
	}

	/**
	 * Displays the widget control options in the Widgets admin screen.
	 *
	 * @since 1.0.0
	 */
	function form( $instance ) {

		// Default value.
		$defaults = array(
			'title' => '',
			'limit' => 8,
			'cat'   => '',
			'text1' => '',
			'text2' => '',
			'text3' => '',
			'link1' => '',
			'link2' => '',
			'link3' => ''
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( '标题', 'menhu-1' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'cat' ); ?>"><?php _e( '选择一个分类目录', 'menhu-1' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'cat' ); ?>" name="<?php echo $this->get_field_name( 'cat' ); ?>" style="width:100%;">
				<?php $categories = get_terms( 'category' ); ?>
				<option value="0"><?php _e( '所有分类目录 &hellip;', 'menhu-1' ); ?></option>
				<?php foreach( $categories as $category ) { ?>
					<option value="<?php echo esc_attr( $category->term_id ); ?>" <?php selected( $instance['cat'], $category->term_id ); ?>><?php echo esc_html( $category->name ); ?></option>
				<?php } ?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'limit' ); ?>">
				<?php _e( '要显示的文章数', 'menhu-1' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="number" step="1" min="0" value="<?php echo (int)( $instance['limit'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'text1' ); ?>">
				<?php _e( '子菜单标题 1', 'menhu-1' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'text1' ); ?>" name="<?php echo $this->get_field_name( 'text1' ); ?>" value="<?php echo esc_attr( $instance['text1'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'link1' ); ?>">
				<?php _e( '链接地址 1', 'menhu-1' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'link1' ); ?>" name="<?php echo $this->get_field_name( 'link1' ); ?>" value="<?php echo esc_attr( $instance['link1'] ); ?>" placeholder="http://"/>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'text2' ); ?>">
				<?php _e( '子菜单标题 2', 'menhu-1' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'text2' ); ?>" name="<?php echo $this->get_field_name( 'text2' ); ?>" value="<?php echo esc_attr( $instance['text2'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'link2' ); ?>">
				<?php _e( '链接地址 2', 'menhu-1' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'link2' ); ?>" name="<?php echo $this->get_field_name( 'link2' ); ?>" value="<?php echo esc_attr( $instance['link2'] ); ?>" placeholder="http://" />
		</p>	

		<p>
			<label for="<?php echo $this->get_field_id( 'text3' ); ?>">
				<?php _e( '子菜单标题 3', 'menhu-1' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'text3' ); ?>" name="<?php echo $this->get_field_name( 'text3' ); ?>" value="<?php echo esc_attr( $instance['text3'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'link3' ); ?>">
				<?php _e( '链接地址 3', 'menhu-1' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'link3' ); ?>" name="<?php echo $this->get_field_name( 'link3' ); ?>" value="<?php echo esc_attr( $instance['link3'] ); ?>" placeholder="http://"/>
		</p>										

	<?php

	}

}

/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since 1.0.0
 */
function menhu_1_home_one_column_b_meta() {

	// Set up empty html
	$html = '';

	// Open wrapper
	$html = '<div class="entry-meta">';
		$category = get_the_category( get_the_ID() );
		if ( $category && menhu_1_categorized_blog() ) {
			$html .= '<span class="entry-category">' . esc_attr( $category[0]->name ) . '</span>';
		}
		$html .= ' <span class="sep">|</span> ';
		$html .= '<span class="entry-date"><time class="published" datetime="' . esc_html( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date() ) . '</time></span>';
	$html .= '</div>';

	return $html;

}