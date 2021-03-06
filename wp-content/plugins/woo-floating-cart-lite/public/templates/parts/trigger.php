<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the mini-cart.
 *
 * This template can be overridden by copying it to yourtheme/woo-floating-cart/parts/trigger.php.
 *
 * HOWEVER, on occasion we will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @link       http://xplodedthemes.com
 * @since      1.0.0
 *
 * @package    Woo_Floating_Cart
 * @subpackage Woo_Floating_Cart/public/templates/parts
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} 

$total_items = WC()->cart->get_cart_contents_count();
$icon_type = woofc_option('trigger_icon_type', 'image');
?>

<a href="#" class="woofc-trigger<?php echo (($total_items > 99) ? ' woofc-count-big' : '');?> woofc-icontype-<?php echo $icon_type;?>">
	
	<span class="<?php echo woofc_trigger_cart_icon_class();?>"></span>
	
	<ul class="woofc-count"> <!-- cart items count -->
		<li><?php echo ($total_items);?></li>
		<li><?php echo ($total_items + 1);?></li>
	</ul> <!-- .count -->
	
	<span class="<?php echo woofc_trigger_close_icon_class();?>"></span>
</a>