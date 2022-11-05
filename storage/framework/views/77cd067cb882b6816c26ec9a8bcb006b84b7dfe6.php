<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Đơn hàng</div>
		<div class="card-body table-responsive">
			<p><a href="<?php echo e(route('donhang.them')); ?>" class="btn btn-info"><i class="fal fa-plus"></i> Thêm mới</a></p>
			<table class="table table-bordered table-hover table-sm mb-0">
				<thead>
					<tr>
						<th width="5%">#</th>
						<th width="15%">Khách hàng</th>
						<th width="45%">Thông tin giao hàng</th>
						<th width="15%">Ngày đặt</th>
						<th width="10%">Tình trạng</th>
						<th width="5%">Sửa</th>
						<th width="5%">Xóa</th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $donhang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($loop->iteration); ?></td>
							<td><?php echo e($value->NguoiDung->name); ?></td>
							<td>
								<span class="d-block">Điện thoại: <strong><?php echo e($value->dienthoaigiaohang); ?></strong></span>
								<span class="d-block">Địa chỉ giao: <strong><?php echo e($value->diachigiaohang); ?></strong></span>
								<span class="d-block">Sản phẩm:</span>
								<table class="table table-bordered table-hover table-sm mb-0">
									<thead>
										<tr>
											<th width="5%">#</th>
											<th>Sản phẩm</th>
											<th width="5%">SL</th>
											<th width="15%">Đơn giá</th>
											<th width="20%">Thành tiền</th>
										</tr>
									</thead>
									<tbody>
										<?php $tongtien = 0; ?>
										<?php $__currentLoopData = $value->DonHang_ChiTiet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chitiet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($loop->iteration); ?></td>
												<td><?php echo e($chitiet->SanPham->tensanpham); ?></td>
												<td><?php echo e($chitiet->soluongban); ?></td>
												<td class="text-end"><?php echo e(number_format($chitiet->dongiaban)); ?><sup><u>đ</u></sup></td>
												<td class="text-end"><?php echo e(number_format($chitiet->soluongban * $chitiet->dongiaban)); ?><sup><u>đ</u></sup></td>
											</tr>
											<?php $tongtien += $chitiet->soluongban * $chitiet->dongiaban; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td colspan="4">Tổng tiền sản phẩm:</td>
											<td class="text-end"><strong><?php echo e(number_format($tongtien)); ?></strong><sup><u>đ</u></sup></td>
										</tr>
									</tbody>
								</table>
							</td>
							<td><?php echo e($value->created_at->format('d/m/Y H:i:s')); ?></td>
							<td><?php echo e($value->tinhtrang); ?></td>
							<td class="text-center"><a href="<?php echo e(route('donhang.sua', ['id' => $value->id])); ?>"><i class="fal fa-edit"></i></a></td>
							<td class="text-center"><a href="<?php echo e(route('donhang.xoa', ['id' => $value->id])); ?>"><i class="fal fa-trash-alt text-danger"></i></a></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\HVHL\linhtinh\wamp64\www\larashop\resources\views/donhang/danhsach.blade.php ENDPATH**/ ?>