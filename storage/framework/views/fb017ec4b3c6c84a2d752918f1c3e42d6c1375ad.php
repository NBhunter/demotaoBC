

<?php $__env->startSection('title', 'Giỏ hàng'); ?>

<?php $__env->startSection('content'); ?>
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Thanh toán</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('frontend')); ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thanh toán</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <?php if(auth()->guard()->guest()): ?>
                <div class="toggle_info">
                    <span>
                        <i class="fas fa-user"></i>Đã từng đăng ký?
                        <a href="#loginform" data-toggle="collapse" class="collapsed" aria-expanded="false">Nhấn vào để đăng nhập</a>
                    </span>
                </div>
                <div class="panel-collapse collapse login_form" id="loginform">
                    <div class="panel-body">
                        <p>Nếu bạn đã đăng ký tài khoản, xin vui lòng đăng nhập.</p>
                        <form action="<?php echo e(route('login')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <input type="text" class="form-control<?php echo e(($errors->has('email') || $errors->has('username')) ? ' is-invalid' : ''); ?>"
                                name="email" value="<?php echo e(old('email')); ?>" placeholder="Tên đăng nhập hoặc Email *" required />
                                <?php if($errors->has('email') || $errors->has('username')): ?>
                                <span class="invalid-feedback" role="alert">
                                <strong><?php echo e(empty($errors->first('email')) ? $errors->first('username') : $errors->first('email')); ?></strong>
                                </span>
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
                    </div>
                </div>
                <?php else: ?>
                <div class="toggle_info">
                    <span><i class="fas fa-user"></i>Bạn đã đăng nhập với tài khoản khách hàng <strong><?php echo e(Auth::user()->name); ?></strong>.</span>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="heading_s1">
                <h4>Thông tin giao hàng</h4>
            </div>
            <form action="<?php echo e(route('frontend.dathang')); ?>" method="post" id="checkoutform">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Họ và tên *" value="<?php echo e(Auth::user()->name ?? ''); ?>" required />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="diachigiaohang" placeholder="Địa chỉ giao hàng *" required />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="dienthoaigiaohang" placeholder="Điện thoại *" required />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Địa chỉ Email *" value="<?php echo e(Auth::user()->email ?? ''); ?>" required />
                </div>
                <?php if(auth()->guard()->guest()): ?>
                <div class="form-group">
                    <div class="chek-form">
                        <div class="custome-checkbox">
                            <input type="checkbox" class="form-check-input" name="createaccount" id="createaccount" />
                            <label class="form-check-label label_info" for="createaccount"><span>Đăng ký tài khoản?</span></label>
                        </div>
                    </div>
                </div>
                <div class="form-group create-account">
                    <input type="password" class="form-control" placeholder="Mật khẩu" name="password" />
                </div>
                <?php endif; ?>
                <div class="ship_detail">
                    <div class="form-group">
                        <div class="chek-form">
                            <div class="custome-checkbox">
                                <input type="checkbox" class="form-check-input" name="differentaddress" id="differentaddress" />
                                <label class="form-check-label label_info" for="differentaddress"><span>Giao hàng tới địa chỉ khác?</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="different_address">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name2" placeholder="Họ và tên *" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="diachigiaohang2" placeholder="Địa chỉ giao hàng *" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="dienthoaigiaohang2" placeholder="Điện thoại *" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email2" placeholder="Địa chỉ Email *" />
                        </div>
                    </div>
                </div>
                <div class="heading_s1">
                    <h4>Ghi chú bổ sung</h4>
                </div>
                <div class="form-group mb-0">
                    <textarea rows="6" class="form-control" placeholder="Thông tin bổ sung khi giao hàng" name="ghichubosung"></textarea>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <div class="order_review">
                <div class="heading_s1">
                    <h4>Đơn hàng của bạn</h4>
                </div>
                <div class="table-responsive order_table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Số tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($value->name); ?> <span class="product-qty">x <?php echo e($value->qty); ?></span></td>
                                <td><?php echo e(number_format($value->price * $value->qty)); ?><sup>đ</sup></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        <tfoot>
                            <tr>
                                <th>Tổng tiền sản phẩm</th>
                                <td class="product-subtotal"><?php echo e(Cart::subtotal()); ?><sup>đ</sup></td>
                            </tr>
                            <tr>
                                <td>Thuế VAT (10%)</td>
                                <td><?php echo e(Cart::tax()); ?><sup>đ</sup></td>
                            </tr>
                            <tr>
                                <th>Phí vận chuyển</th>
                                <td>Miễn phí vận chuyển</td>
                            </tr>
                            <tr>
                                <th>Tổng thanh toán</th>
                                <td class="product-subtotal"><?php echo e(Cart::total()); ?><sup>đ</sup></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="payment_method">
                    <div class="heading_s1">
                        <h4>Hình thức thanh toán</h4>
                    </div>
                    <div class="payment_option">
                        <div class="custome-radio">
                            <input class="form-check-input" type="radio" name="payment_option" id="exampleRadios3" value="option3" checked />
                            <label class="form-check-label" for="exampleRadios3">COD</label>
                            <p data-method="option3" class="payment-text">Mô tả hình thức thanh toán này tại đây.</p>
                        </div>
                        <div class="custome-radio">
                            <input class="form-check-input" type="radio" name="payment_option" id="exampleRadios4" value="option4" />
                            <label class="form-check-label" for="exampleRadios4">Chuyển khoản ngân hàng</label>
                            <p data-method="option4" class="payment-text">Mô tả hình thức thanh toán này tại đây.</p>
                        </div>
                        <div class="custome-radio">
                            <input class="form-check-input" type="radio" name="payment_option" id="exampleRadios5" value="option5" />
                            <label class="form-check-label" for="exampleRadios5">Ví điện tử Momo</label>
                            <p data-method="option5" class="payment-text">Mô tả hình thức thanh toán này tại đây.</p>
                        </div>
                    </div>
                </div>    
                <a href="<?php echo e(route('frontend.dathang')); ?>"
                onclick="event.preventDefault();document.getElementById('checkoutform').submit();"
                class="btn btn-fill-out btn-block">TIẾN HÀNH ĐẶT HÀNG</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\HVHL\linhtinh\wamp64\www\larashop\resources\views/frontend/dathang.blade.php ENDPATH**/ ?>