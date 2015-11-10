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

/**
 * 登录用户浏览站点时不显示工具栏
 */
add_filter('show_admin_bar', '__return_false');

// 基本设置
//禁止代码标点转换
remove_action('wp_head', 'wp_generator');
remove_filter('comment_text', 'make_clickable', 9);
remove_filter('the_content', 'wptexturize');
remove_filter('wp_head', 'CID_css');
add_action('wp_print_scripts',	'wp_disable_autosave' );
remove_action('pre_post_update','wp_save_post_revision' );
function wp_disable_autosave() { wp_deregister_script('autosave');}
add_filter('pre_option_link_manager_enabled', '__return_true');
wp_deregister_script('l10n');

// 开启自动feed地址
add_theme_support( 'automatic-feed-links' );

// 开启缩略图
add_theme_support( 'post-thumbnails' );

// 图片上传时形成的缩略图尺寸
add_image_size( 'thumbnail-list', 200, '', true );
add_image_size( 'thumbnail-wide', 650, 260, true );

// 菜单区域
register_nav_menus( array(
	'topmenu' => '顶部菜单',
) );


/**
 * 
 * 禁用Google Open Sans字体
 */
function fun_remove_opensans() {    
    wp_deregister_style( 'open-sans');    
    wp_register_style( 'open-sans', false );    
    wp_enqueue_style('open-sans','');    
}    
add_action('init','fun_remove_opensans');

/**
 * 禁止无中文留言
 */
if (!is_user_logged_in()) {
	function fun_refused_nocomments($comment_data) {
		$pattern = '/[一-龥]/u';  
		if(!preg_match($pattern,$comment_data['comment_content'])) {
			err('评论必须含中文！');
		}
		return( $comment_data );
	}
	add_filter('preprocess_comment','fun_refused_nocomments');
}

/**
 * 
 * 禁止加载s.w.org表情
 */
function disable_emoji9s_tinymce($plugins) {
   if (is_array($plugins)) {
       return array_diff($plugins, array(
           'wpemoji'
       ));
   } else {
       return array();
   }
}

function custom_gitsmilie_src($old, $img) {
   return get_stylesheet_directory_uri() . '/images/smilies/' . $img;
}

function init_gitsmilie() {
   global $wpsmiliestrans;

   $wpsmiliestrans = array(
       ':mrgreen:' => 'icon_mrgreen.gif',
       ':neutral:' => 'icon_neutral.gif',
       ':twisted:' => 'icon_twisted.gif',
       ':arrow:' => 'icon_arrow.gif',
       ':shock:' => 'icon_eek.gif',
       ':smile:' => 'icon_smile.gif',
       ':???:' => 'icon_confused.gif',
       ':cool:' => 'icon_cool.gif',
       ':evil:' => 'icon_evil.gif',
       ':grin:' => 'icon_biggrin.gif',
       ':idea:' => 'icon_idea.gif',
       ':oops:' => 'icon_redface.gif',
       ':razz:' => 'icon_razz.gif',
       ':roll:' => 'icon_rolleyes.gif',
       ':wink:' => 'icon_wink.gif',
       ':cry:' => 'icon_cry.gif',
       ':eek:' => 'icon_surprised.gif',
       ':lol:' => 'icon_lol.gif',
       ':mad:' => 'icon_mad.gif',
       ':sad:' => 'icon_sad.gif',
       '8-)' => 'icon_cool.gif',
       '8-O' => 'icon_eek.gif',
       ':-(' => 'icon_sad.gif',
       ':-)' => 'icon_smile.gif',
       ':-?' => 'icon_confused.gif',
       ':-D' => 'icon_biggrin.gif',
       ':-P' => 'icon_razz.gif',
       ':-o' => 'icon_surprised.gif',
       ':-x' => 'icon_mad.gif',
       ':-|' => 'icon_neutral.gif',
       ';-)' => 'icon_wink.gif',
       '8O' => 'icon_eek.gif',
       ':(' => 'icon_sad.gif',
       ':)' => 'icon_smile.gif',
       ':?' => 'icon_confused.gif',
       ':D' => 'icon_biggrin.gif',
       ':P' => 'icon_razz.gif',
       ':o' => 'icon_surprised.gif',
       ':x' => 'icon_mad.gif',
       ':|' => 'icon_neutral.gif',
       ';)' => 'icon_wink.gif',
       ':!:' => 'icon_exclaim.gif',
       ':?:' => 'icon_question.gif',
   );

   remove_action('wp_head', 'print_emoji_detection_script', 7);
   remove_action('admin_print_scripts', 'print_emoji_detection_script');
   remove_action('wp_print_styles', 'print_emoji_styles');
   remove_action('admin_print_styles', 'print_emoji_styles');
   remove_filter('the_content_feed', 'wp_staticize_emoji');
   remove_filter('comment_text_rss', 'wp_staticize_emoji');
   remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
   add_filter('tiny_mce_plugins', 'disable_emoji9s_tinymce');
   add_filter('smilies_src', 'custom_gitsmilie_src', 10, 2);
}
add_action('init', 'init_gitsmilie', 5);

