<?php
/***************************************

	Theme Name: 	Change Theme
	Theme URI: 		https://github.com/xiapistudio/change
	Description: 	Chage主题，虾皮工作室专用
	Version: 		1.0.1
	Author: 		虾皮工作室
	Author URI: 	http://www.xiapistudio.com/
	License:     	GNU General Public License v3.0
	License URI: 	http://www.gnu.org/licenses/gpl-3.0.html
	
***************************************/
?>
<?php if(ot_get_option('opt_show_thumb') == 'on' && (has_post_thumbnail() || has_first_image())){?>
<?php get_template_part('framework/modules/thumbnail'); ?>
<div class="content">
	<h2><?php if( is_sticky() ) echo '<strong style="font-weight:normal;color:green;">[置顶]</strong>'; ?> <a href="<?php the_permalink(); ?>" title="<?php the_title() ?>"><?php echo mb_strimwidth(get_the_title(),0,60,' …'); ?></a></h2>
	<div class="info">
		<span><?php fun_post_header(); ?></span>
		<span><i class="fa fa-user">&nbsp;</i><?php the_author_posts_link();?></span>
		<span><i class="fa fa-calendar">&nbsp;</i><?php echo fun_timeago( get_gmt_from_date(get_the_time('Y-m-d G:i:s'))); ?></span>
		<?php if( function_exists( 'the_views' ) ) { ?><span><i class="fa fa-fire"></i>&nbsp;阅读 <?php the_views(); ?> 次</span> <?php }?>
		<span><?php if ( comments_open() ): ?><i class="fa fa-comments"></i>&nbsp;<?php comments_popup_link( __('抢沙发','xiapistudio'), __('1 条评论','xiapistudio'), __('% 条评论','xiapistudio')); ?><?php else:?><i class="fa fa-comments"></i>&nbsp;<?php _e(' 评论关闭','xiapistudio'); ?><?php endif; ?></span>
	</div>
	<p><?php if(has_excerpt()){ the_excerpt();} else { echo mb_strimwidth(strip_tags($post->post_content),0,200,'...');}?></p><p class="link"><a href="<?php the_permalink(); ?>">阅读全文...</a></p>
</div>
<?php } else {?>
<div class="content none">
	<div class="nothumbnail">
	<?php the_category(' &middot; '); ?>
	</div>
	<h2><?php if( is_sticky() ) echo '<strong style="font-weight:normal;color:green;">[置顶]</strong>'; ?> <a href="<?php the_permalink(); ?>" title="<?php the_title() ?>"><?php echo mb_strimwidth(get_the_title(),0,60,' …'); ?></a></h2>
	<div class="info">
		<span><?php fun_post_header(); ?></span>
		<span><i class="fa fa-user">&nbsp;</i><?php the_author_posts_link();?></span>
		<span><i class="fa fa-calendar">&nbsp;</i><?php echo fun_timeago( get_gmt_from_date(get_the_time('Y-m-d G:i:s'))); ?></span>
		<?php if( function_exists( 'the_views' ) ) { ?><span><i class="fa fa-fire"></i>&nbsp;阅读 <?php the_views(); ?> 次</span> <?php }?>
		<span><?php if ( comments_open() ): ?><i class="fa fa-comments"></i>&nbsp;<?php comments_popup_link(__('抢沙发','xiapistudio'), __('1 条评论','xiapistudio'), __('% 条评论','xiapistudio') ); ?><?php else:?><i class="fa fa-comments"></i>&nbsp;<?php _e(' 评论关闭','xiapistudio'); ?><?php endif; ?></span>
	</div>
	<p><?php if(has_excerpt()){ the_excerpt();} else { echo mb_strimwidth(strip_tags($post->post_content),0,200,'...');}?></p><p class="link"><a href="<?php the_permalink(); ?>">阅读全文...</a></p>
</div>
<?php }?>
