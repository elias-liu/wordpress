<?php get_header(); ?>
<section id="tao" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php if (zm_get_option('type_cat')) { ?><?php if ( !is_paged() ) :	get_template_part( 'template/type-cat' ); endif; ?><?php } ?>
		<?php $posts = query_posts($query_string . '&orderby=date&showposts='.zm_get_option('taxonomy_cat_n'));?>
		<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="tao-box wow fadeInUp" data-wow-delay="0.3s">
				<figure class="tao-img">
					<?php if (zm_get_option('lazy_s')) { tao_thumbnail_h(); } else { tao_thumbnail(); } ?>
				</figure>
				<div class="product-box">
					<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					<div class="product-i"><?php $price = get_post_meta($post->ID, 'product', true);{ echo $price; }?></div>
					<div class="ded">
						<ul class="price">
							<li class="pricex"><strong>￥ <?php $price = get_post_meta($post->ID, 'pricex', true);{ echo $price; }?>元</strong></li>
							<?php if ( get_post_meta($post->ID, 'pricey', true) ) : ?>
								<li class="pricey"><del>市场价：<?php $price = get_post_meta($post->ID, 'pricey', true);{ echo $price; }?>元</del></li>
							<?php endif; ?>
						</ul>
						<div class="go-url">
							<div class="taourl">
								<?php if ( get_post_meta($post->ID, 'taourl', true) ) { ?>
									<?php
										$url = get_post_meta($post->ID, 'taourl', true);
										echo "<div class='taourl'><a href='".get_template_directory_uri()."/inc/go.php?url=$url' rel='external nofollow' target='_blank' class='url'>购买</a></div>";
									 ?>
									<!-- <a target="_blank" rel="external nofollow" href="<?php $url = get_post_meta($post->ID, 'taourl', true);{ echo $url; }?>" >购买</a> -->
								<?php } ?>
							</div>
							<div class="detail"><a href="<?php the_permalink(); ?>" rel="bookmark">详情</a></div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</article>
		<?php endwhile; ?>
	</main><!-- .site-main -->
	<?php begin_pagenav(); ?>
</section><!-- .content-area -->

<?php get_footer(); ?>