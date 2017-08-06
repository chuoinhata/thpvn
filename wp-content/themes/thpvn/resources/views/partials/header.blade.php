<header class="header-wrapper">
	<section class="header-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 header-top-left">
					<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#main-menu-theme" aria-controls="main-menu-theme" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<nav class="navbar navbar-toggleable-md main-menu-wrapper">
						@if (has_nav_menu('primary_navigation'))
						{!! wp_nav_menu(['theme_location' => 'primary_navigation', 'container_class' => 'collapse navbar-collapse main-menu', 'container_id' => 'main-menu-theme','menu_class' => 'navbar-nav main-menu-inner']) !!}
						@endif
					</nav>
				</div>
				<div class="col-sm-4 header-top-right">
					@php(do_action('wpml_add_language_selector'))
				</div>
			</div>
		</div>
	</section><!-- .header-top -->

	<section class="header-main">
		<div class="container">
			<div class="row">
				<div class="col-sm-5 logo">
					@php(lm_display_logo())
				</div>
				<div class="col-sm-3 search-header">
					@include('partials/searchform')
				</div>
				<div class="col-sm-4 account-wrapper">

					<div class="menu-account">
						<ul class="menu">
							@if ( is_user_logged_in() )
							<li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','sage'); ?>"><?php _e('Quản lý tài khoản','sage'); ?></a></li>
							<li><a href="<?php echo wp_logout_url(); ?>"><?php _e( 'Đăng xuất', 'sage' ); ?></a></li>
							@else 
							<li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e( 'Sign In', 'sage' ); ?>"><?php _e( 'Đăng nhập / Đăng ký', 'sage' ); ?></a></li>
							@endif
						</ul>
					</div>

					<div class="mini-cart">
						<a class="cart-custom-count" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><span class="number-cart"><?php echo WC()->cart->get_cart_contents_count();?></span></a>
						<?php the_widget( 'WC_Widget_Cart' ); ?> 
					</div>					
				</div>
			</div>
		</div>
	</section><!-- .header-main -->
</header>

@if (get_field('show_banner') && get_field('show_banner') == 'yes' && get_field('content_banner'))
<section class="banner-wrapper">
	<div class="container">
		<div class="banner-content">
			{!! get_field('content_banner') !!}
		</div>
	</div>
</section><!-- .banner-wrapper -->
@endif
