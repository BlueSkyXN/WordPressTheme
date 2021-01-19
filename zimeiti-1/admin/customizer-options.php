<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_demo_options() {

	// Theme defaults
	$primary_color = '#037ef3';
	$secondary_color = '#ff4c4c';

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

	$site_layout_choices = array(
		'choice-1' => '自适应布局（完美兼容电脑和移动设备）',
		'choice-2' => '固定布局（只适合PC电脑浏览）'
	);

	$font_choices = array(
		'choice-1' => '微软雅黑',
		'choice-2' => '宋体',
		'choice-3' => '楷书',
		'choice-4' => 'PingFang SC'
	);

	$home_content_layout_choices = array(
		'choice-1' => '左侧导航栏 / 文章列表 / 右侧边栏',
		'choice-2' => '文章列表 / 右侧边栏'
	);

	$single_content_layout_choices = array(
		'choice-1' => '左侧导航栏 / 内容 / 右侧边栏',
		'choice-2' => '内容 / 右侧边栏'
	);

	$pagination_style_choices = array(
		'choice-1' => '无限分页（向下滚动页面时自动加载）',
		'choice-2' => '传统分页'
	);	

	$ad_position_choices = array(
		'1','2', '3','4','5','6','7','8','9','10'													
	);

	$sections[] = array(
		'id' => $section,
		'title' => __( '自媒体一号主题设置', 'zimeiti-1' ),
		'priority' => '10'
	);
	
	$options['primary-color'] = array(
		'id' => 'primary-color',
		'label'   => __( '主题配色一', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color // hex
	);

	$options['secondary-color'] = array(
		'id' => 'secondary-color',
		'label'   => __( '主题配色二', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color // hex
	);

	$options['site-layout'] = array(
		'id' => 'site-layout',
		'label'   => __( '网站布局', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $site_layout_choices,
		'default' => 'choice-1'
	);

	$options['home-layout'] = array(
		'id' => 'home-layout',
		'label'   => __( '首页布局', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $home_content_layout_choices,
		'default' => 'choice-1'
	);

	$options['single-layout'] = array(
		'id' => 'single-layout',
		'label'   => __( '文章页布局', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $single_content_layout_choices,
		'default' => 'choice-1'
	);	

	$options['sticky-nav-on'] = array(
		'id' => 'sticky-nav-on',
		'label'   => __( '置顶左侧导航栏', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);			

	$options['header-search-on'] = array(
		'id' => 'header-search-on',
		'label'   => __( '在网站顶部右侧显示搜索框', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['mobile-nav-heading'] = array(
		'id' => 'mobile-nav-heading',
		'label'   => __( '移动设备导航菜单文字', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __('导航', 'zimeiti-1'),
	);			

	$options['home-featured-on'] = array(
		'id' => 'home-featured-on',
		'label'   => __( '在首页显示置顶文章（幻灯片+缩略图）', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['featured-slide-num'] = array(
		'id' => 'featured-slide-num',
		'label'   => __( '在幻灯片显示的置顶文章数', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '3',		
	);	

	$options['featured-heading-on'] = array(
		'id' => 'featured-heading-on',
		'label'   => __( '显示置顶文章飘带', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['featured-heading-text'] = array(
		'id' => 'featured-heading-text',
		'label'   => __( '置顶文章飘带文字', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __('置顶文章', 'zimeiti-1'),
	);		

	$options['content-ad-position'] = array(
		'id' => 'content-ad-position',
		'label'   => __( '在文章列表的第几篇文章后显示广告？', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $ad_position_choices,		
		'default' => '1',
	);

	$options['loop-featured-on'] = array(
		'id' => 'loop-featured-on',
		'label'   => __( '在文章列表显示特色图片', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);
	$options['loop-featured-mod-on'] = array(
		'id' => 'loop-featured-mod-on',
		'label'   => __( '自定义文章列表特色图片宽度', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => false,
	);
	$options['loop-featured-width'] = array(
		'id' => 'loop-featured-width',
		'label'   => __( '文章列表特色图片宽度(最大像素: 280)', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '217'
	);
	$options['loop-font-bold-on'] = array(
		'id' => 'loop-font-bold-on',
		'label'   => __( '将文章列表的标题字体设为粗体', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => false,
	);	
	$options['loop-excerpt-on'] = array(
		'id' => 'loop-excerpt-on',
		'label'   => __( '在文章列表显示文章摘要', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['loop-excerpt-length'] = array(
		'id' => 'loop-excerpt-length',
		'label'   => __( '文章列表自动获取摘要字数', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '55'
	);

	$options['loop-category-on'] = array(
		'id' => 'loop-category-on',
		'label'   => __( '在文章列表显示文章所属分类目录', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['loop-author-avatar-on'] = array(
		'id' => 'loop-author-avatar-on',
		'label'   => __( '在文章列表显示作者头像', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['loop-author-name-on'] = array(
		'id' => 'loop-author-name-on',
		'label'   => __( '在文章列表显示作者名字', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['loop-date-on'] = array(
		'id' => 'loop-date-on',
		'label'   => __( '在文章列表显示文章发布时间', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['loop-view-on'] = array(
		'id' => 'loop-view-on',
		'label'   => __( '在文章列表显示浏览数', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['loop-comment-on'] = array(
		'id' => 'loop-comment-on',
		'label'   => __( '在文章列表显示评论数', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['pagination-style'] = array(
		'id' => 'pagination-style',
		'label'   => __( '文章列表分页样式', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $pagination_style_choices,
		'default' => 'choice-1'
	);

	$options['pagination-loading-text'] = array(
		'id' => 'pagination-loading-text',
		'label'   => __( '文章列表无限分页面正在加载描述', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __('正在加载中...', 'zimeiti-1'),
	);		

	$options['pagination-loaded-text'] = array(
		'id' => 'pagination-loaded-text',
		'label'   => __( '文章列表无限分页面加载完成描述', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __('已加载所有文章', 'zimeiti-1'),
	);		

	$options['sticky-breadcrumbs-on'] = array(
		'id' => 'sticky-breadcrumbs-on',
		'label'   => __( '在文章页面向下滚动时置顶文章信息', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-share-on'] = array(
		'id' => 'single-share-on',
		'label'   => __( '在文章页面启用百度分享', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-category-on'] = array(
		'id' => 'single-category-on',
		'label'   => __( '在文章页面显示文章所属分类目录', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-author-avatar-on'] = array(
		'id' => 'single-author-avatar-on',
		'label'   => __( '在文章页面显示作者头像', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-author-name-on'] = array(
		'id' => 'single-author-name-on',
		'label'   => __( '在文章页面显示作者名字', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['single-date-on'] = array(
		'id' => 'single-date-on',
		'label'   => __( '在文章页面显示文章发布时间', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-view-on'] = array(
		'id' => 'single-view-on',
		'label'   => __( '在文章页面显示浏览数', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-comment-on'] = array(
		'id' => 'single-comment-on',
		'label'   => __( '在文章页面显示评论数', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['single-excerpt-on'] = array(
		'id' => 'single-excerpt-on',
		'label'   => __( '在文章页面(内容顶部)显示摘要', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-featured-on'] = array(
		'id' => 'single-featured-on',
		'label'   => __( '在文章页面（内容顶部）显示特色图片', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => false,
	);	

	$options['single-like-on'] = array(
		'id' => 'single-like-on',
		'label'   => __( '在文章页面（内容底部）显示点赞按钮', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);		

	$options['single-sponsor-on'] = array(
		'id' => 'single-sponsor-on',
		'label'   => __( '在文章页面(内容底部)显示打赏按钮', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);		

	$options['author-box-on'] = array(
		'id' => 'author-box-on',
		'label'   => __( '在文章页面显示作者说明', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['related-posts-on'] = array(
		'id' => 'related-posts-on',
		'label'   => __( '在文章页面显示相关文章（为您推荐）', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['sidebar-widget-title-border-on'] = array(
		'id' => 'sidebar-widget-title-border-on',
		'label'   => __( '在侧边栏小工具标题左侧显示小标记', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['footer-widgets-on'] = array(
		'id' => 'footer-widgets-on',
		'label'   => __( '在网站底部显示小工具（4列）', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['hide-sidebar-on'] = array(
		'id' => 'hide-sidebar-on',
		'label'   => __( '在移动设备中隐藏右侧边栏', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['hide-footer-column-on'] = array(
		'id' => 'hide-footer-column-on',
		'label'   => __( '在移动设备中隐藏底部小工具', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);
	
	$options['back-top-on'] = array(
		'id' => 'back-top-on',
		'label'   => __( '在网站底部右侧显示“返回顶部”按钮', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['weixin_code_img'] = array(
		'id' => 'weixin_code_img',
		'label'   => __( '文章打赏: 微信收款二维码', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'image',
		'default' => get_template_directory_uri() . '/assets/img/weixin-code.png'
	);

	$options['alipay_code_img'] = array(
		'id' => 'alipay_code_img',
		'label'   => __( '文章打赏: 支付宝收款二维码', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'image',
		'default' => get_template_directory_uri() . '/assets/img/alipay-code.png'
	);

	$options['footer-credit'] = array(
		'id' => 'footer-credit',
		'label'   => __( '网站底部版权信息/链接', 'zimeiti-1' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '&copy; ' . date("o") . ' <a href="' . home_url() .'">' . get_bloginfo('name') . '</a> - 主题巴巴原创 <a href="http://www.zhutibaba.com" target="_blank">WordPress 主题</a>'
	);					

	//$options['example-range'] = array(
	//	'id' => 'example-range',
	//	'label'   => __( 'Example Range Input', 'zimeiti-1' ),
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