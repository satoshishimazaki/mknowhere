<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * オプション初期値
 * @var array 
 */
global $dp_default_options;
$dp_default_options = array(
	'logotop' => 0,
	'logoleft' => 0,
	'content_font_size' => '14',
	'show_author' => 1,
	'show_comment' => 1,
	'show_trackback' => 1,
	'show_bookmark' => 1,
	'show_next_post' => 1,
	'show_related_post' => 1,
	'show_rss' => 1,
	'show_search' => 1,
	'show_slider' => 1,
	'twitter_url' => '',
	'facebook_url' => '',
	'custom_search_id' => '',
	'color_type'  => 'color1',
	'bg_type1'  => 'type1',
	'bg_type2'  => 'image1',
	'headline_side_category' => 'Category',
	'headline_side_archive' => 'Archive',
	'headline_side_menu' => 'Menu',
	'show_side_category' => 1,
	'show_side_archive' => 1,
	'show_side_menu' => 1,
	'single_post_list'  => 'normal',
	'single_post_list_num' => '5',
	'single_ad_code1' => '',
	'single_ad_url1' => '',
	'single_ad_image1' => false,
	'single_ad_code2' => '',
	'single_ad_url2' => '',
	'single_ad_image2' => false,
	'single_ad_code3' => '',
	'single_ad_url3' => '',
	'single_ad_image3' => false,
	'single_ad_code4' => '',
	'single_ad_url4' => '',
	'single_ad_image4' => false,
	'post_ad1' => '',
	'post_ad_url1' => '',
	'post_ad_image1' => false,
	'post_ad2' => '',
	'post_ad_url2' => '',
	'post_ad_image2' => false,
	'post_ad3' => '',
	'post_ad_url3' => '',
	'post_ad_image3' => false,
	'show_slider' => '',
	'slider_url1' => '',
	'slider_image1' => false,
	'slider_url2' => '',
	'slider_image2' => false,
	'slider_url3' => '',
	'slider_image3' => false,
	'slider_url4' => '',
	'slider_image4' => false,
	'slider_url5' => '',
	'slider_image5' => false,
	'slider_url6' => '',
	'slider_image6' => false,
	'slider_url7' => '',
	'slider_image7' => false,
	'slider_url8' => '',
	'slider_image8' => false,
	'slider_url9' => '',
	'slider_image9' => false,
	'slider_url10' => '',
	'slider_image10' => false,
	'original_pattern' => false
);

/**
 * Design Plusのオプションを返す
 * @global array $dp_default_options
 * @return array 
 */
function get_desing_plus_option(){
	global $dp_default_options;
	return shortcode_atts($dp_default_options, get_option('dp_options', array()));
}



// カラーピッカーの準備 その他javascriptの読み込み
add_action('admin_print_scripts', 'my_admin_print_scripts');
function my_admin_print_scripts() {
  wp_enqueue_script('jscolor', get_template_directory_uri().'/admin/jscolor.js');
  wp_enqueue_script('jquery.cookieTab', get_template_directory_uri().'/admin/jquery.cookieTab.js');
}



// 画像アップロードの準備
function wp_gear_manager_admin_scripts() {
wp_enqueue_script('dp-image-manager', get_template_directory_uri().'/admin/image-manager.js', array('jquery', 'jquery-ui-draggable', 'imgareaselect'));
}
function wp_gear_manager_admin_styles() {
wp_enqueue_style('imgareaselect');
}
add_action('admin_print_scripts', 'wp_gear_manager_admin_scripts');
add_action('admin_print_styles', 'wp_gear_manager_admin_styles');



// 登録
function theme_options_init(){
 register_setting( 'design_plus_options', 'dp_options', 'theme_options_validate' );
}


