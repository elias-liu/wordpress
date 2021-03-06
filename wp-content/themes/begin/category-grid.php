<?php
/**
 * 分类图片布局，可以单独设置缩略图尺寸
 */

get_header(); ?>

	<section id="picture" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php $posts = query_posts($query_string . '&orderby=date&showposts=16');?>
			<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('wow fadeInUp'); ?> data-wow-delay="0.3s">
				<div class="picture-box">
					<figure class="picture-img">
						<?php if (zm_get_option('hide_box')) { ?>
							<a rel="bookmark" href="<?php echo esc_url( get_permalink() ); ?>"><div class="hide-box"></div></a>
							<a rel="bookmark" href="<?php echo esc_url( get_permalink() ); ?>">
								<div class="hide-excerpt">
									<?php if (has_excerpt('')){
											echo wp_trim_words( get_the_excerpt(), 30, '...' );
										} else {
											$content = get_the_content();
											$content = wp_strip_all_tags(str_replace(array('[',']'),array('<','>'),$content));
											echo wp_trim_words( $content, 30, '...' );
								        }
									?>
								</div>
							</a>
						<?php } ?>
						<?php if (zm_get_option('lazy_s')) { zm_grid_thumbnail_h(); } else { zm_grid_thumbnail(); } ?>
					</figure>
					<?php the_title( sprintf( '<h2 class="grid-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					<span class="grid-inf">
						<span class="g-cat"><i class="be be-folder"></i> <?php zm_category(); ?></span>
						<span class="grid-inf-l">
							<span class="date"><i class="be be-schedule"></i> <?php the_time( 'm/d' ); ?></span>
							<?php if( function_exists( 'the_views' ) ) { the_views( true, '<span class="views"><i class="be be-eye"></i> ','</span>' ); } ?>
							<?php if ( get_post_meta($post->ID, 'zm_like', true) ) : ?><span class="grid-like"><span class="be be-thumbs-up-o">&nbsp;<?php zm_get_current_count(); ?></span></span><?php endif; ?>
						</span>
		 			</span>
		 			<div class="clear"></div>
				</div>
			</article>
			<?php endwhile;?>
		</main><!-- .site-main -->
		<?php begin_pagenav(); ?>
	</section><!-- .content-area -->
<?php get_footer(); ?>