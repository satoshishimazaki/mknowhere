<?php
/*
Template Name:No side
*/
?>
<?php get_header(); $options = get_desing_plus_option(); ?>

<div id="page" class="block">

 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 <h2 class="post_title"><?php the_title(); ?></h2>

 <div class="post">
  <?php the_content(); ?>
  <?php wp_link_pages(); ?>
 </div><!-- END .post -->

 <?php endwhile; endif; ?>

</div><!-- END #single_post -->

<?php get_footer(); ?>