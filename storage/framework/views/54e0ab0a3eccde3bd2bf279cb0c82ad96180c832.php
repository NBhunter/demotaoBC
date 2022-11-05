<?php $__env->startSection('content'); ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">Đăng nhập</div>
					<div class="card-body">
						<?php if(session('warning')): ?>
							<div class="alert alert-warning alert-dismissible fade show" role="alert">
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								<span class="font-weight-bold text-danger"><i class="fal fa-exclamation-triangle"></i> <?php echo e(session('warning')); ?></span>
							</div>
						<?php endif; ?>
						<form method="post" action="<?php echo e(route('login')); ?>">
							<?php echo csrf_field(); ?>
							<div class="mb-3">
								<label class="form-label" for="email">Tài khoản</label>
								<input type="text" class="form-control<?php echo e(($errors->has('email') || $errors->has('username')) ? ' is-invalid' : ''); ?>" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email hoặc Tên đăng nhập" required />
								<?php if($errors->has('email') || $errors->has('username')): ?>
									<span class="invalid-feedback" role="alert"><strong><?php echo e(empty($errors->first('email')) ? $errors->first('username') : $errors->first('email')); ?></strong></span>
								<?php endif; ?>
							</div>
							<div class="mb-3">
								<label class="form-label" for="password">Mật khẩu</label>
								<input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password" name="password" required />
								<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
							<div class="mb-3 form-check">
								<input class="form-check-input" type="checkbox" id="remember" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> />
								<label class="form-check-label" for="remember">Duy trì đăng nhập</label>
							</div>
							<div class="mb-0">
								<button type="submit" class="btn btn-info"><i class="fal fa-sign-in-alt"></i> Đăng nhập</button>
								<?php if(Route::has('password.request')): ?>
									<a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">Quên mật khẩu?</a>
								<?php endif; ?>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\larashop\resources\views/auth/login.blade.php ENDPATH**/ ?>