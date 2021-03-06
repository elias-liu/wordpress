<?php 
/* 分类图片主页*/
	get_header(); ?>

	<!-- 幻灯 -->
<?php if (zm_get_option('slider')) { ?>
	<?php
		if ( !is_paged() ) :
			get_template_part( 'template/slider' );
		endif;
	?>
<?php } ?>

<section id="grid-cat" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php 
			require get_template_directory() . '/grid/grid-cat-new.php';

			require get_template_directory() . '/grid/grid-cat-a.php';

			get_template_part( '/grid/grid-widget-one' );

			require get_template_directory() . '/grid/grid-cat-b.php';

			get_template_part( '/grid/grid-widget-two' );

			require get_template_directory() . '/grid/grid-cat-c.php';
		 ?>
	</main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>