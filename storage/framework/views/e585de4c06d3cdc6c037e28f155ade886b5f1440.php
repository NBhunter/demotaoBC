

<?php $__env->startSection('title', 'Đăng nhập'); ?>

<?php $__env->startSection('content'); ?>
	<div class="breadcrumb_section bg_gray page-title-mini">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="page-title">
						<h1>Đăng nhập</h1>
					</div>
				</div>
				<div class="col-md-6">
					<ol class="breadcrumb justify-content-md-end">
						<li class="breadcrumb-item"><a href="<?php echo e(route('frontend')); ?>">Trang chủ</a></li>
						<li class="breadcrumb-item active">Đăng nhập</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	
	<div class="main_content">
		<div class="login_register_wrap section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-xl-6 col-md-10">
						<div class="login_wrap">
							<div class="padding_eight_all bg-white">
								<div class="heading_s1">
									<h3>Đăng nhập</h3>
								</div>
								<form action="<?php echo e(route('login')); ?>" method="post">
									<?php echo csrf_field(); ?>
									<div class="form-group">
										<input type="text" class="form-control<?php echo e(($errors->has('email') || $errors->has('username')) ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder="Tên đăng nhập hoặc Email *" required />
										<?php if($errors->has('email') || $errors->has('username')): ?>
											<span class="invalid-feedback" role="alert"><strong><?php echo e(empty($errors->first('email')) ? $errors->first('username') : $errors->first('email')); ?></strong></span>
										<?php endif; ?>
									</div>
									<div class="form-group">
										<input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="Mật khẩu *" required />
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
									<div class="login_footer form-group">
										<div class="chek-form">
											<div class="custome-checkbox">
												<input type="checkbox" class="form-check-input" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> />
												<label class="form-check-label" for="remember"><span>Nhớ thông tin đăng nhập</span></label>
											</div>
										</div>
										<a href="#">Quên mật khẩu?</a>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-fill-out btn-block">ĐĂNG NHẬP</button>
									</div>
								</form>
								<div class="different_login">
									<span>Hoặc</span>
								</div>
								<ul class="btn-login list_none text-center">
									<li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
									<li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
								</ul>
								<div class="form-note text-center">Bạn chưa có tài khoản? <a href="<?php echo e(route('khachhang.dangky')); ?>">Đăng ký ngay</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\HVHL\linhtinh\wamp64\www\larashop\resources\views/frontend/dangnhap.blade.php ENDPATH**/ ?>