// ロード
function theme_options_add_page() {
 add_theme_page( __( 'Theme Options', 'tcd-w' ), __( 'Theme Options', 'tcd-w' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}


/**
 * レイアウトの初期設定
 * @var array 
 */
global $color_options;
$color_options = array(
 'color1' => array(
  'value' => 'color1',
  'label' => __( 'color1', 'tcd-w' ),
  'img' => 'color1'
 ),
 'color2' => array(
  'value' => 'color2',
  'label' => __( 'color2', 'tcd-w' ),
  'img' => 'color2'
 ),
 'color3' => array(
  'value' => 'color3',
  'label' => __( 'color3', 'tcd-w' ),
  'img' => 'color3'
 ),
 'color4' => array(
  'value' => 'color4',
  'label' => __( 'color4', 'tcd-w' ),
  'img' => 'color4'
 ),
 'color5' => array(
  'value' => 'color5',
  'label' => __( 'color5', 'tcd-w' ),
  'img' => 'color5'
 ),
 'color6' => array(
  'value' => 'color6',
  'label' => __( 'color6', 'tcd-w' ),
  'img' => 'color6'
 ),
 'color7' => array(
  'value' => 'color7',
  'label' => __( 'color7', 'tcd-w' ),
  'img' => 'color7'
 )
);



/**
 * 詳細記事ページの記事一覧の初期設定
 * @var array 
 */
global $single_post_list_options;
$single_post_list_options = array(
 'normal' => array(
  'value' => 'normal',
  'label' => __( 'Recent post', 'tcd-w' )
 ),
 'recommend' => array(
  'value' => 'recommend',
  'label' => __( 'Recommend post', 'tcd-w' )
 ),
 'category' => array(
  'value' => 'category',
  'label' => __( 'Same category post', 'tcd-w' )
 )
);



/**
 * 背景画像の初期設定
 * @var array 
 */
global $bg_type1_options;
$bg_type1_options = array(
 'type1' => array(
  'value' => 'type1',
  'label' => __( 'Gray', 'tcd-w' )
 ),
 'type2' => array(
  'value' => 'type2',
  'label' => __( 'Use Basic color', 'tcd-w' )
 ),
 'type3' => array(
  'value' => 'type3',
  'label' => __( 'Use image set', 'tcd-w' )
 ),
 'type4' => array(
  'value' => 'type4',
  'label' => __( 'Use original image', 'tcd-w' )
 )
);



/**
 * レイアウトの初期設定
 * @var array 
 */
global $bg_type2_options;
$bg_type2_options = array(
 'image1' => array(
  'value' => 'image1',
  'label' => __( 'image1', 'tcd-w' ),
  'img' => 'image1'
 ),
 'image2' => array(
  'value' => 'image2',
  'label' => __( 'image2', 'tcd-w' ),
  'img' => 'image2'
 ),
 'image3' => array(
  'value' => 'image3',
  'label' => __( 'image3', 'tcd-w' ),
  'img' => 'image3'
 ),
 'image4' => array(
  'value' => 'image4',
  'label' => __( 'image4', 'tcd-w' ),
  'img' => 'image4'
 ),
 'image5' => array(
  'value' => 'image5',
  'label' => __( 'image5', 'tcd-w' ),
  'img' => 'image5'
 ),
 'image6' => array(
  'value' => 'image6',
  'label' => __( 'image6', 'tcd-w' ),
  'img' => 'image6'
 )
);



// テーマオプション画面の作成
function theme_options_do_page() {
 global $color_options, $single_post_list_options, $bg_type1_options, $bg_type2_options, $dp_upload_error;
 $options = get_desing_plus_option(); 

 if ( ! isset( $_REQUEST['settings-updated'] ) )
  $_REQUEST['settings-updated'] = false;


?>

<div class="wrap">
 <?php screen_icon(); echo "<h2>" . __( 'Theme Options', 'tcd-w' ) . "</h2>"; ?>

 <?php // 更新時のメッセージ
       if ( false !== $_REQUEST['settings-updated'] ) :
 ?>
 <div class="updated fade"><p><strong><?php _e('Updated', 'tcd-w');  ?></strong></p></div>
 <?php endif; ?>

 <?php /* ファイルアップロード時のメッセージ */ if(!empty($dp_upload_error['message'])): ?>
  <?php if($dp_upload_error['error']): ?>
   <div id="error" class="error"><p><?php echo $dp_upload_error['message']; ?></p></div>
  <?php else: ?>
   <div id="message" class="updated fade"><p><?php echo $dp_upload_error['message']; ?></p></div>
  <?php endif; ?>
 <?php endif; ?>
 
 <script type="text/javascript">
  jQuery(document).ready(function($){
   $('#my_theme_option').cookieTab({
    tabMenuElm: '#theme_tab',
    tabPanelElm: '#tab-panel'
   });
  });
 </script>

 <div id="my_theme_option">

 <div id="theme_tab_wrap">
  <ul id="theme_tab" class="cf">
   <li><a href="#tab-content1"><?php _e('Basic Setup', 'tcd-w');  ?></a></li>
   <li><a href="#tab-content2"><?php _e('Slider Setup', 'tcd-w');  ?></a></li>
   <li><a href="#tab-content3"><?php _e('Logo', 'tcd-w');  ?></a></li>
   <li><a href="#tab-content4"><?php _e('Adsence Setup', 'tcd-w');  ?></a></li>
  </ul>
 </div>

<form method="post" action="options.php" enctype="multipart/form-data">
 <?php settings_fields( 'design_plus_options' ); ?>

 <div id="tab-panel">

  <!-- #tab-content1 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
  <div id="tab-content1">

   <?php // フォントサイズ ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Font size', 'tcd-w');  ?></h3>
    <p><?php _e('Font size of single page and wp-page.', 'tcd-w');  ?></p>
    <div class="theme_option_input">
     <input id="dp_options[content_font_size]" class="font_size" type="text" name="dp_options[content_font_size]" value="<?php esc_attr_e( $options['content_font_size'] ); ?>" /><span>px</span>
    </div>
   </div>

   <?php // 投稿者名・タグ・コメント ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Display Setup', 'tcd-w');  ?></h3>
    <div class="theme_option_input">
     <ul>
      <li><label><input id="dp_options[show_author]" name="dp_options[show_author]" type="checkbox" value="1" <?php checked( '1', $options['show_author'] ); ?> /> <?php _e('Display author', 'tcd-w');  ?></label></li>
      <li><label><input id="dp_options[show_comment]" name="dp_options[show_comment]" type="checkbox" value="1" <?php checked( '1', $options['show_comment'] ); ?> /> <?php _e('Display comment', 'tcd-w');  ?></label></li>
      <li><label><input id="dp_options[show_trackback]" name="dp_options[show_trackback]" type="checkbox" value="1" <?php checked( '1', $options['show_trackback'] ); ?> /> <?php _e('Display trackbacks', 'tcd-w');  ?></label></li>
      <li><label><input id="dp_options[show_bookmark]" name="dp_options[show_bookmark]" type="checkbox" value="1" <?php checked( '1', $options['show_bookmark'] ); ?> /> <?php _e('Display social bookmark', 'tcd-w');  ?></label></li>
      <li><label><input id="dp_options[show_next_post]" name="dp_options[show_next_post]" type="checkbox" value="1" <?php checked( '1', $options['show_next_post'] ); ?> /> <?php _e('Display next previous post link', 'tcd-w');  ?></label></li>
      <li><label><input id="dp_options[show_related_post]" name="dp_options[show_related_post]" type="checkbox" value="1" <?php checked( '1', $options['show_related_post'] ); ?> /> <?php _e('Display Related post', 'tcd-w');  ?></label></li>
      <li><label><input id="dp_options[show_rss]" name="dp_options[show_rss]" type="checkbox" value="1" <?php checked( '1', $options['show_rss'] ); ?> /> <?php _e('Display RSS button at left sidebar', 'tcd-w');  ?></label></li>
      <li><label><input id="dp_options[show_search]" name="dp_options[show_search]" type="checkbox" value="1" <?php checked( '1', $options['show_search'] ); ?> /> <?php _e('Display search box at left sidebar', 'tcd-w');  ?></label></li>
     </ul>
    </div>
   </div>

   <?php // 色の設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Basic color setting', 'tcd-w');  ?></h3>
    <div class="theme_option_input layout_option color_type_list">
     <fieldset class="cf"><legend class="screen-reader-text"><span><?php _e('Color type', 'tcd-w');  ?></span></legend>
     <?php
          if ( ! isset( $checked ) )
          $checked = '';
          foreach ( $color_options as $option ) {
          $color_setting = $options['color_type'];
           if ( '' != $color_setting ) {
            if ( $options['color_type'] == $option['value'] ) {
             $checked = "checked=\"checked\"";
            } else {
             $checked = '';
            }
           }
     ?>
      <label class="description">
       <input type="radio" id="input_<?php esc_attr_e( $option['value'] ); ?>" name="dp_options[color_type]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
       <img src="<?php bloginfo('template_url'); ?>/admin/color/<?php echo $option['img']; ?>.gif" alt="" title="" />
       <?php echo $option['label']; ?>
      </label>
     <?php
          }
     ?>
     </fieldset>
    </div>
   </div>


 <script type="text/javascript">
  jQuery(document).ready(function($){

   if($("#input_type3:checked").val()) {
    $('#background_pattern').show();
   } else {
    $('#background_pattern').hide();
   };

   $("#input_type3").click(function () {
    $('#background_pattern').show();
   });

   $("#bg_type1 input").not('#input_type3').click(function () {
    $('#background_pattern').hide();
   });

   if($("#input_type4:checked").val()) {
    $('#original_pattern').show();
   } else {
    $('#original_pattern').hide();
   };

   $("#input_type4").click(function () {
    $('#original_pattern').show();
   });

   $("#bg_type1 input").not('#input_type4').click(function () {
    $('#original_pattern').hide();
   });

  });
 </script>


   <?php // 背景色の設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Background color setting', 'tcd-w');  ?></h3>
    <div class="theme_option_input" id="bg_type1">
     <p><?php _e('Select background type', 'tcd-w');  ?></p>
     <fieldset class="cf"><legend class="screen-reader-text"><span><?php _e('Background type', 'tcd-w');  ?></span></legend>
     <?php
          if ( ! isset( $checked ) )
          $checked = '';
          foreach ( $bg_type1_options as $option ) {
          $bg_type1_setting = $options['bg_type1'];
           if ( '' != $bg_type1_setting ) {
            if ( $options['bg_type1'] == $option['value'] ) {
             $checked = "checked=\"checked\"";
            } else {
             $checked = '';
            }
           }
     ?>
      <label class="description">
       <input id="input_<?php esc_attr_e( $option['value'] ); ?>" type="radio" name="dp_options[bg_type1]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
       <?php echo $option['label']; ?>
      </label>
     <?php
          }
     ?>
     </fieldset>
    </div>
   </div>

   <div id="background_pattern" style="display:none;">
    <?php // 背景画像の設定 ?>
    <div class="theme_option_field cf">
     <p><?php _e('Background image type', 'tcd-w');  ?></p>
     <div class="theme_option_input layout_option" id="bg_type2">
      <fieldset class="cf"><legend class="screen-reader-text"><span><?php _e('Background image type', 'tcd-w');  ?></span></legend>
      <?php
           if ( ! isset( $checked ) )
           $checked = '';
           foreach ( $bg_type2_options as $option ) {
           $bg_type2_setting = $options['bg_type2'];
            if ( '' != $bg_type2_setting ) {
             if ( $options['bg_type2'] == $option['value'] ) {
              $checked = "checked=\"checked\"";
             } else {
              $checked = '';
             }
            }
      ?>
       <label class="description">
        <input type="radio" id="input_<?php esc_attr_e( $option['value'] ); ?>" name="dp_options[bg_type2]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
        <img src="<?php bloginfo('template_url'); ?>/admin/background/<?php echo $option['img']; ?>.gif" alt="" title="" />
        <?php echo $option['label']; ?>
       </label>
      <?php } ?>
      </fieldset>
     </div>
    </div>
   </div>

   <div id="original_pattern" style="display:none;">
    <div class="theme_option_field cf">
     <p><?php _e('Register original pattern.', 'tcd-w');  ?></p>
     <div class="image_box cf">
      <div class="upload_banner_button_area">
       <div style="display:none;"><input type="text" size="36" name="dp_options[original_pattern]" value="<?php esc_attr_e( $options['original_pattern'] ); ?>" /></div>
       <input type="file" name="original_pattern_file" id="original_pattern_file" />
       <input type="submit" class="button-primary" value="<?php echo __( 'Save Image', 'tcd-w' ); ?>" />
      </div>
      <?php if($options['original_pattern']) { ?>
       <div class="uploaded_banner_image">
        <img src="<?php esc_attr_e( $options['original_pattern'] ); ?>" alt="" title="" />
       </div>
       <?php if(dp_is_uploaded_img($options['original_pattern'])): ?>
       <div class="delete_uploaded_banner_image">
        <a href="<?php echo wp_nonce_url(admin_url('themes.php?page=theme_options'), 'dp_delete_original_pattern') ?>" class="button" onclick="if(!confirm('<?php _e('Are you sure to delete this image?', 'tcd-w'); ?>')) return false;"><?php _e('Delete Image', 'tcd-w'); ?></a>
       </div>
      <?php endif; ?>
      <?php }; ?>
     </div>
    </div>
   </div>

   <?php // 左サイドのメニューの設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Side menu setup', 'tcd-w');  ?></h3>
    <div class="theme_option_input">
     <ul id="side_menu_setting">
      <li>
       <label><input id="dp_options[show_side_category]" name="dp_options[show_side_category]" type="checkbox" value="1" <?php checked( '1', $options['show_side_category'] ); ?> /> <?php _e('Display side category', 'tcd-w');  ?></label>
       <input id="dp_options[headline_side_category]" class="regular-text" type="text" name="dp_options[headline_side_category]" value="<?php esc_attr_e( $options['headline_side_category'] ); ?>" />
      </li>
      <li>
       <label><input id="dp_options[show_side_archive]" name="dp_options[show_side_archive]" type="checkbox" value="1" <?php checked( '1', $options['show_side_archive'] ); ?> /> <?php _e('Display side archive', 'tcd-w');  ?></label>
       <input id="dp_options[headline_side_archive]" class="regular-text" type="text" name="dp_options[headline_side_archive]" value="<?php esc_attr_e( $options['headline_side_archive'] ); ?>" />
      </li>
      <li>
       <label><input id="dp_options[show_side_menu]" name="dp_options[show_side_menu]" type="checkbox" value="1" <?php checked( '1', $options['show_side_menu'] ); ?> /> <?php _e('Display side menu', 'tcd-w');  ?></label>
       <input id="dp_options[headline_side_menu]" class="regular-text" type="text" name="dp_options[headline_side_menu]" value="<?php esc_attr_e( $options['headline_side_menu'] ); ?>" />
      </li>
     </ul>
    </div>
   </div>

   <?php // 詳細記事ページの記事一覧の設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Single page post list setting', 'tcd-w');  ?></h3>
    <div id="single_post_list_num_area" class="cf">
     <p><?php _e('Number of post.', 'tcd-w');  ?></p>
     <input id="dp_options[single_post_list_num]" class="font_size" type="text" name="dp_options[single_post_list_num]" value="<?php esc_attr_e( $options['single_post_list_num'] ); ?>" />
    </div>
    <div class="theme_option_input" id="single_post_list_area">
     <p><?php _e('Select post type', 'tcd-w');  ?></p>
     <fieldset class="cf"><legend class="screen-reader-text"><span><?php _e('Post list type', 'tcd-w');  ?></span></legend>
     <?php
          if ( ! isset( $checked ) )
          $checked = '';
          foreach ( $single_post_list_options as $option ) {
          $single_post_list_setting = $options['single_post_list'];
           if ( '' != $single_post_list_setting ) {
            if ( $options['single_post_list'] == $option['value'] ) {
             $checked = "checked=\"checked\"";
            } else {
             $checked = '';
            }
           }
     ?>
      <label class="description">
       <input type="radio" name="dp_options[single_post_list]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> />
       <?php echo $option['label']; ?>
      </label>
     <?php
          }
     ?>
     </fieldset>
    </div>
   </div>

   <?php // facebook twitter ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('twitter and facebook setup', 'tcd-w');  ?></h3>
    <div class="theme_option_input">
     <p><?php _e('When it is blank, twitter and facebook icon will not displayed on a site.', 'tcd-w');  ?></p>
     <ul>
      <li>
       <label style="display:inline-block; min-width:140px;"><?php _e('your twitter URL', 'tcd-w');  ?></label>
       <input id="dp_options[twitter_url]" class="regular-text" type="text" name="dp_options[twitter_url]" value="<?php esc_attr_e( $options['twitter_url'] ); ?>" />
      </li>
      <li>
       <label style="display:inline-block; min-width:140px;"><?php _e('your facebook URL', 'tcd-w');  ?></label>
       <input id="dp_options[facebook_url]" class="regular-text" type="text" name="dp_options[facebook_url]" value="<?php esc_attr_e( $options['facebook_url'] ); ?>" />
      </li>
     </ul>
    </div>
   </div>

   <?php // 検索の設定 ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Using Google custom search', 'tcd-w');  ?></h3>
    <div class="theme_option_input">
     <p><?php _e('If you wan\'t to use google custom search for your wordpress, enter your google custom search ID.<br /><a href="http://www.google.com/cse/" target="_blank">Read more about Google custom search page.</a>', 'tcd-w');  ?></p>
     <label style="display:inline-block; margin:0 20px 0 0;"><?php _e('Google custom search ID', 'tcd-w');  ?></label>
     <input id="dp_options[custom_search_id]" class="regular-text" type="text" name="dp_options[custom_search_id]" value="<?php esc_attr_e( $options['custom_search_id'] ); ?>" />
    </div>
   </div>

   <p class="submit"><input type="submit" class="button-primary" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></p>

  </div><!-- END #tab-content1 -->




  <!-- #tab-content2 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
  <div id="tab-content2">

  <p><label><input id="dp_options[show_slider]" name="dp_options[show_slider]" type="checkbox" value="1" <?php checked( '1', $options['show_slider'] ); ?> /> <?php _e('Display slider', 'tcd-w');  ?></label></p>

  <?php for($i = 1; $i <= 10; $i++): ?>
  <div class="banner_wrapper">
   <h3 class="banner_headline"><?php _e('Slider image setup', 'tcd-w');  ?><?php echo $i; ?></h3>
   <div class="theme_option_field cf">
    <div class="theme_option_input">
     <div class="sub_box cf" style="margin:0 0 10px 0;">
      <h4><?php _e('Register slider image (width:616px height:300px)', 'tcd-w');  ?></h4>
      <div class="image_box cf">
       <div class="upload_banner_button_area">
        <div class="hide"><input type="text" size="36" name="dp_options[slider_image<?php echo $i; ?>]" value="<?php esc_attr_e( $options['slider_image'.$i] ); ?>" /></div>
        <input type="file" name="slider_image_file<?php echo $i?>" id="slider_image_file<?php echo $i?>" />
        <input type="submit" class="button-primary" value="<?php echo __( 'Save Image', 'tcd-w' ); ?>" />
       </div>
       <?php if($options['slider_image'.$i]) { ?>
        <div class="uploaded_banner_image">
         <img src="<?php esc_attr_e( $options['slider_image'.$i] ); ?>" alt="" title="" />
        </div>
        <?php if(dp_is_uploaded_img($options['slider_image'.$i])): ?>
        <div class="delete_uploaded_banner_image">
         <a href="<?php echo wp_nonce_url(admin_url('themes.php?page=theme_options'), 'dp_delete_slider_image'.$i) ?>" class="button" onclick="if(!confirm('<?php _e('Are you sure to delete this image?', 'tcd-w'); ?>')) return false;"><?php _e('Delete Image', 'tcd-w'); ?></a>
        </div>
       <?php endif; ?>
       <?php }; ?>
      </div>
     </div>
     <div class="sub_box">
      <h4><?php _e('Register url for this image', 'tcd-w');  ?></h4>
      <div class="theme_option_input">
       <input id="dp_options[slider_url<?php echo $i; ?>]" class="regular-text" type="text" name="dp_options[slider_url<?php echo $i; ?>]" value="<?php esc_attr_e( $options['slider_url'.$i] ); ?>" />
      </div>
     </div>
    </div>
   </div>
  </div>
  <?php endfor; ?>

  <p class="submit"><input type="submit" class="button-primary" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></p>

  </div><!-- END #tab-content2 -->




  <!-- #tab-content3 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
  <div id="tab-content3">

   <?php // ステップ１ ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Step 1 : Upload image to use for logo.', 'tcd-w');  ?></h3>
    <div class="theme_option_input">
     <p><?php _e('Upload image to use for logo from your computer.<br />You can resize your logo image in step 2 and adjust position in step 3.', 'tcd-w');  ?></p>
     <div class="button_area">
      <label for="dp_image"><?php _e('Select image to use for logo from your computer.', 'tcd-w');  ?></label>
      <input type="file" name="dp_image" id="dp_image" value="" />
      <input type="submit" class="button" value="<?php _e('Upload', 'tcd-w');  ?>" />
     </div>
     <?php if(dp_logo_exists()): $info = dp_logo_info(); ?>
     <div class="uploaded_logo">
      <h4><?php _e('Uploaded image.', 'tcd-w');  ?></h4>
      <div class="uploaded_logo_image" id="original_logo_size">
       <?php dp_logo_img_tag(false, '', '', 9999); ?>
      </div>
      <p><?php printf(__('Original image size : width %1$dpx, height %2$dpx', 'tcd-w'), $info['width'], $info['height']); ?></p>
     </div>
     <?php else: ?>
     <div class="uploaded_logo">
      <h4><?php _e('The image has not been uploaded yet.<br />A normal text will be used for a site logo.', 'tcd-w');  ?></h4>
     </div>
     <?php endif; ?>
    </div>
   </div>

   <?php // ステップ２ ?>
   <?php if(dp_logo_exists()): ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Step 2 : Resize uploaded image.', 'tcd-w');  ?></h3>
    <div class="theme_option_input">
    <?php if(dp_logo_exists()): ?>
     <p><?php _e('You can resize uploaded image.<br />If you don\'t need to resize, go to step 3.', 'tcd-w');  ?></p>
     <div class="uploaded_logo">
      <h4><?php _e('Please drag the range to cut off.', 'tcd-w');  ?></h4>
      <div class="uploaded_logo_image">
       <?php dp_logo_resize_base(9999); ?>
      </div>
      <div class="resize_amount">
       <label><?php _e('Ratio', 'tcd-w');  ?>: <input type="text" name="dp_resize_ratio" id="dp_resize_ratio" value="100" />%</label>
       <label><?php _e('Width', 'tcd-w');  ?>: <input type="text" name="dp_resized_width" id="dp_resized_width" />px</label>
       <label><?php _e('Height', 'tcd-w');  ?>: <input type="text" name="dp_resized_height" id="dp_resized_height" />px</label>
      </div>
      <div id="resize_button_area">
       <input type="submit" class="button-primary" value="<?php _e('Resize', 'tcd-w'); ?>" />
      </div>
     </div>
     <?php if($info = dp_logo_info(true)): ?>
     <div class="uploaded_logo">
      <h4><?php printf(__('Resized image : width %1$dpx, height %2$dpx', 'tcd-w'), $info['width'], $info['height']); ?></h4>
      <div class="uploaded_logo_image">
       <?php dp_logo_img_tag(true, '', '', 9999); ?>
      </div>
     </div>
     <?php endif; ?>
    <?php endif; ?>
    </div>
   </div>
   <?php endif; ?>

   <?php // ステップ３ ?>
   <?php if(dp_logo_exists()): ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Step 3 : Adjust position of logo.', 'tcd-w');  ?></h3>
    <div class="theme_option_input">
    <?php if(dp_logo_exists()): ?>
     <p><?php _e('Drag the logo image and adjust the position.', 'tcd-w');  ?></p>
     <div id="tcd-w-logo-adjuster" class="ratio-<?php echo '760-760'; ?>">
      <?php if(dp_logo_resize_tag(760, 760, $options['logotop'], $options['logoleft'])): ?>
      <?php else: ?>
      <span><?php _e('Logo size is too big. Please resize your logo image.', 'tcd-w');  ?></span>
      <?php endif; ?>
     </div>
     <div class="hide">
      <label><?php _e('Top', 'tcd-w');  ?>: <input type="text" name="dp_options[logotop]" id="dp-options-logotop" value="<?php esc_attr_e( $options['logotop'] ); ?>" />px </label>
      <label><?php _e('Left', 'tcd-w');  ?>: <input type="text" name="dp_options[logoleft]" id="dp-options-logoleft" value="<?php esc_attr_e( $options['logoleft'] ); ?>" />px </label>
      <input type="button" class="button" id="dp-adjust-realvalue" value="adjust" />
     </div>
     <p><input type="submit" class="button" value="<?php _e('Save the position', 'tcd-w');  ?>" /></p>
    <?php endif; ?>
    </div>
   </div>
   <?php endif; ?>

   <?php // 画像の削除 ?>
   <?php if(dp_logo_exists()): ?>
   <div class="theme_option_field cf">
    <h3 class="theme_option_headline"><?php _e('Delete logo image.', 'tcd-w');  ?></h3>
    <div class="theme_option_input">
     <p><?php _e('If you delete the logo image, normal text will be used for a site logo.', 'tcd-w');  ?></p>
     <p><a class="button" href="<?php echo wp_nonce_url(admin_url('themes.php?page=theme_options'), 'dp_delete_image_'.  get_current_user_id()); ?>" onclick="if(!confirm('<?php _e('Are you sure to delete logo image?', 'tcd-w'); ?>')) return false;"><?php _e('Delete Image', 'tcd-w');  ?></a></p>
    </div>
   </div>
   <?php endif; ?>

  </div><!-- END #tab-content2 -->




  <!-- #tab-content4 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
  <div id="tab-content4">

  <?php for($i = 1; $i <= 3; $i++): ?>
  <div class="banner_wrapper">
   <h3 class="banner_headline"><?php _e('Adsense banner setup', 'tcd-w');  ?><?php echo $i; ?></h3>
   <?php if($i == 2) { ?>
   <p class="tab_desc"><?php _e('<strong>This Adsense will not be displayed if you set post number less than 4 at Reading Settings page.</strong>', 'tcd-w');  ?></p>
   <?php } elseif($i == 3) { ?>
   <p class="tab_desc"><?php _e('<strong>This Adsense will not be displayed if you set post number less than 8 at Reading Settings page.</strong>', 'tcd-w');  ?></p>
   <?php }; ?>
   <p class="tab_desc"><?php _e('This Adsense will be displayed at front page, archive page, and search result page.', 'tcd-w');  ?></p>
   <div class="theme_option_field cf">
    <div class="theme_option_input">
     <div class="sub_box">
      <h4><?php _e('Banner code', 'tcd-w');  ?></h4>
      <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
      <div class="theme_option_input">
       <textarea id="dp_options[post_ad<?php echo $i; ?>]" class="large-text" cols="50" rows="10" name="dp_options[post_ad<?php echo $i; ?>]"><?php echo esc_textarea( $options['post_ad'.$i] ); ?></textarea>
      </div>
     </div>
     <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>
     <div class="sub_box cf" style="margin:0 0 10px 0;">
      <h4><?php _e('Register banner image', 'tcd-w');  ?></h4>
      <div class="image_box cf">
       <div class="upload_banner_button_area">
        <div class="hide"><input type="text" size="36" name="dp_options[post_ad_image<?php echo $i; ?>]" value="<?php esc_attr_e( $options['post_ad_image'.$i] ); ?>" /></div>
        <input type="file" name="post_ad_image_file_<?php echo $i?>" id="post_ad_image_file_<?php echo $i?>" />
        <input type="submit" class="button-primary" value="<?php echo __( 'Save Image', 'tcd-w' ); ?>" />
       </div>
       <?php if($options['post_ad_image'.$i]) { ?>
        <div class="uploaded_banner_image">
         <img src="<?php esc_attr_e( $options['post_ad_image'.$i] ); ?>" alt="" title="" />
        </div>
        <?php if(dp_is_uploaded_img($options['post_ad_image'.$i])): ?>
        <div class="delete_uploaded_banner_image">
         <a href="<?php echo wp_nonce_url(admin_url('themes.php?page=theme_options'), 'dp_delete_post_ad_'.$i) ?>" class="button" onclick="if(!confirm('<?php _e('Are you sure to delete this image?', 'tcd-w'); ?>')) return false;"><?php _e('Delete Image', 'tcd-w'); ?></a>
        </div>
       <?php endif; ?>
       <?php }; ?>
      </div>
     </div>
     <div class="sub_box">
      <h4><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
      <div class="theme_option_input">
       <input id="dp_options[post_ad_url<?php echo $i; ?>]" class="regular-text" type="text" name="dp_options[post_ad_url<?php echo $i; ?>]" value="<?php esc_attr_e( $options['post_ad_url'.$i] ); ?>" />
      </div>
     </div>
    </div>
   </div>
  </div>
  <?php endfor; ?>

  <?php // 詳細ページの広告１ -------------------------------------------------------------------------------------------- ?>
  <div class="banner_wrapper">
   <h3 class="banner_headline"><?php _e('Single post page banner setup1.', 'tcd-w');  ?></h3>
   <p class="tab_desc"><?php _e('This Adsense will be displayed at right column top in single post page.', 'tcd-w');  ?></p>
   <div class="theme_option_field cf">
    <div class="theme_option_input">

     <div class="sub_box">
      <h4><?php _e('Banner code', 'tcd-w');  ?></h4>
      <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
      <div class="theme_option_input">
       <textarea id="dp_options[single_ad_code1]" class="large-text" cols="50" rows="10" name="dp_options[single_ad_code1]"><?php echo esc_textarea( $options['single_ad_code1'] ); ?></textarea>
      </div>
     </div>
     <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>

     <div class="sub_box cf" style="margin:0 0 10px 0;">
      <h4><?php _e('Register banner image.', 'tcd-w');  ?></h4>
      <div class="image_box cf">
       <div class="upload_banner_button_area">
        <div class="hide"><input type="text" size="36" name="dp_options[single_ad_image1]" value="<?php esc_attr_e( $options['single_ad_image1'] ); ?>" /></div>
        <input type="file" name="single_ad_image_file1" id="single_ad_image_file1" />
        <input type="submit" class="button-primary" value="<?php echo __( 'Save Image', 'tcd-w' ); ?>" />
       </div>
       <?php if($options['single_ad_image1']) { ?>
        <div class="uploaded_banner_image">
         <img src="<?php esc_attr_e( $options['single_ad_image1'] ); ?>" alt="" title="" />
        </div>
        <?php if(dp_is_uploaded_img($options['single_ad_image1'])): ?>
        <div class="delete_uploaded_banner_image">
         <a href="<?php echo wp_nonce_url(admin_url('themes.php?page=theme_options'), 'dp_delete_single_ad_image1') ?>" class="button" onclick="if(!confirm('<?php _e('Are you sure to delete this image?', 'tcd-w'); ?>')) return false;"><?php _e('Delete Image', 'tcd-w'); ?></a>
        </div>
       <?php endif; ?>
       <?php }; ?>
      </div>
     </div>

     <div class="sub_box">
      <h4><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
      <div class="theme_option_input">
       <input id="dp_options[single_ad_url1]" class="regular-text" type="text" name="dp_options[single_ad_url1]" value="<?php esc_attr_e( $options['single_ad_url1'] ); ?>" />
      </div>
     </div>

    </div>
   </div>
  </div>

  <?php // 詳細ページの広告2 -------------------------------------------------------------------------------------------- ?>
  <div class="banner_wrapper">
   <h3 class="banner_headline"><?php _e('Single post page banner setup2.', 'tcd-w');  ?></h3>
   <p class="tab_desc"><?php _e('This Adsense will be displayed at right column bottom in single post page.', 'tcd-w');  ?></p>
   <div class="theme_option_field cf">
    <div class="theme_option_input">

     <div class="sub_box">
      <h4><?php _e('Banner code', 'tcd-w');  ?></h4>
      <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
      <div class="theme_option_input">
       <textarea id="dp_options[single_ad_code2]" class="large-text" cols="50" rows="10" name="dp_options[single_ad_code2]"><?php echo esc_textarea( $options['single_ad_code2'] ); ?></textarea>
      </div>
     </div>
     <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>

     <div class="sub_box cf" style="margin:0 0 10px 0;">
      <h4><?php _e('Register banner image.', 'tcd-w');  ?></h4>
      <div class="image_box cf">
       <div class="upload_banner_button_area">
        <div class="hide"><input type="text" size="36" name="dp_options[single_ad_image2]" value="<?php esc_attr_e( $options['single_ad_image2'] ); ?>" /></div>
        <input type="file" name="single_ad_image_file2" id="single_ad_image_file2" />
        <input type="submit" class="button-primary" value="<?php echo __( 'Save Image', 'tcd-w' ); ?>" />
       </div>
       <?php if($options['single_ad_image2']) { ?>
        <div class="uploaded_banner_image">
         <img src="<?php esc_attr_e( $options['single_ad_image2'] ); ?>" alt="" title="" />
        </div>
        <?php if(dp_is_uploaded_img($options['single_ad_image2'])): ?>
        <div class="delete_uploaded_banner_image">
         <a href="<?php echo wp_nonce_url(admin_url('themes.php?page=theme_options'), 'dp_delete_single_ad_image2') ?>" class="button" onclick="if(!confirm('<?php _e('Are you sure to delete this image?', 'tcd-w'); ?>')) return false;"><?php _e('Delete Image', 'tcd-w'); ?></a>
        </div>
       <?php endif; ?>
       <?php }; ?>
      </div>
     </div>

     <div class="sub_box">
      <h4><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
      <div class="theme_option_input">
       <input id="dp_options[single_ad_url2]" class="regular-text" type="text" name="dp_options[single_ad_url2]" value="<?php esc_attr_e( $options['single_ad_url2'] ); ?>" />
      </div>
     </div>

    </div>
   </div>
  </div>


  <?php // 詳細ページの広告3 -------------------------------------------------------------------------------------------- ?>
  <div class="banner_wrapper">
   <h3 class="banner_headline"><?php _e('Single post page banner setup3.', 'tcd-w');  ?></h3>
   <p class="tab_desc"><?php _e('This Adsense will be displayed before the post.', 'tcd-w');  ?></p>
   <div class="theme_option_field cf">
    <div class="theme_option_input">

     <div class="sub_box">
      <h4><?php _e('Banner code', 'tcd-w');  ?></h4>
      <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
      <div class="theme_option_input">
       <textarea id="dp_options[single_ad_code3]" class="large-text" cols="50" rows="10" name="dp_options[single_ad_code3]"><?php echo esc_textarea( $options['single_ad_code3'] ); ?></textarea>
      </div>
     </div>
     <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>

     <div class="sub_box cf" style="margin:0 0 10px 0;">
      <h4><?php _e('Register banner image.', 'tcd-w');  ?></h4>
      <div class="image_box cf">
       <div class="upload_banner_button_area">
        <div class="hide"><input type="text" size="36" name="dp_options[single_ad_image3]" value="<?php esc_attr_e( $options['single_ad_image3'] ); ?>" /></div>
        <input type="file" name="single_ad_image_file3" id="single_ad_image_file3" />
        <input type="submit" class="button-primary" value="<?php echo __( 'Save Image', 'tcd-w' ); ?>" />
       </div>
       <?php if($options['single_ad_image3']) { ?>
        <div class="uploaded_banner_image">
         <img src="<?php esc_attr_e( $options['single_ad_image3'] ); ?>" alt="" title="" />
        </div>
        <?php if(dp_is_uploaded_img($options['single_ad_image3'])): ?>
        <div class="delete_uploaded_banner_image">
         <a href="<?php echo wp_nonce_url(admin_url('themes.php?page=theme_options'), 'dp_delete_single_ad_image3') ?>" class="button" onclick="if(!confirm('<?php _e('Are you sure to delete this image?', 'tcd-w'); ?>')) return false;"><?php _e('Delete Image', 'tcd-w'); ?></a>
        </div>
       <?php endif; ?>
       <?php }; ?>
      </div>
     </div>

     <div class="sub_box">
      <h4><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
      <div class="theme_option_input">
       <input id="dp_options[single_ad_url3]" class="regular-text" type="text" name="dp_options[single_ad_url3]" value="<?php esc_attr_e( $options['single_ad_url3'] ); ?>" />
      </div>
     </div>

    </div>
   </div>
  </div>



  <?php // 詳細ページの広告4 -------------------------------------------------------------------------------------------- ?>
  <div class="banner_wrapper">
   <h3 class="banner_headline"><?php _e('Single post page banner setup4.', 'tcd-w');  ?></h3>
   <p class="tab_desc"><?php _e('This Adsense will be displayed after the post.', 'tcd-w');  ?></p>
   <div class="theme_option_field cf">
    <div class="theme_option_input">

     <div class="sub_box">
      <h4><?php _e('Banner code', 'tcd-w');  ?></h4>
      <p><?php _e('If you are using google adsense, enter all code below.', 'tcd-w');  ?></p>
      <div class="theme_option_input">
       <textarea id="dp_options[single_ad_code4]" class="large-text" cols="50" rows="10" name="dp_options[single_ad_code4]"><?php echo esc_textarea( $options['single_ad_code4'] ); ?></textarea>
      </div>
     </div>
     <p><?php _e('If you are not using google adsense, you can register your banner image and affiliate code individually.', 'tcd-w');  ?></p>

     <div class="sub_box cf" style="margin:0 0 10px 0;">
      <h4><?php _e('Register banner image.', 'tcd-w');  ?></h4>
      <div class="image_box cf">
       <div class="upload_banner_button_area">
        <div class="hide"><input type="text" size="36" name="dp_options[single_ad_image4]" value="<?php esc_attr_e( $options['single_ad_image4'] ); ?>" /></div>
        <input type="file" name="single_ad_image_file4" id="single_ad_image_file4" />
        <input type="submit" class="button-primary" value="<?php echo __( 'Save Image', 'tcd-w' ); ?>" />
       </div>
       <?php if($options['single_ad_image4']) { ?>
        <div class="uploaded_banner_image">
         <img src="<?php esc_attr_e( $options['single_ad_image4'] ); ?>" alt="" title="" />
        </div>
        <?php if(dp_is_uploaded_img($options['single_ad_image4'])): ?>
        <div class="delete_uploaded_banner_image">
         <a href="<?php echo wp_nonce_url(admin_url('themes.php?page=theme_options'), 'dp_delete_single_ad_image4') ?>" class="button" onclick="if(!confirm('<?php _e('Are you sure to delete this image?', 'tcd-w'); ?>')) return false;"><?php _e('Delete Image', 'tcd-w'); ?></a>
        </div>
       <?php endif; ?>
       <?php }; ?>
      </div>
     </div>

     <div class="sub_box">
      <h4><?php _e('Register affiliate code', 'tcd-w');  ?></h4>
      <div class="theme_option_input">
       <input id="dp_options[single_ad_url4]" class="regular-text" type="text" name="dp_options[single_ad_url4]" value="<?php esc_attr_e( $options['single_ad_url4'] ); ?>" />
      </div>
     </div>

    </div>
   </div>
  </div>



  <p class="submit"><input type="submit" class="button-primary" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></p>

  </div><!-- END #tab-content4 -->




  </div><!-- END #tab-panel -->

 </form>

</div>

</div>

<?php

 }


/**
 * チェック
 */
function theme_options_validate( $input ) {
 global $color_options, $single_post_list_options, $bg_type1_options, $bg_type2_options;


 // フォントサイズ
 $input['content_font_size'] = wp_filter_nohtml_kses( $input['content_font_size'] );

 // 投稿者・タグ・コメント
 if ( ! isset( $input['show_author'] ) )
  $input['show_author'] = null;
  $input['show_author'] = ( $input['show_author'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_comment'] ) )
  $input['show_comment'] = null;
  $input['show_comment'] = ( $input['show_comment'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_trackback'] ) )
  $input['show_trackback'] = null;
  $input['show_trackback'] = ( $input['show_trackback'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_bookmark'] ) )
  $input['show_bookmark'] = null;
  $input['show_bookmark'] = ( $input['show_bookmark'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_next_post'] ) )
  $input['show_next_post'] = null;
  $input['show_next_post'] = ( $input['show_next_post'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_related_post'] ) )
  $input['show_related_post'] = null;
  $input['show_related_post'] = ( $input['show_related_post'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_rss'] ) )
  $input['show_rss'] = null;
  $input['show_rss'] = ( $input['show_rss'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_search'] ) )
  $input['show_search'] = null;
  $input['show_search'] = ( $input['show_search'] == 1 ? 1 : 0 );

 // 色の設定
 if ( ! isset( $input['color_type'] ) )
  $input['color_type'] = null;
 if ( ! array_key_exists( $input['color_type'], $color_options ) )
  $input['color_type'] = null;

 // 背景色の設定
 if ( ! isset( $input['bg_type1'] ) )
  $input['bg_type1'] = null;
 if ( ! array_key_exists( $input['bg_type1'], $bg_type1_options ) )
  $input['bg_type1'] = null;

 // 背景画像の設定
 if ( ! isset( $input['bg_type2'] ) )
  $input['bg_type2'] = null;
 if ( ! array_key_exists( $input['bg_type2'], $bg_type2_options ) )
  $input['bg_type2'] = null;
 $input['original_pattern'] = wp_filter_nohtml_kses( $input['original_pattern'] );


 // 詳細記事ページの記事一覧の設定
 if ( ! isset( $input['single_post_list'] ) )
  $input['single_post_list'] = null;
 if ( ! array_key_exists( $input['single_post_list'], $single_post_list_options ) )
  $input['single_post_list'] = null;
 $input['single_post_list_num'] = wp_filter_nohtml_kses( $input['single_post_list_num'] );

 // 左サイドメニューの設定
 $input['headline_side_category'] = wp_filter_nohtml_kses( $input['headline_side_category'] );
 $input['headline_side_archive'] = wp_filter_nohtml_kses( $input['headline_side_archive'] );
 $input['headline_side_menu'] = wp_filter_nohtml_kses( $input['headline_side_menu'] );

 if ( ! isset( $input['show_side_category'] ) )
  $input['show_side_category'] = null;
  $input['show_side_category'] = ( $input['show_side_category'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_side_archive'] ) )
  $input['show_side_archive'] = null;
  $input['show_side_archive'] = ( $input['show_side_archive'] == 1 ? 1 : 0 );
 if ( ! isset( $input['show_side_menu'] ) )
  $input['show_side_menu'] = null;
  $input['show_side_menu'] = ( $input['show_side_menu'] == 1 ? 1 : 0 );

 // twitter,facebook URL
 $input['twitter_url'] = wp_filter_nohtml_kses( $input['twitter_url'] );
 $input['facebook_url'] = wp_filter_nohtml_kses( $input['facebook_url'] );

 // 検索の設定
 $input['custom_search_id'] = wp_filter_nohtml_kses( $input['custom_search_id'] );

 // 詳細記事の広告
 $input['single_ad_code1'] = $input['single_ad_code1'];
 $input['single_ad_image1'] = wp_filter_nohtml_kses( $input['single_ad_image1'] );
 $input['single_ad_url1'] = wp_filter_nohtml_kses( $input['single_ad_url1'] );
 $input['single_ad_code2'] = $input['single_ad_code2'];
 $input['single_ad_image2'] = wp_filter_nohtml_kses( $input['single_ad_image2'] );
 $input['single_ad_url2'] = wp_filter_nohtml_kses( $input['single_ad_url2'] );
 $input['single_ad_code3'] = $input['single_ad_code3'];
 $input['single_ad_image3'] = wp_filter_nohtml_kses( $input['single_ad_image3'] );
 $input['single_ad_url3'] = wp_filter_nohtml_kses( $input['single_ad_url3'] );
 $input['single_ad_code4'] = $input['single_ad_code4'];
 $input['single_ad_image4'] = wp_filter_nohtml_kses( $input['single_ad_image4'] );
 $input['single_ad_url4'] = wp_filter_nohtml_kses( $input['single_ad_url4'] );

 // 記事一覧の広告
 $input['post_ad1'] = $input['post_ad1'];
 $input['post_ad_image1'] = wp_filter_nohtml_kses( $input['post_ad_image1'] );
 $input['post_ad_url1'] = wp_filter_nohtml_kses( $input['post_ad_url1'] );
 $input['post_ad2'] = $input['post_ad2'];
 $input['post_ad_image2'] = wp_filter_nohtml_kses( $input['post_ad_image2'] );
 $input['post_ad_url2'] = wp_filter_nohtml_kses( $input['post_ad_url2'] );
 $input['post_ad3'] = $input['post_ad3'];
 $input['post_ad_image3'] = wp_filter_nohtml_kses( $input['post_ad_image3'] );
 $input['post_ad_url3'] = wp_filter_nohtml_kses( $input['post_ad_url3'] );

 // スライダーの設定
 if ( ! isset( $input['show_slider'] ) )
  $input['show_slider'] = null;
  $input['show_slider'] = ( $input['show_slider'] == 1 ? 1 : 0 );
 $input['slider_image1'] = wp_filter_nohtml_kses( $input['slider_image1'] );
 $input['slider_url1'] = wp_filter_nohtml_kses( $input['slider_url1'] );
 $input['slider_image2'] = wp_filter_nohtml_kses( $input['slider_image2'] );
 $input['slider_url2'] = wp_filter_nohtml_kses( $input['slider_url2'] );
 $input['slider_image3'] = wp_filter_nohtml_kses( $input['slider_image3'] );
 $input['slider_url3'] = wp_filter_nohtml_kses( $input['slider_url3'] );
 $input['slider_image4'] = wp_filter_nohtml_kses( $input['slider_image4'] );
 $input['slider_url4'] = wp_filter_nohtml_kses( $input['slider_url4'] );
 $input['slider_image5'] = wp_filter_nohtml_kses( $input['slider_image5'] );
 $input['slider_url5'] = wp_filter_nohtml_kses( $input['slider_url5'] );
 $input['slider_image6'] = wp_filter_nohtml_kses( $input['slider_image6'] );
 $input['slider_url6'] = wp_filter_nohtml_kses( $input['slider_url6'] );
 $input['slider_image7'] = wp_filter_nohtml_kses( $input['slider_image7'] );
 $input['slider_url7'] = wp_filter_nohtml_kses( $input['slider_url7'] );
 $input['slider_image8'] = wp_filter_nohtml_kses( $input['slider_image8'] );
 $input['slider_url8'] = wp_filter_nohtml_kses( $input['slider_url8'] );
 $input['slider_image9'] = wp_filter_nohtml_kses( $input['slider_image9'] );
 $input['slider_url9'] = wp_filter_nohtml_kses( $input['slider_url9'] );
 $input['slider_image10'] = wp_filter_nohtml_kses( $input['slider_image10'] );
 $input['slider_url10'] = wp_filter_nohtml_kses( $input['slider_url10'] );

 //ロゴの位置
 if(isset($input['logotop'])){
	 $input['logotop'] = intval($input['logotop']);
 }
 if(isset($input['logoleft'])){
	 $input['logoleft'] = intval($input['logoleft']);
 }

 //ファイルアップロード
 if(isset($_FILES['dp_image'])){
	$message = _dp_upload_logo();
	add_settings_error('design_plus_options', 'default', $message['message'], ($message['error'] ? 'error' : 'updated'));
 }

 //画像リサイズ
 if(isset($_REQUEST['dp_logo_resize_left'], $_REQUEST['dp_logo_resize_top']) && is_numeric($_REQUEST['dp_logo_resize_left']) && is_numeric($_REQUEST['dp_logo_resize_top'])){
	$message = _dp_resize_logo();
	add_settings_error('design_plus_options', 'default', $message['message'], ($message['error'] ? 'error' : 'updated'));
 }


 //詳細記事ページ右上の広告バナー
	 if(isset($_FILES['single_ad_image_file1'])){
		 //画像のアップロードに問題はないか
		 if($_FILES['single_ad_image_file1']['error'] === 0){
			 $name = sanitize_file_name($_FILES['single_ad_image_file1']['name']);
			 //ファイル形式をチェック
			 if(!preg_match("/\.(png|jpe?g|gif)$/i", $name)){
				 add_settings_error('design_plus_options', 'dp_uploader', sprintf(__('You uploaded %s but allowed file format is PNG, GIF and JPG.', 'tcd-w'), $name), 'error');
			 }else{
				//ディレクトリの存在をチェック
				if(
					(
						(file_exists(dp_logo_basedir()) && is_dir(dp_logo_basedir()) && is_writable(dp_logo_basedir()) )
							||
						@mkdir(dp_logo_basedir())
					)
						&&
					move_uploaded_file($_FILES['single_ad_image_file1']['tmp_name'], dp_logo_basedir().DIRECTORY_SEPARATOR.$name)
				){
					$input['single_ad_image1'] = dp_logo_baseurl().'/'.$name;
				}else{
					add_settings_error('default', 'dp_uploader', sprintf(__('Directory %s is not writable. Please check permission.', 'tcd-w'), dp_logo_basedir()), 'error');
				}
			 }
		 }elseif($_FILES['single_ad_image_file1']['error'] !== UPLOAD_ERR_NO_FILE){
			 add_settings_error('default', 'dp_uploader', _dp_get_upload_err_msg($_FILES['single_ad_image_file1']['error']), 'error');
		 }
	 }


 //詳細記事ページ右下の広告バナー
	 if(isset($_FILES['single_ad_image_file2'])){
		 //画像のアップロードに問題はないか
		 if($_FILES['single_ad_image_file2']['error'] === 0){
			 $name = sanitize_file_name($_FILES['single_ad_image_file2']['name']);
			 //ファイル形式をチェック
			 if(!preg_match("/\.(png|jpe?g|gif)$/i", $name)){
				 add_settings_error('design_plus_options', 'dp_uploader', sprintf(__('You uploaded %s but allowed file format is PNG, GIF and JPG.', 'tcd-w'), $name), 'error');
			 }else{
				//ディレクトリの存在をチェック
				if(
					(
						(file_exists(dp_logo_basedir()) && is_dir(dp_logo_basedir()) && is_writable(dp_logo_basedir()) )
							||
						@mkdir(dp_logo_basedir())
					)
						&&
					move_uploaded_file($_FILES['single_ad_image_file2']['tmp_name'], dp_logo_basedir().DIRECTORY_SEPARATOR.$name)
				){
					$input['single_ad_image2'] = dp_logo_baseurl().'/'.$name;
				}else{
					add_settings_error('default', 'dp_uploader', sprintf(__('Directory %s is not writable. Please check permission.', 'tcd-w'), dp_logo_basedir()), 'error');
				}
			 }
		 }elseif($_FILES['single_ad_image_file2']['error'] !== UPLOAD_ERR_NO_FILE){
			 add_settings_error('default', 'dp_uploader', _dp_get_upload_err_msg($_FILES['single_ad_image_file2']['error']), 'error');
		 }
	 }


 //詳細記事ページ上部の広告バナー
	 if(isset($_FILES['single_ad_image_file3'])){
		 //画像のアップロードに問題はないか
		 if($_FILES['single_ad_image_file3']['error'] === 0){
			 $name = sanitize_file_name($_FILES['single_ad_image_file3']['name']);
			 //ファイル形式をチェック
			 if(!preg_match("/\.(png|jpe?g|gif)$/i", $name)){
				 add_settings_error('design_plus_options', 'dp_uploader', sprintf(__('You uploaded %s but allowed file format is PNG, GIF and JPG.', 'tcd-w'), $name), 'error');
			 }else{
				//ディレクトリの存在をチェック
				if(
					(
						(file_exists(dp_logo_basedir()) && is_dir(dp_logo_basedir()) && is_writable(dp_logo_basedir()) )
							||
						@mkdir(dp_logo_basedir())
					)
						&&
					move_uploaded_file($_FILES['single_ad_image_file3']['tmp_name'], dp_logo_basedir().DIRECTORY_SEPARATOR.$name)
				){
					$input['single_ad_image3'] = dp_logo_baseurl().'/'.$name;
				}else{
					add_settings_error('default', 'dp_uploader', sprintf(__('Directory %s is not writable. Please check permission.', 'tcd-w'), dp_logo_basedir()), 'error');
				}
			 }
		 }elseif($_FILES['single_ad_image_file3']['error'] !== UPLOAD_ERR_NO_FILE){
			 add_settings_error('default', 'dp_uploader', _dp_get_upload_err_msg($_FILES['single_ad_image_file3']['error']), 'error');
		 }
	 }


 //詳細記事ページ下部の広告バナー
	 if(isset($_FILES['single_ad_image_file4'])){
		 //画像のアップロードに問題はないか
		 if($_FILES['single_ad_image_file4']['error'] === 0){
			 $name = sanitize_file_name($_FILES['single_ad_image_file4']['name']);
			 //ファイル形式をチェック
			 if(!preg_match("/\.(png|jpe?g|gif)$/i", $name)){
				 add_settings_error('design_plus_options', 'dp_uploader', sprintf(__('You uploaded %s but allowed file format is PNG, GIF and JPG.', 'tcd-w'), $name), 'error');
			 }else{
				//ディレクトリの存在をチェック
				if(
					(
						(file_exists(dp_logo_basedir()) && is_dir(dp_logo_basedir()) && is_writable(dp_logo_basedir()) )
							||
						@mkdir(dp_logo_basedir())
					)
						&&
					move_uploaded_file($_FILES['single_ad_image_file4']['tmp_name'], dp_logo_basedir().DIRECTORY_SEPARATOR.$name)
				){
					$input['single_ad_image4'] = dp_logo_baseurl().'/'.$name;
				}else{
					add_settings_error('default', 'dp_uploader', sprintf(__('Directory %s is not writable. Please check permission.', 'tcd-w'), dp_logo_basedir()), 'error');
				}
			 }
		 }elseif($_FILES['single_ad_image_file4']['error'] !== UPLOAD_ERR_NO_FILE){
			 add_settings_error('default', 'dp_uploader', _dp_get_upload_err_msg($_FILES['single_ad_image_file4']['error']), 'error');
		 }
	 }


 //記事一覧の広告
 for($i = 1; $i <= 3; $i++){
	 if(isset($_FILES['post_ad_image_file_'.$i])){
		 //画像のアップロードに問題はないか
		 if($_FILES['post_ad_image_file_'.$i]['error'] === 0){
			 $name = sanitize_file_name($_FILES['post_ad_image_file_'.$i]['name']);
			 //ファイル形式をチェック
			 if(!preg_match("/\.(png|jpe?g|gif)$/i", $name)){
				 add_settings_error('design_plus_options', 'dp_uploader', sprintf(__('You uploaded %s but allowed file format is PNG, GIF and JPG.', 'tcd-w'), $name), 'error');
			 }else{
				//ディレクトリの存在をチェック
				if(
					(
						(file_exists(dp_logo_basedir()) && is_dir(dp_logo_basedir()) && is_writable(dp_logo_basedir()) )
							||
						@mkdir(dp_logo_basedir())
					)
						&&
					move_uploaded_file($_FILES['post_ad_image_file_'.$i]['tmp_name'], dp_logo_basedir().DIRECTORY_SEPARATOR.$name)
				){
					$input['post_ad_image'.$i] = dp_logo_baseurl().'/'.$name;
				}else{
					add_settings_error('default', 'dp_uploader', sprintf(__('Directory %s is not writable. Please check permission.', 'tcd-w'), dp_logo_basedir()), 'error');
					break;
				}
			 }
		 }elseif($_FILES['post_ad_image_file_'.$i]['error'] !== UPLOAD_ERR_NO_FILE){
			 add_settings_error('default', 'dp_uploader', _dp_get_upload_err_msg($_FILES['post_ad_image_file_'.$i]['error']), 'error');
			 continue;
		 }
	 }
 }


 //スライダーの画像
 for($i = 1; $i <= 10; $i++){
	 if(isset($_FILES['slider_image_file'.$i])){
		 //画像のアップロードに問題はないか
		 if($_FILES['slider_image_file'.$i]['error'] === 0){
			 $name = sanitize_file_name($_FILES['slider_image_file'.$i]['name']);
			 //ファイル形式をチェック
			 if(!preg_match("/\.(png|jpe?g|gif)$/i", $name)){
				 add_settings_error('design_plus_options', 'dp_uploader', sprintf(__('You uploaded %s but allowed file format is PNG, GIF and JPG.', 'tcd-w'), $name), 'error');
			 }else{
				//ディレクトリの存在をチェック
				if(
					(
						(file_exists(dp_logo_basedir()) && is_dir(dp_logo_basedir()) && is_writable(dp_logo_basedir()) )
							||
						@mkdir(dp_logo_basedir())
					)
						&&
					move_uploaded_file($_FILES['slider_image_file'.$i]['tmp_name'], dp_logo_basedir().DIRECTORY_SEPARATOR.$name)
				){
					$input['slider_image'.$i] = dp_logo_baseurl().'/'.$name;
				}else{
					add_settings_error('default', 'dp_uploader', sprintf(__('Directory %s is not writable. Please check permission.', 'tcd-w'), dp_logo_basedir()), 'error');
					break;
				}
			 }
		 }elseif($_FILES['slider_image_file'.$i]['error'] !== UPLOAD_ERR_NO_FILE){
			 add_settings_error('default', 'dp_uploader', _dp_get_upload_err_msg($_FILES['slider_image_file'.$i]['error']), 'error');
			 continue;
		 }
	 }
 }


 //オリジナルパターン
	 if(isset($_FILES['original_pattern_file'])){
		 //画像のアップロードに問題はないか
		 if($_FILES['original_pattern_file']['error'] === 0){
			 $name = sanitize_file_name($_FILES['original_pattern_file']['name']);
			 //ファイル形式をチェック
			 if(!preg_match("/\.(png|jpe?g|gif)$/i", $name)){
				 add_settings_error('design_plus_options', 'dp_uploader', sprintf(__('You uploaded %s but allowed file format is PNG, GIF and JPG.', 'tcd-w'), $name), 'error');
			 }else{
				//ディレクトリの存在をチェック
				if(
					(
						(file_exists(dp_logo_basedir()) && is_dir(dp_logo_basedir()) && is_writable(dp_logo_basedir()) )
							||
						@mkdir(dp_logo_basedir())
					)
						&&
					move_uploaded_file($_FILES['original_pattern_file']['tmp_name'], dp_logo_basedir().DIRECTORY_SEPARATOR.$name)
				){
					$input['original_pattern'] = dp_logo_baseurl().'/'.$name;
				}else{
					add_settings_error('default', 'dp_uploader', sprintf(__('Directory %s is not writable. Please check permission.', 'tcd-w'), dp_logo_basedir()), 'error');
				}
			 }
		 }elseif($_FILES['original_pattern_file']['error'] !== UPLOAD_ERR_NO_FILE){
			 add_settings_error('default', 'dp_uploader', _dp_get_upload_err_msg($_FILES['original_pattern_file']['error']), 'error');
		 }
	 }






 return $input;
}

?>