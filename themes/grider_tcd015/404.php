<?php get_header(); $options = get_desing_plus_option(); ?>

<div id="page" class="block">

 <h2 class="post_title"><?php _e("Sorry, but you are looking for something that isn't here.","tcd-w"); ?></h2>

 <div class="post">

  <p class="back"><a href="<?php echo esc_url(home_url('/')); ?>"><?php _e("RETURN HOME","tcd-w"); ?></a></p>

 </div><!-- END .post -->

</div><!-- END #page -->

<?php include('widget_single.php'); ?>

<?php get_footer(); ?>