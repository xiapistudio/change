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

add_action( 'widgets_init', 'hot_comments_widget_box' );
function hot_comments_widget_box() {
	register_widget( 'hot_comments_widget' );
}
class hot_comments_widget extends WP_Widget {
	
	function hot_comments_widget() {
		$widget_ops = array( 
			'classname' => 'hot_comments_widget',
			'description' => '每月热评',
		);
		$this->WP_Widget( 'hot_comments_widget',THEME_NAME .' - '.__( '每月热评' , 'xiapistudio'), $widget_ops);
	}

	function widget($args,$instance){
		extract($args);
	?>
		<?php echo $before_widget; ?>
        <?php if($instance['title'])echo $before_title.$instance['title']. $after_title; ?>
		<ul><?php fun_most_comments('5', '30'); ?></ul>
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
