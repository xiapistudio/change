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
<div class="thumbnail">
	<div class="cat"><?php the_category(' &middot; '); ?></div>
	<div class="img">
	<?php if (has_post_thumbnail()) { ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
		<?php the_post_thumbnail('thumbnail-list', array( 'alt' => trim(strip_tags( $post->post_title )), 'title'=> trim(strip_tags( $post->post_title )))); ?>
		</a>
	<?php } elseif (has_first_image()) {?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>"><img src="<?php echo fun_first_image(); ?>" /></a>
	<?php }?>
	</div>
</div>
