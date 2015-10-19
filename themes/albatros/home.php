<?php get_header(); ?>


<?php if ( get_header_image() && !is_paged() ) : ?>
<div id="custom_header" style="background: url(<?php header_image(); ?>) no-repeat center center;">
</div>
<?php endif; ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php if ( !get_header_image() && !is_paged() ) : ?>
						
						<?php		  
						$args = array(
						    'posts_per_page' => 5,
						    'offset' => 0,
						    'tag' => 'pickup',
						    'orderby' => 'post_date',
						    'order' => 'DESC',
						    'post_type' => array('post','page'),
						    'post_status' => 'publish',
						    'suppress_filters' => true,
						    'ignore_sticky_posts' => true,
						    'no_found_rows' => true
						);
						$the_query = new WP_Query( $args );
						if ( $the_query->have_posts() ) {
							?>
						
						<script>
						jQuery(function( $ ) {
							$('.bxslider').bxSlider({
								auto: true,
								autoHover: true,
								nextText: '<i class="fa fa-angle-right"></i>',
								prevText: '<i class="fa fa-angle-left"></i>'
							});
						
							$(window).load(function(){
							    $(".bxslider li").css("opacity", "100");
							});
						});
						</script>
						
						<div id="slider">
						  <ul class="bxslider">
						
						<?php while ( $the_query->have_posts() ) {
						    $the_query->the_post();
						    ?>
						    <li style="opacity:0;">
						        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
							        <?php if ( has_post_thumbnail()) : ?>
									<figure class="eyecatch">
										<?php the_post_thumbnail('slide-thum'); ?>
									</figure>
									<?php endif; ?>
							        <span class="pickup-label">PICK UP!</span>
						
									<div class="slidecaption-wrap">
									    <div class="slidecaption">
										    <p class="date"><?php the_time('Y.m.d'); ?><span class="cat-name"><?php $cat = get_the_category(); ?><?php $cat = $cat[0]; ?><?php echo get_cat_name($cat->term_id); ?></span></p>
									    	<h1 class="h2 entry-title"><?php the_title(); ?></h1>
										</div>
									</div>
								</a>
						    <?php } ; ?>
						</ul>
						</div>
						<?php }
						wp_reset_postdata();
						?>
								  
						<?php endif; ?>
						
						
						<?php if ( get_header_image() && !is_paged() ) : ?>
						
						<?php		  
						$args = array(
						    'posts_per_page' => 16,
						    'offset' => 0,
						    'tag' => 'pickup',
						    'orderby' => 'post_date',
						    'order' => 'DESC',
						    'post_type' => array('post','page'),
						    'post_status' => 'publish',
						    'suppress_filters' => true,
						    'ignore_sticky_posts' => true,
						    'no_found_rows' => true
						);
						$the_query = new WP_Query( $args );
						if ( $the_query->have_posts() ) {
							?>
						
						<script>
						jQuery(function( $ ) {
							$('.bxslider2').bxSlider({
								minSlides: 2,
								maxSlides: 4,
								slideWidth: 172,
								slideMargin: 10,
								moveSlides: 1,
								auto: true,
								autoHover: true,
								pause: 5000,
								nextText: '>',
								prevText: '<'
							});
							$(window).load(function(){
							    $(".bxslider2 li").css("opacity", "100");
							});
						});
						</script>
						
						<div id="top_carousel">
							<h2 class="h3 ttl">おすすめコンテンツ</h2>
						  <ul class="bxslider2">
						
						<?php while ( $the_query->have_posts() ) {
						    $the_query->the_post();
						    ?>
						    <li style="opacity:0;">
						        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
							        <?php if ( has_post_thumbnail()) : ?>
									<figure class="eyecatch">
										<?php the_post_thumbnail('home-thum'); ?>
										<span class="osusume-label">PICK UP</span>
									</figure>
									<?php else: ?>
									<figure class="eyecatch noimg">
										<img src="<?php echo get_template_directory_uri(); ?>/library/images/noimg.png">
										<span class="osusume-label">PICK UP</span>
									</figure>
									<?php endif; ?>
								    <p class="date"><?php the_time('Y.m.d'); ?><span class="cat-name"><?php $cat = get_the_category(); ?><?php $cat = $cat[0]; ?><?php echo get_cat_name($cat->term_id); ?></span></p>
							    	<h1 class="h2 entry-title"><?php the_title(); ?></h1>
								</a>
						    <?php } ; ?>
						</ul>
						</div>
						<?php }
						wp_reset_postdata();
						?>
								  
						<?php endif; ?>





							<div class="top-post-list hentry">
							
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							
								<article class="post-list cf" role="article">
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
								
									<?php if ( has_post_thumbnail()) : ?>
									<figure class="eyecatch">
										<?php the_post_thumbnail('home-thum'); ?>
									</figure>
									<?php else: ?>
									<figure class="eyecatch noimg">
										<img src="<?php echo get_template_directory_uri(); ?>/library/images/noimg.png">
									</figure>
									<?php endif; ?>
								
									<section class="entry-content cf">
									    <p class="byline entry-meta vcard">
									
										<span class="date updated"><?php the_time('Y.m.d'); ?></span>
									    <span class="cat-name"><?php $cat = get_the_category(); ?><?php $cat = $cat[0]; ?><?php echo get_cat_name($cat->term_id); ?></span>
									
									    </p>
									
										<h1 class="h2 entry-title"><?php the_title(); ?></h1>
								
									<?php if( !is_mobile() ): ?>
										<p class="description"><?php echo mb_substr(strip_tags($post-> post_content),0,100).'...'; ?></p>
									<?php endif; ?>
								
									</section>
									</a>
								</article>
							
							<?php endwhile; ?>
							
							<?php pagination(); ?>
	
							<?php else : ?>
								
								<article id="post-not-found" class="hentry cf">
								<header class="article-header">
									<h1>まだ投稿がありません！</h1>
								</header>
								<section class="entry-content">
									<p>表示する記事がまだありません。</p>
								</section>
								</article>
							
							<?php endif; ?>
							</div>

						</main>

					<?php get_sidebar(); ?>

				</div>

			</div>


<?php get_footer(); ?>
