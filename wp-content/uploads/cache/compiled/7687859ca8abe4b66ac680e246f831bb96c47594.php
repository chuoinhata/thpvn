 
<?php $__env->startSection('content'); ?> 
<div class="content-inner">
	<div class="row">
		<aside class="sidebar col-sm-3" id="sidebar">
			<?php (dynamic_sidebar('sidebar-primary')); ?>
		</aside>
		<section class="main-content col-sm-9">
			<?php (woocommerce_content()); ?>
		</section>
	</div>
</div>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>