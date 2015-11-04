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
 * 
 * 往页面头添加脚本
 */
add_action('wp_head', 'fun_wp_head');
function fun_wp_head() {
	echo '
<!-- 引入字体样式表-->
<link rel="stylesheet" type="text/css" href="'.THEME_URI.'/fonts/font-awesome/font-awesome.css"  media="all" />
<!-- IE Fix for HTML5 Tags -->
<!--[if lt IE 9]>
<script src="'.THEME_URI.'/js/html5.js"></script>
<script src="'.THEME_URI.'/js/css3-mediaqueries.js"></script>
<script src="<?php echo THEME_URI; ?>/js/PIE_IE678.js"></script>
<link rel="stylesheet" type="text/css" href="'.THEME_URI.'/css/iefix.css"  media="all" />
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="'.THEME_URI.'/fonts/font-awesome/font-awesome-ie7.min.css"  media="all" />
<![endif]-->
<!--[if IE 6]>
<script src="'.THEME_URI.'/js/kill-IE6.js"></script>
<![endif]-->
	';
}

/**
 * 
 * 往页面尾添加脚本
 */
add_action('wp_footer', 'fun_wp_footer');
function fun_wp_footer() {
	echo '
	<script type="text/javascript" src="'.THEME_URI.'/js/jquery.min.js"></script>
	<script type="text/javascript" src="'.THEME_URI.'/js/scripts.js"></script>
	';
	if(is_home() && ot_get_option('opt_slider') == 'on') {?>
		<script type="text/javascript">
		eval(function(p,a,c,k,e,d){e=function(c){return c};if(!''.replace(/^/,String)){while(c--)d[c]=k[c]||c;k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('$(4).3(2(){$(\'#1\').0()});',5,5,'nivoSlider|slider|function|load|window'.split('|'),0,{}))
		</script>
<?php 
	} 
	
	if(ot_get_option('opt_share')) {?>
		<script type="text/javascript">
		window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"24"},"share":{},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin","douban"]}};
		with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
		</script>
<?php 
	}
	
	if ( is_single() ){ ?>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/comments-ajax.js"></script>
<?php
	} 
}


/**
 * 
 * 注册主要的脚本和样式
 */
add_action('wp_enqueue_scripts', 'fun_add_scripts');
function fun_add_scripts() {
}