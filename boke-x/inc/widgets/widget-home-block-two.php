<?php
/**
 * Two Columns widget.
 *
 * @package    boke-x
 * @author     Zhutibaba
 * @copyright  Copyright (c) 2017, Zhutibaba
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class boke_x_Block_Two_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget-boke-x-home-two-columns',
			'description' => __( '只能添加到“首页内容(栏目)”', 'boke-x' )
		);

		// Create the widget.
		parent::__construct(
			'zhutibaba-home-two-columns',         // $this->id_base
			__( '&raquo; 首页内容 - 2个栏目', 'boke-x' ), // $this->name
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

			echo '<div class="home-widgets clear">';
?>

<div class="section-header">
<?php if ( !empty( $instance['title'] ) ) { echo '<h2>' . $instance['title'] . '</h2>'; } ?>

<?php if ( !empty( $instance['desc'] ) ) { echo '<span class="desc">' . $instance['desc'] . '</span>'; } ?>
</div>

<span class="section-more">
	<?php if ( ( ! empty( $instance['text'] ) ) && ( ! empty( $instance['link'] ) ) ) { ?>
	<a href="<?php echo esc_url($instance['link']); ?>" target="_blank">全部<?php echo esc_html($instance['text']); ?></a>
	<?php } ?>
</span>

<?php
	echo '<div class="home-widgets-loop">';
				// Column first post
				boke_x_home_posts_first( $args, $instance );

				// Column first post
				boke_x_home_posts_second( $args, $instance );

				boke_x_home_posts_third( $args, $instance );

				boke_x_home_posts_fourth( $args, $instance );

				echo "</div>";
			echo '</div><!-- .home-widgets-loop -->';

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
		$instance['desc']  = strip_tags( $new_instance['desc'] );		
		$instance['link']  = strip_tags( $new_instance['link'] );
		$instance['cat_1'] = $new_instance['cat_1'];
		$instance['cat_2'] = $new_instance['cat_2'];
		$instance['cat_3'] = $new_instance['cat_3'];
		$instance['cat_4'] = $new_instance['cat_4'];		

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
			'desc'  => '',
			'link'  => '',
			'cat_1' => '',
			'cat_2' => '',
			'cat_3' => '',
			'cat_4' => '',					
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( '标题', 'boke-x' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'desc' ); ?>">
				<?php _e( '描述', 'boke-x' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" value="<?php echo esc_attr( $instance['desc'] ); ?>" />
		</p>		
		<p>
			<label for="<?php echo $this->get_field_id( 'link' ); ?>">
				<?php _e( '专题页面链接', 'boke-x' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo esc_attr( $instance['link'] ); ?>" placeholder="http://"/>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'cat_1' ); ?>"><strong><?php _e( '栏目 1: 选择一个分类目录', 'boke-x' ); ?></strong></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'cat_1' ); ?>" name="<?php echo $this->get_field_name( 'cat_1' ); ?>" style="width:100%;">
				<?php $categories = get_terms( 'category' ); ?>
				<option value="0"><?php _e( '所有分类目录 &hellip;', 'boke-x' ); ?></option>
				<?php foreach( $categories as $category ) { ?>
					<option value="<?php echo esc_attr( $category->term_id ); ?>" <?php selected( $instance['cat_1'], $category->term_id ); ?>><?php echo esc_html( $category->name ); ?></option>
				<?php } ?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'cat_2' ); ?>"><strong><?php _e( '栏目 2: 选择一个分类目录', 'boke-x' ); ?></strong></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'cat_2' ); ?>" name="<?php echo $this->get_field_name( 'cat_2' ); ?>" style="width:100%;">
				<?php $categories_2 = get_terms( 'category' ); ?>
				<option value="0"><?php _e( '所有分类目录 &hellip;', 'boke-x' ); ?></option>
				<?php foreach( $categories_2 as $category_2 ) { ?>
					<option value="<?php echo esc_attr( $category_2->term_id ); ?>" <?php selected( $instance['cat_2'], $category_2->term_id ); ?>><?php echo esc_html( $category_2->name ); ?></option>
				<?php } ?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'cat_3' ); ?>"><strong><?php _e( '栏目 3: 选择一个分类目录', 'boke-x' ); ?></strong></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'cat_3' ); ?>" name="<?php echo $this->get_field_name( 'cat_3' ); ?>" style="width:100%;">
				<?php $categories_3 = get_terms( 'category' ); ?>
				<option value="0"><?php _e( '所有分类目录 &hellip;', 'boke-x' ); ?></option>
				<?php foreach( $categories_3 as $category_3 ) { ?>
					<option value="<?php echo esc_attr( $category_3->term_id ); ?>" <?php selected( $instance['cat_3'], $category_3->term_id ); ?>><?php echo esc_html( $category_3->name ); ?></option>
				<?php } ?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'cat_4' ); ?>"><strong><?php _e( '栏目 4: 选择一个分类目录', 'boke-x' ); ?></strong></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'cat_4' ); ?>" name="<?php echo $this->get_field_name( 'cat_4' ); ?>" style="width:100%;">
				<?php $categories_4 = get_terms( 'category' ); ?>
				<option value="0"><?php _e( '所有分类目录 &hellip;', 'boke-x' ); ?></option>
				<?php foreach( $categories_4 as $category_4 ) { ?>
					<option value="<?php echo esc_attr( $category_4->term_id ); ?>" <?php selected( $instance['cat_4'], $category_4->term_id ); ?>><?php echo esc_html( $category_4->name ); ?></option>
				<?php } ?>
			</select>
		</p>				

	<?php

	}

}

/**
 * Column first posts
 */
