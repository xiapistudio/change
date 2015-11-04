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
<div id='footer'>
	<div class="footbar">
	<?php if ( !dynamic_sidebar('Footer') ){ ?>
	<h3 class="sub">标签云</h3>
	<ul><?php wp_tag_cloud('number=40&smallest=10&largest=16');?></ul>
	<?php } ?>
	</div>
	<div class="copyright">
	<h3 class="sub">版权声明</h3>
	<?php if(ot_get_option('opt_beian')) echo '<a href="http://www.miitbeian.gov.cn/" target="_blank">'.ot_get_option('opt_beian').'</a><br/>'; ?>
	Copyright &copy; <?php echo date("Y");?> <a href="<?php bloginfo('url'); ?>" target="_blank" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> All Rights Reserved<br/>  
	<h3 class="sub">网站开发</h3>
	Powered by <a href='http://wordpress.org/' title='采用 WordPress构建'>WordPress</a> & Theme  by <a href='https://github.com/xiapistudio/change' title='由 虾皮工作室 设计'>Change Theme</a>
	</div>
	<div class="clear"></div>
	<?php get_template_part('framework/modules/floatbutton'); ?>
</div>
<?php wp_footer();?>
</body>
</html>