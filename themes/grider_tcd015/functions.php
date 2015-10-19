<?php

// 言語ファイルの読み込み --------------------------------------------------------------------------------
load_textdomain('tcd-w', dirname(__FILE__).'/languages/' . get_locale() . '.mo');


// テーマオプション --------------------------------------------------------------------------------
require_once ( dirname(__FILE__) . '/admin/theme-options.php' );


// 更新通知 --------------------------------------------------------------------------------
require_once ( dirname(__FILE__) . '/functions/update_notifier.php' );


// おすすめ記事 PICKUP記事 --------------------------------------------------------------------------------
require_once ( dirname(__FILE__) . '/functions/recommend.php' );


// meta title と meta description --------------------------------------------------------------------------------
require_once ( dirname(__FILE__) . '/functions/seo.php' );


//日付取得用関数 --------------------------------------------------------------------------------
require_once ( dirname(__FILE__) . '/functions/date.php' );

//nextpage --------------------------------------------------------------------------------
require_once ( dirname(__FILE__) . '/functions/custom_page_link.php' );

//ロゴ画像用関数 --------------------------------------------------------------------------------
require_once ( dirname(__FILE__) . '/functions/header-logo.php' );


//ウィジェット --------------------------------------------------------------------------------
require_once ( dirname(__FILE__) . '/widget/recent_post.php' );
require_once ( dirname(__FILE__) . '/widget/recommend_post.php' );


// スタイルシートの読み込み --------------------------------------------------------------------------------
add_action('admin_print_styles', 'my_admin_CSS');
function my_admin_CSS() {
 wp_enqueue_style('myAdminCSS', get_bloginfo('stylesheet_directory').'/admin/my_admin.css');
};


// ビジュアルエディタ用スタイルシートの読み込み --------------------------------------------------------------------------------
add_editor_style();


// ウィジェットの設定 ------------------------------------------------------------------------------
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'before_widget' => '<div class="side_widget block clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline">',
        'after_title' => "</h3>\n",
        'name' => __('Index side widget', 'tcd-w'),
        'id' => 'index_side_widget'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="side_widget block clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline">',
        'after_title' => "</h3>\n",
        'name' => __('Archive side widget', 'tcd-w'),
        'id' => 'archive_side_widget'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="side_widget block clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline">',
        'after_title' => "</h3>\n",
        'name' => __('Single page side widget', 'tcd-w'),
        'id' => 'single_side_widget'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="side_widget block clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline">',
        'after_title' => "</h3>\n",
        'name' => __('Page side widget', 'tcd-w'),
        'id' => 'page_side_widget'
    ));
}

// オリジナルの抜粋記事 --------------------------------------------------------------------------------
function new_excerpt($a) {

 $base_content = get_the_content();
 $base_content = preg_replace('!<style.*?>.*?</style.*?>!is', '', $base_content);
 $base_content = preg_replace('!<script.*?>.*?</script.*?>!is', '', $base_content);
 $base_content = strip_tags($base_content);
 $trim_content = mb_substr($base_content, 0, $a ,"utf-8");
 $trim_content = mb_ereg_replace('&nbsp;', '', $trim_content);

 echo $trim_content . '…';

};
//抜粋からPタグを取り除く
remove_filter( 'the_excerpt', 'wpautop' );


// 記事タイトルの文字数制限 --------------------------------------------------------------------------------
function trim_title($num) {
 $base_title = get_the_title();
 $trim_title = mb_substr($base_title, 0, $num ,"utf-8");
 $count_title = mb_strlen($trim_title,"utf-8");
 if($count_title > $num-1) {
  echo $trim_title . '…';
 } else {
  echo $trim_title;
 };
};


// アイキャッチに文言を追加 --------------------------------------------------------------------------------
add_filter( 'admin_post_thumbnail_html', 'add_featured_image_instruction');
function add_featured_image_instruction( $content ) {
 return $content .= '<p>' . __('Upload post thumbnail from here.', 'tcd-w') . '</p>';
};


//　ヘッダーから余分なMETA情報を削除 --------------------------------------------------------------------
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');


