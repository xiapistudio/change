<?php
/***************************************

	Theme Name: 	Change Theme
	Theme URI: 		https://github.com/xiapistudio/change
	Description: 	Chage主题，虾皮工作室专用
	Version: 		1.0.0
	Author: 		虾皮工作室
	Author URI: 	http://www.xiapistudio.com/
	License:     	GNU General Public License v3.0
	License URI: 	http://www.gnu.org/licenses/gpl-3.0.html
	
***************************************/
/**
 * Initialize the custom Theme Options.
 */
add_action( 'admin_init', 'custom_theme_options' );

function custom_theme_options() {
	
	/**
	 * Get a copy of the saved settings array.
	 * ot_settings_id() --> option_tree_settings
	 */
	$saved_settings = get_option( ot_settings_id(), array() );
	$blogname = get_bloginfo('name');
	$blogurl = get_bloginfo('url');
	$categories = get_categories(); $cats_output='';foreach ($categories as $cat) {$cats_output .= $cat->cat_ID.' => '.$cat->cat_name.';<br>';}
	$posts = get_posts('numberposts=500&post_type=post&orderby=ID&order=DESC'); $posts_output='';foreach($posts as $post) {$posts_output .= $post->ID.' => '.$post->post_title.'&nbsp;&nbsp;(<span style="color:#1cbdc5">'.$post->post_date.'</span>);<br>';}
	$pages = get_posts('numberposts=50&post_type=page&orderby=ID&order=DESC'); $pages_output='';foreach($pages as $page) {$pages_output .= $page->ID.' => '.$page->post_title.'&nbsp;&nbsp;(<span style="color:#1cbdc5">'.$page->post_date.'</span>);<br>';}
	$products = get_posts('numberposts=100&post_type=store&orderby=ID&order=DESC'); $products_output='';foreach($products as $product) {$products_output .= $product->ID.' => '.$product->post_title.'&nbsp;&nbsp;(<span style="color:#1cbdc5">'.$product->post_date.'</span>);<br>';}
	$theme = wp_get_theme();
	$version = $theme->get('Version');

	
	//Admin Panel Sections
	$sections = array(
		array('id' => 'bases','title' => '基本设置'),
		array('id' => 'layout','title' => '页面布局'),
		array('id' => 'blogform','title' => '文章形式'),
		array('id' => 'webstyle','title' => '网站样式'),
		//array('id' => 'adsposit','title' => '广告投放'),
		array('id' => 'advanced','title' => '高级设置'),
	);
	
	//Admin Panel Settings
	$settings = array(
		// 基本设置: Description
		array(
            'id'        => 'opt_description',
            'label'     => '页面描述',
            'desc'      => '网站首页描述(非必须，但对SEO有影响)',
            'type'      => 'textarea_simple',
            'rows'      => '5',
            'section'   => 'bases'
        ),
        // 基本设置: Keywords
        array(
            'id'        => 'opt_keywords',
            'label'     => '页面关键词',
            'desc'      => '网站首页、分类页关键词(非必须，但对SEO有影响，不同关键词用英文逗号隔开)',
            'type'      => 'textarea_simple',
            'rows'      => '5',
            'section'   => 'bases'
        ),
		// 基本设置: Favicon图标
        array(
            'id'        => 'opt_favicon',
            'label'     => 'Favicon图标',
            'desc'      => '上传一个16x16像素大小的 Png/Gif 图像作为网站的图标',
            'type'      => 'upload',
            'section'   => 'bases',
        ),
        // 基本设置: 是否开启Logo图像
        array(
            'id'        => 'opt_logo',
            'label'     => '网站Logo图像开关',
            'desc'      => '使用图像替代文本作为网站的Logo',
            'type'      => 'on-off',
            'section'   => 'bases',
	    	'std'       => 'off',
        ),
        // 基本设置: 自定义Logo图像
        array(
            'id'        => 'opt_logo_img',
            'label'     => '网站Logo图像设置',
            'desc'      => '上传一个图像作为网站的Logo，推荐大小60x120(max)像素',
            'type'      => 'upload',
            'section'   => 'bases',
        ),
        // 页面布局: 备案号
        array(
            'id'        => 'opt_beian',
            'label'     => 'Footer中显示备案号',
            'desc'      => '在网页底部Footer中显示备案号',
            'type'      => 'text',
            'rows'      => '1',
            'std'       => '',
            'section'   => 'layout'
        ),
        // 文章形式: 文章页特色图
        array(
            'id'        => 'opt_show_thumb',
            'label'     => '文章页特色图',
            'desc'      => '文章页上方是否显示特色图',
            'type'      => 'on-off',
            'std'       => 'on',
            'section'   => 'blogform'
        ),
        // 文章形式: 文章分享开关
        array(
            'id'        => 'opt_share',
            'label'     => '文章分享开关',
            'desc'      => '文章页下方是否显示分享',
            'type'      => 'on-off',
            'std'       => 'on',
            'section'   => 'blogform'
        ),
        // 文章形式: 文章页版权信息
        array(
            'id'        => 'opt_copyright',
            'label'     => __('文章页版权信息','xiapistudio'),
            'desc'      => __('文章页版权信息，为默认值，如果作者投稿添加了版权信息，将会覆盖此默认值','xiapistudio'),
            'type'      => 'textarea_simple',
            'rows'      => '5',
            'section'   => 'blogform',
            'std'       => __('<p>除特别注明外，本站所有文章均为<a href="{url}" title="{name}" target="_blank">{name}</a>原创，转载请注明出处来自<a href="{link}" title="{title}">{link}</a></p>','xiapistudio'),
        ),
        // 网站样式: 首页幻灯片
        array(
            'id'        => 'opt_slider',
            'label'     => '首页幻灯片',
            'desc'      => '是否开启首页幻灯轮播',
            'type'      => 'on-off',
            'std'       => 'off',
            'section'   => 'webstyle'
        ),
        // 高级设置: 支付宝收款帐户
		array(
            'id'        => 'opt_alipay_email',
            'label'     => '支付宝收款帐户邮箱',
            'desc'      => '支付宝收款帐户邮箱,要收款必填并务必保持正确',
            'type'      => 'text',
            'std'       => '',
            'section'   => 'advanced'
        ),
		// 高级设置: 支付宝收款二维码
		array(
            'id'        => 'opt_alipay_qr',
            'label'     => '支付宝收款二维码',
            'desc'      => '支付宝收款二维码,请至支付宝获取二维码并填写二维码图片链接',
            'type'      => 'text',
            'std'       => '',
            'section'   => 'advanced'
        ),
	);
	
	//Admin Custom settings
	$custom_settings = array(
		'sections' => $sections,
		'settings' => $settings,
	);
	
	//allow settings to be filtered before saving
	$custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
	
	//settings are not the same update the DB
	if ( $saved_settings !== $custom_settings ) {
		update_option( ot_settings_id(), $custom_settings ); 
	}
}
