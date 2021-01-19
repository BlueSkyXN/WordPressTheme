<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_demo_options() {

	// Theme defaults
	$primary_color = '#ff4c4c';
	$secondary_color = '#037ef3';
	$tertiary_color = '#76b852';

	$menu_column_choices = array(
		'choice-0' => '自适应宽度',		
		'choice-1' => '1列',
		'choice-2' => '2列',
		'choice-3' => '3列',
		'choice-4' => '4列',
		'choice-5' => '5列',
		'choice-6' => '6列',
		'choice-7' => '7列',
		'choice-8' => '8列'							
	);

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// More Examples
	$section = 'examples';

	// Arrays 

	$sections[] = array(
		'id' => $section,
		'title' => __( '手机网站主题设置', 'm-site' ),
		'priority' => '10'
	);
	
	$options['primary-color'] = array(
		'id' => 'primary-color',
		'label'   => __( '主题颜色', 'm-site' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color // hex
	);

	$options['secondary-color'] = array(
		'id' => 'secondary-color',
		'label'   => __( '文章内容链接颜色', 'm-site' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color // hex
	);

	$options['tertiary-color'] = array(
		'id' => 'tertiary-color',
		'label'   => __( '点赞颜色', 'm-site' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $tertiary_color // hex
	);

	$options['top-menu-on'] = array(
		'id' => 'top-menu-on',
		'label'   => __( '在网站顶部左侧显示导航菜单', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['header-search-on'] = array(
		'id' => 'header-search-on',
		'label'   => __( '在网站顶部右侧显示搜索框', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);
	
	$options['menu-columns'] = array(
		'id' => 'menu-columns',
		'label'   => __( '主菜单链接固定宽度', 'm-site' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $menu_column_choices,
		'default' => 'choice-4',
	);	

	$options['home-featured-on'] = array(
		'id' => 'home-featured-on',
		'label'   => __( '在首页显示置顶文章（幻灯片）', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['featured-slide-num'] = array(
		'id' => 'featured-slide-num',
		'label'   => __( '在幻灯片显示的置顶文章数', 'm-site' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '3',		
	);

	$options['posts-list-text'] = array(
		'id' => 'posts-list-text',
		'label'   => __( '首页文章列表顶部描述文字', 'm-site' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __('最新发布', 'm-site'),
	);

	$options['posts-counter-on'] = array(
		'id' => 'posts-counter-on',
		'label'   => __( '首页文章列表顶部显示今日更新', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['list-categories-on'] = array(
		'id' => 'list-categories-on',
		'label'   => __( '首页文章列表顶部显示分类目录', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['loop-featured-on'] = array(
		'id' => 'loop-featured-on',
		'label'   => __( '在文章列表显示特色图片', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);
	$options['loop-font-bold-on'] = array(
		'id' => 'loop-font-bold-on',
		'label'   => __( '将文章列表的标题字体设为粗体', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => false,
	);

	$options['loop-date-on'] = array(
		'id' => 'loop-date-on',
		'label'   => __( '在文章列表显示文章发布时间', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => false,
	);

	$options['loop-like-on'] = array(
		'id' => 'loop-like-on',
		'label'   => __( '在文章列表显示点赞按钮', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['loop-view-on'] = array(
		'id' => 'loop-view-on',
		'label'   => __( '在文章列表显示浏览数', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['loop-comment-on'] = array(
		'id' => 'loop-comment-on',
		'label'   => __( '在文章列表显示评论数', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['single-share-on'] = array(
		'id' => 'single-share-on',
		'label'   => __( '在文章页面启用百度分享', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-category-on'] = array(
		'id' => 'single-category-on',
		'label'   => __( '在文章页面显示文章所属分类目录', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-author-avatar-on'] = array(
		'id' => 'single-author-avatar-on',
		'label'   => __( '在文章页面显示作者头像', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-author-name-on'] = array(
		'id' => 'single-author-name-on',
		'label'   => __( '在文章页面显示作者名字', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['single-date-on'] = array(
		'id' => 'single-date-on',
		'label'   => __( '在文章页面显示文章发布时间', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-view-on'] = array(
		'id' => 'single-view-on',
		'label'   => __( '在文章页面显示浏览数', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-comment-on'] = array(
		'id' => 'single-comment-on',
		'label'   => __( '在文章页面显示评论数', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['single-excerpt-on'] = array(
		'id' => 'single-excerpt-on',
		'label'   => __( '在文章页面(内容顶部)显示摘要', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-featured-on'] = array(
		'id' => 'single-featured-on',
		'label'   => __( '在文章页面(内容顶部)显示特色图片', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => false,
	);	

	$options['single-like-on'] = array(
		'id' => 'single-like-on',
		'label'   => __( '在文章页面(内容底部)显示点赞按钮', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['related-posts-on'] = array(
		'id' => 'related-posts-on',
		'label'   => __( '在文章页面显示相关文章', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	
	
	$options['back-top-on'] = array(
		'id' => 'back-top-on',
		'label'   => __( '在网站底部右侧显示“返回顶部”按钮', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['top-notice-on'] = array(
		'id' => 'top-notice-on',
		'label'   => __( '在电脑端顶部右侧显示网站地址二维码', 'm-site' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => false,
	);

	$options['site_url_code_img'] = array(
		'id' => 'site_url_code_img',
		'label'   => __( '网站地址二维码', 'm-site' ),
		'section' => $section,
		'type'    => 'image',
		'default' => get_template_directory_uri() . '/assets/img/site-url-code.png'
	);

	$options['footer-credit'] = array(
		'id' => 'footer-credit',
		'label'   => __( '网站底部版权信息/链接', 'm-site' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '&copy; ' . date("o") . ' <a href="' . home_url() .'">' . get_bloginfo('name') . '</a> - 主题巴巴原创<a href="http://www.zhutibaba.com" target="_blank">WordPress主题</a>'
	);					

	//$options['example-range'] = array(
	//	'id' => 'example-range',
	//	'label'   => __( 'Example Range Input', 'm-site' ),
	//	'section' => $section,
	//	'type'    => 'range',
	//	'input_attrs' => array(
	//      'min'   => 0,
	//        'max'   => 10,
	//        'step'  => 1,
	//       'style' => 'color: #0a0',
	//	)
	//);

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_demo_options' );