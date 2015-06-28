	<body <?php body_class(); ?>> 
		<div id="popup-content" class="bodypopup" style="display:none;">
			<div class="inner-popup" title="Login">
				<p class="title-login">Login</p>
				<form id="" method="get">
					<fieldset> 
					<input type="text" name="email" id="email" placeholder="Email" class="text ui-widget-content ui-corner-all"> 
					<input type="password" name="password" id="password" placeholder="Password" class="text ui-widget-content ui-corner-all">
					<!-- <input type="checkbox"><label>saya Ingin tetap Login</label>
					<a class="forgot-pass" href="/forgot-password">Lupa Password</a> -->
					<!-- Allow form submission with keyboard without duplicating the dialog button --> 
					<input type="hidden" value="member-general" name="ket">
					<input type="hidden" value="login" name="action">
					<input type="submit" tabindex="-1" value="<?php echo __('Login','Ferina');?>">
					
					</fieldset>
				</form>
				<p class="login-social"><?php echo __('Or Login With','Ferina');?></p>
				<ul class="icon-login-sos">
					<li><a class="social-login facebook" href="#" title="Facebook"><img src="<?php bloginfo('template_url');?>/lib/img/fb.jpg" alt="Ferina"></a></li>
					<li><a class="social-login twitter" href="#" title="Twitter"><img src="<?php bloginfo('template_url');?>/lib/img/tw.jpg" alt="Ferina"></a></li>
					<li><a class="social-login path" href="#" title="Path"><img src="<?php bloginfo('template_url');?>/lib/img/pn.jpg" alt="Ferina"></a></li>
					<li><a class="social-login instagram" href="#" title="Instagram"><img src="<?php bloginfo('template_url');?>/lib/img/it.jpg" alt="Ferina"></a></li>
					<li><a class="social-login google" href="#" title="Google Plus"><img src="<?php bloginfo('template_url');?>/lib/img/gp.jpg" alt="Ferina"></a></li>
				</ul>
			</div>
		</div>
		<!-- Register Form-->
		<div id="RegisterPopup" class="bodypopup" style="display:none;">
			<div class="inner-popup" title="Login">
				<p class="title-login"><?php echo __('Register','Ferina');?></p>
				<form id="" method="get">
					<fieldset> 
					<input type="text" name="nama_depan" id="nama_depan" placeholder="<?php echo __('First Name','Ferina');?>" class="text ui-widget-content ui-corner-all"> 
					<input type="text" name="nama_belakang" id="nama_belakang" placeholder="<?php echo __('Last Name','Ferina');?>" class="text ui-widget-content ui-corner-all"> 
					<input type="text" name="email" id="email" placeholder="<?php echo __('Email','Ferina');?>" class="text ui-widget-content ui-corner-all"> 
					<input type="password" name="password" id="password" placeholder="<?php echo __('Password','Ferina');?>" class="text ui-widget-content ui-corner-all">
					<input type="checkbox" id="setuju_register" name="" value=""><label><?php echo __('I Have Approved','Ferina');?> <?php _e('Ferina Batik', 'wa');?></label>
					<!-- <a class="forgot-pass" href="/forgot-password">Lupa Password</a> -->
					<input type="hidden" value="member-general" name="ket">
					<input type="hidden" value="register" name="action">
					<input type="submit" id="btn_checkbox_register" class="" value="<?php echo __('Register','Ferina');?>" disabled>
					</fieldset>
				</form>
				<p class="login-social"><?php echo __('Or Register With','Ferina');?></p>
				<ul class="icon-login-sos">
					<li><a class="social-login facebook" href="#" title="Facebook"><img src="<?php bloginfo('template_url');?>/lib/img/fb.jpg" alt="Ferina"></a></li>
					<li><a class="social-login twitter" href="#" title="Twitter"><img src="<?php bloginfo('template_url');?>/lib/img/tw.jpg" alt="Ferina"></a></li>
					<li><a class="social-login path" href="#" title="Path"><img src="<?php bloginfo('template_url');?>/lib/img/pn.jpg" alt="Ferina"></a></li>
					<li><a class="social-login instagram" href="#" title="Instagram"><img src="<?php bloginfo('template_url');?>/lib/img/it.jpg" alt="Ferina"></a></li>
					<li><a class="social-login google" href="#" title="Google Plus"><img src="<?php bloginfo('template_url');?>/lib/img/gp.jpg" alt="Ferina"></a></li>
				</ul>
			</div>
		</div>  
		<!--Akun-->
		<div id="navpos" class="top"></div>
		<div class="wrap-akun">
			<a id="Sliding-akun" class="tombol-akun"><img src="<?php bloginfo('template_url');?>/lib/img/aku-ico.png" alt="akun"></a>
			<div id="zona-akun" style="display: none;" class="akun-acces">
				<?php
					$usr = $_SESSION['user'];
					$user = unserialize($usr);
					// var_dump($user);
					if ($user != null) {
						$url = get_site_url().'/profil';
						$profurl = '<a href="' . $url . '">My Profile</a>';
						$regurl = '<a href="?ket=member&action=logout">Logout</a>';
					}else{
						$url = '#';
						$profurl = '<a id="click-me" href="#">Login</a>';
						$regurl = '<a class="Open_reg" href="">Daftar</a>';
					}
				?>
				<ul>
					<li><?php echo $profurl; ?></li>
					<li><?php echo $regurl; ?></li> 
				</ul>				
			</div>		
		</div>	
		<!--Belnaja-->
		<div class="wrap-tas">
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
			<a id="Sliding-belanja" class="tas-belanja"><?php echo $jum_bel; ?></a> 
			<div id="zona-belanja" class="lihatbelanja" style="display:none">
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
								echo '<li><img style="width: 25%;" src="'.wp_get_attachment_url($val['id']).'"><span>'.get_the_title($val['id'], 'thumbnail').' <br/>'. currency($harga) .'</span></li>';
							}
						}
						if ($ker_arrs == null) {
							echo __('Empty Shopping Cart','Ferina');
						}
					?>
					<li class="for-link"><a href="/cart"><?php echo __('View Cart','Ferina');?></a><a href="/checkout"><?php echo __('Checkout','Ferina');?></a></li>
				</ul>
			</div>
		</div>
	<div id="theheader" class="header-mob">
		<div class="nav-admin">
			<div class="container"> 
				<div class="nav menu-primer"> 
					<a class="goshop" href="/produk_grossir"><?php echo __('Grossir','Ferina');?></a>
					<a class="goshop" href="/produk_retail"><?php echo __('Retail','Ferina');?></a>
					<?php 
						wp_nav_menu(array(
							'menu' => 'primary', 
							'theme_location'    => 'primary',
							'container_id' => 'menu2', 
							'walker' => new CSS_Menu_Maker_Walker()
						)); 
					?>
				</div>  
			</div>
		</div>
	</div>
	<div class="container main-mob">  
		<h1 class="logo"><a href="<?php echo home_url('/'); ?>"><img alt="<?php bloginfo('name');?>" src="<?php if(of_get_option('logo_image')):echo of_get_option('logo_image'); else :?><?php bloginfo('template_url'); ?>/lib/img/logo.png<?php endif ;?>"></a></h1> 
		<?php if(is_front_page()):?>
			<?php  get_template_part('loops/slider') ;?>
		<?php endif;?><!-- ENd OF IF HOme -->