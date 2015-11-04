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
<div class="postmetadata">
<h3 class="sub" style="padding:0 0 8px; margin:0 0 12px;">相关文章</h3>
<ul class="related">
<?php
$post_num = 6;
global $post;
$tmp_post = $post;
$tags = ''; $i = 0;
$exclude_id = $post->ID;
$posttags = get_the_tags();
if ( $posttags ) {
  foreach ( $posttags as $tag ) $tags .= $tag->name . ',';
  $tags = strtr(rtrim($tags, ','), ' ', '-');
  $myposts = get_posts('numberposts='.$post_num.'&tag='.$tags.'&exclude='.$exclude_id);
  foreach($myposts as $post) {
setup_postdata($post);
?>
<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> (<?php comments_number('0', '1', '%', ''); ?>)</li>
<?php
$exclude_id .= ','.$post->ID; $i ++;
}
}
if ( $i < $post_num ) {
  $post = $tmp_post; setup_postdata($post);
  $cats = ''; $post_num -= $i;
  foreach ( get_the_category() as $cat ) $cats .= $cat->cat_ID . ',';
  $cats = strtr(rtrim($cats, ','), ' ', '-');
  $myposts = get_posts('numberposts='.$post_num.'&category='.$cats.'&exclude='.$exclude_id);
  foreach($myposts as $post) {
setup_postdata($post);
?>
<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> (<?php comments_number('0', '1', '%', ''); ?>)</li>
<?php
}
}
$post = $tmp_post; setup_postdata($post);
?>
</ul>
<div class="clear"></div>
</div>