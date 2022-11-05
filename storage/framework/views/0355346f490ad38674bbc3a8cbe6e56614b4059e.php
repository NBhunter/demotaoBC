

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Loại sản phẩm</div>
		<div class="card-body table-responsive">
			<p><a href="<?php echo e(route('loaisanpham.them')); ?>" class="btn btn-info"><i class="fal fa-plus"></i> Thêm mới</a></p>
			<table class="table table-bordered table-hover table-sm mb-0">
				<thead>
					<tr>
						<th width="5%">#</th>
						<th width="45%">Tên loại</th>
						<th width="40%">Tên loại không dấu</th>
						<th width="5%">Sửa</th>
						<th width="5%">Xóa</th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $loaisanpham; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($loop->iteration); ?></td>
							<td><?php echo e($value->tenloai); ?></td>
							<td><?php echo e($value->tenloai_slug); ?></td>
							<td class="text-center"><a href="<?php echo e(route('loaisanpham.sua', ['id' => $value->id])); ?>"><i class="fal fa-edit"></i></a></td>
							<td class="text-center"><a href="<?php echo e(route('loaisanpham.xoa', ['id' => $value->id])); ?>"><i class="fal fa-trash-alt text-danger"></i></a></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div> 
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\larashop\resources\views/loaisanpham/danhsach.blade.php ENDPATH**/ ?>