

<?php $__env->startSection('content'); ?>
	<div class="breadcrumb_section bg_gray page-title-mini">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="page-title">
						<h1>Sản phẩm</h1>
					</div>
				</div>
				<div class="col-md-6">
					<ol class="breadcrumb justify-content-md-end">
						<li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
						<li class="breadcrumb-item active">Sản phẩm</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	
	<div class="main_content">
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="row align-items-center mb-4 pb-1">
							<div class="col-12">
								<div class="product_header">
									<div class="product_header_left">
										<div class="custom_select">
											<form action="<?php echo e(route('frontend.sanpham')); ?>" method="post">
												<?php echo csrf_field(); ?>
												<select class="form-control form-control-sm" id="sapxep" name="sapxep"
													onchange="if(this.value != 0) { this.form.submit(); }">
													<option value="default" <?php echo e(session('sapxep')=='default' ? 'selected' : ''); ?>>Sắp xếp mặc định</option>
													<option value="popularity" <?php echo e(session('sapxep')=='popularity' ? 'selected' : ''); ?>>Mua nhiều nhất
													</option>
													<option value="date" <?php echo e(session('sapxep')=='date' ? 'selected' : ''); ?>>Hàng mới nhất</option>
													<option value="price" <?php echo e(session('sapxep')=='price' ? 'selected' : ''); ?>>Xếp theo giá: thấp đến cao
													</option>
													<option value="price-desc" <?php echo e(session('sapxep')=='price-desc' ? 'selected' : ''); ?>>Xếp theo giá: cao
														xuống thấp</option>
												</select>
											</form>
										</div>
									</div>
									<div class="product_header_right">
										<div class="products_view">
											<a href="javascript:void(0);" class="shorting_icon grid"><i class="ti-view-grid"></i></a>
											<a href="javascript:void(0);" class="shorting_icon list active"><i class="ti-layout-list-thumb"></i></a>
										</div>
										<div class="custom_select">
											<select class="form-control form-control-sm">
												<option value="">Hiển thị</option>
												<option value="9">9</option>
												<option value="12">12</option>
												<option value="18">18</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row shop_container list">
							<?php $__currentLoopData = $sanpham; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-lg-3 col-md-4 col-6">
								<div class="product">
									<div class="product_img">
										<a href="<?php echo e(route('frontend.sanpham.chitiet', ['tenloai_slug' => $value->LoaiSanPham->tenloai_slug, 'tensanpham_slug' => $value->tensanpham_slug])); ?>">
											<img src="<?php echo e(env('APP_URL') . '/storage/app/' . $value->hinhanh); ?>" alt="product_img1">
										</a>
										<div class="product_action_box">
											<ul class="list_none pr_action_btn">
												<li class="add-to-cart"><a href="<?php echo e(route('frontend.giohang.them', ['tensanpham_slug' => $value->tensanpham_slug])); ?>"><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</a></li>
												<li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
												<li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
												<li><a href="#"><i class="icon-heart"></i></a></li>
											</ul>
										</div>
									</div>
									<div class="product_info">
										<h6 class="product_title"><a href="<?php echo e(route('frontend.sanpham.chitiet', ['tenloai_slug' => $value->LoaiSanPham->tenloai_slug, 'tensanpham_slug' => $value->tensanpham_slug])); ?>"><?php echo e($value->tensanpham); ?></a></h6>
										<div class="product_price">
											<span class="price"><?php echo e(number_format($value->dongia)); ?><sup>đ</sup></span>
											<del><?php echo e(number_format($value->dongia * 1.1)); ?><sup>đ</sup></del>
											<div class="on_sale">
												<span>Giảm giá 10%</span>
											</div>
										</div>
										<div class="rating_wrap">
											<div class="rating">
												<div class="product_rate" style="width:80%"></div>
											</div>
											<span class="rating_num">100</span>
										</div>
										<div class="pr_desc">
											<p>Mô tả ngắn gọn về sản phẩm <?php echo e($value->tensanpham); ?>.</p>
										</div>
										<div class="pr_switch_wrap">
											<div class="product_color_switch">
												<span class="active" data-color="#87554B"></span>
												<span data-color="#333333"></span>
												<span data-color="#DA323F"></span>
											</div>
										</div>
										<div class="list_product_action_box">
											<ul class="list_none pr_action_btn">
												<li class="add-to-cart"><a href="<?php echo e(route('frontend.giohang.them', ['tensanpham_slug' => $value->tensanpham_slug])); ?>"><i class="icon-basket-loaded"></i>Thêm vào giỏ hàng</a></li>
												<li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
												<li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
												<li><a href="#"><i class="icon-heart"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
						<div class="row">
							<div class="col-12">
								<ul class="pagination mt-3 justify-content-center pagination_style1">
									<!--<li class="page-item active"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#"><i class="linearicons-arrow-right"></i></a></li>-->
									<?php echo $sanpham->links(); ?>

								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\larashop\resources\views/frontend/index.blade.php ENDPATH**/ ?>