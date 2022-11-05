

<?php $__env->startSection('title', 'Quản lý tài khoản'); ?>

<?php $__env->startSection('content'); ?>
	<div class="breadcrumb_section bg_gray page-title-mini">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="page-title">
						<h1>Quản lý tài khoản</h1>
					</div>
				</div>
				<div class="col-md-6">
					<ol class="breadcrumb justify-content-md-end">
						<li class="breadcrumb-item"><a href="<?php echo e(route('frontend')); ?>">Trang chủ</a></li>
						<li class="breadcrumb-item active">Quản lý tài khoản</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	
	<div class="main_content">
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4">
						<div class="dashboard_menu">
							<ul class="nav nav-tabs flex-column" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>Trang chủ</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Đơn hàng của tôi</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>Sổ địa chỉ</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="account-detail-tab" data-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>Thông tin tài khoản</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="ti-lock"></i>Đăng xuất</a>
									<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="post" class="d-none">
										<?php echo csrf_field(); ?>
									</form>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-9 col-md-8">
						<div class="tab-content dashboard_content">
							<div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
								<div class="card">
									<div class="card-header">
										<h5>Trang chủ khách hàng</h5>
									</div>
									<div class="card-body">
										<p class="text-center"><img src="<?php echo e(asset('public/assets/images/consumer.png')); ?>" /></p>
										<p>Xin chào khách hàng <?php echo e(Auth::user()->name); ?>.</p>
										<p class="text-justify">Từ trang chủ khách hàng, bạn có thể dễ dàng kiểm tra và xem các <a href="javascript:void(0);" onclick="$('#orders-tab').trigger('click')">đơn hàng</a> của mình, quản lý <a href="javascript:void(0);" onclick="$('#address-tab').trigger('click')">sổ địa chỉ</a> giao hàng và thanh toán và chỉnh sửa thông tin <a href="javascript:void(0);" onclick="$('#account-detail-tab').trigger('click')">hồ sơ cá nhân.</a></p>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
								<div class="card">
									<div class="card-header">
										<h5>Đơn hàng của tôi</h5>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table">
												<thead>
													<tr>
														<th width="10%">#</th>
														<th>Ngày đặt hàng</th>
														<th>Trạng thái</th>
														<th>Tổng tiền</th>
														<th width="10%">Chi tiết</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>#1234</td>
														<td>March 15, 2020</td>
														<td>Processing</td>
														<td>$78.00 for 1 item</td>
														<td><a href="#" class="btn btn-fill-out btn-sm">Chi tiết</a></td>
													</tr>
													<tr>
														<td>#2366</td>
														<td>June 20, 2020</td>
														<td>Completed</td>
														<td>$81.00 for 1 item</td>
														<td><a href="#" class="btn btn-fill-out btn-sm">Chi tiết</a></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
								<div class="row">
									<div class="col-lg-6">
										<div class="card">
											<div class="card-header">
												<h5>Nhà riêng</h5>
											</div>
											<div class="card-body">
												<address>
													<?php echo e(Auth::user()->name); ?><br />
													122 Trần Hưng Đạo<br />
													Khóm Đông Thạnh A<br />
													Phường Mỹ Thạnh<br />
													Thành phố Long Xuyên<br /> 
													Tỉnh An Giang<br />
												</address>
												<a href="#" class="btn btn-fill-out">Chỉnh sửa</a>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="card">
											<div class="card-header">
												<h5>Cơ quan</h5>
											</div>
											<div class="card-body">
												<address>
													<?php echo e(Auth::user()->name); ?><br />
													Đại học An Giang<br />
													18 Ung Văn Khiêm<br />
													Phường Đông Xuyên<br />
													Thành phố Long Xuyên<br /> 
													Tỉnh An Giang<br />
												</address>
												<a href="#" class="btn btn-fill-out">Chỉnh sửa</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
								<div class="card">
									<div class="card-header">
										<h5>Thông tin tài khoản</h5>
									</div>
									<div class="card-body">
										<form action="<?php echo e(route('khachhang.capnhathoso')); ?>" method="post">
											<?php echo csrf_field(); ?>
											<div class="form-group">
												<label>Họ và tên <span class="required">*</span></label>
												<input class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" type="text" value="<?php echo e(Auth::user()->name); ?>" required />
												<?php $__errorArgs = ['name'];
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
											<div class="form-group">
												<label>Địa chỉ Email <span class="required">*</span></label>
												<input class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" type="email" value="<?php echo e(Auth::user()->email); ?>" required />
												<?php $__errorArgs = ['email'];
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
											<div class="form-group">
												<label>Mật khẩu mới</label>
												<input class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" type="password" placeholder="Bỏ trống nếu muốn giữ nguyên mật khẩu cũ." />
												<?php $__errorArgs = ['password'];
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
											<div class="form-group">
												<label>Xác nhận mật khẩu mới</label>
												<input class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password_confirmation" type="password" placeholder="Bỏ trống nếu muốn giữ nguyên mật khẩu cũ." />
												<?php $__errorArgs = ['password_confirmation'];
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
											
											<button type="submit" class="btn btn-fill-out">Cập nhật thông tin</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\HVHL\linhtinh\wamp64\www\larashop\resources\views/frontend/khachhang.blade.php ENDPATH**/ ?>