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
	<div class="content">
	<h2 class="sub">温馨提示</h2>
	<h6>抱歉，您查看的内容无法找到。请使用搜索功能查找相关的关键词。</h6>
	<div class="clear"></div>
	<br />
	<div class="post">
	<h2 class="sub">随机挑选</h2>
	<ul>
	<?php
	$rand_posts = get_posts('numberposts=15&orderby=rand');
	foreach( $rand_posts as $post ) :
	?>
	<li>[ <?php if (the_category(', '))  the_category(); ?> ] <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php endforeach; ?>
	</ul>
	</div>
	</div>
	</div>
	<?php get_sidebar(); ?>
	<div class="clear"></div>
</div>
<?php get_footer(); ?>