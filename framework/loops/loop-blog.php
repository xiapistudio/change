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
<!-- Main Primary -->
<div id="primary">
	<?php if(is_home() && ot_get_option('opt_slider') == 'on') { get_template_part('framework/modules/slider'); } ?>
	<h3 class="sub">
		<?php if (is_home()) { ?>
		最新分享
		<?php } elseif (is_category()) { ?>
		分类 “<?php single_cat_title(); ?>” 下的文章
		<?php } elseif( is_tag() ) { ?>
		标签为 “<?php single_tag_title(); ?>” 的文章
		<?php } elseif (is_search()) { ?>
		关键词 “<?php echo esc_html(get_search_query()); ?>” 的搜索结果
		<?php } elseif (is_day()) { ?>
		发表于 “<?php the_time('F jS, Y'); ?>” 的文章
		<?php } elseif (is_month()) { ?>
		发表于 “<?php the_time('F, Y'); ?>” 的文章
		<?php } elseif (is_year()) { ?>
		发表于 “<?php the_time('Y'); ?>” 的文章
		<?php } elseif (is_author()) { ?>
		该作者发表的文章
		<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		文章列表
		<?php } ?>
	</h3>
	<div>
	<ul class="list">
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<li>
	<?php  if(!get_post_format()) { $format = 'standard'; } else { $format = get_post_format(); }?>
	<?php get_template_part('content',esc_attr( $format )); ?>
	</li>
	<?php endwhile; ?>
	</ul>
	</div>
	<div class="clear"></div>
	<div>
		<?php if (function_exists('fun_pagenavi')): ?>
		<div class="pagenavi">
		<?php fun_pagenavi(); ?>
		</div>
		<?php else : ?>
		<div class="pagenavi">
		<div class="left"><?php previous_posts_link('上一页'); ?></div>
		<div class="right"><?php next_posts_link('下一页'); ?></div></div>
		<?php endif; ?>
	</div>
	<?php else : ?>
	<h3 class="sub">
	<?php _e('温馨提示','xiapistudio');?>
	</h3>
	<p>抱歉，没有符合条件的内容。</p>
	<?php endif; ?>
	<div class="clear"></div>
</div>
<!--/.Main Primary -->