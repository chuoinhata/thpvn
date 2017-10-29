<footer class="footer-wrapper">

	@if(is_active_sidebar( 'footer-top-1' ) || is_active_sidebar( 'footer-top-2' ))
	<section class="footer-top">
		<div class="container">
			<div class="row">
				<section class="col-sm-6 footer-top-col footer-top-left">
					@php(dynamic_sidebar('footer-top-1'))
				</section><!-- .footer-top-left -->

				<section class="col-sm-6 footer-top-col footer-top-right">
					@php(dynamic_sidebar('footer-top-2'))
				</section><!-- .footer-top-right -->
			</div>
		</div>
	</section><!-- .footer-top -->
	@endif

	<section class="footer-main">
		<div class="container">
			<div class="row">
				<section class="col-md-6 col-lg-4 footer-col footer-col-1">
					@php(dynamic_sidebar('footer-main-1'))
				</section><!-- .footer-top-1 -->

				<section class="col-md-3 col-lg-2 footer-col footer-col-2">
					@php(dynamic_sidebar('footer-main-2'))
				</section><!-- .footer-top-2 -->

				<section class="col-md-3 col-lg-2 footer-col footer-col-3">
					@php(dynamic_sidebar('footer-main-3'))
				</section><!-- .footer-top-3 -->

				<section class="col-md-12 col-lg-4 footer-col footer-col-4">
					@php(dynamic_sidebar('footer-main-4'))
				</section><!-- .footer-top-4 -->
			</div>
		</div>
	</section><!-- .footer-main -->

	@if(is_active_sidebar( 'footer-bottom-1' ))
	<section class="footer-bottom">
		<div class="container">
			@php(dynamic_sidebar('footer-bottom-1'))
		</div>
	</section><!-- .footer-bottom -->
	@endif

</footer>

@if(is_active_sidebar( 'sticky-left' ))
<section class="sticky-sidebar left">
	@php(dynamic_sidebar('sticky-left'))
</section>
@endif