/**
 * 
 * 获取首页布局
 */
function fun_get_layout(){
	$layout = 'blog';
	
	if(ot_get_option('opt_layout')){
		$layout = ot_get_option('opt_layout');
	}
	
	return $layout;
}

/**
 * 
 * 获取UTF8编码字符串
 * @param string $str
 * @param string $from
 * @param int $len
 */
function fun_utf8_substr($str, $from, $len){
    return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
          '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
          '$1',$str);
}

/**
 * 
 * 是否有文章有第一张图片
 */
function has_first_image(){
	$first_img = fun_first_image();
	
	if(empty($first_img)){
		return false;
	}
	
	return true;
}

/**
 * 
 * 无缩略图时抓取第一张图片或输出随机图片
 */
function fun_first_image(){
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = isset($matches [1] [0]) ? $matches [1] [0] : '';
	
	return $first_img;
}

/**
 * 
 * 设置"New!"图标
 */
function fun_post_header(){
	if ( (time()-get_the_time('U')) <= (2*86400) ) {
		echo '<span class="new">NEW!</span> ';
	}
}

/**
 * 
 * 设置时间
 * @param string $ptime
 */
function fun_timeago($ptime) {
	date_default_timezone_set ('ETC/GMT');
    $ptime = strtotime($ptime);
    $etime = time() - $ptime;
    if($etime < 1) return '刚刚';
    $interval = array (
        12 * 30 * 24 * 60 * 60  =>  '年前 ('.date('Y-m-d', $ptime).')',
        30 * 24 * 60 * 60       =>  '个月前 ('.date('m-d', $ptime).')',
        7 * 24 * 60 * 60        =>  '周前 ('.date('m-d', $ptime).')',
        24 * 60 * 60            =>  '天前',
        60 * 60                 =>  '小时前',
        60                      =>  '分钟前',
        1                       =>  '秒前'
    );
    foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . $str;
        }
    };
}

/**
 * 
 * 设置页面导航
 * @param int $p
 */
function fun_pagenavi($p = 2) {
	if ( is_singular() ) return;
	global $wp_query, $paged;
	$max_page = $wp_query->max_num_pages;
	if ( $max_page == 1 ) return;
	if ( empty( $paged ) ) $paged = 1;
	echo '<span class="page-numbers">第 ' . $paged . ' 页 , 共 ' . $max_page . ' 页</span> ';
	if ( $paged > $p + 1 ) p_link( 1, '最前页' );
	if ( $paged > $p + 2 ) echo '<span class="page-numbers">...</span>';
	for( $i = $paged - $p; $i <= $paged + $p; $i++ ) {
		if ( $i > 0 && $i <= $max_page ) {
			$i == $paged ? print "<span class='current'>{$i}</span> " : p_link( $i );
		}
	}
	if ( $paged < $max_page - $p - 1 ) echo '<span class="page-numbers">...</span> ';
	if ( $paged < $max_page - $p ) p_link( $max_page, '最末页' );
}
function p_link( $i, $title = '' ) {
	if ( $title == '' ) $title = "第 {$i} 页";
	echo "<a href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>{$i}</a> ";
};

/**
 * 
 * 获取最多的评论
 * @param int $num
 * @param int $daynum
 */
function fun_most_comments($num = 10, $daynum = 30) {
	global $wpdb;
	$now = gmdate("Y-m-d H:i:s",time());
	$sql = "SELECT ID, post_title, post_date, comment_count, COUNT($wpdb->comments.comment_post_ID) AS 'popular' "
		."FROM $wpdb->posts, $wpdb->comments "
		."WHERE comment_approved = '1' "
		."AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID "
		."AND post_status = 'publish' "
		."AND post_date > date_sub( NOW(), INTERVAL $daynum DAY ) "
		."AND comment_status = 'open' "
		."GROUP BY $wpdb->comments.comment_post_ID "
		."ORDER BY popular DESC LIMIT $num";
		
	$posts = $wpdb->get_results($sql);
	$popular = '';
	if($posts){
		foreach($posts as $post){
			$post_title = stripslashes($post->post_title);
			$post_date = stripslashes($post->post_date);
			$comments = stripslashes($post->comment_count);
			$guid = get_permalink($post->ID);
			$popular .= '<li><a href="'.$guid.'#comments" title="'.$post_title.'">'.$post_title.' <span>('.$comments.')</span></a></li>';
		}	
	}else {
		$popular = '<li>coming soon...</li>'."\n";
	}
	echo $popular;
};


/**
 * 
 * 设置头像
 * @param string $avatar
 */
