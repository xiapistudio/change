<!DOCTYPE html>
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
?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width" />
<meta name="copyright" content="Copyright 2015 - <?php echo date("Y");?> Xiapi Studio, All Rights Reserved." />
<!-- 引入页面描述和关键字模板 -->
<?php get_template_part('framework/modules/seo');?>
<!-- 网站图标 -->
<?php if ( ot_get_option('opt_favicon') ): ?>
<link rel="shortcut icon" href="<?php echo ot_get_option('opt_favicon'); ?>" />
<link rel="icon" href="<?php echo ot_get_option('opt_favicon'); ?>" />
<?php else: ?>
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="image/x-icon">
<?php endif; ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
<div id="container">
<div id="header">
	<div id="logo">
	<?php if(ot_get_option('opt_logo') == 'on') {?>
		<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
			<?php if (ot_get_option('opt_logo_img')){ ?>
			<img src="<?php echo ot_get_option('opt_logo_img'); ?>" alt="<?php bloginfo('name'); ?>" />
			<?php }else{ ?>
			<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" />
			<?php } ?>
		</a>
	<?php } else {?>
		<?php if ( is_single() || is_page() ){ ?>
		<h2><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h2>
		<?php }else{ ?>
		<h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
		<?php } ?>
		<?php bloginfo('description'); ?>
	<?php } ?>
	</div>
	<?php get_search_form(); ?>
</div>
<div id="menu">
	<?php wp_nav_menu(array('theme_location' => 'topmenu', 'depth' => 2, 'container' => 'ul', 'menu_id' => "menunav", 'menu_class' => 'menunav')); ?>
	<div class="icon">
	<a href="<?php bloginfo('url'); ?>/feed/" title="订阅" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/rss.png" alt="订阅" /></a>
	</div>
</div>