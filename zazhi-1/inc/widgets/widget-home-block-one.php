<?php
/**
 * Home block one widget.
 *
 * @package    zazhi-1
 * @author     Zhutibaba
 * @copyright  Copyright (c) 2017, Zhutibaba
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class zazhi_1_Block_One_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget-zazhi-1-home-block-one',
			'description' => __( '只能添加到“首页内容(栏目)”', 'zazhi-1' )
		);

		// Create the widget.
		parent::__construct(
			'zhutibaba-home-block-one',          // $this->id_base
			__( '&raquo; 首页内容 - 1个栏目（A）', 'zazhi-1' ), // $this->name
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
			$prefix = 'zazhi-1-';

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

			// Define custom query args
			$args = array( 
				'post_type'      => 'post',
				'posts_per_page' => ( ! empty( $instance['limit'] ) ) ? absint( $instance['limit'] ) : 5,
				'post__not_in' => get_option( 'sticky_posts' ),
				'cat' => $cat_id
			);  

			global $wp_query;

			$merged_query_args = array_merge( $wp_query->query, $args );

			query_posts( $merged_query_args );

			$i = 1;

			if ( $wp_query->have_posts() ) : ?>

				<div class="content-block content-block-1 clear">

					<?php require trailingslashit( get_template_directory() ) . 'template-parts/block-one-content.php';?>

				</div><!-- .content-block-1 -->

			<?php endif;

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
			'limit' => 5,
			'cat'   => ''
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( '标题', 'zazhi-1' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'cat' ); ?>"><?php _e( '选择一个分类目录', 'zazhi-1' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'cat' ); ?>" name="<?php echo $this->get_field_name( 'cat' ); ?>" style="width:100%;">
				<?php $categories = get_terms( 'category' ); ?>
				<option value="0"><?php _e( '所有分类目录 &hellip;', 'zazhi-1' ); ?></option>
				<?php foreach( $categories as $category ) { ?>
					<option value="<?php echo esc_attr( $category->term_id ); ?>" <?php selected( $instance['cat'], $category->term_id ); ?>><?php echo esc_html( $category->name ); ?></option>
				<?php } ?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'limit' ); ?>">
				<?php _e( '要显示的文章数', 'zazhi-1' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="number" step="1" min="0" value="<?php echo (int)( $instance['limit'] ); ?>" />
		</p>		

	<?php

	}

}

/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since 1.0.0
 */
function zazhi_1_home_one_column_meta() {

	// Set up empty html
	$html = '';

	// Open wrapper
	$html = '<div class="entry-meta">';
		$category = get_the_category( get_the_ID() );
		if ( $category && zazhi_1_categorized_blog() ) {
			$html .= '<span class="entry-category">' . esc_attr( $category[0]->name ) . '</span>';
		}
		$html .= ' <span class="sep">|</span> ';
		$html .= '<span class="entry-date"><time class="published" datetime="' . esc_html( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date() ) . '</time></span>';
	$html .= '</div>';

	return $html;

}