<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!--[if IE 7]>
<html class="ie7" xmlns="http://www.w3.org/1999/xhtml">
<![endif]-->
<!--[if IE 8]>
<html class="ie8" xmlns="http://www.w3.org/1999/xhtml">
<![endif]-->
<!--[if !IE]><!-->
<html xmlns="http://www.w3.org/1999/xhtml">
<!--<![endif]-->
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php seo_title(); ?></title>
<meta name="description" content="<?php seo_description(); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" /> 
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php $options = get_desing_plus_option(); ?>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/comment-style.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/color/<?php echo $options['color_type']; ?>.css" type="text/css" />
<!--[if IE 7]>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/ie7.css" type="text/css" />
<![endif]-->
<?php if (strtoupper(get_locale()) == 'JA') ://to fix the font-size for japanese font ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/japanese.css" type="text/css" />
<?php endif; ?>

<?php wp_enqueue_script( 'jquery' ); ?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?> 
<?php wp_head(); ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jscript.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/scroll.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/comment.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/rollover.js"></script>

<?php if(is_home() || is_archive() || is_search()) { ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/imagesloaded.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.infinitescroll.min.js"></script>

<script type="text/javascript">

  jQuery(document).ready(function($){

    var w_width = document.documentElement.clientWidth;

    if(w_width > 1515) {
      $('#main_content').css('width','1482px');
      $('#archive_headline').css('width','1248px');
    } else if(w_width > 1170) {
      $('#main_content').css('width','1166px');
      $('#archive_headline').css('width','932px');
    } else {
      $('#main_content').css('width','850px');
      $('#archive_headline').css('width','616px');
    };

    $(window).bind("resize", function() {
      $('#main_content').css('width','');
    });

    var $container = $('.post_list');
    $container.imagesLoaded(function(){

      $container.masonry({
        columnWidth: 316,
        itemSelector : '.post_item',
        isFitWidth : true,
        isAnimated : true
      });

      $container.masonry('on', 'layoutComplete', function(){

        var right_w = $('.post_list').width();
        var main_w = right_w + 218;

        $('#archive_headline').animate({width: right_w - 16},'fast');

        $('#main_content').animate({width:main_w},'fast');

      });

    });

    $container.infinitescroll({
      navSelector  : '#next_post',
      nextSelector : '#next_post a',
      itemSelector : '.post_item',
      loading: {
          extraScrollPx: '0',
          msgText : '<?php _e('Loading post...', 'tcd-w');  ?>',
          finishedMsg : '<?php _e('No more post', 'tcd-w');  ?>',
          img : '<?php bloginfo('template_url'); ?>/img/common/loader.gif'
        }
      },
      function( newElements ) {
        var $newElems = $( newElements );
        $newElems.imagesLoaded(function(){
          $container.masonry( 'appended', $newElems, true );
        });
      }
    );

  });

</script>
<?php }; ?>

<?php if(is_home() && $options['show_slider']) { ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.nivo.slider.pack.js"></script>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/nivo-slider.css" type="text/css" />
<script type="text/javascript">
jQuery(window).on('load',function() {
 jQuery('#slider').nivoSlider({
  effect:'fade',
  animSpeed:500,
  pauseTime:6000,
  directionNav:false,
  controlNav:true
 });
});
</script>
<?php }; ?>

<style type="text/css">
body {
 font-size:<?php echo $options['content_font_size']; ?>px;
 <?php if($options['bg_type1']=='type1') { echo 'background:#e9ebe8'; } elseif($options['bg_type1']=='type3') { echo "background:url(" . get_bloginfo('template_url') . "/img/background/" . $options['bg_type2'] . ".gif);"; } elseif($options['bg_type1']=='type4') { echo "background:url(" . $options['original_pattern'] . ");"; }; ?>
}

.block, .banner_block img {
 <?php if($options['bg_type1']=='type1') { ?>
 box-shadow:0px 0px 5px 0px #ddd;
 <?php } elseif($options['bg_type1']=='type2') { ?>
 box-shadow:none;
 <?php } elseif($options['bg_type1']=='type3' and $options['bg_type2']=='image1' or $options['bg_type1']=='type3' and $options['bg_type2']=='image2') { ?>
 box-shadow:0px 0px 5px 0px #aaa;
 <?php } else { ?>
 box-shadow:0px 0px 5px 0px #000;
 <?php }; ?>
}
</style>

