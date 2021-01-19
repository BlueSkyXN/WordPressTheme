<?php
/**
 * Two Columns widget.
 *
 * @package    zazhi-1
 * @author     Zhutibaba
 * @copyright  Copyright (c) 2017, Zhutibaba
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class zazhi_1_Block_Two_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget-zazhi-1-home-two-columns',
			'description' => __( '只能添加到“首页内容(栏目)”', 'zazhi-1' )
		);

		// Create the widget.
		parent::__construct(
			'zhutibaba-home-two-columns',         // $this->id_base
			__( '&raquo; 首页内容 - 2个栏目', 'zazhi-1' ), // $this->name
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

			echo '<div class="content-block content-block-2 clear">';

				// Column first post
				zazhi_1_home_posts_first( $args, $instance );

				// Column first post
				zazhi_1_home_posts_second( $args, $instance );

			echo '</div><!-- .content-block-2 -->';

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

		$instance['limit']   = (int) $new_instance['limit'];
		$instance['cat']     = $new_instance['cat'];
		$instance['cat_2']   = $new_instance['cat_2'];

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
			'limit'   => 4,
			'cat'     => '',
			'cat_2'   => ''
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'cat' ); ?>"><?php _e( '选择一个分类目录（第一列）', 'zazhi-1' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'cat' ); ?>" name="<?php echo $this->get_field_name( 'cat' ); ?>" style="width:100%;">
				<?php $categories = get_terms( 'category' ); ?>
				<option value="0"><?php _e( '所有分类目录 &hellip;', 'zazhi-1' ); ?></option>
				<?php foreach( $categories as $category ) { ?>
					<option value="<?php echo esc_attr( $category->term_id ); ?>" <?php selected( $instance['cat'], $category->term_id ); ?>><?php echo esc_html( $category->name ); ?></option>
				<?php } ?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'cat_2' ); ?>"><?php _e( '选择一个分类目录（第二列）', 'zazhi-1' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'cat_2' ); ?>" name="<?php echo $this->get_field_name( 'cat_2' ); ?>" style="width:100%;">
				<?php $categories_2 = get_terms( 'category' ); ?>
				<option value="0"><?php _e( '所有分类目录 &hellip;', 'zazhi-1' ); ?></option>
				<?php foreach( $categories_2 as $category_2 ) { ?>
					<option value="<?php echo esc_attr( $category_2->term_id ); ?>" <?php selected( $instance['cat_2'], $category_2->term_id ); ?>><?php echo esc_html( $category_2->name ); ?></option>
				<?php } ?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'limit' ); ?>">
				<?php _e( '每个分类目录要显示的文章数', 'zazhi-1' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="number" step="1" min="0" value="<?php echo (int)( $instance['limit'] ); ?>" />
		</p>

	<?php

	}

}

/**
 * Column first posts
 */
function zazhi_1_home_posts_first( $args, $instance ) {

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

		<div class="block-left">

			<?php require trailingslashit( get_template_directory() ) . 'template-parts/block-two-content.php';?>

		</div><!-- .block-left -->		

	<?php endif;

	wp_reset_query();
	wp_reset_postdata();
}

/**
 * Column second posts
 */
function zazhi_1_home_posts_second( $args, $instance ) {

	// Theme prefix
	$prefix = 'zazhi-1-';

	// Pull the selected category.
	$cat_id = isset( $instance['cat_2'] ) ? absint( $instance['cat_2'] ) : 0;

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
			'posts_per_page' => ( ! empty( $instance['limit'] ) ) ? absint( $instance['limit'] ) : 4,
			'post__not_in' => get_option( 'sticky_posts' ),
			'cat' => $cat_id
		);  

		global $wp_query;

		$merged_query_args = array_merge( $wp_query->query, $args );

		query_posts( $merged_query_args );

		$i = 1;

		if ( $wp_query->have_posts() ) : ?>

		<div class="block-right">

			<?php require trailingslashit( get_template_directory() ) . 'template-parts/block-two-content.php';?>

		</div><!-- .block-right -->	

	<?php endif;

	wp_reset_query();
	wp_reset_postdata();

}
