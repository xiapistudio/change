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

add_action( 'widgets_init', 'recommend_widget_box' );
function recommend_widget_box() {
	register_widget( 'recommend_widget' );
}
class recommend_widget extends WP_Widget {
	
	function recommend_widget() {
		$widget_ops = array( 
			'classname' => 'recommend_widget',
			'description' => '推荐阅读',
		);
		$this->WP_Widget( 'recommend_widget',THEME_NAME .' - '.__( '推荐阅读' , 'xiapistudio'), $widget_ops);
	}

	function widget($args,$instance){
		extract($args);
	?>
		<?php echo $before_widget; ?>
        <?php if($instance['title'])echo $before_title.$instance['title']. $after_title; ?>
        <ul class="spy">
		<?php query_posts( array('posts_per_page' => 5,'orderby' => 'rand','caller_get_posts' => 1) ); while ( have_posts() ) : the_post();?>
		<li><?php if ( has_post_thumbnail() ) { ?>
		<div class="img"><?php the_post_thumbnail('thumbnail', array( 'alt' => trim(strip_tags( $post->post_title )), 'title'	=> trim(strip_tags( $post->post_title )), )); ?></div><?php } ?>
		<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<div class="fcats"><?php the_category(', '); ?></div> 
		<div class="fcats"><?php the_time('Y.m.d'); ?></div> 
		</li>
		<?php endwhile; wp_reset_query();?>
		</ul>
		<?php echo $after_widget; ?>

	<?php }

	function update($new_instance,$old_instance){
		return $new_instance;
	}

	function form($instance){
		$title = esc_attr($instance['title']);
	?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('标题：','xiapistudio'); ?><input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
	<?php
	}
}
