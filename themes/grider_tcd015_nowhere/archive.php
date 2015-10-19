<?php get_header(); $options = get_desing_plus_option(); ?>

<div id="right_col">

  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
  <?php if(!is_paged()) { ?>
  <?php if (is_category()) { ?>
  <h2 id="archive_headline"><span><?php printf(__('Archive for the &#8216; %s &#8217; Category', 'tcd-w'), single_cat_title('', false)); ?></span></h2>

  <?php } elseif( is_tag() ) { ?>
  <h2 id="archive_headline"><span><?php printf(__('Posts Tagged &#8216; %s &#8217;', 'tcd-w'), single_tag_title('', false) ); ?></span></h2>

  <?php } elseif (is_day()) { ?>
  <h2 id="archive_headline"><span><?php printf(__('Archive for &#8216; %s &#8217;', 'tcd-w'), get_the_time(__('F jS, Y', 'tcd-w'))); ?></span></h2>

  <?php } elseif (is_month()) { ?>
  <h2 id="archive_headline"><span><?php printf(__('Archive for &#8216; %s &#8217;', 'tcd-w'), get_the_time(__('F, Y', 'tcd-w'))); ?></span></h2>

  <?php } elseif (is_year()) { ?>
  <h2 id="archive_headline"><span><?php printf(__('Archive for &#8216; %s &#8217;', 'tcd-w'), get_the_time(__('Y', 'tcd-w'))); ?></span></h2>

  <?php } elseif (is_author()) { ?>
  <?php global $wp_query; $curauth = $wp_query->get_queried_object(); //get the author info ?>
  <h2 id="archive_headline"><span><?php printf(__('Archive for the &#8216; %s &#8217;', 'tcd-w'), $curauth->display_name ); ?></span></h2>

  <?php } else { ?>
  <h2 id="archive_headline"><span><?php _e('Blog Archives', 'tcd-w'); ?></span></h2>
  <?php }; ?>
  <?php }; ?>

 <div class="post_list clearfix">

  <!-- adsense1 -->
  <?php if(!is_paged()) { if($options['post_ad1']||$options['post_ad_image1']) { ?>
  <div class="post_item banner_block">
   <?php if ($options['post_ad1']) { ?>
    <?php echo $options['post_ad1']; ?>
   <?php } else { ?>
    <a href="<?php esc_attr_e( $options['post_ad_url1'] ); ?>" class="target_blank"><img src="<?php esc_attr_e( $options['post_ad_image1'] ); ?>" alt="" title="" /></a>
   <?php }; ?>
  </div>
  <?php }; }; ?>

  <?php $i = 1; if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <?php if($i == 5 and !is_paged()) { ?>

  <!-- adsense2 -->
  <?php if($options['post_ad2']||$options['post_ad_image2']) { ?>
  <div class="post_item banner_block">
   <?php if ($options['post_ad2']) { ?>
    <?php echo $options['post_ad2']; ?>
   <?php } else { ?>
    <a href="<?php esc_attr_e( $options['post_ad_url2'] ); ?>" class="target_blank"><img src="<?php esc_attr_e( $options['post_ad_image2'] ); ?>" alt="" title="" /></a>
   <?php }; ?>
  </div>
  <?php }; ?>

  <?php } elseif($i == 9 and !is_paged()) { ?>

  <!-- adsense3 -->
  <?php if($options['post_ad3']||$options['post_ad_image3']) { ?>
  <div class="post_item banner_block">
   <?php if ($options['post_ad3']) { ?>
    <?php echo $options['post_ad3']; ?>
   <?php } else { ?>
    <a href="<?php esc_attr_e( $options['post_ad_url3'] ); ?>" class="target_blank"><img src="<?php esc_attr_e( $options['post_ad_image3'] ); ?>" alt="" title="" /></a>
   <?php }; ?>
  </div>
  <?php }; ?>

  <?php }; ?>

  <div class="post_item block">
   <a class="post_image" href="<?php the_permalink() ?>"><?php the_post_thumbnail('size1'); ?></a>
   <div class="meta clearfix">
    <p class="date"><span class="year"><?php the_time('Y'); ?></span><span class="month"><?php the_time('n/j'); ?></span></p>
    <p class="post_category"><?php the_category(', '); ?></p>
   </div>
   <h3 class="post_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
   <div class="excerpt">
    <p><?php if (has_excerpt()) { the_excerpt(); } else { new_excerpt(70);}; ?></p>
   </div>
  </div>

  <?php $i++; endwhile; else: ?>

  <div class="block no_post"><p><?php _e("There is no registered post.","tcd-w"); ?></p></div>

  <?php endif; ?>

 </div><!-- END #post_list -->

 <div id="next_post"><?php next_posts_link( __( 'read more', 'tcd-w' ) ); ?></div>

</div><!-- END #left_col -->

<?php get_footer(); ?>