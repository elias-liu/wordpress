<?php
/*
Template Name: Woo商城
*/
?>
<?php get_header(); ?>
<style type="text/css">
.tao-cat {
	position: absolute;
	background: #ff4400;
	margin: 1px 6px;
	padding: 5px 15px;
	z-index: 2;
    border-radius: 2px 0 0 0;
}

.tao-cat a {
	font-size: 16px;
	font-size: 1.6rem;
	color: #fff;
}

.tao-cat a:hover {
	color: #fff;
}

.tao-cat .be-basket {
	font-size: 18px;
	font-size: 1.8rem;
	margin: 0 5px 0 0;
}

#edd {
	float: left;
	width: 70.4%;
}

.picture-title {
    line-height: 30px;
    margin: 10px;
    overflow: hidden;
    text-align: left;
    text-overflow: ellipsis;
    white-space: nowrap;
    word-wrap: normal;
}

.picture {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 2px;
    margin: 0 0 10px;
}

#edd .w4 {
	position: relative;
	float: left;
	width: 33.333333333333333%;
	min-height: 1px;
	padding: 0 5px;
	transition-duration: .5s;
}

@media screen and (max-width:900px) {
	#edd {
		width: 100%;
	}
	#edd .w4 {
		width: 25%;
	}
}

@media screen and (max-width:720px) {
	#edd .w4 {
		width: 50%;
	}
}

@media screen and (max-width:340px) {
	#edd .w4 {
		width: 100%;
	}
}

</style>

<section id="edd" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php if (zm_get_option('type_cat')) { ?>
			<?php
			$terms = get_terms("product_cat");
			$count = count($terms);
			if ( $count > 0 ){
				echo '<ul class="type-cat">';
				foreach ( $terms as $term ) {
					echo '<span class="lx7"><li>';
					echo '<a href="' . get_term_link( $term ) . '" >' . $term->name . '</a>';
					echo '</li></span>';
				}
				echo '<div class="clear"></div></ul>';
			}
			?>
		<?php } ?>
		<?php
		$taxonomy = 'product_cat';
		$terms = get_terms($taxonomy); foreach ($terms as $cat) {
		$catid = $cat->term_id;
		$args = array(
			'showposts' => zm_get_option('custom_cat_n'),
			'tax_query' => array( array( 'taxonomy' => $taxonomy, 'terms' => $catid, 'include_children' => false ) )
		);
		$query = new WP_Query($args);
		if( $query->have_posts() ) { ?>
		<div class="clear"></div>
		<h3 class="tao-cat"><a href="<?php echo get_term_link( $cat ); ?>" ><i class="be be-basket"></i><?php echo $cat->name; ?></a></h3>
		<div class="clear"></div>
		<?php while ($query->have_posts()) : $query->the_post();?>
			<article id="post-<?php the_ID(); ?>" class="w4">
				<div class="picture">
					<figure class="tao-h-img">
						<?php
						do_action( 'woocommerce_before_shop_loop_item' );
						do_action( 'woocommerce_before_shop_loop_item_title' );
						?>
					</figure>
					<?php the_title( sprintf( '<h3 class="picture-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
				</div>
			</article>
		<?php endwhile; ?>
		<?php } wp_reset_query(); ?>
		<?php } ?>
	</main>
	<div class="clear"></div>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>