//　サムネイルの設定 --------------------------------------------------------------------------------
if (function_exists('add_theme_support')) {
 add_theme_support('post-thumbnails');
 add_image_size( 'size1', 300, 225, true );
 add_image_size( 'size2', 616, 9999, false );
 add_image_size( 'size3', 50, 50, true );
 //add_image_size( 'size4', 616, 300, true );
}


// カスタムメニューの設定 --------------------------------------------------------------------------------
if(function_exists('register_nav_menu')) {
 register_nav_menu( 'global-menu', __( 'Global menu', 'tcd-w' ) );
}


// カスタムコメント --------------------------------------------------------------------------------------

if (function_exists('wp_list_comments')) {
	// comment count
	add_filter('get_comments_number', 'comment_count', 0);
	function comment_count( $commentcount ) {
		global $id;
		$_commnets = get_comments('post_id=' . $id);
		$comments_by_type = &separate_comments($_commnets);
		return count($comments_by_type['comment']);
	}
}


function custom_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	global $commentcount;
	if(!$commentcount) {
		$commentcount = 0;
	}
?>

 <li class="comment <?php if($comment->comment_author_email == get_the_author_meta('email')) {echo 'admin-comment';} else {echo 'guest-comment';} ?>" id="comment-<?php comment_ID() ?>">

  <div class="comment-meta clearfix">

   <div class="comment-meta-left">

    <?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 35); } ?>

    <ul class="comment-name-date">
     <li class="comment-name">
      <?php if (get_comment_author_url()) : ?>
      <a id="commentauthor-<?php comment_ID() ?>" class="url <?php if($comment->comment_author_email == get_the_author_meta('email')) {echo 'admin-url';} else {echo 'guest-url';} ?>" href="<?php comment_author_url() ?>" rel="nofollow">
      <?php else : ?>
      <span id="commentauthor-<?php comment_ID() ?>">
      <?php endif; ?>
      <?php comment_author(); ?>
      <?php if(get_comment_author_url()) : ?>
      </a>
      <?php else : ?>
      </span>
      <?php endif;  $options = get_option('tcd-w_options'); ?>
     </li>
     <li class="comment-date"><?php echo get_comment_time(__('F jS, Y', 'tcd-w')); if ($options['time_stamp']) : echo get_comment_time(__(' g:ia', 'tcd-w')); endif; ?></li>
    </ul>

   </div><!-- END .comment_meta_left -->

   <ul class="comment-act">
    <?php
         if (function_exists('comment_reply_link')) {
          if ( get_option('thread_comments') == '1' ) {
    ?>
    <li class="comment-reply"><?php comment_reply_link(array_merge( $args, array('add_below' => 'comment-content', 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => '<span><span>'.__('REPLY','tcd-w').'</span></span>'))) ?></li>
    <?php } else { ?>
    <li class="comment-reply"><a href="javascript:void(0);" onclick="MGJS_CMT.reply('commentauthor-<?php comment_ID() ?>', 'comment-<?php comment_ID() ?>', 'comment');"><?php _e('REPLY', 'tcd-w'); ?></a></li>
    <?php
          }
         } else {
    ?>
    <li class="comment-reply"><a href="javascript:void(0);" onclick="MGJS_CMT.reply('commentauthor-<?php comment_ID() ?>', 'comment-<?php comment_ID() ?>', 'comment');"><?php _e('REPLY', 'tcd-w'); ?></a></li>
    <?php } ?>
    <li class="comment-quote"><a href="javascript:void(0);" onclick="MGJS_CMT.quote('commentauthor-<?php comment_ID() ?>', 'comment-<?php comment_ID() ?>', 'comment-content-<?php comment_ID() ?>', 'comment');"><?php _e('QUOTE', 'tcd-w'); ?></a></li>
    <?php edit_comment_link(__('EDIT', 'tcd-w'), '<li class="comment-edit">', '</li>'); ?>
   </ul>

  </div><!-- END .comment_meta -->

  <div class="comment-content post" id="comment-content-<?php comment_ID() ?>">
   <?php if ($comment->comment_approved == '0') : ?>
   <span class="comment-note"><?php _e('Your comment is awaiting moderation.', 'tcd-w'); ?></span>
   <?php endif; ?>
   <?php comment_text(); ?>
  </div>

<?php } ?>