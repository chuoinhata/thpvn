<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the mini-cart.
 *
 * This template can be overridden by copying it to yourtheme/woo-floating-cart/minicart.php.
 *
 * HOWEVER, on occasion we will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @link       http://xplodedthemes.com
 * @since      1.0.6.3
 *
 * @package    Woo_Floating_Cart
 * @subpackage Woo_Floating_Cart/public/templates
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} 
?>

<div class="<?php woofc_class(); ?>" <?php woofc_attributes();?>>
	
	<?php do_action( 'woofc_before_cart' ); ?>
	
	<?php woo_floating_cart_template('parts/cart'); ?>

	<?php do_action( 'woofc_after_cart' ); ?>

</div>