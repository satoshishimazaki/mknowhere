<?php $options = get_desing_plus_option(); ?>

<div id="side_col">

 <div id="single_post_list" class="post_list clearfix">

  <?php if($options['single_ad_code1']||$options['single_ad_image1']) { ?>
  <div class="post_item banner_block">
   <?php if ($options['single_ad_code1']) { ?>
    <?php echo $options['single_ad_code1']; ?>
   <?php } else { ?>
    <a href="<?php esc_attr_e( $options['single_ad_url1'] ); ?>" class="target_blank"><img src="<?php esc_attr_e( $options['single_ad_image1'] ); ?>" alt="" title="" /></a>
   <?php }; ?>
  </div>
  <?php };?>

  <?php
       $single_post_list_num = $options['single_post_list_num'];
       if ($options['single_post_list']=='normal') {
         $args = array('post_type' => 'post', 'post__not_in' => array($post->ID), 'numberposts' => $single_post_list_num);
       } elseif ($options['single_post_list']=='recommend') {
         $args = array('post_type' => 'post', 'post__not_in' => array($post->ID), 'numberposts' => $single_post_list_num, 'meta_key' => 'recommend_post', 'meta_value' => 'on', 'orderby' => 'rand');
       } else {
         $categories = get_the_category($post->ID);
         if ($categories) {
           $category_ids = array();
           foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
           $args=array(
                       'category__in' => $category_ids,
                       'post__not_in' => array($post->ID),
                       'showposts'=> $single_post_list_num,
                       'orderby' => 'rand'
                       );
         };
       };
       $single_post_list=get_posts($args);
       foreach ($single_post_list as $post) : setup_postdata ($post);
  ?>
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
  <?php endforeach; wp_reset_query(); ?>
 </div>

  <?php if($options['single_ad_code2']||$options['single_ad_image2']) { ?>
  <div class="post_item banner_block">
   <?php if ($options['single_ad_code2']) { ?>
    <?php echo $options['single_ad_code2']; ?>
   <?php } else { ?>
    <a href="<?php esc_attr_e( $options['single_ad_url2'] ); ?>" class="target_blank"><img src="<?php esc_attr_e( $options['single_ad_image2'] ); ?>" alt="" title="" /></a>
   <?php }; ?>
  </div>
  <?php };?>

</div>