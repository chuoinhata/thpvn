<?php
/**
 * 
 * author NVTri
 * since  1.0.0
 */

namespace THP\Frontend;

class WoocommerceCustom{
	public function __construct()
	{
		add_filter('add_to_cart_fragments', array($this, 'woocommerce_header_add_to_cart_fragment') );
		add_filter( 'woocommerce_get_price_html', array($this, 'customHTMLPrice'), 100, 2 );
		add_filter( 'woocommerce_product_single_add_to_cart_text', array($this, 'woo_custom_cart_button_text' ));
		add_filter( 'woocommerce_product_add_to_cart_text', array($this, 'woo_archive_custom_cart_button_text' ));
		add_action( 'woocommerce_after_shop_loop_item', array($this, 'action_woocommerce_after_shop_loop_item'), 100, 0 ); 
	}

	function woocommerce_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;

		ob_start();

		?>

		<a class="cart-custom-count" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'sage' ); ?>"><span class="number-cart"><?php echo $woocommerce->cart->cart_contents_count; ?></span></a>

		<?php

		$fragments['a.cart-custom-count'] = ob_get_clean();

		return $fragments;

	}

	// ["price"]=>
 //  string(6) "450000"
 //  ["regular_price"]=>
 //  string(6) "500000"
 //  ["sale_price"]=>
 //  string(6) "450000"



	function customHTMLPrice( $price, $product ){
		if ( $product->price > 0 ) {
			$price = '<ins>'. ( ( is_numeric( $product->price ) ) ? woocommerce_price( $product->price ) : $product->price ) .'</ins>';
			if ( $product->sale_price ) {
				$price .= '<del>'. ( ( is_numeric( $product->regular_price ) ) ? woocommerce_price( $product->regular_price ) : $product->regular_price ) .'</del>';
			}
			return $price;
		} 
		else {
			return '<ins>'.__('Giá liên hệ','sage').'</ins>';
		}
	}

	function woo_custom_cart_button_text() {
		return null;
	}

	function woo_archive_custom_cart_button_text() {
		return null;
	}

	function action_woocommerce_after_shop_loop_item() {
		global $product;

		echo '<a class="button readmore-product" href="' . esc_url( get_permalink( $product->id ) ) . '">'.__("Chi tiết","sage").'</a>';
	}
}