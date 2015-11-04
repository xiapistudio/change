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
	<?php get_template_part( 'loop', 'index' );?>
	<?php get_sidebar(); ?>
	<div class="clear"></div>
</div>

<?php get_footer(); ?>

