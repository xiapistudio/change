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
<div id="slider" class="nivoSlider">
<?php $args = array('meta_key' => 'key_slide', 'meta_value' => 'Yes', 'numberposts' => 5,); $slides = get_posts($args); foreach( $slides as $post ) : setup_postdata($post); global $exl_posts; $exl_posts[] = $post->ID; 
global $post, $posts; 
$first_img = ""; 
ob_start(); 
ob_end_clean(); 
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches); 
$first_img = $matches [1] [0];?>
<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>"><?php if ( has_post_thumbnail() ) { ?><?php the_post_thumbnail('thumbnail-wide', array( 'alt' => trim(strip_tags( $post->post_title )), 'title'	=> trim(strip_tags( $post->post_title )), )); ?><?php } else {?><img src="<?php echo $first_img ?>" /><?php } ?></a>
<?php endforeach; wp_reset_query(); ?>
</div>