</head>
<body class="<?php if(is_home() || is_archive() || is_search()) { echo ' grid_layout'; }; if(is_page_template('page-noside.php')) { echo ' no_side'; }; if(is_page_template('page-noside2.php')) { echo ' no_side2'; }; ?> default">

 <div id="main_content" class="clearfix"<?php if(is_home() || is_archive() || is_search()) { echo ' style="width:1166px;"'; }; ?>>

  <?php if(!is_page_template('page-noside2.php')) { ?>
  <div id="left_col">

   <!-- logo -->
   <?php the_dp_logo(); ?>

   <div id="menu_block" class="block">

    <!-- category menu -->
    <?php if ($options['show_side_category']) { ?>
    <div id="side_category">
     <h3 class="side_headline"><?php echo $options['headline_side_category']; ?></h3>
     <ul class="side_category">
      <?php wp_list_categories('orderby=name&title_li='); ?>
     </ul>
    </div>
    <?php }; ?>

    <!-- archive menu -->
    <?php if ($options['show_side_archive']) { ?>
    <div id="side_archive">
     <h3 class="side_headline"><?php echo $options['headline_side_archive']; ?></h3>
     <?php $archives = get_archives_array(); ?>
     <?php if($archives): ?>
     <ul class="clearfix">
      <?php foreach($archives as $archive): ?>
      <li><a href="<?php echo get_month_link($archive->year, $archive->month); ?>"><span class="year"><?php echo $archive->year; ?></span><span class="month"><?php echo $archive->month; ?></span></a></li>
      <?php endforeach; ?>
     </ul>
     <?php endif; ?>
    </div>
    <?php }; ?>

    <!-- global menu -->
    <?php if ($options['show_side_menu']) { ?>
    <div id="global_menu" class="clearfix">
     <h3 class="side_headline"><?php echo $options['headline_side_menu']; ?></h3>
     <?php if (has_nav_menu('global-menu')) { wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'global-menu' , 'container' => '' ) ); } else { ?>
     <ul>
      <?php wp_list_pages('title_li='); ?>
     </ul>
     <?php }; ?>
    </div>
    <?php }; ?>

    <!-- social button --> 
    <?php if ($options['show_rss'] or $options['twitter_url'] or $options['facebook_url'] or $options['show_search']) { ?>
    <ul id="social_link" class="clearfix">
     <?php if ($options['show_rss']) : ?>
     <li class="rss_button"><a class="target_blank" href="<?php bloginfo('rss2_url'); ?>">rss</a></li>
     <?php endif; ?>
     <?php if ($options['twitter_url']) : ?>
     <li class="twitter_button"><a class="target_blank" href="<?php echo $options['twitter_url']; ?>">twitter</a></li>
     <?php endif; ?>
     <?php if ($options['facebook_url']) : ?>
     <li class="facebook_button"><a class="target_blank" href="<?php echo $options['facebook_url']; ?>">facebook</a></li>
     <?php endif; ?>
     <?php if ($options['show_search']) : ?>
     <li class="search_button"><a href="#">search button</a><div id="show_search_box"><?php _e('Search box', 'tcd-w');  ?></div></li>
     <?php endif; ?>
    </ul>
    <?php }; ?>

    <!-- search area -->
    <?php if ($options['show_search']) : ?>
    <div id="search_area" class="clearfix">
     <?php if ($options['custom_search_id']) { ?>
     <form action="http://www.google.com/cse" method="get" id="searchform">
      <div>
       <input id="search_button" class="rollover" type="image" src="<?php bloginfo('template_url'); ?>/img/side/search_button.gif" name="sa" alt="<?php _e('SEARCH','tcd-w'); ?>" title="<?php _e('SEARCH','tcd-w'); ?>" />
       <input type="hidden" name="cx" value="<?php echo $options['custom_search_id']; ?>" />
       <input type="hidden" name="ie" value="UTF-8" />
      </div>
      <div><input id="search_input" type="text" value="<?php _e('SEARCH','tcd-w'); ?>" name="q" onfocus="if (this.value == '<?php _e('SEARCH','tcd-w'); ?>') this.value = '';" onblur="if (this.value == '') this.value = '<?php _e('SEARCH','tcd-w'); ?>';" /></div>
     </form>
     <?php } else { ?>
     <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
      <div><input id="search_button" class="rollover" type="image" src="<?php bloginfo('template_url'); ?>/img/side/search_button.gif" alt="<?php _e('SEARCH','tcd-w'); ?>" title="<?php _e('SEARCH','tcd-w'); ?>" /></div>
      <div><input id="search_input" type="text" value="<?php _e('SEARCH','tcd-w'); ?>" name="s" onfocus="if (this.value == '<?php _e('SEARCH','tcd-w'); ?>') this.value = '';" onblur="if (this.value == '') this.value = '<?php _e('SEARCH','tcd-w'); ?>';" /></div>
     </form>
     <?php }; ?>
    </div>
    <?php endif; ?>

   </div><!-- END #menu_block -->

   <?php include('widget.php'); ?>

   <p id="copy_right">&copy;&nbsp;<a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a> All rights reserved.</p>

  </div><!-- END #left_col -->
  <?php }; ?>
