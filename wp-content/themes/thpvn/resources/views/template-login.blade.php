{{--
  Template Name: Login Template
--}}

@if ( is_user_logged_in() )
	@if (ICL_LANGUAGE_CODE == 'vi')
	@php(wp_redirect( '/quan-ly-tai-khoan' ))
	@else
	@php(wp_redirect( '/en/my-account' ))
	@endif
	@php(exit)
@endif


@extends('layouts.app')

@section('content')
@while(have_posts()) @php(the_post())

<div class="content-inner">

	@if (!get_field('show_breadcrumb') || get_field('show_breadcrumb') == 'yes')
	<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
		<div class="breadcrumbs-inner">
			<?php if(function_exists('bcn_display')) { bcn_display(); }; ?>
		</div>
	</div>
	@endif

	@if (get_field('show_sidebar') && get_field('show_sidebar') == 'yes')
	<div class="row">
		<aside class="sidebar col-lg-3" id="sidebar">
			@php(dynamic_sidebar('sidebar-primary'))
		</aside>
		<section class="main-content col-lg-9">
			@if (!get_field('show_title') || get_field('show_title') == 'yes')
			@include('partials.page-header')
			@endif
			@include('partials.content-page')
		</section>
	</div>
	@else
	@if (!get_field('show_title') || get_field('show_title') == 'yes')
	@include('partials.page-header')
	@endif
	@include('partials.content-page')
	@endif
</div>
@endwhile
@endsection


