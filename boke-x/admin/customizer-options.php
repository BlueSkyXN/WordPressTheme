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
	$tertiary_color = '#76b852';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;


	// Arrays 

	$site_layout_choices = array(
		'choice-1' => '自适应布局（完美兼容电脑和移动设备）',
		'choice-2' => '固定布局（只适合PC电脑浏览）'
	);

	$pagination_style_choices = array(
		'choice-1' => '无限分页（向下滚动页面时自动加载）',
		'choice-2' => '传统分页'
	);	

	$ad_position_choices = array(
		'1','2', '3','4','5','6','7','8','9','10'													
	);

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

	/* General */
	$section = 'general';

	$sections[] = array(
		'id' => $section,
		'title' => __( '主题常规设置', 'boke-x' ),
		'priority' => '10'
	);

	$options['site-layout'] = array(
		'id' => 'site-layout',
		'label'   => __( '网站布局', 'boke-x' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $site_layout_choices,
		'default' => 'choice-1'
	);

	$options['tablet-columns'] = array(
		'id' => 'tablet-columns',
		'label'   => __( '主菜单链接固定宽度 (平板)', 'boke-x' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $menu_column_choices,
		'default' => 'choice-6',
	);	

	$options['phone-columns'] = array(
		'id' => 'phone-columns',
		'label'   => __( '主菜单链接固定宽度 (手机)', 'boke-x' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $menu_column_choices,
		'default' => 'choice-4',
	);		

	$options['no-category-base-on'] = array(
		'id' => 'no-category-base-on',
		'label'   => __( '移除分类目录/category/链接', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => false,
	);	

	$options['header-login-on'] = array(
		'id' => 'header-login-on',
		'label'   => __( '在网站头部显示登录链接', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['header-reg-on'] = array(
		'id' => 'header-reg-on',
		'label'   => __( '在网站头部显示注册链接', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['header-submit-on'] = array(
		'id' => 'header-submit-on',
		'label'   => __( '在网站顶部显示投稿连接', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => false,
	);		

	$options['header-submit-url'] = array(
		'id' => 'header-submit-url',
		'label'   => __( '投稿页面链接', 'boke-x' ),
		'section' => $section,
		'type'    => 'url',
		'default' => home_url(),
	);		

	$options['header-search-on'] = array(
		'id' => 'header-search-on',
		'label'   => __( '在网站顶部显示搜索框', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['footer-search-on'] = array(
		'id' => 'footer-search-on',
		'label'   => __( '在网站底部显示搜索框', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['footer-tags-on'] = array(
		'id' => 'footer-tags-on',
		'label'   => __( '在网站底部搜索框下方显示热门标签', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);		

	$options['footer-tags-num'] = array(
		'id' => 'footer-tags-num',
		'label'   => __( '网站底部热门标签数量', 'boke-x' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 5,
	);	

	$options['right-contact-on'] = array(
		'id' => 'right-contact-on',
		'label'   => __( '在网站底部右侧显示联系方式按钮', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['right-weixin-on'] = array(
		'id' => 'right-weixin-on',
		'label'   => __( '在网站底部右侧显示微信按钮', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['right-weibo-on'] = array(
		'id' => 'right-weibo-on',
		'label'   => __( '在网站底部右侧显示微博按钮', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['back-top-on'] = array(
		'id' => 'back-top-on',
		'label'   => __( '在网站底部右侧显示“返回顶部”按钮', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['weixin-qrcode'] = array(
		'id' => 'weixin-qrcode',
		'label'   => __( '微信号二维码图片', 'boke-x' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);

	$options['site-url-qrcode'] = array(
		'id' => 'site-url-qrcode',
		'label'   => __( '网站地址二维码图片', 'boke-x' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);

	$options['contact-phone'] = array(
		'id' => 'contact-phone',
		'label'   => __( '联系电话', 'boke-x' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '0898-88881688'
	);
	$options['contact-qq'] = array(
		'id' => 'contact-qq',
		'label'   => __( 'QQ号码', 'boke-x' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '3599145122'
	);
	$options['contact-email'] = array(
		'id' => 'contact-email',
		'label'   => __( '电子邮箱', 'boke-x' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 'email@wangzhan.com'
	);				
	$options['contact-info'] = array(
		'id' => 'contact-info',
		'label'   => __( '自定义联系说明', 'boke-x' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '工作时间：周一至周五，9:00-17:30，节假日休息'
	);	
	$options['weibo-url'] = array(
		'id' => 'weibo-url',
		'label'   => __( '新浪微博地址', 'boke-x' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 'https://weibo.com/zhutibaba'
	);		

	$options['footer-logo'] = array(
		'id' => 'footer-logo',
		'label'   => __( '网站底部图标(logo）', 'boke-x' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);

	$options['footer-credit'] = array(
		'id' => 'footer-credit',
		'label'   => __( '网站底部版权信息/链接', 'boke-x' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '&copy; ' . date("o") . ' <a href="' . home_url() .'">' . get_bloginfo('name') . '</a> - 主题巴巴原创 <a href="http://www.zhutibaba.com" target="_blank">WordPress 主题</a>'
	);	

	/* Color */
	$section = 'color';

	$sections[] = array(
		'id' => $section,
		'title' => __( '主题颜色设置', 'boke-x' ),
		'priority' => '10'
	);	

	$options['primary-color'] = array(
		'id' => 'primary-color',
		'label'   => __( '主题颜色', 'boke-x' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color // hex
	);

	$options['secondary-color'] = array(
		'id' => 'secondary-color',
		'label'   => __( '文章内容链接hover颜色', 'boke-x' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color // hex
	);

	$options['tertiary-color'] = array(
		'id' => 'tertiary-color',
		'label'   => __( '点赞颜色', 'boke-x' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $tertiary_color // hex
	);

	/* Home */

	$section = 'home';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( '网站首页设置', 'boke-x' ),
		'priority' => '10'
	);

	$options['home-featured-on'] = array(
		'id' => 'home-featured-on',
		'label'   => __( '在首页显示置顶文章 (幻灯片 + 缩略图)', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['featured-slide-num'] = array(
		'id' => 'featured-slide-num',
		'label'   => __( '在幻灯片显示的置顶文章数', 'boke-x' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '3',		
	);

	$options['home-zhuanti-on'] = array(
		'id' => 'home-zhuanti-on',
		'label'   => __( '在首页显示专题', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);		

	$options['home-zhuanti-title'] = array(
		'id' => 'home-zhuanti-title',
		'label'   => __( '首页专题标题', 'boke-x' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '专题列表'
	);

	$options['home-zhuanti-desc'] = array(
		'id' => 'home-zhuanti-desc',
		'label'   => __( '首页专题描述', 'boke-x' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '自定义文字描述'
	);

	$options['home-zhuanti-more-text'] = array(
		'id' => 'home-zhuanti-more-text',
		'label'   => __( '查看专题描述', 'boke-x' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '查看所有专题 <i class="fa fa-angle-right"></i>'
	);	

	$options['home-zhuanti-more-link'] = array(
		'id' => 'home-zhuanti-more-link',
		'label'   => __( '专题页面链接', 'boke-x' ),
		'section' => $section,
		'type'    => 'text',
		'default' => home_url()
	);	

	$options['home-list-title'] = array(
		'id' => 'home-list-title',
		'label'   => __( '首页文章列表标题', 'boke-x' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '最新文章'
	);	

	$options['home-partner-title'] = array(
		'id' => 'home-partner-title',
		'label'   => __( '首页合作伙伴标题', 'boke-x' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '合作伙伴'
	);	

	$options['home-partner-desc'] = array(
		'id' => 'home-partner-desc',
		'label'   => __( '首页合作伙伴描述', 'boke-x' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '自定义文字描述'
	);	

	$options['home-partner-link-text'] = array(
		'id' => 'home-partner-link-text',
		'label'   => __( '首页合作伙伴右侧描述', 'boke-x' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '联系我们 <i class="fa fa-angle-right"></i>'
	);	

	$options['home-partner-link'] = array(
		'id' => 'home-partner-link',
		'label'   => __( '首页合作伙伴右侧链接地址', 'boke-x' ),
		'section' => $section,
		'type'    => 'text',
		'default' => home_url()
	);				

	$options['home-friend-title'] = array(
		'id' => 'home-friend-title',
		'label'   => __( '首页友情链接标题', 'boke-x' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '友情链接'
	);		

	$options['home-friend-desc'] = array(
		'id' => 'home-friend-desc',
		'label'   => __( '首页友情链接描述', 'boke-x' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '自定义文字描述'
	);	

	$options['home-friend-link-text'] = array(
		'id' => 'home-friend-link-text',
		'label'   => __( '首页友情链接右侧描述', 'boke-x' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '交换链接 <i class="fa fa-angle-right"></i>'
	);	

	$options['home-friend-link'] = array(
		'id' => 'home-friend-link',
		'label'   => __( '首页友情链接右侧链接地址', 'boke-x' ),
		'section' => $section,
		'type'    => 'text',
		'default' => home_url()
	);							

	/* Archive */

	$section = 'archive';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( '文章列表设置', 'boke-x' ),
		'priority' => '10'
	);

	$options['content-ad-position'] = array(
		'id' => 'content-ad-position',
		'label'   => __( '在文章列表的第几篇文章后显示广告？', 'boke-x' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $ad_position_choices,		
		'default' => '1',
	);
	
	$options['loop-featured-on'] = array(
		'id' => 'loop-featured-on',
		'label'   => __( '在文章列表显示特色图片', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);
	$options['loop-font-bold-on'] = array(
		'id' => 'loop-font-bold-on',
		'label'   => __( '将文章列表的标题字体设为粗体', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => false,
	);	
	$options['loop-excerpt-on'] = array(
		'id' => 'loop-excerpt-on',
		'label'   => __( '在文章列表显示文章摘要', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['loop-excerpt-length'] = array(
		'id' => 'loop-excerpt-length',
		'label'   => __( '文章列表自动获取摘要字数', 'boke-x' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '55'
	);

	$options['loop-category-on'] = array(
		'id' => 'loop-category-on',
		'label'   => __( '在文章列表显示文章所属分类目录', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['loop-date-on'] = array(
		'id' => 'loop-date-on',
		'label'   => __( '在文章列表显示文章发布时间', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['loop-like-on'] = array(
		'id' => 'loop-like-on',
		'label'   => __( '在文章列表显示点赞按钮', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['loop-view-on'] = array(
		'id' => 'loop-view-on',
		'label'   => __( '在文章列表显示浏览数', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['loop-comment-on'] = array(
		'id' => 'loop-comment-on',
		'label'   => __( '在文章列表显示评论数', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	/* Single */

	$section = 'single';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( '文章页面设置', 'boke-x' ),
		'priority' => '10'
	);

	$options['single-share-on'] = array(
		'id' => 'single-share-on',
		'label'   => __( '在文章页面启用百度分享', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-category-on'] = array(
		'id' => 'single-category-on',
		'label'   => __( '在文章页面显示文章所属分类目录', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-author-avatar-on'] = array(
		'id' => 'single-author-avatar-on',
		'label'   => __( '在文章页面显示作者头像', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-author-name-on'] = array(
		'id' => 'single-author-name-on',
		'label'   => __( '在文章页面显示作者名字', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['single-date-on'] = array(
		'id' => 'single-date-on',
		'label'   => __( '在文章页面显示文章发布时间', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-view-on'] = array(
		'id' => 'single-view-on',
		'label'   => __( '在文章页面显示浏览数', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);

	$options['single-comment-on'] = array(
		'id' => 'single-comment-on',
		'label'   => __( '在文章页面显示评论数', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['single-featured-on'] = array(
		'id' => 'single-featured-on',
		'label'   => __( '在文章页面(内容顶部)显示特色图片', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => false,
	);	

	$options['single-credit-on'] = array(
		'id' => 'single-credit-on',
		'label'   => __( '在文章页面(内容底部)显示来源详情', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['single-credit-text'] = array(
		'id' => 'single-credit-text',
		'label'   => __( '文章来源信息', 'boke-x' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '本文来自网络，不代表' . get_bloginfo('blogname') . '立场，转载请注明出处：' .get_the_permalink(),
	);	

	$options['single-like-on'] = array(
		'id' => 'single-like-on',
		'label'   => __( '在文章页面(内容底部)显示点赞按钮', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);		

	$options['single-sponsor-on'] = array(
		'id' => 'single-sponsor-on',
		'label'   => __( '在文章页面(内容底部)显示打赏按钮', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);		

	$options['author-box-on'] = array(
		'id' => 'author-box-on',
		'label'   => __( '在文章页面显示作者说明', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['related-posts-on'] = array(
		'id' => 'related-posts-on',
		'label'   => __( '在文章页面显示相关文章', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['single-nav-on'] = array(
		'id' => 'single-nav-on',
		'label'   => __( '在文章页面显示上/下一篇文章', 'boke-x' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);			

	$options['weixin_code_img'] = array(
		'id' => 'weixin_code_img',
		'label'   => __( '文章打赏: 微信收款二维码', 'boke-x' ),
		'section' => $section,
		'type'    => 'image',
		'default' => get_template_directory_uri() . '/assets/img/weixin-code.png'
	);

	$options['alipay_code_img'] = array(
		'id' => 'alipay_code_img',
		'label'   => __( '文章打赏: 支付宝收款二维码', 'boke-x' ),
		'section' => $section,
		'type'    => 'image',
		'default' => get_template_directory_uri() . '/assets/img/alipay-code.png'
	);

	//$options['example-range'] = array(
	//	'id' => 'example-range',
	//	'label'   => __( 'Example Range Input', 'boke-x' ),
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