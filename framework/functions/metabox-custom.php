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

/**
 *  添加面板到文章（页面）编辑页
 */
function fun_add_metabox() {

	$screens = array('post','page');

	foreach ($screens as $screen) {
		add_meta_box(
			'ext_copyright',
			__('文章内容底部版权信息', 'xiapistudio'),
			'fun_copyright_callback',
			$screen,
			'normal','high'
		);
		add_meta_box(
			'new-meta-boxes',
			__('本文是否加入幻灯片', 'xiapistudio'),
			'heading_meta_boxes', 
			$screen,
			'side','high'
		);
	}
}
add_action( 'add_meta_boxes', 'fun_add_metabox' );

/**
 * 
 * 本文是否加入幻灯片
 */
$prefix = 'key_';
global $heading_meta_boxes;
$heading_meta_boxes = array(
	'id' => 'key_custom',
	'title' => '本文是否加入幻灯片',
	'fields' => array(
		array(
			'id' => $prefix . 'slide',
			'type' => 'select',
			'options' => array('No', 'Yes'),
		),
	),
);
function heading_meta_boxes() {
	global $heading_meta_boxes,$post;
	echo '<input type="hidden" name="meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	echo '<table class="form-table" style="font-size:12px;">';
	foreach ($heading_meta_boxes['fields'] as $field) {
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
			case 'select':
				echo '<select name="', $field['id'], '" id="', $field['id'], '">';
				foreach ($field['options'] as $option) {
					echo '<option ', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
				}
				echo '</select>';
				break;
		}
	}
	echo '</table>';
}

function fun_copyright_callback($post){
	$copyright = get_post_meta( $post->ID, 'ext_copyright', true );
	$copyright = empty($copyright) ? ot_get_option('opt_copyright') : $copyright;
?>
<p><?php _e( '版权信息，其中{link}代表文章链接，{title}代表文章标题，{url}代表本站首页地址，{name}代表本站名称，文章输出后会自动替换', 'xiapistudio' );?></p>
<textarea name="ext_copyright" rows="5" class="large-text code"><?php echo stripcslashes(htmlspecialchars_decode($copyright));?></textarea>

<?php
}


/**
 * 保存文章时页，保存自定义内容
 *
 * @param int $post_id 这是即将保存的文章ID
 */
function fun_save_meta_box_data($post_id) {
	// 检查是否自动保存，自动保存则跳出
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// 检查用户权限
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}
	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}
	// 检查和更新字段
	if ( isset( $_POST['ext_copyright'] ) ) {
		update_post_meta( $post_id, 'ext_copyright', htmlspecialchars($_POST['ext_copyright']) );
	}
	
	if (wp_verify_nonce($_POST['meta_box_nonce'], basename(__FILE__))){
		global $heading_meta_boxes;
		foreach ($heading_meta_boxes['fields'] as $field) {
			$old = get_post_meta($post_id, $field['id'], true);
			$new = $_POST[$field['id']];
			
			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		}
	}
}
add_action( 'save_post', 'fun_save_meta_box_data' );