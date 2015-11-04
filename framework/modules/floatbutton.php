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
<ul id="floater">
<li class="floaticon" id="gototop"><a href="#" title="返回顶部">返回顶部</a></li>
<?php if ( is_single() ) :?>
<?php next_post_link( '<li id="next" class="floaticon">%link</li>', '下一篇：%title' ); ?>
<?php previous_post_link( '<li id="prev" class="floaticon">%link</li>', '上一篇：%title' ); ?>
<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : ?>
<?php if ( get_previous_posts_link() ) : ?><li id="next" class="floaticon" title="下一页"><?php previous_posts_link( '下一页' ); ?></li><?php endif; ?>
<?php if ( get_next_posts_link() ) : ?><li id="prev" class="floaticon" title="上一页"><?php next_posts_link( '上一页' ); ?></li><?php endif; ?>
<?php endif; ?>
<?php $rand_posts = get_posts('numberposts=1&orderby=rand');
foreach( $rand_posts as $post ) : ?>
<li class="floaticon" id="rand"><a href="<?php the_permalink(); ?>" title="随机阅读">随机阅读</a></li>
<?php endforeach; ?>
</ul>