<header class="header-wrapper">
	<section class="header-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 push-lg-8 header-top-right">
					@php(do_action('wpml_add_language_selector'))
				</div>
				<div class="col-lg-8 pull-lg-4 header-top-left">
					<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#main-menu-theme" aria-controls="main-menu-theme" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon">
							<span class="line-toogle"></span>
							<span class="line-toogle"></span>
							<span class="line-toogle"></span>
						</span>
					</button>
					<nav class="navbar navbar-toggleable-md main-menu-wrapper">
						@if (has_nav_menu('primary_navigation'))
						{!! wp_nav_menu(['theme_location' => 'primary_navigation', 'container_class' => 'collapse navbar-collapse main-menu', 'container_id' => 'main-menu-theme','menu_class' => 'navbar-nav main-menu-inner']) !!}
						@endif
					</nav>
				</div>
			</div>
		</div>
	</section><!-- .header-top -->

	<section class="header-main">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 logo">
					@php(lm_display_logo())
				</div>
				<div class="col-md-6 col-lg-3 search-header">
					@include('partials/searchform')
				</div>
				<div class="col-md-6 col-lg-4 account-wrapper">

					<div class="menu-account">

						@if (has_nav_menu('account_navigation'))
						{!! wp_nav_menu(['theme_location' => 'account_navigation']) !!}
						@endif
						
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
