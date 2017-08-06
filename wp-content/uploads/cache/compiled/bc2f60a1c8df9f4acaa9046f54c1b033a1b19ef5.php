<?php $__env->startSection('content'); ?>
<?php while(have_posts()): ?> <?php (the_post()); ?>

<div class="content-inner">

	<?php if(!get_field('show_breadcrumb') || get_field('show_breadcrumb') == 'yes'): ?>
	<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
		<div class="breadcrumbs-inner">
			<?php if(function_exists('bcn_display')) { bcn_display(); }; ?>
		</div>
	</div>
	<?php endif; ?>

	<?php if(get_field('show_sidebar') && get_field('show_sidebar') == 'yes'): ?>
	<div class="row">
		<aside class="sidebar col-sm-3" id="sidebar">
			<?php (dynamic_sidebar('sidebar-primary')); ?>
		</aside>
		<section class="main-content col-sm-9">
			<?php if(!get_field('show_title') || get_field('show_title') == 'yes'): ?>
			<?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<?php endif; ?>
			<?php echo $__env->make('partials.content-page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</section>
	</div>
	<?php else: ?>
	<?php if(!get_field('show_title') || get_field('show_title') == 'yes'): ?>
	<?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php endif; ?>
	<?php echo $__env->make('partials.content-page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php endif; ?>
</div>
<?php endwhile; ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>