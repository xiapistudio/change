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

add_action( 'widgets_init', 'recent_comments_widget_box' );
function recent_comments_widget_box() {
	register_widget( 'recent_comments_widget' );
}
class recent_comments_widget extends WP_Widget {
	
	function recent_comments_widget() {
		$widget_ops = array( 
			'classname' => 'recent_comments_widget',
			'description' => '最近评论',
		);
		$this->WP_Widget( 'recent_comments_widget',THEME_NAME .' - '.__( '最近评论' , 'xiapistudio'), $widget_ops);
	}

	function widget($args,$instance){
		extract($args);
		global $wpdb;
		$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type,comment_author_url,comment_author_email, SUBSTRING(comment_content,1,42) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT 5";
		
		$comments = $wpdb->get_results($sql);
		$output = $pre_HTML;
		foreach ($comments as $comment) {
		$output .= "<li><div class='img'>".get_avatar(get_comment_author_email(),50)."</div><div class=\"author\"><a href=\"". get_comment_link( $comment->comment_ID ) ."\" title=\"". $comment->post_title ."\"><strong>".strip_tags($comment->comment_author). "</strong> : " .stripslashes(convert_smilies($comment->com_excerpt)). "...</a></div></li>";
		}
		$output .= $post_HTML;
		
		echo $before_widget;
     	if($instance['title'])echo $before_title.$instance['title']. $after_title;
     	echo '<ul class="spy">';
		echo $output;
		echo '</ul>';
		echo $after_widget;

	}

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
