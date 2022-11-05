<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Người dùng</div>
		<div class="card-body table-responsive">
			<p><a href="<?php echo e(route('nguoidung.them')); ?>" class="btn btn-info"><i class="fal fa-plus"></i> Thêm mới</a></p>
			<table class="table table-bordered table-hover table-sm mb-0">
				<thead>
					<tr>
						<th width="5%">#</th>
						<th width="20%">Họ và tên</th>
						<th width="20%">Tên đăng nhập</th>
						<th width="35%">Email</th>
						<th width="10%">Quyền hạn</th>
						<th width="5%">Sửa</th>
						<th width="5%">Xóa</th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $nguoidung; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($loop->iteration); ?></td>
							<td><?php echo e($value->name); ?></td>
							<td><?php echo e($value->username); ?></td>
							<td><?php echo e($value->email); ?></td>
							<td><?php echo e($value->role); ?></td>
							<td class="text-center"><a href="<?php echo e(route('nguoidung.sua', ['id' => $value->id])); ?>"><i class="fal fa-edit"></i></a></td>
							<td class="text-center"><a href="<?php echo e(route('nguoidung.xoa', ['id' => $value->id])); ?>"><i class="fal fa-trash-alt text-danger"></i></a></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\larashop\resources\views/nguoidung/danhsach.blade.php ENDPATH**/ ?>