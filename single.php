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
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h1 class="sub"><?php the_title(); ?></h1>
		<div class="postinfo">
			<div class="left">
				<span><i class="fa fa-folder-open">&nbsp;</i><?php the_category(' ',''); ?></span>
				<span><i class="fa fa-user">&nbsp;</i><?php the_author_posts_link();?></span>
				<span><i class="fa fa-calendar">&nbsp;</i><?php echo fun_timeago( get_gmt_from_date(get_the_time('Y-m-d G:i:s'))); ?></span>
				<?php if (is_user_logged_in()) : ?>
				<span><i class="fa fa-edit">&nbsp;</i><?php edit_post_link('编辑', '', ''); ?></span>
				<?php endif; ?>
			</div>
			<div class="right">
				<a href="#respond" title="发表评论"><?php comments_number('发表评论', '1 条评论', '% 条评论'); ?></a>
			</div>
			<div class="clear"></div>
		</div>

		<div id="content">
		<?php the_content();?>
		
		<!-- Page links -->
		<?php wp_link_pages(array('before' => '<div class="clear"></div><p><strong>'.PAGES.':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		<!-- /.Page links -->
		</div>
		
		<!-- Single Tags -->
		<?php the_tags('<div class="sg-tag"><i class="fa fa-tag"></i>&nbsp;&nbsp;',' ','</div>'); ?>
		<!-- /.Single Tags -->
		
		<!-- Single Share -->
		<?php if(ot_get_option('opt_share')) get_template_part('framework/modules/share');?>
		<!-- /.Single Share -->
		
		<!-- Single Copyright -->
		<?php fun_post_copyright($post->ID); ?>
		<!-- /.Single Copyright -->
		
		<!-- Related Articles -->
		<?php get_template_part('framework/modules/related'); ?>		
		<!-- /.Related Articles -->	
		
		<?php endwhile; endif; ?>
	
		<!-- Prev or Next Article -->
		<div class="navigation">
			<div class="navigation-left">
				<span><?php _e('上一篇','xiapistudio'); ?></span>
				<?php previous_post_link('%link'); echo"<a>&nbsp;</a>"; ?>
			</div>
			<div class="navigation-right">
				<span><?php _e('下一篇','xiapistudio'); ?></span>
				<?php echo"<a>&nbsp;</a>"; next_post_link('%link'); ?>
			</div>
		</div>
		
		<!-- /.Prev or Next Article -->
		<!-- Comments -->
		<?php if (comments_open()) comments_template( '', true ); ?>
		<!-- /.Comments -->
		<div class="clear"></div>
	</div>
	<?php get_sidebar(); ?>
	<div class="clear"></div>
</div>
<?php get_footer(); ?>