function boke_x_home_posts_first( $args, $instance ) {

	// Theme prefix
	$prefix = 'boke-x-';

	// Pull the selected category.
	$cat_id = isset( $instance['cat_1'] ) ? absint( $instance['cat_1'] ) : 0;

	// Get the category.
	$category = get_category( $cat_id );

	// Get the category archive link.
	$cat_link = get_category_link( $cat_id );

		// Limit to category based on user selected tag.
		if ( ! $cat_id == 0 ) {
			$args['cat_1'] = $cat_id;
		}

		// Define custom query args
		$args = array( 
			'post_type'      => 'post',
			'cat' => $cat_id
		);  

		global $wp_query;

		$merged_query_args = array_merge( $wp_query->query, $args );

		query_posts( $merged_query_args );

		$i = 1;

		if ( $wp_query->have_posts() ) : ?>

		<div class="widget-category ht_fixed_grid_1_4">
			<a class="thumbnail-link" target="_blank" href="<?php echo esc_url( $cat_link ); ?>">
				<div class="thumbnail-wrap">
					<img src="<?php echo get_template_directory_uri() . '/thumb.php?src=';?><?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url(); ?>&w=300&h=190" alt=""/>
				</div><!-- .thumbnail-wrap -->				
			</a>
			<?php
				if ( $cat_id == 0 ) {
					echo '<h3 class="section-title"><span>' . __( '最新文章', 'boke-x' ) . '</span></h3>';
				} else {
					echo '<h3 class="section-title"><a target="_blank" href="' . esc_url( $cat_link ) . '">' . esc_attr( $category->name ) . '</a></h3>';
				}	
			?>
		</div><!-- .widget-category ht_fixed_grid_1_4 -->		

	<?php endif;

	wp_reset_query();
	wp_reset_postdata();
}

/**
 * Column second posts
 */
