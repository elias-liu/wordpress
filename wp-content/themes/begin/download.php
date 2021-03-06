<?php 
	require( dirname(__FILE__) . '/wp-load.php' );// 在网站根目录时使用
	$id=$_GET['id'];
	$title = get_post($id)->post_title;
	$down_name=get_post_meta($id, 'down_name', true);
	$file_inf=get_post_meta($id, 'file_inf', true);
	$baidu_pan=get_post_meta($id, 'baidu_pan', true);
	$baidu_password=get_post_meta($id, 'baidu_password', true);
	$baidu_pan=get_post_meta($id, 'baidu_pan', true);
	$down_local=get_post_meta($id, 'down_local', true);
	$rar_password=get_post_meta($id, 'rar_password', true);
	$down_official=get_post_meta($id, 'down_official', true);
	$file_os=get_post_meta($id, 'file_os', true);
	$down_size=get_post_meta($id, 'down_size', true);
	$down_img=get_post_meta($id, 'down_img', true);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="Cache-Control" content="no-transform" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<title><?php echo $title;?> | 下载页面</title>
<meta name="keywords" content="<?php echo $title;?>" />
<meta name="description" content="<?php echo $title;?>-下载" />
<link rel="shortcut icon" href="<?php echo zm_get_option('favicon'); ?>">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo zm_get_option('apple_icon'); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/down.css" />
<script src="<?php echo get_template_directory_uri(); ?>/js/fancybox.js"></script>
<?php echo zm_get_option('ad_t'); ?>
<?php echo zm_get_option('tongji_h'); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php get_template_part( 'template/menu', 'index' ); ?>
	<?php if (zm_get_option('m_nav')) { ?>
		<?php if ( wp_is_mobile() ) { ?><?php get_template_part( 'inc/menu-m' ); ?><?php } ?>
	<?php } ?>
	<nav class="breadcrumb">
		<?php 
			echo '<a class="crumbs" href="';
			echo home_url('/');
			echo '">';
			echo '<i class="be be-home"></i>' . sprintf(__( '首页', 'begin' )) . '';
			echo "</a>";
			echo '<i class="be be-arrowright"></i>';
			echo '文件下载';
			echo '<i class="be be-arrowright"></i>';
			echo $title;
		 ?>
	</nav>
	<?php get_template_part('ad/ads', 'header'); ?>

<div id="content" class="site-content">
	<div class="down-post">
		<div class="down-header">
			<img src="<?php echo zm_get_option('down_header_img'); ?>" alt="<?php echo $title;?>" />
			<h1><?php echo $title;?></h1>
			<div class="clear"></div>
		</div>
		<div class="down-main">
			<div class="down-inf">
				<div class="desc">
					<h3>文件信息</h3>
					<?php if($down_name){ ?><p><?php echo $down_name;?></p><?php } ?>
					<?php if($file_os){ ?><p><?php echo $file_os;?></p><?php } ?>
					<?php if($file_inf){ ?><p><?php echo $file_inf;?></p><?php } ?>
					<?php if($down_size){ ?><p><?php echo $down_size;?></p><?php } ?>
				</div>
				<div class="clear"></div>

				<div class="down-list-box">
					<div class="down-list-t">下载地址</div>
					<div class="clear"></div>
					<?php if($baidu_pan){ ?><div class="down-but"><a href="<?php echo $baidu_pan;?>" target="_blank"><i class="be be-download"></i> 网盘下载</a></div><?php } ?>
					<?php if($down_official){ ?><div class="down-but"><a href="<?php echo $down_official;?>" target="_blank"><i class="be be-download"></i> 官方下载</a></div><?php } ?>
					<?php if($down_local){ ?><div class="down-but"><a href="<?php echo $down_local;?>" target="_blank"><i class="be be-download"></i> 本站下载</a></div><?php } ?>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>

				<div class="down-pass">
					<?php if($rar_password){ ?><p>解压密码：<?php echo $rar_password;?></p><?php } ?>
					<?php if($baidu_password){ ?><p>网盘密码：<?php echo $baidu_password;?></p><?php } ?>
				</div>
				<div class="clear"></div>
			</div>
			<?php if($down_img){ ?>
				<div class="down-img">
					<h3>演示图片</h3>
					<a class="fancybox" href="<?php echo $down_img;?>" data-fancybox-group="button"><img src="<?php echo $down_img;?>" alt="<?php echo $title;?>" /></a>
				</div>
			<?php } ?>
			<div class="clear"></div>
		</div>
		<?php if ( zm_get_option('ad_down') == '' ) { ?>
		<?php } else { ?>
			<div class="down-ad">
				<?php echo stripslashes( zm_get_option('ad_down') ); ?>
				<div class="clear"></div>
			</div>
		<?php } ?>

		<div class="down-copyright">
			<strong>声明：</strong>
			<p> 本站大部分下载资源收集于网络，只做学习和交流使用，版权归原作者所有。
				若您需要使用非免费的软件或服务，请购买正版授权并合法使用。
				本站发布的内容若侵犯到您的权益，请联系站长删除，我们将及时处理。
			</p>
		</div>
	</div>
</div>
<?php get_footer(); ?>