function fun_get_avatar($avatar) {
	$subject = $avatar;
	
	$pattern = '/avatar-([\d]+)/';
	$matches = array();
	if(preg_match($pattern,$subject,$matches)){
		$num = intval($matches[1]);
		if($num > 0){
			$pattern = '{$num}';
			$replacement = $num;
			$subject = '<img src="'.THEME_URI.'/images/gravatar.png" class="avatar avatar-{$num}" width="{$num}" height="{$num}" />';
			$avatar = str_replace($pattern,$replacement,$subject);
		}else {
			$pattern = array(
				"www.gravatar.com",
				"0.gravatar.com",
				"1.gravatar.com",
				"2.gravatar.com"
			);
			$replacement = 'gravatar.duoshuo.com';
			
			$avatar = str_replace($pattern,$replacement,$subject);
		}
	}
	
	return $avatar;
}
add_filter('get_avatar', 'fun_get_avatar');


/**
 * 
 * 添加文章目录
 * @param string $content
 */
function fun_add_content_menu($content) {
	if(is_single()){
    $matches = array();
    $ul_li = '';
    $r = "/<h2>([^<]+)<\/h2>/im";
    if(preg_match_all($r, $content, $matches)) {
        foreach($matches[1] as $num => $title) {
            $content = str_replace($matches[0][$num], '<h2 id="title-'.$num.'">'.$title.'</h2>', $content);
            $ul_li .= '<li><a href="#title-'.$num.'" title="'.$title.'">'.$title."</a></li>\n";
        }

        $content = "\n<div id=\"content-index-wrap\"><div id=\"content-index\">
                <b>文章目录</b>
                <ul id=\"index-ul\">\n" . $ul_li . "</ul>
            </div></div>\n" . $content;
    }
}
    return $content;
}
//add_filter( "the_content", "fun_add_content_menu", 13);

/**
 * 
 * 输出文章版权信息
 * @param int $post_id
 */
function fun_post_copyright($post_id){
	
	$post_id = intval($post_id);
	if(!$post_id) return;
	
	$content = get_post_meta( $post_id, 'ext_copyright', true );
	$content = empty($content) ? ot_get_option('opt_copyright') : $content;
	$content = stripcslashes(htmlspecialchars_decode($content));
	if($content){ 
		$search = array( '{name}', '{url}', '{title}', '{link}');
		$repacle = array(get_bloginfo('name'), home_url('/'), get_the_title($post_id), get_permalink($post_id));
		$content = str_replace($search, $repacle, $content);
	?>
	<div class="sg-cp">
		<i class="fa fa-bullhorn">&nbsp;</i>
		<?php echo $content;?>
	</div>
	<?php 
	}
}


/**
 * 
 * 支付宝Post收款
 * @param string $alipay_email
 * @param string $amount
 * @param unknown_type $hide
 */
function fun_alipay_post_gather($alipay_email,$amount=10,$hide=0){
	if(empty($alipay_email)){
		$alipay_email = ot_get_option('opt_alipay_email');
	}
	
	if($hide ==0){
		$style='display:inline-block;';
		$button = '<input name="pay" type="image" value="转帐" src="https://img.alipay.com/sys/personalprod/style/mc/btn-index.png" />';
	}else{
		$style='display:none;';
		$button = '<input name="pay" type="hidden" value="转帐"  />';
	}
	
	$html = '<form id="alipay-gather" style="'.$style.'" action="https://shenghuo.alipay.com/send/payment/fill.htm" method="POST" target="_blank" accept-charset="GBK">
		<input name="optEmail" type="hidden" value="'.$alipay_email.'" />
		<input name="payAmount" type="hidden" value="'.$amount.'" />
		<input id="title" name="title" type="hidden" value="支持一下" />
		<input name="memo" type="hidden" value="" />'.$button.'
		</form>';
	
	return $html;
}

/**
 * 
 * 自定义截断函数
 */
if (!function_exists('mb_strimwidth')) {
	function mb_strimwidth($str ,$start , $width ,$trimmarker ){
		$output = preg_replace('/^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$start.'}((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$width.'}).*/s','\1',$str);
		return $output.$trimmarker;
	}
}

/**
 * 
 * 文章目录
 * @param string $content
 */
function fun_article_index($content) {
   $matches = array();
   $ul_li = '';

   $pattern = "/<h2>([^<]+)<\/h2>/im";

   if(is_singular() && preg_match_all($pattern, $content, $matches)) {
      foreach($matches[1] as $num => $title) {
         $title = trim(strip_tags($title));
         $content = str_replace($matches[0][$num], '<h2 id="title-'.$num.'">'.$title.'</h2>', $content);
         $ul_li .= '<li><a href="#title-'.$num.'" title="'.$title.'">'.$title."</a></li>\n";
      }

      $content = "\n<div id=\"article-index\">
                     <strong>文章目录</strong>
                     <ul id=\"index-ul\">\n" . $ul_li . "</ul>
                  </div>\n" . $content;
   }

   return $content;
}
add_filter('the_content','fun_article_index');
