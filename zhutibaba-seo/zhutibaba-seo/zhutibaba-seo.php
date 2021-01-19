<?php
/*
Plugin Name: 主题巴巴 WordPress SEO
Description: 这款SEO插件可以为您的WordPress网站首页、文章页、普通页面、分类目录、标签添加自定义SEO设置选项: 标题(title)、 描述(description)、关键字(keywords）。正确使用该SEO插件可以有效地提升您的WordPress网站在搜索引擎的排名和索引量。
Version: 1.0.2
Author: 主题巴巴
Author URI: https://www.zhutibaba.com
License: GPL
Copyright: 主题巴巴
Text Domain: zhutibaba-seo
*/

include dirname(__FILE__) . '/advanced-custom-fields/acf.php';

define( 'ACF_LITE', true );

/* ACF Custom Fields for post, page and archives */
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_archive_seo',
		'title' => '归档SEO设置',
		'fields' => array (
			array (
				'key' => 'field_5b6e81c2edbf8',
				'label' => '标题 (title)',
				'name' => 'archive_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5b6e81cdedbf9',
				'label' => '描述 (description)',
				'name' => 'archive_description',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '4',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_5b6e81e4edbfa',
				'label' => '关键词 (keywords)',
				'name' => 'archive_keywords',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_type',
					'operator' => '==',
					'value' => 'front_page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'all',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_post_seo',
		'title' => '文章SEO设置',
		'fields' => array (
			array (
				'key' => 'field_5b6e906dda24d',
				'label' => '标题 (title)',
				'name' => 'post_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5b8177751723a',
				'label' => '描述 (description)',
				'name' => 'post_description',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 4,
				'formatting' => 'br',
			),
			array (
				'key' => 'field_5b6e9079da24e',
				'label' => '关键词 (keywords)',
				'name' => 'post_keywords',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),			
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_page_seo',
		'title' => '页面SEO设置',
		'fields' => array (
			array (
				'key' => 'field_5b6e8102f5bfd',
				'label' => '标题 (title)',
				'name' => 'page_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5b6e8fa499767',
				'label' => '描述 (description)',
				'name' => 'page_description',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '3',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_5b6e8147f5bff',
				'label' => '关键词 (keywords)',
				'name' => 'page_keywords',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}


/* Custom functions for homepage SEO */
$zhutubaba_seo_general_setting = new zhutubaba_seo_general_setting();

class zhutubaba_seo_general_setting {
    function zhutubaba_seo_general_setting( ) {
        add_filter( 'admin_init' , array( &$this , 'zhutubaba_seo_register_fields' ) );
    }
    function zhutubaba_seo_register_fields() {
        register_setting( 'general', 'custom_site_title', 'esc_attr' );

        register_setting( 'general', 'custom_site_description', 'esc_attr' );

        register_setting( 'general', 'custom_site_keywords', 'esc_attr' );


        add_settings_field('custom_site_title', '<label for="custom_site_title">'.__('首页标题 (title)' , 'custom_site_title' ).'</label>' , array(&$this, 'zhutubaba_seo_fields_html1') , 'general' );
       
        add_settings_field('custom_site_description', '<label for="custom_site_description">'.__('首页描述 (description)' , 'custom_site_description' ).'</label>' , array(&$this, 'zhutubaba_seo_fields_html2') , 'general' );
       
        add_settings_field('custom_site_keywords', '<label for="custom_site_keywords">'.__('首页关键词 (keywords)' , 'custom_site_keywords' ).'</label>' , array(&$this, 'zhutubaba_seo_fields_html3') , 'general' );

    }
    function zhutubaba_seo_fields_html1() {
        $value1 = get_option( 'custom_site_title', '' );
        echo '<input type="text" id="custom_site_title" name="custom_site_title" class="regular-text" value="' . $value1 . '" />';
    }

    function zhutubaba_seo_fields_html2() {
        $value2 = get_option( 'custom_site_description', '' );
        echo '<textarea id="custom_site_description" name="custom_site_description" class="regular-text" rows="6" cols="30">'. $value2 .'</textarea>';
    }

    function zhutubaba_seo_fields_html3() {
        $value3 = get_option( 'custom_site_keywords', '' );
        echo '<textarea id="custom_site_keywords" name="custom_site_keywords" class="regular-text" rows="3" cols="30" >'. $value3 .'</textarea>';
    }        

}

/* Generate custom title, description and keywords in header */
add_action('wp_head', 'zhutibaba_header_seo_code');

function zhutibaba_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
 
add_filter( 'get_the_archive_title', 'zhutibaba_archive_title' );

function zhutibaba_header_seo_code() {

	$title = "";
	$description = "";
	$keywords = "";

	if ( function_exists('get_field') && is_single() ) {
		// Post SEO
		if (get_field('post_title')) {
			$title = get_field('post_title');
		} else {
			$title = get_the_title() . ' - ' . get_bloginfo('name');
		}

		if (get_field('post_description')) {
			$description = get_field('post_description');
		} else {

			while ( have_posts() ) : the_post();
				$description = get_the_excerpt();
			endwhile; 

		}

		if (get_field('post_keywords')) {
			$keywords = get_field('post_keywords');
		} else {

			$posttags = get_the_tags();
			$i = 1;
			
			if(!empty($posttags)) {
				
				foreach ($posttags as $tag) {
				    if ($i == 1) {
				        $keywords .= $tag->name;
				    } else {
				    	$keywords .= ',' . $tag->name;
				    }
				    $i++;
				}			
			}
		}
	}

	if ( function_exists('get_field') && is_page() ) {
		// Page SEO
		if (get_field('page_title')) {
			$title = get_field('page_title');
		} else {
			$title = get_the_title() . ' - ' . get_bloginfo('name');
		}
		$description = get_field('page_description');
		$keywords = get_field('page_keywords');
	}

	if ( function_exists('get_field') && is_archive() ) {
		// Archive SEO
		$term = get_queried_object();

		if (get_field('archive_title', $term)) {
			$title = get_field('archive_title', $term);
		} else {
			$title = get_the_archive_title() . ' - ' . get_bloginfo('name');
		}			
		$description = get_field('archive_description', $term);
		$keywords = get_field('archive_keywords', $term);	
	}	

	if (is_home()) {
		// Home SEO
		if (get_option( 'custom_site_title')) {
			$title = get_option('custom_site_title');
		} else {
			$title = get_bloginfo('name') . ' - ' . get_bloginfo('description');
		}			
		$description = get_option( 'custom_site_description');
		$keywords = get_option( 'custom_site_keywords' );
	}

	if (is_search()) {
		// Search SEO
		$title = '搜索结果' .' - ' . get_bloginfo('name');
	}

	echo '<title>' . $title . '</title>';
	echo "\n";
	echo '<meta name="description" content="' . $description .'" />';
	echo "\n";
	echo '<meta name="keywords" content="' . $keywords . '" />';
	echo "\n";

};

/* Remove default title tag generated by WordPress */
remove_action( 'wp_head', '_wp_render_title_tag', 1 );
