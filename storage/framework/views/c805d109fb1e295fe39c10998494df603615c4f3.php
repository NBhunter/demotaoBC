

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Thêm loại sản phẩm</div>
		<div class="card-body">
			<form action="<?php echo e(route('loaisanpham.them')); ?>" method="post">
				<?php echo csrf_field(); ?>
				
				<div class="mb-3">
					<label class="form-label" for="tenloai">Tên loại</label>
					<input type="text" class="form-control <?php $__errorArgs = ['tenloai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tenloai" name="tenloai" value="<?php echo e(old('tenloai')); ?>" required />
					<?php $__errorArgs = ['tenloai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<div class="invalid-feedback"><strong><?php echo e($message); ?></strong></div>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm vào CSDL</button>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\HVHL\linhtinh\wamp64\www\larashop\resources\views/loaisanpham/them.blade.php ENDPATH**/ ?>