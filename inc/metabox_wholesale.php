<?php
function ferina_meta_boxes_wholesale() {
    new mbWholesaleProduct();
    /* remove_meta_box( 'stylediv', 'retail-product', 'side' );
    remove_meta_box( 'tagsdiv-colour', 'retail-product', 'side' );
    remove_meta_box( 'tagsdiv-size', 'retail-product', 'side' ); */
} 
class mbWholesaleProduct {
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
	}
	public function add_meta_box( $post_type ) {
		$post_types = array('wholesale-product');
		if ( in_array( $post_type, $post_types )) {
			add_meta_box(
				'ferina_product_details', 
				__( 'Product Details', 'ferina' ), 
				array( $this, 'rmbc_ferina_product_details' ), 
				$post_type, 
				'advanced', 
				'high'
			);
			
		}
	}
	public function rmbc_ferina_product_details( $post ) {
		wp_nonce_field( 'ferina_product_retail_meta_box_nonce', 'ferina_product_retail_metabox_nonce' );

		$ferina_sku = get_post_meta( $post->ID, '_ferina_sku_product', true );
		$ferina_prod_desc = get_post_meta( $post->ID, '_ferina_description_product', true );

		echo '<p>';
		echo '<label style="display: inline-block; width: 250px;" for="ferina_sku">';
		_e( 'Product SKU:', 'ferina' );
		echo '</label> ';
		echo '<input type="text" id="ferina_sku" name="ferina_sku"';
		echo ' value="' . esc_attr( $ferina_sku ) . '" size="25" />';
		echo '</p>';

		echo '<p>';
		echo '<label style="display: inline-block; width: 250px;" for="ferina_product_prices">';
		_e( 'The Prices Of 5 Product :', 'ferina' );
		echo '</label> ';
		echo '<input type="text" id="ferina_product_prices" name="ferina_product_prices1"';
		echo ' value="' . esc_attr( $ferina_sku ) . '" size="25" />';
		echo '</p>';
		
		echo '<p>';
		echo '<label style="display: inline-block; width: 250px;" for="ferina_product_prices">';
		_e( 'The Prices Of 10 product :', 'ferina' );
		echo '</label> ';
		echo '<input type="text" id="ferina_product_prices" name="ferina_product_prices2"';
		echo ' value="' . esc_attr( $ferina_sku ) . '" size="25" />';
		echo '</p>';
		
		echo '<p>';
		echo '<label style="display: inline-block; width: 250px;" for="ferina_product_prices">';
		_e( 'The Prices Of 1 Gross Product :', 'ferina' );
		echo '</label> ';
		echo '<input type="text" id="ferina_product_prices" name="ferina_product_prices3"';
		echo ' value="' . esc_attr( $ferina_sku ) . '" size="25" />';
		echo '</p>';
		
		echo '<p>';
		echo '<label style="display: inline-block; width: 250px;" for="ferina_product_prices">';
		_e( 'The Prices Of 2 Gross Product :', 'ferina' );
		echo '</label> ';
		echo '<input type="text" id="ferina_product_prices" name="ferina_product_prices4"';
		echo ' value="' . esc_attr( $ferina_sku ) . '" size="25" />';
		echo '</p>';
		
		echo '<p>';
		echo '<label style="display: inline-block; width: 250px;" for="ferina_product_stocks">';
		_e( 'Product Stock :', 'ferina' );
		echo '</label> ';
		echo '<input type="text" id="ferina_product_stocks" name="ferina_product_stock"';
		echo ' value="' . esc_attr( $ferina_sku ) . '" size="25" />';
		echo '</p>';
		
		echo '<p>';
		echo '<label style="display: inline-block; width: 250px;" for="ferina_product_style">';
		_e( 'Product Style:', 'ferina' );
		echo '</label> ';
		echo '<select id="ferina_product_style" name="ferina_product_style">';
		echo '<option> -- Select Product Style -- </option>';
		echo '</select>';
		echo '</p>';

		echo '<p>';
		echo '<label style="display: inline-block; width: 250px; vertical-align: top;" for="ferina_product_description">';
		_e( 'Product Details:', 'ferina' );
		echo '</label> ';
		echo '</p>';
		// echo '<textarea id="ferina_product_description" name="ferina_product_description">';
		// echo wpautop( esc_attr( $ferina_prod_desc ) ) . '</textarea>';
		wp_editor($ferina_prod_desc, 'ferina_product_description');
	}
	
}
?>