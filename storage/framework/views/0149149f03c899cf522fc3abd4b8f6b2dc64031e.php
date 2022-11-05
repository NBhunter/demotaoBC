<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Trang chủ</div>
		<div class="card-body">
			<?php if(session('status')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo e(session('status')); ?>

				</div>
			<?php endif; ?>
			
			Nội dung trang chủ quản trị đang cập nhật!
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\HVHL\linhtinh\wamp64\www\larashop\resources\views/admin.blade.php ENDPATH**/ ?>