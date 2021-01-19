<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_demo_options() {

	// Theme defaults
	$primary_color = '#ff3333';
	$secondary_color = '#007fdb';

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

	$latest_style_choices = array(
		'choice-1' => '最新文章',
		'choice-2' => '热点文章'
	);	

	$sections[] = array(
		'id' => $section,
		'title' => __( '门户一号主题设置', 'menhu-1' ),
		'priority' => '10'
	);

	$options['logo'] = array(
		'id' => 'logo',
		'label'   => __( '图标（Logo）', 'menhu-1' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);

	$options['favicon'] = array(
		'id' => 'favicon',
		'label'   => __( '站点图标（显示在浏览器标签）', 'menhu-1' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);	
	
	$options['primary-color'] = array(
		'id' => 'primary-color',
		'label'   => __( '主题配色一', 'menhu-1' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color // hex
	);

	$options['secondary-color'] = array(
		'id' => 'secondary-color',
		'label'   => __( '主题配色二', 'menhu-1' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color // hex
	);	
	$options['site-layout'] = array(
		'id' => 'site-layout',
		'label'   => __( '网站布局', 'menhu-1' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $layout_choices,
		'default' => 'choice-1'
	);

	$options['hide-mobile-ad-on'] = array(
		'id' => 'hide-mobile-ad-on',
		'label'   => __( '在移动端隐藏网站广告', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => false,
	);

	$options['header-day-on'] = array(
		'id' => 'header-day-on',
		'label'   => __( '在网站头部显示星期', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['header-date-on'] = array(
		'id' => 'header-date-on',
		'label'   => __( '在网站头部显示日期', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['header-login-on'] = array(
		'id' => 'header-login-on',
		'label'   => __( '在网站头部显示登录链接', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['header-reg-on'] = array(
		'id' => 'header-reg-on',
		'label'   => __( '在网站头部显示注册链接', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['header-search-on'] = array(
		'id' => 'header-search-on',
		'label'   => __( '在网站头部显示搜索框', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['header-mobile-on'] = array(
		'id' => 'header-mobile-on',
		'label'   => __( '在网站头部显示网站地址二维码', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['header-weixin-on'] = array(
		'id' => 'header-weixin-on',
		'label'   => __( '在网站头部显示微信二维码', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['header-weibo-on'] = array(
		'id' => 'header-weibo-on',
		'label'   => __( '在网站头部显示微博链接', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);		

	$options['mobile-nav-heading'] = array(
		'id' => 'mobile-nav-heading',
		'label'   => __( '移动设备导航菜单文字', 'menhu-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __('菜单', 'menhu-1'),
	);	

	$options['home-featured-on'] = array(
		'id' => 'home-featured-on',
		'label'   => __( '在首页显示置顶文章', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['featured-slide-num'] = array(
		'id' => 'featured-slide-num',
		'label'   => __( '置顶幻灯片文章数', 'menhu-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '3',		
	);

	$options['featured-num'] = array(
		'id' => 'featured-num',
		'label'   => __( '幻灯片下方显示的文章数', 'menhu-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '4',		
	);	

	$options['home-latest-style'] = array(
		'id' => 'home-latest-style',
		'label'   => __( '首页置顶幻灯片右侧显示的文章类型', 'menhu-1' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $latest_style_choices,
		'default' => 'choice-1'	
	);	

	$options['single-line-title'] = array(
		'id' => 'single-line-title',
		'label'   => __( '将首页文章列表标题显示为一行', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,	
	);	

	$options['home-latest-num'] = array(
		'id' => 'home-latest-num',
		'label'   => __( '首页最新/热点文章数', 'menhu-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '15',		
	);	

	$options['home-words-num'] = array(
		'id' => 'home-words-num',
		'label'   => __( '首页文章列表标题字数', 'menhu-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '30',		
	);	

	$options['all-posts-url'] = array(
		'id' => 'all-posts-url',
		'label'   => __( '展示所有最新文章的页面链接', 'menhu-1' ),
		'section' => $section,
		'type'    => 'url',
		'default' => home_url() . '/latest',
	);	

	$options['loop-excerpt-length'] = array(
		'id' => 'loop-excerpt-length',
		'label'   => __( '文章列表自动获取摘要字数', 'menhu-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '80',		
	);

	$options['content-ad-position'] = array(
		'id' => 'content-ad-position',
		'label'   => __( '在文章列表的第几篇文章后显示广告？', 'menhu-1' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $ad_position_choices,		
		'default' => '1',
	);

	$options['loop-category-on'] = array(
		'id' => 'loop-category-on',
		'label'   => __( '在文章列表显示文章所属分类目录', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['loop-author-avatar-on'] = array(
		'id' => 'loop-author-avatar-on',
		'label'   => __( '在文章列表显示作者头像', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['loop-author-name-on'] = array(
		'id' => 'loop-author-name-on',
		'label'   => __( '在文章列表显示作者名字', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['loop-date-on'] = array(
		'id' => 'loop-date-on',
		'label'   => __( '在文章列表显示文章发布时间', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['loop-comment-on'] = array(
		'id' => 'loop-comment-on',
		'label'   => __( '在文章列表显示评论数', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);		

	$options['loop-view-on'] = array(
		'id' => 'loop-view-on',
		'label'   => __( '在文章列表显示阅读数', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);		

	$options['pagination-style'] = array(
		'id' => 'pagination-style',
		'label'   => __( '文章列表分页样式', 'menhu-1' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $pagination_style_choices,
		'default' => 'choice-1'
	);

	$options['pagination-loading-text'] = array(
		'id' => 'pagination-loading-text',
		'label'   => __( '文章列表无限分页面正在加载描述', 'menhu-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __('正在加载中...', 'menhu-1'),
	);		

	$options['pagination-loaded-text'] = array(
		'id' => 'pagination-loaded-text',
		'label'   => __( '文章列表无限分页面加载完成描述', 'menhu-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __('已加载全部内容', 'menhu-1'),
	);		

	$options['single-breadcrumbs-on'] = array(
		'id' => 'single-breadcrumbs-on',
		'label'   => __( '在文章页面显示浏览位置', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-share-on'] = array(
		'id' => 'single-share-on',
		'label'   => __( '在文章页面启用百度分享', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-author-avatar-on'] = array(
		'id' => 'single-author-avatar-on',
		'label'   => __( '在文章页面显示作者头像', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-author-name-on'] = array(
		'id' => 'single-author-name-on',
		'label'   => __( '在文章页面显示作者名字', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['single-date-on'] = array(
		'id' => 'single-date-on',
		'label'   => __( '在文章页面显示文章发布时间', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-comment-on'] = array(
		'id' => 'single-comment-on',
		'label'   => __( '在文章页面显示评论数', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['single-view-on'] = array(
		'id' => 'single-view-on',
		'label'   => __( '在文章页面显示阅读数', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);		

	$options['single-excerpt-on'] = array(
		'id' => 'single-excerpt-on',
		'label'   => __( '在文章页面(内容顶部)显示摘要', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);
	
	$options['single-featured-on'] = array(
		'id' => 'single-featured-on',
		'label'   => __( '在文章页面（内容顶部）显示特色图片', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => false,
	);	

	$options['single-like-on'] = array(
		'id' => 'single-like-on',
		'label'   => __( '在文章页面（内容底部）显示点赞按钮', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);		

	$options['author-box-on'] = array(
		'id' => 'author-box-on',
		'label'   => __( '在文章页面显示作者说明', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['related-posts-on'] = array(
		'id' => 'related-posts-on',
		'label'   => __( '在文章页面显示相关文章（为您推荐）', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['close-comments-on'] = array(
		'id' => 'close-comments-on',
		'label'   => __( '关闭网站评论列表和评论框', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => false,
	);

	$options['right-contact-on'] = array(
		'id' => 'right-contact-on',
		'label'   => __( '在网站底部右侧显示联系方式按钮', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['right-weixin-on'] = array(
		'id' => 'right-weixin-on',
		'label'   => __( '在网站底部右侧显示微信按钮', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['right-weibo-on'] = array(
		'id' => 'right-weibo-on',
		'label'   => __( '在网站底部右侧显示微博按钮', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['back-top-on'] = array(
		'id' => 'back-top-on',
		'label'   => __( '在网站底部右侧显示“返回顶部”按钮', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['weixin-qrcode'] = array(
		'id' => 'weixin-qrcode',
		'label'   => __( '微信号二维码图片', 'menhu-1' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);

	$options['site-url-qrcode'] = array(
		'id' => 'site-url-qrcode',
		'label'   => __( '网站地址二维码图片', 'menhu-1' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);

	$options['contact-phone'] = array(
		'id' => 'contact-phone',
		'label'   => __( '联系电话', 'menhu-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '0898-88881688'
	);
	$options['contact-qq'] = array(
		'id' => 'contact-qq',
		'label'   => __( 'QQ号码', 'menhu-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '3599145122'
	);
	$options['contact-email'] = array(
		'id' => 'contact-email',
		'label'   => __( '电子邮箱', 'menhu-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 'email@wangzhan.com'
	);				
	$options['contact-info'] = array(
		'id' => 'contact-info',
		'label'   => __( '自定义联系说明', 'menhu-1' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '工作时间：周一至周五，9:00-17:30，节假日休息'
	);	
	$options['weibo-url'] = array(
		'id' => 'weibo-url',
		'label'   => __( '新浪微博地址', 'menhu-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 'https://weibo.com/zhutibaba'
	);	
	$options['partner-title'] = array(
		'id' => 'partner-title',
		'label'   => __( '合作伙伴模块标题', 'menhu-1' ),
		'section' => $section,
		'type'    => 'text',
		'default' => __('合作伙伴', 'menhu-1'),
	);	

	$options['footer-credit'] = array(
		'id' => 'footer-credit',
		'label'   => __( '网站底部版权信息/链接', 'menhu-1' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '&copy; ' . date("o") . ' <a href="' . home_url() .'">' . get_bloginfo('name') . '</a> - 主题巴巴原创 <a href="http://www.zhutibaba.com" target="_blank">WordPress 主题</a>'
	);		
	//$options['example-range'] = array(
	//	'id' => 'example-range',
	//	'label'   => __( 'Example Range Input', 'menhu-1' ),
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