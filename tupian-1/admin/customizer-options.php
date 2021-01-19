<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_demo_options() {

	// Theme defaults
	$primary_color = '#26b';
	$secondary_color = '#ffbe02';

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

	$header_style_choices = array(
		'choice-1' => 'Logo图标居中',
		'choice-2' => 'Logo图标居左'
	);

	$sections[] = array(
		'id' => $section,
		'title' => __( '图片一号主题设置', 'menhu-1' ),
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
		'label'   => __( '主题配色', 'menhu-1' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color // hex
	);

	$options['secondary-color'] = array(
		'id' => 'secondary-color',
		'label'   => __( '搜索框配色', 'menhu-1' ),
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

	$options['header-style'] = array(
		'id' => 'header-style',
		'label'   => __( '网站头部样式', 'tupian-1' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $header_style_choices,
		'default' => 'choice-1'
	);
	
	$options['tablet-columns'] = array(
		'id' => 'tablet-columns',
		'label'   => __( '主菜单链接固定宽度 (平板)', 'm-site' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $menu_column_choices,
		'default' => 'choice-6',
	);	


	$options['phone-columns'] = array(
		'id' => 'phone-columns',
		'label'   => __( '主菜单链接固定宽度 (手机)', 'm-site' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $menu_column_choices,
		'default' => 'choice-4',
	);		

	$options['hide-mobile-ad-on'] = array(
		'id' => 'hide-mobile-ad-on',
		'label'   => __( '在移动端隐藏网站广告', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => false,
	);

	$options['sticky-nav-on'] = array(
		'id' => 'sticky-nav-on',
		'label'   => __( '置顶导航栏', 'tupian-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
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

	$options['header-submit-on'] = array(
		'id' => 'header-submit-on',
		'label'   => __( '在网站头部显示投稿链接', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => false,
	);			

	$options['tougao-url'] = array(
		'id' => 'tougao-url',
		'label'   => __( '投稿页面链接', 'menhu-1' ),
		'section' => $section,
		'type'    => 'url',
		'default' => home_url() . '/tougao',
	);	

	$options['timthumb-on'] = array(
		'id' => 'timthumb-on',
		'label'   => __( '无特色图片时使用TimThumb生成缩略图', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => false,		
	);

	$options['loop-excerpt-on'] = array(
		'id' => 'loop-excerpt-on',
		'label'   => __( '显示文章列表摘要', 'menhu-1' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,		
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