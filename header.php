<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Roboto:400,300,400italic,700" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css" media="all">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/asset/css/style.css" media="all">

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="nav-admin">
			<div class="container">
				<div class="data-left">
					<div class="nav menu-primer"> 
						<?php wp_nav_menu(array('menu' => 'primary', 'theme_location' => 'primary', 'container_id' => 'cssmenu', 'walker' => new CSS_Menu_Maker_Walker())); ?>
					</div>
				</div>
				<div class="data-right">
					<ul class="topakun">
						<li class="dropdown">
							<?php $greet = ferinagreeting(); ?>
							<a href="#"><img src="<?php bloginfo('template_url'); ?>/asset/img/aku-ico.png" alt="akun"><?php echo $greet['greeting']; ?></a>
							<ul class="bukatutup">
								<li><?php echo $greet['urlsatu']; ?></li>
								<li><?php echo $greet['urldua']; ?></li> 
							</ul>
						</li>
						<li class="widget-bahasa">
							<?php dynamic_sidebar( 'top_sidebar' ); ?>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div id="theheader" class="header">
			<div class="container">
				<div class="logo-wrapper">
					<h1>
						<a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name');?>">
							<img alt="<?php bloginfo('name');?>" src="<?php echo ( get_option('image_logo') == '' )? get_bloginfo('template_url') . '/asset/img/logo.png' : get_option('image_logo'); ?>" alt="<?php bloginfo('name');?>">
						</a>
					</h1>
				</div>
				<div class="header-attribut">
					<ul class="menustatic">
						<li><a title="<?php _e('Wholesale', 'ferina'); ?>" href="<?php get_the_permalink( get_option('grosir_pages') ); ?>"><?php _e('Wholesale', 'ferina'); ?></a></li>
						<li><a title="<?php _e('Retail', 'ferina'); ?>" href="<?php get_the_permalink( get_option('retail_pages') ); ?>"><?php _e('Retail', 'ferina'); ?></a></li>
					</ul>
					<form action="<?php echo home_url('/'); ?>" method="get" class="cari">
						<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
						<input type="submit" value="">
					</form>
					<span class="cartnot">
						<ul class="menustatic daftarbelanja">
							<li><a id="cart-text" href="#"><?php _e('Cart', 'ferina'); ?></a></li>
							<li id="buy-selector" class="lihatbelanja">
								<?php $keranjang = is_array( unserialize(get_wp_session('ferinacart')) ) ? unserialize(get_wp_session('ferinacart')) : array(); ?>
								<span class="dafbel"><b><?php echo ($keranjang != null) ? countarrayvalue($keranjang, 'jumlah') : 0; ?></b></span> 
								<ul class="belanjaan hidden">
									<li><?php echo ($keranjang != null) ? countarrayvalue($keranjang, 'jumlah') : 0; ?> <?php _e('Product In Cart', 'ferina');?></li>
									<?php if($keranjang != null): foreach ($keranjang as $key => $val) {
										if ($val['type'] == 'retail') {
											$harga = get_post_meta($val['id'], 'mtb_harga_satuan_retail', true);
										} else {
											if ($val['jumlah'] < 10) {
												$harga = get_post_meta($val['id'], 'mtb_harga_grossir_5_item', true);
											} else {
												$harga = get_post_meta($val['id'], 'mtb_harga_grossir_10_item', true);
											}
										}
										$url = wp_get_attachment_url( get_post_thumbnail_id($val['id']) );
										if ( $url != "" ){
											echo '<li><img style="width: 25%;" src="'.$url.'"><span>'.get_the_title($val['id'], 'thumbnail').' <br/>'. currency($harga) .'</span></li>';
										} else {
											echo '<li><span>'.get_the_title($val['id'], 'thumbnail').' <br/>'. currency($harga) .'</span></li>';
										}
									} ?>
									<li class="for-link">
										<a title="<?php _e('View Cart', 'ferina'); ?>" href="<?php get_the_permalink( get_option('cart_pages') ); ?>"><?php _e('View Cart', 'ferina'); ?></a>
										<a title="<?php _e('Checkout', 'ferina'); ?>" href="<?php get_the_permalink( get_option('checkout_pages') ); ?>"><?php _e('Checkout', 'ferina'); ?></a>
									</li>
									<?php endif; ?>
								</ul>
							</li>
						</ul>
					</span>
				</div>
			</div>
		</div>
		<div class="container">