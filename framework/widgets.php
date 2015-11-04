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
 * 注册页脚边栏
 */
add_action( 'widgets_init', 'fun_sidebars' );
if ( ! function_exists( 'fun_sidebars' ) ) {
	function fun_sidebars() {
		//Sidebar
		$data = array( 
			'name' => 'Sidebar',
			'id' => 'sidebar',
			'description' => __("右侧边栏",'xiapistudio'),
			'before_widget' => '<div class="s-list">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="sub">',
			'after_title' => '</h3>'
		);
		register_sidebar($data);
		
		//Float
		$data = array(
			'name' => 'Float',
			'id' => 'float',
			'description' => __("浮动边栏",'xiapistudio'),
			'before_widget' => '<div class="s-list">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="sub">',
			'after_title' => '</h3>'
		);
		register_sidebar($data);
		
		//Footer
		$data =  array( 
			'name' => 'Footer',
			'id' => 'footer', 
			'description' => __("底部边栏",'xiapistudio'), 
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h3 class="sub">',
			'after_title' => '</h3>'
		);
		register_sidebar($data); 
	}
}

load_template( THEME_FRA_DIR . '/widgets/widget-donate.php' );
load_template( THEME_FRA_DIR . '/widgets/widget-hot-comments.php' );
load_template( THEME_FRA_DIR . '/widgets/widget-recent-comments.php' );