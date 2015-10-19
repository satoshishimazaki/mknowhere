<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<div class="archivettl">
								<?php if (is_category()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e( 'CATEGORY', 'albatrostheme' ); ?></span> <?php single_cat_title(); ?>
									</h1>
	
								<?php } elseif (is_tag()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e( 'TAG', 'albatrostheme' ); ?></span> <?php single_tag_title(); ?>
									</h1>
	
								<?php } elseif (is_author()) {
									global $post;
									$author_id = $post->post_author;
								?>
									<h1 class="archive-title h2">
										<span class="author-icon"><?php echo get_avatar(get_the_author_id(), 150); ?></span>
										「<?php the_author_meta('display_name', $author_id); ?>」の記事
									</h1>
								<?php } elseif (is_day()) { ?>
									<h1 class="archive-title h2">
										<?php the_time('l, F j, Y'); ?>
									</h1>
	
								<?php } elseif (is_month()) { ?>
										<h1 class="archive-title h2">
											<?php the_time('F Y'); ?>
										</h1>
	
								<?php } elseif (is_year()) { ?>
										<h1 class="archive-title h2">
											<?php the_time('Y'); ?>
										</h1>
								<?php } ?>
							</div>


							<?php if (category_description() && !is_paged()) : ?>
							<div class="taxonomy-description"><?php echo category_description(); ?></div>
							<?php endif; ?>
							
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<header class="entry-header article-header">

					                <p class="byline entry-meta vcard">
					
									<span class="date updated"><?php the_time('Y.m.d'); ?></span>
					                <span class="cat-name"><?php $cat = get_the_category(); ?><?php $cat = $cat[0]; ?><?php echo get_cat_name($cat->term_id); ?></span>
					                <span class="author" style="visibility: hidden;"><?php the_author(); ?></span>
					
					                </p>

									<h3 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

								</header>

								<?php if ( has_post_thumbnail()) : ?>
								<figure class="eyecatch">
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('single-thum'); ?></a>
								</figure>
								<?php endif; ?>


								<section class="entry-content cf">

									<?php the_excerpt(); ?>
									<div class="readmore">
										<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">続きを読む</a>
									</div>
								</section>


							</article>

							<?php endwhile; ?>

							<?php pagination(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1>まだ投稿がありません。</h1>
										</header>
										<section class="entry-content">
											<p>表示する記事がみつかりませんでした。他の記事をお探し下さい。</p>
										</section>
									</article>

							<?php endif; ?>


						</main>

					<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
