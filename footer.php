		</div>
		<div class="tools-ferina">
			<div class="container">
				<div class="fe-box">
					<span>
						<img src="<?php bloginfo('template_url');?>/lib/img/savesecure.png" alt="ferina">
					</span>
					<span>
						<p><?php _e('Save & Secure', 'ferina');?></p>
					</span>
				</div> 
				<div class="fe-box">
					<span>
						<img src="<?php bloginfo('template_url');?>/lib/img/phonegray.png" alt="<?php _e('Support', 'ferina');?>">
					</span>
					<span>
						<p><?php _e('Support 24/7', 'ferina');?> <small><?php if( get_option('phone_number') ): echo get_option('phone_number'); else : echo '081222294565'; endif ;?></small></p>
					</span>
				</div> 
				<div class="fe-box">
					<span>
						<img src="<?php bloginfo('template_url');?>/lib/img/cargray.png" alt="<?php _e('Ship Worldwide', 'ferina');?>">
					</span>
					<span>
						<p><?php _e('Ship Worldwide', 'ferina');?></p>
					</span>
				</div> 
			</div>
		</div>
		<div class="widgetbottom theclear">
			<div class="container">
				<div class="bottombox">
					<?php if( get_option('logo_bottom') != '' ):?>
					<img src="<?php echo get_option('logo_bottom');?>" alt="<?php bloginfo('name');?>">
					<?php else :?>
					<img alt="<?php bloginfo('name');?>" src="<?php bloginfo('template_url');?>/lib/img/logobawah.png">
					<?php endif ;?>
				</div>
				<div class="bottombox">
					<strong><?php _e('Find Us at', 'ferina');?> : </strong>
						<ul>
							<?php if (get_option('whatsapp_num') != ''){?>
							<li><a title="Whatsapp <?php bloginfo('name');?>" class="tipshow" href="#" title="<?php echo get_option('whatsapp_num');?>"><img alt="Whatsapp <?php bloginfo('name');?>" src="<?php bloginfo('template_url');?>/lib/img/whatsapp.png"></a></li>
							<?php }?>
							<?php if (get_option('yahoo_id') != ''){?>
							<li><a title="Yahoo <?php bloginfo('name');?>" class="tipshow" href="#" title="<?php echo get_option('yahoo_id');?>"><img alt="Yahoo <?php bloginfo('name');?>" src="<?php bloginfo('template_url');?>/lib/img/yahoo.png"></a></li>
							<?php }?>
							<?php if (get_option('twitter_user')){?>
							<li><a target="blank" title="Twitter <?php bloginfo('name');?>" class="tipshow" href="<?php echo get_option('twitter_user');?>" title="Twitter"><img alt="Twitter <?php bloginfo('name');?>" src="<?php bloginfo('template_url');?>/lib/img/twitter.png"></a></li>
							<?php }?>
							<?php if (get_option('facebook_url')){?>
							<li><a target="blank" title="Facebook <?php bloginfo('name');?>" class="tipshow" href="<?php echo get_option('facebook_url');?>" title="Facebook Profil"><img alt="Facebook <?php bloginfo('name');?>" src="<?php bloginfo('template_url');?>/lib/img/facebook.png"></a></li>
							<?php } ?>
							<?php if(get_option('instagram_user')){?>
							<li><a target="blank" title="<?php bloginfo('name');?> @instagram" class="tipshow" href="#" title="<?php echo get_option('instagram_user');?>"><img alt="<?php bloginfo('name');?> @instagram" src="<?php bloginfo('template_url');?>/lib/img/instagram.png"></a></li>
							<?php } ?>
							<?php if(get_option('pin_bbm')){?>
							<li><a title="Pin BB <?php bloginfo('name');?>" class="tipshow" href=""><?php get_option('pin_bbm'); ?><img alt="Pin BB <?php bloginfo('name');?>" src="<?php bloginfo('template_url');?>/lib/img/bbm.png"></a></li>
							<?php } ?>
						</ul>
				</div>
			</div>
			<div class="container theclear">
				<div class="thebottom-w">
					<div class="footer-widget-wrap">
					<?php if ( is_active_sidebar( 'f_sidebar1' ) ) : ?>
						<div id="sidebar">
							<?php dynamic_sidebar( 'f_sidebar1' ); ?>
						</div>
					<?php endif; ?>
					</div>
					<div class="footer-widget-wrap">
					<?php if ( is_active_sidebar( 'f_sidebar2' ) ) : ?>
						<div id="sidebar">
							<?php dynamic_sidebar( 'f_sidebar2' ); ?>
						</div>
					<?php endif; ?>
					</div>
					<div class="footer-widget-wrap">
					<?php if ( is_active_sidebar( 'f_sidebar3' ) ) : ?>
						<div id="sidebar">
							<?php dynamic_sidebar( 'f_sidebar3' ); ?>
						</div>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="footer">
			<div class="container">
				<p>&copy; <?php echo date('Y'); ?> <a class="footer-name" title="<?php bloginfo('name'); ?>" href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></p>
				
				<div class="delivery-icon">
					<img alt="<?php bloginfo('name');?>" src="<?php bloginfo('template_url');?>/lib/img/jne-logo.jpg">
					<img alt="<?php bloginfo('name');?>" src="<?php bloginfo('template_url');?>/lib/img/eslexpres.jpg">
					<img alt="<?php bloginfo('name');?>" src="<?php bloginfo('template_url');?>/lib/img/pandu.jpg">
				</div>
			</div>
		</div>
		
		<script src="<?php bloginfo('template_url');?>/lib/js/jquery.min.js"></script>
		<script src="<?php bloginfo('template_url');?>/lib/js/responsiveslides.min.js"></script>
		<script src="<?php bloginfo('template_url');?>/lib/js/jquery-ui.min.js"></script>
		<script src="<?php bloginfo('template_url');?>/lib/js/jquery.tooltip.js"></script>
		<script src="<?php bloginfo('template_url');?>/lib/js/jquery.jqzoom-core.js"></script>
		<script src="<?php bloginfo('template_url');?>/lib/js/jquery.carouFredSel-6.1.0-packed.js"></script>
		<script src="<?php bloginfo('template_url');?>/lib/js/fliplightbox.min.js"></script>
		<script src="<?php bloginfo('template_url');?>/lib/js/main.js"></script>
		<script src="<?php bloginfo('template_url');?>/lib/js/ajax.js"></script>
		
		<?php if ( wp_is_mobile() ): ?>
		
		<script src="<?php bloginfo('template_url');?>/lib/js/jquery.slicknav.min.js"></script>
		<script src="<?php bloginfo('template_url');?>/lib/js/mobile-main.js"></script>
		<?php endif; ?>

		<div id="LoginPopup" class="bodypopup" style="display:none;">
			<div class="inner-popup" title="Login">
				<form id="frmlogin" method="get">
					<fieldset>
						<div class="al" id="alert"></div>
						<input type="email" name="email" id="email-id" required placeholder="<?php _e('Email', 'ferina') ?>" class="text ui-widget-content ui-corner-all">
						<input type="password" name="password" required id="password-id" placeholder="<?php _e('Password', 'ferina'); ?>" class="text ui-widget-content ui-corner-all">
						<input type="hidden" value="member-general" name="ket">
						<input type="hidden" value="login" name="action">
						<input type="button" tabindex="-1" onclick="login()" value="<?php _e('Login', 'Ferina');?>">
						<p><a class="forgot-pass" href="<?php echo get_the_permalink(get_option('forgot_password_pages')); ?>"><?php _e('Forgot Password?', 'ferina') ?></a></p>
					</fieldset>
				</form>
				<?php echo socialloginhtml(); ?>
			</div>
		</div>
		<div id="RegisterPopup" class="bodypopup" style="display:none;">
			<div class="inner-popup">
				<p class="title-login"><?php _e('Register', 'ferina');?></p>
				<form id="frmregister" name="fregister" method="get">
					<fieldset>
						<div class="al" id="alert2"></div>
						<input type="text" name="nama_depan" id="nama_depan" placeholder="<?php _e('First Name','ferina');?>" required class="text ui-widget-content ui-corner-all">
						<input type="text" name="nama_belakang" id="nama_belakang" required placeholder="<?php _e('Last Name','ferina');?>" class="text ui-widget-content ui-corner-all">
						<input type="email" name="email" id="email" required placeholder="<?php _e('Email', 'ferina'); ?>" class="text ui-widget-content ui-corner-all">
						<input type="password" name="password1" id="password1" required placeholder="<?php _e('Password', 'ferina'); ?>" class="text ui-widget-content ui-corner-all">
						<input type="password" name="password2" id="password2" required placeholder="<?php _e('Retype Password', 'ferina'); ?>" class="text ui-widget-content ui-corner-all">
						<input type="checkbox" id="setuju_register" name="setuju_register" value="setuju"><label><?php printf( _e( 'I Have Read and Agree <a href="%s" title="Privacy Policy" target="_blank">Privacy Policy</a>', 'ferina'), ferinaprivacypages());?></label>
						<input type="hidden" value="member-general" name="ket">
						<input type="hidden" value="register" name="action">
						<input type="button" id="btn_checkbox_register" onclick="register()" class="" value="<?php _e('Register','ferina');?>" disabled>
					</fieldset>
				</form>
				<?php echo socialloginhtml(); ?>
			</div>
		</div>

		<?php wp_footer(); ?>
	</body>
</html>
