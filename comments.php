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
?>
<?php
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php
return;
}
?>

<?php if ( have_comments() ) : ?>
<h3 id="comments"><?php comments_number('尚无评论', '1 条评论', '% 条评论' );?></h3>
<ol class="commentlist">
<?php wp_list_comments(); ?>
</ol>

<div class="next-prev left"><?php previous_comments_link() ?></div>
<div class="next-prev right"><?php next_comments_link() ?></div>
<div class="clear"></div>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>
<div id="respond">
<h3><?php comment_form_title( '发表评论'); ?></h3>

<div class="cancel-comment-reply">
<?php cancel_comment_reply_link(); ?>
</div>

<?php if ( ot_get_option('comment_registration') && !$user_ID ) : ?>
<p>请 <a href="<?php echo ot_get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">登录</a> 后发表评论.</p>
<?php else : ?>

<form action="<?php echo ot_get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>
<p>你以 <a href="<?php echo ot_get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> 身份登录。 <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="登出">登出 &raquo;</a></p>

<?php else : ?>
<div style="width:300px;">
<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small>昵称：</small></label><?php if ($req) echo "(必填)"; ?></p>
<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small>邮箱：</small></label><?php if ($req) echo "(必填)"; ?></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>地址：</small></label>(以便回访)</p>
</div><div class="clear"></div>
<?php endif; ?>
<?php get_template_part('framework/modules/smiley'); ?>
<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea></p>
<p><input name="submit" type="submit" id="submit" tabindex="5" value="发表评论" /></p>
<?php comment_id_fields(); ?>
</form>

<?php endif;?>
</div>
<?php endif;?>
