<?php get_template_part('head');?> 
<?php
	$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
	$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
	$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
	$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
	$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
		if ($iphone || $android || $palmpre || $ipod || $berry == true) 
:?>
<?php get_template_part('mobile/header', 'mobile');?>
<?php else :?>
	<body <?php body_class(); ?>> 
		<?php
			// $urlIt = 'https://api.instagram.com/oauth/authorize/?client_id=75146f35444045a5834dc90407977700&redirect_uri='.get_site_url().'?callback=instagram&response_type=code';
			// $urlGoogle = 'https://accounts.google.com/o/oauth2/auth?response_type=code&redirect_uri='.get_site_url().'?ket=social-media&action=google&client_id=891535188260.apps.googleusercontent.com&scope=https://www.googleapis.com/auth/userinfo.profile+https://www.googleapis.com/auth/userinfo.email&access_type=offline&approval_prompt=force';
		?>
		<div id="popup-content" class="bodypopup" style="display:none;">
			<div class="inner-popup" title="Login">
				<p class="title-login"><?php echo __('Login','Ferina');?></p>
				<form id="frmlogin" method="get">
					<fieldset>
					<div id="alert"></div>
					<input type="email" name="email" id="email-id" required placeholder="Email" class="text ui-widget-content ui-corner-all"> 
					<input type="password" name="password" required id="password-id" placeholder="Password" class="text ui-widget-content ui-corner-all">
					<!-- <input type="checkbox"><label>saya Ingin tetap Login</label>
					<a class="forgot-pass" href="/forgot-password">Lupa Password</a> -->
					<!-- Allow form submission with keyboard without duplicating the dialog button --> 
					<input type="hidden" value="member-general" name="ket">
					<input type="hidden" value="login" name="action">
					<input type="button" tabindex="-1" onclick="login()" value="<?php echo __('Login','Ferina');?>">
					
					</fieldset>
				</form>
				<p class="login-social"><?php __('Login With', 'Ferina'); ?></p>
				<ul class="icon-login-sos">
					<li><a class="social-login facebook" href="#" title="Facebook"><img src="<?php bloginfo('template_url');?>/lib/img/fb.png" alt="Ferina"></a></li>
					<li><a class="social-login twitter" href="#" title="Twitter"><img src="<?php bloginfo('template_url');?>/lib/img/tw.png" alt="Ferina"></a></li>
					<li><a class="social-login path" href="#" title="Path"><img src="<?php bloginfo('template_url');?>/lib/img/path.png" alt="Ferina"></a></li>
					<li><a class="social-login instagram" href="#" title="Instagram"><img src="<?php bloginfo('template_url');?>/lib/img/ins.png" alt="Ferina"></a></li>
					<li><a class="social-login google" href="#" title="Google Plus"><img src="<?php bloginfo('template_url');?>/lib/img/g+.png" alt="Ferina"></a></li>
				</ul>
			</div>
		</div>  
		<!-- Register Form-->
		<div id="RegisterPopup" class="bodypopup" style="display:none;">
			<div class="inner-popup">
				<p class="title-login"><?php echo __('Register','Ferina');?></p>
				<form id="frmregister" name="fregister" method="get">
					<fieldset> 
					<div  id="alert2"></div>
					<input type="text" name="nama_depan" id="nama_depan" placeholder="<?php echo __('First Name','Ferina');?>" required class="text ui-widget-content ui-corner-all"> 
					<input type="text" name="nama_belakang" id="nama_belakang" required placeholder="<?php echo __('Last Name','Ferina');?>" class="text ui-widget-content ui-corner-all"> 
					<input type="email" name="email" id="email" required placeholder="Email" class="text ui-widget-content ui-corner-all"> 
					<input type="password" name="password" id="password" required placeholder="Password" class="text ui-widget-content ui-corner-all">
					<input type="checkbox" id="setuju_register" name="" value=""><label><?php echo __('I Have Approved Policies','Ferina');?> <?php _e('Ferina Batik', 'wa');?></label>
					<!-- <a class="forgot-pass" href="/forgot-password">Lupa Password</a> -->
					<input type="hidden" value="member-general" name="ket">
					<input type="hidden" value="register" name="action">
					<input type="button" id="btn_checkbox_register" onclick="register()" class="" value="<?php echo __('Register','Ferina');?>" disabled>
					</fieldset>
				</form>
				<p class="login-social"><?php echo __('Or Register With','Ferina');?></p>
				<ul class="icon-login-sos">
					<li><a class="social-login facebook" href="#" title="Facebook"><img src="<?php bloginfo('template_url');?>/lib/img/fb.png" alt="Ferina"></a></li>
					<li><a class="social-login twitter" href="#" title="Twitter"><img src="<?php bloginfo('template_url');?>/lib/img/tw.png" alt="Ferina"></a></li>
					<li><a class="social-login path" href="#" title="Path"><img src="<?php bloginfo('template_url');?>/lib/img/path.png" alt="Ferina"></a></li>
					<li><a class="social-login instagram" href="#" title="Instagram"><img src="<?php bloginfo('template_url');?>/lib/img/ins.png" alt="Ferina"></a></li>
					<li><a class="social-login google" href="#" title="Google Plus"><img src="<?php bloginfo('template_url');?>/lib/img/g+.png" alt="Ferina"></a></li>
				</ul>
			</div>
		</div>  
		<!--Register form end-->
	<div class="nav-admin">
		<div class="container">
			<div class="data-left">
				<div class="nav menu-primer"> 
					<?php 
						wp_nav_menu(array(
							'menu' => 'primary', 
							'theme_location'    => 'primary',
							'container_id' => 'cssmenu', 
							'walker' => new CSS_Menu_Maker_Walker()
						)); 
					?>
				</div> 
			</div>
			<div class="data-right">
				<ul class="topakun">
					<li class="dropdown">
						<?php
							$usr = $_SESSION['user'];
							$user = unserialize($usr);
							// var_dump($user);
							if ($user != null) {
								$namagw = 'Hi, ' . $user['nama'];
								$url = get_site_url().'/profil';
								$profurl = _e( printf('<a href="%s">My Profile</a>', $url), 'Ferina');
								$regurl = '<a href="?ket=member&action=logout">Logout</a>';
							}else{
								$url = '#';
								$namagw = __('My account', 'Ferina');
								$profurl = '<a id="click-me" href="#">Login</a>';
								$regurl = '<a class="Open_reg" href="">Daftar</a>';
							}
						?>
						<a href="<?php echo $url; ?>"><img src="<?php bloginfo('template_url');?>/lib/img/aku-ico.png" alt="akun"><?php echo $namagw; ?></a>
						<ul class="bukatutup">
							<li><?php echo $profurl; ?></li>
							<li><?php echo $regurl; ?></li> 
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
				<h1><a href="<?php echo home_url('/'); ?>"><img alt="<?php bloginfo('name');?>" src="<?php if(of_get_option('logo_image')):echo of_get_option('logo_image'); else :?><?php bloginfo('template_url'); ?>/lib/img/logo.png<?php endif ;?>"></a></h1> 
			</div>
			<div class="header-attribut">
				<ul class="menustatic">
					<li><a title="Grosir" href="/produk_grossir"><?php echo __('Grossir','Ferina');?></a></li>
					<li><a title="Eceran" href="/produk_retail"><?php echo __('Retail','Ferina');?></a></li>
				</ul>
				
				<form action="/" method="get" class="cari">
					<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
					<input type="submit" value="">
				</form>
				<?php

					$keranjang = $_SESSION['keranjang'];
					$ker_arrs = unserialize($keranjang);

					// var_dump($_SESSION['user']);

					if ($ker_arrs != null) {
						$qty = array();
						foreach ($ker_arrs as $key => $val) {
							$qty[] = (int)$val['jumlah'];
						}
						$quantity = array_sum($qty);
						$jum = count($ker_arrs);
					}else{
						$jum = '0';
					}

					if (($keranjang == 'N;') || ($keranjang == 'a:0:{}')) {
						session_destroy();
					}
					
					$jum_bel = $quantity+0;
				?>
				<span class="cartnot">
					<ul class="menustatic daftarbelanja">
						<li><a href="#"><?php echo __('Cart','Ferina');?></a></li>
						<li id="buy-selector" class="lihatbelanja"><span class="dafbel"><b><?php echo $jum_bel; ?></b></span>
							<ul class="belanjaan hidden">
								<li><?php echo $jum; ?> <?php echo __('Product In Cart','Ferina');?></li>
								<?php
									if ($ker_arrs != null) {
										foreach ($ker_arrs as $key => $val) {
											if ($val['type'] == 'retail') {
												$harga = get_post_meta($val['id'], 'mtb_harga_satuan_retail', true);
											}else{
												if ($val['jumlah'] < 10) {
													$harga = get_post_meta($val['id'], 'mtb_harga_grossir_5_item', true);
												}else if ($val['jumlah'] < 20) {
													$harga = get_post_meta($val['id'], 'mtb_harga_grossir_10_item', true);
												}else if ($val['jumlah'] < 40) {
													$harga = get_post_meta($val['id'], 'mtb_harga_grossir_1_kodi', true);
												}else {
													$harga = get_post_meta($val['id'], 'mtb_harga_grossir_2_kodi', true);
												}
											}
											$url = wp_get_attachment_url( get_post_thumbnail_id($val['id']) );
											if ($url != '') {
												echo '<li><img style="width: 25%;" src="'.$url.'"><span>'.get_the_title($val['id'], 'thumbnail').' <br/>'. currency($harga) .'</span></li>';
											}else{
												echo '<li><span>'.get_the_title($val['id'], 'thumbnail').' <br/>'. currency($harga) .'</span></li>';
											}
											
										}
									}
									if ($ker_arrs == null) {
										/*echo 'Keranjang Belanja Anda Kosong';*/
									}
								?>
								<?php
									if($ker_arrs != null){
										echo"<li class='for-link'><a href='/cart'>View Cart</a><a href='/checkout'>". __('Checkout','Ferina')."</a></li>";
									}else{
										echo"";
									}
								?>
							</ul>
						</li>
					</ul>
				</span>
			</div>
		</div>
	</div>
	<div class="container"> 
		<?php if(is_front_page()):?>
			<?php  get_template_part('loops/slider') ;?>
		<?php endif;?><!-- ENd OF IF HOme -->
<?php endif;?><!-- ENd OF IF MOBILE -->