@extends('layouts.app') 
@section('content') 
<div class="content-inner">
	<div class="row">
		<aside class="sidebar col-sm-3" id="sidebar">
			@php(dynamic_sidebar('sidebar-primary'))
		</aside>
		<section class="main-content col-sm-9">
			@php(woocommerce_content())
		</section>
	</div>
</div>
@endsection




