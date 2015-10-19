<?php get_header(); $options = get_desing_plus_option(); ?>

<div id="single_post" class="block">

 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 <?php if ( has_post_thumbnail()) { ?>
 <div class="post_image">
  <?php the_post_thumbnail('size2'); ?>
 </div>
 <?php }; ?>

 <div class="meta clearfix">
  <p class="date"><span class="year"><?php the_time('Y'); ?></span><span class="month"><?php the_time('n/j'); ?></span></p>
  <p class="post_category"><?php the_category(', '); ?></p>
 </div>

 <h2 class="post_title"><?php the_title(); ?></h2>

 <?php if($options['single_ad_code3']||$options['single_ad_image3']) { ?>
 <div id="single_banner_top">
  <?php if ($options['single_ad_code3']) { ?>
   <?php echo $options['single_ad_code3']; ?>
  <?php } else { ?>
   <a href="<?php esc_attr_e( $options['single_ad_url3'] ); ?>" class="target_blank"><img src="<?php esc_attr_e( $options['single_ad_image3'] ); ?>" alt="" title="" /></a>
  <?php }; ?>
 </div>
 <?php };?>

 <div class="post clearfix">
  <?php the_content(); ?>
  <?php custom_wp_link_pages(); ?>
 </div><!-- END .post -->

 <?php if($options['single_ad_code4']||$options['single_ad_image4']) { ?>
 <div id="single_banner_bottom">
  <?php if ($options['single_ad_code4']) { ?>
   <?php echo $options['single_ad_code4']; ?>
  <?php } else { ?>
   <a href="<?php esc_attr_e( $options['single_ad_url4'] ); ?>" class="target_blank"><img src="<?php esc_attr_e( $options['single_ad_image4'] ); ?>" alt="" title="" /></a>
  <?php }; ?>
 </div>
 <?php };?>

 <div id="post_meta" class="clearfix">
  <ul id="meta">
   <?php if ($options['show_author']) : ?><li class="meta_author"><?php the_author_posts_link(); ?></li><?php endif; ?>
   <?php if ($options['show_comment']) : ?><li class="meta_comment"><?php comments_popup_link(__('Write comment', 'tcd-w'), __('1 comment', 'tcd-w'), __('% comments', 'tcd-w')); ?></li><?php endif; ?>
   <li class="meta_category"><?php the_category(', '); ?></li>
   <?php the_tags('<li class="meta_tag">',', ','</li>'); ?>
  </ul>
  <?php if($options['show_bookmark']) { include('bookmark.php'); };?>
 </div>

 <?php endwhile; endif; ?>

 <?php if ($options['show_next_post']) : ?>
 <div id="previous_next_post" class="clearfix">
  <?php previous_post_link( '<p class="prev_post">%link</p>', __( 'prev', 'tcd-w' ) ); ?>
  <?php next_post_link( '<p class="next_post">%link</p>', __( 'next', 'tcd-w' ) ); ?>
 </div>
 <?php endif; ?>

 <?php // related post
      if ($options['show_related_post']) :
      $categories = get_the_category($post->ID);
      if ($categories) {
      $category_ids = array();
       foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
        $args=array(
                    'category__in' => $category_ids,
                    'post__not_in' => array($post->ID),
                    'showposts'=>6,
                    'orderby' => 'rand'
                  );
       $my_query = new wp_query($args);
       if($my_query->have_posts()) {
 ?>
 <div id="related_post">
  <h3 class="headline2"><?php _e("Related post","tcd-w"); ?></h3>
  <ul class="clearfix">
   <?php while ($my_query->have_posts()) { $my_query->the_post(); ?>
   <li class="clearfix">
    <a class="image" href="<?php the_permalink() ?>"><?php if ( has_post_thumbnail()) { the_post_thumbnail('size3'); } else { echo '<img src="'; bloginfo('template_url'); echo '/img/common/no_image1.gif" alt="" title="" />'; }; ?></a>
    <h4 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
   </li>
   <?php }; ?>
  </ul>
 </div>
 <?php }; }; wp_reset_query(); ?>
 <?php endif; ?>

 <?php if ($options['show_comment']) : if (function_exists('wp_list_comments')) { comments_template('', true); } else { comments_template(); }; endif; ?>

</div><!-- END #single_post -->

<?php include('widget_single.php'); ?>

<?php get_footer(); ?>