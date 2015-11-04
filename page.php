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
<?php get_header(); ?>
<div id="container-inner" class="clear">
	<div id="primary">
	<h1 class="sub"><?php the_title(); ?></h1>
	<div class="content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div <?php if(function_exists('post_class')) : ?><?php post_class(); ?><?php else : ?>class="post post-<?php the_ID(); ?>"<?php endif; ?>>
	<?php the_content('<br />[ More .......................................................... ]'); ?>
	<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	</div>
	<?php endwhile; ?>
	<?php comments_template('', true); ?>
	<?php endif; ?>
	</div>
	</div>
	<?php get_sidebar(); ?>
	<div class="clear"></div>
</div>
<?php get_footer(); ?>