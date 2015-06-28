<?php
require_once dirname( __FILE__ ) . '/inc/metabox.php';
require_once dirname( __FILE__ ) . '/inc/metabox_wholesale.php';
require_once dirname( __FILE__ ) . '/inc/sidebar.php';
require_once dirname( __FILE__ ) . '/inc/menus.php';
require_once dirname( __FILE__ ) . '/inc/meta-taxonomy.php';
require_once dirname( __FILE__ ) . '/inc/post-type.php';

add_action( 'after_setup_theme', 'ferinatheme_after_setup' );
function ferinatheme_after_setup(){
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action('wp_head', 'wp_generator');
	add_filter('show_admin_bar', '__return_false');

	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	add_theme_support('custom-header');
	add_theme_support('custom-background');

	add_image_size( 'product-medium', 400, 400, true );

	add_filter('widget_text', 'do_shortcode');

	add_action('init', 'register_ferina_session', 1);
	add_action('init', 'ferina_session');
	add_action('init', 'register_product_init');
	add_action('init', 'ferina_menu');
	add_action('init', 'ferina_sidebars');

	if ( is_admin() ){
		add_action( 'load-post.php', 'ferina_meta_boxes' );
		add_action( 'load-post-new.php', 'ferina_meta_boxes' );
		add_action( 'load-post.php', 'ferina_meta_boxes_wholesale' );
		add_action( 'load-post-new.php', 'ferina_meta_boxes_wholesale' );
	}

	add_action( 'admin_enqueue_scripts', 'ferina_metaboxes_js' );
}

function register_ferina_session(){
	global $wpsession;
	if( ! $_COOKIE['_FERINA_ID'] ){
		session_name('_FERINA_ID');
		session_start();
		$wpsession = array();
		set_transient( 'wp_session_' . $_COOKIE['_FERINA_ID'], serialize($wpsession) );
	}

	$wpsession = unserialize(get_transient( 'wp_session_' . $_COOKIE['_FERINA_ID'] ));
}

function set_wp_session($key, $value){
	global $wpsession;
	$wpsessnew = array();
	delete_transient( 'wp_session_' . $_COOKIE['_FERINA_ID'] );
	if (array_key_exists('first', $search_array)) {
		foreach ( $wpsession as $k => $v ) {
			if ( $key == $k ){
				$wpsessnew[$k] = $value;
			} else {
				$wpsessnew[$k] = $v;
			}
		}
	} else {
		$wpsessnew = $wpsession;
		$wpsessnew[$key] = $value;
	}
	set_transient( 'wp_session_' . $_COOKIE['_FERINA_ID'], serialize($wpsessnew) );
}

function get_wp_session($key){
	global $wpsession;
	return $wpsession[$key];
}

function unset_wp_session($key = ""){
	global $wpsession;
	$wpsessnew = array();
	$wpsessnew = $wpsession;
	delete_transient( 'wp_session_' . $_COOKIE['_FERINA_ID'] );
	if ( $key != "" ){
		unset($wpsessnew[$key]);
		set_transient( 'wp_session_' . $_COOKIE['_FERINA_ID'], serialize($wpsessnew) );
	} else {
		$wpsessnew = array();
	}
	$wpsession = $wpsessnew;
}

function destroy_wp_session(){
	delete_transient( 'wp_session_' . $_COOKIE['_FERINA_ID'] );
	if ( isset( $_COOKIE['_FERINA_ID'] ) ){
		unset( $_COOKIE['_FERINA_ID'] );
	}
}

function open_session(){
	set_wp_session('is_open', true);
	set_wp_session('ferinacart', array());
	set_wp_session('ferinauser', array());
}

function ferina_session(){
	if( get_wp_session('is_open') ){
		open_session();
	}
}

function add_to_cart(){
	$id = $_GET['id'];
	$type = $_GET['type'];
	$jumlah = $_GET['jumlah'];
	$warna = $_GET['warna'];
	$size = $_GET['size'];

	$arrs[] = array(
		'id' => $id,
		'type' => $type,
		'jumlah' => $jumlah,
		'warna' => $warna,
		'size' => $size,
	);
	set_wp_session('ferinacart', serialize($arrs));
}

function countarrayvalue($arr, $key){
	$ret = 0;
	foreach ($arr as $k => $v) {
		$ret += (int)$v[$key];
	}
	return $ret;
}

function currency($string) {}
function ferinaprivacypages(){}
function get_profile_url(){}
function catch_that_image(){}

function warna_numeric_posts_nav(){
	global $wp_query;

	if( is_singular() )
		return;
	
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );
	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;
	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}
	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}
	echo '<div class="navigation"><ul>' . "\n";
	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );
	echo '</ul></div>' . "\n";
}

function socialloginhtml(){
	$html  = '<p class="login-social">'. __('Or Login With', 'ferina') .'</p>';
	$html .= '<ul class="icon-login-sos">';
		$html .= '<li><a class="social-login facebook" href="#" title="'. __('Facebook', 'ferina') .'"><img src="'. get_bloginfo('template_url') .'/asset/img/fb.png" alt="'. __('Login With Facebook', 'ferina') .'"></a></li>';
		$html .= '<li><a class="social-login twitter" href="#" title="'. __('Twitter', 'ferina') .'"><img src="'. get_bloginfo('template_url') .'/asset/img/tw.png" alt="'. __('Login With Twitter', 'ferina') .'"></a></li>';
		$html .= '<li><a class="social-login path" href="#" title="'. __('Path', 'ferina') .'"><img src="'. get_bloginfo('template_url') .'/asset/img/path.png" alt="'. __('Login With Path', 'ferina') .'"></a></li>';
		$html .= '<li><a class="social-login instagram" href="#" title="'. __('Instagram', 'ferina') .'"><img src="'. get_bloginfo('template_url') .'/asset/img/ins.png" alt="'. __('Login With Instagram', 'ferina') .'"></a></li>';
		$html .= '<li><a class="social-login google" href="#" title="'. __('Google Plus', 'ferina') .'"><img src="'. get_bloginfo('template_url') .'/asset/img/g+.png" alt="'. __('Login With Google Plus', 'ferina') .'"></a></li>';
	$html .= '</ul>';
	return $html;
}

function ferinagreeting(){
	if ( get_wp_session('ferinauser') ){
		$namagw = __('Hi Member', 'ferina');
		$firsturl = '<a href="' . get_profile_url() . '">'. __('My Account', 'ferina').'</a>';
		$secondurl = '<a href="#" title="'. __('Logout', 'ferina') . '" id="menu-account-logout">'. __('Logout', 'ferina') . '</a>';
	} else {
		$namagw = __('My Account', 'ferina');
		$firsturl = '<a title="' . __('Login', 'ferina') . '" id="menu-account-login" href="#">' . __('Login', 'ferina') . '</a>';
		$secondurl = '<a title="' . __('Register', 'ferina') . '" id="menu-account-register" class="Open_reg" href="#">' . __('Register', 'ferina') . '</a>';
	}
	return array('greeting' => $namagw, 'urlsatu' => $firsturl, 'urldua' => $secondurl);
}