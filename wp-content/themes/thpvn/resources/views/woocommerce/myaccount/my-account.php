<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

/**
 * My Account navigation.
 * @since 2.6.0
 */

?>

<div class="row">
	<aside class="sidebar col-lg-3" id="sidebar">
	<?php
	if (is_active_sidebar( 'account-sidebar' )) :
		dynamic_sidebar('account-sidebar');
	endif;
	?>
	</aside>
	<section class="main-content col-lg-9">
		<div class="content-bg">
			<?php do_action( 'woocommerce_account_content' );?>
		</div>
	</section>
</div>