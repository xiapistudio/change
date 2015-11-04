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

if(!have_posts()){
	//如果没有文章，则显示未找到页面
	get_template_part( 'framework/modules/not-found' );
}else {
	global $loop_layout;
	
	//如果为空，获取对应的设置
	if(empty($loop_layout)){
		$loop_layout = fun_get_layout();
	}
	
	//根据设置，选择相应的模板
	switch($loop_layout){
		default:
			get_template_part( 'framework/loops/loop-blog' );
	}
}

?>