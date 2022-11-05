<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Sản phẩm</div>
		<div class="card-body table-responsive">
			<p>
				<a href="<?php echo e(route('sanpham.them')); ?>" class="btn btn-info"><i class="fal fa-plus"></i> Thêm mới</a>
				<a href="#nhap" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#importModal"><i class="fal fa-upload"></i> Nhập từ Excel</a>
				<a href="<?php echo e(route('sanpham.xuat')); ?>" class="btn btn-success"><i class="fal fa-download"></i> Xuất ra Excel</a>
			</p>
			<?php echo e($sanpham->links()); ?>

			<table class="table table-bordered table-hover table-sm mb-0">
				<thead>
					<tr>
						<th width="5%">#</th>
						<th width="10%">Hình ảnh</th>
						<th width="20%">Loại sản phẩm</th>
						<th width="40%">Tên sản phẩm</th>
						<th width="5%">SL</th>
						<th width="10%">Đơn giá</th>
						<th width="5%">Sửa</th>
						<th width="5%">Xóa</th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $sanpham; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($sanpham->firstItem() + $loop->index); ?></td>
							<td class="text-center"><img src="<?php echo e(env('APP_URL') . '/storage/app/' . $value->hinhanh); ?>" width="80" /></td>
							<td><?php echo e($value->LoaiSanPham->tenloai); ?></td>
							<td><?php echo e($value->tensanpham); ?></td>
							<td class="text-end"><?php echo e($value->soluong); ?></td>
							<td class="text-end"><?php echo e(number_format($value->dongia)); ?></td>
							<td class="text-center"><a href="<?php echo e(route('sanpham.sua', ['id' => $value->id])); ?>"><i class="fal fa-edit"></i></a></td>
							<td class="text-center"><a href="<?php echo e(route('sanpham.xoa', ['id' => $value->id])); ?>"><i class="fal fa-trash-alt text-danger"></i></a></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
			<?php echo e($sanpham->links()); ?>

		</div>
	</div>
	
	<form action="<?php echo e(route('sanpham.nhap')); ?>" method="post" enctype="multipart/form-data">
		<?php echo csrf_field(); ?>
		<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="importModalLabel">Nhập từ Excel</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="mb-0">
							<label for="file_excel" class="form-label">Chọn tập tin Excel</label>
							<input type="file" class="form-control" id="file_excel" name="file_excel" required />
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fal fa-times"></i> Hủy bỏ</button>
						<button type="submit" class="btn btn-danger"><i class="fal fa-upload"></i> Nhập dữ liệu</button>
					</div>
				</div>
			</div>
		</div>
	</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\HVHL\linhtinh\wamp64\www\larashop\resources\views/sanpham/danhsach.blade.php ENDPATH**/ ?>