function boke_x_home_posts_second( $args, $instance ) {

	// Theme prefix
	$prefix = 'boke-x-';

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
			'cat' => $cat_id
		);  

		global $wp_query;

		$merged_query_args = array_merge( $wp_query->query, $args );

		query_posts( $merged_query_args );

		$i = 1;

		if ( $wp_query->have_posts() ) : ?>

		<div class="widget-category ht_fixed_grid_1_4">
			<a class="thumbnail-link" target="_blank" href="<?php echo esc_url( $cat_link ); ?>">
				<div class="thumbnail-wrap">
					<img src="<?php echo get_template_directory_uri() . '/thumb.php?src=';?><?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url(); ?>&w=300&h=190" alt=""/>
				</div><!-- .thumbnail-wrap -->				
			</a>			
			<?php
				if ( $cat_id == 0 ) {
					echo '<h3 class="section-title"><span>' . __( '最新文章', 'boke-x' ) . '</span></h3>';
				} else {
					echo '<h3 class="section-title"><a target="_blank" href="' . esc_url( $cat_link ) . '">' . esc_attr( $category->name ) . '</a></h3>';
				}	
			?>
		</div><!-- .widget-category ht_fixed_grid_1_4 -->		

	<?php endif;

	wp_reset_query();
	wp_reset_postdata();
}

/**
 * Column second posts
 */
function boke_x_home_posts_third( $args, $instance ) {

	// Theme prefix
	$prefix = 'boke-x-';

	// Pull the selected category.
	$cat_id = isset( $instance['cat_3'] ) ? absint( $instance['cat_3'] ) : 0;

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
			'cat' => $cat_id
		);  

		global $wp_query;

		$merged_query_args = array_merge( $wp_query->query, $args );

		query_posts( $merged_query_args );

		$i = 1;

		if ( $wp_query->have_posts() ) : ?>

		<div class="widget-category ht_fixed_grid_1_4">
			<a class="thumbnail-link" target="_blank" href="<?php echo esc_url( $cat_link ); ?>">
				<div class="thumbnail-wrap">
					<img src="<?php echo get_template_directory_uri() . '/thumb.php?src=';?><?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url(); ?>&w=300&h=190" alt=""/>
				</div><!-- .thumbnail-wrap -->
			</a>			
			<?php
				if ( $cat_id == 0 ) {
					echo '<h3 class="section-title"><span>' . __( '最新文章', 'boke-x' ) . '</span></h3>';
				} else {
					echo '<h3 class="section-title"><a target="_blank" href="' . esc_url( $cat_link ) . '">' . esc_attr( $category->name ) . '</a></h3>';
				}	
			?>
		</div><!-- .widget-category ht_fixed_grid_1_4 -->		

	<?php endif;

	wp_reset_query();
	wp_reset_postdata();
}

/**
 * Column second posts
 */
function boke_x_home_posts_fourth( $args, $instance ) {

	// Theme prefix
	$prefix = 'boke-x-';

	// Pull the selected category.
	$cat_id = isset( $instance['cat_4'] ) ? absint( $instance['cat_4'] ) : 0;

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
			'cat' => $cat_id
		);  

		global $wp_query;

		$merged_query_args = array_merge( $wp_query->query, $args );

		query_posts( $merged_query_args );

		$i = 1;

		if ( $wp_query->have_posts() ) : ?>

		<div class="widget-category ht_fixed_grid_1_4">
			<a class="thumbnail-link" target="_blank" href="<?php echo esc_url( $cat_link ); ?>">
				<div class="thumbnail-wrap">
					<img src="<?php echo get_template_directory_uri() . '/thumb.php?src=';?><?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url(); ?>&w=300&h=190" alt=""/>
				</div><!-- .thumbnail-wrap -->				
			</a>			
			<?php
				if ( $cat_id == 0 ) {
					echo '<h3 class="section-title"><span>' . __( '最新文章', 'boke-x' ) . '</span></h3>';
				} else {
					echo '<h3 class="section-title"><a target="_blank" href="' . esc_url( $cat_link ) . '">' . esc_attr( $category->name ) . '</a></h3>';
				}	
			?>
		</div><!-- .widget-category ht_fixed_grid_1_4 -->		

	<?php endif;

	wp_reset_query();
	wp_reset_postdata();
}
