<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_demo_options() {

	// Theme defaults
	$primary_color = '#007fdb';
	$secondary_color = '#ff322e';

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

	$layout_choices = array(
		'choice-1' => '自适应布局（完美兼容电脑和移动设备）',
		'choice-2' => '固定布局（只适合PC电脑浏览）'
	);

	$ad_position_choices = array(
		'1','2', '3','4','5','6','7','8','9','10'													
	);

	$pagination_style_choices = array(
		'choice-1' => '无限分页（向下滚动页面时自动加载）',
		'choice-2' => '传统分页'
	);	

	$sections[] = array(
		'id' => $section,
		'title' => __( '杂志一号主题设置', 'zazhi-1' ),
		'priority' => '10'
	);

	$options['logo'] = array(
		'id' => 'logo',
		'label'   => __( '图标（Logo）', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);

	$options['favicon'] = array(
		'id' => 'favicon',
		'label'   => __( '站点图标（显示在浏览器标签）', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);	
	
	$options['primary-color'] = array(
		'id' => 'primary-color',
		'label'   => __( '主题配色一', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color // hex
	);

	$options['secondary-color'] = array(
		'id' => 'secondary-color',
		'label'   => __( '主题配色二', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color // hex
	);	
	$options['site-layout'] = array(
		'id' => 'site-layout',
		'label'   => __( '网站布局', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $layout_choices,
		'default' => 'choice-1'
	);

	$options['header-search-on'] = array(
		'id' => 'header-search-on',
		'label'   => __( '在网站顶部右侧显示搜索框', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['mobile-nav-heading'] = array(
		'id' => 'mobile-nav-heading',
		'label'   => __( '移动设备导航菜单文字', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __('菜单', 'zazhi-1'),
	);	

	$options['home-featured-on'] = array(
		'id' => 'home-featured-on',
		'label'   => __( '在首页显示置顶文章', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['featured-heading-on'] = array(
		'id' => 'featured-heading-on',
		'label'   => __( '显示置顶文章飘带', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['featured-heading-text'] = array(
		'id' => 'featured-heading-text',
		'label'   => __( '置顶文章飘带文字', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __('置顶文章', 'zazhi-1'),
	);	
	
	$options['all-posts-url'] = array(
		'id' => 'all-posts-url',
		'label'   => __( '展示所有最新文章的页面链接', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'url',
		'default' => home_url() . '/latest',
	);	

	$options['home-excerpt-length'] = array(
		'id' => 'home-excerpt-length',
		'label'   => __( '首页文章自动获取摘要字数', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '64',		
	);

	$options['loop-excerpt-length'] = array(
		'id' => 'loop-excerpt-length',
		'label'   => __( '文章列表自动获取摘要字数', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '80',		
	);

	$options['content-ad-position'] = array(
		'id' => 'content-ad-position',
		'label'   => __( '在文章列表的第几篇文章后显示广告？', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $ad_position_choices,		
		'default' => '1',
	);

	$options['loop-category-on'] = array(
		'id' => 'loop-category-on',
		'label'   => __( '在文章列表显示文章所属分类目录', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['loop-author-avatar-on'] = array(
		'id' => 'loop-author-avatar-on',
		'label'   => __( '在文章列表显示作者头像', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['loop-author-name-on'] = array(
		'id' => 'loop-author-name-on',
		'label'   => __( '在文章列表显示作者名字', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['loop-date-on'] = array(
		'id' => 'loop-date-on',
		'label'   => __( '在文章列表显示文章发布时间', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['loop-comment-on'] = array(
		'id' => 'loop-comment-on',
		'label'   => __( '在文章列表显示评论数', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);		


	$options['pagination-style'] = array(
		'id' => 'pagination-style',
		'label'   => __( '文章列表分页样式', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $pagination_style_choices,
		'default' => 'choice-1'
	);

	$options['pagination-loading-text'] = array(
		'id' => 'pagination-loading-text',
		'label'   => __( '文章列表无限分页面正在加载描述', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __('正在加载中...', 'zazhi-1'),
	);		

	$options['pagination-loaded-text'] = array(
		'id' => 'pagination-loaded-text',
		'label'   => __( '文章列表无限分页面加载完成描述', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __('已加载所有文章', 'zazhi-1'),
	);		

	$options['single-breadcrumbs-on'] = array(
		'id' => 'single-breadcrumbs-on',
		'label'   => __( '在文章页面显示浏览位置', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-share-on'] = array(
		'id' => 'single-share-on',
		'label'   => __( '在文章页面启用百度分享', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-author-avatar-on'] = array(
		'id' => 'single-author-avatar-on',
		'label'   => __( '在文章页面显示作者头像', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-author-name-on'] = array(
		'id' => 'single-author-name-on',
		'label'   => __( '在文章页面显示作者名字', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['single-date-on'] = array(
		'id' => 'single-date-on',
		'label'   => __( '在文章页面显示文章发布时间', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-comment-on'] = array(
		'id' => 'single-comment-on',
		'label'   => __( '在文章页面显示评论数', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['single-featured-on'] = array(
		'id' => 'single-featured-on',
		'label'   => __( '在文章页面（内容顶部）显示特色图片', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => false,
	);	

	$options['single-like-on'] = array(
		'id' => 'single-like-on',
		'label'   => __( '在文章页面（内容底部）显示点赞按钮', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);		

	$options['author-box-on'] = array(
		'id' => 'author-box-on',
		'label'   => __( '在文章页面显示作者说明', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['related-posts-on'] = array(
		'id' => 'related-posts-on',
		'label'   => __( '在文章页面显示相关文章（为您推荐）', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['close-comments-on'] = array(
		'id' => 'close-comments-on',
		'label'   => __( '关闭网站评论列表和评论框', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => false,
	);	

	$options['hide-sidebar-on'] = array(
		'id' => 'home-sidebar-on',
		'label'   => __( '在移动设备中隐藏右侧边栏', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['hide-footer-widgets-on'] = array(
		'id' => 'hide-footer-widgets-on',
		'label'   => __( '在移动设备中隐藏底部小工具', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);
	
	$options['back-top-on'] = array(
		'id' => 'back-top-on',
		'label'   => __( '在网站底部右侧显示“返回顶部”按钮', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['footer-credit'] = array(
		'id' => 'footer-credit',
		'label'   => __( '网站底部版权信息/链接', 'zazhi-1' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '&copy; ' . date("o") . ' <a href="' . home_url() .'">' . get_bloginfo('name') . '</a> - 主题巴巴原创 <a href="http://www.zhutibaba.com" target="_blank">WordPress 主题</a>'
	);		
	//$options['example-range'] = array(
	//	'id' => 'example-range',
	//	'label'   => __( 'Example Range Input', 'zazhi-1' ),
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