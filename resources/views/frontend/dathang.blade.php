@extends('layouts.frontend')

@section('title', 'Giỏ hàng')

@section('content')
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
                    <li class="breadcrumb-item"><a href="{{ route('frontend') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thanh toán</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            @guest
                <div class="toggle_info">
                    <span>
                        <i class="fas fa-user"></i>Đã từng đăng ký?
                        <a href="#loginform" data-toggle="collapse" class="collapsed" aria-expanded="false">Nhấn vào để đăng nhập</a>
                    </span>
                </div>
                <div class="panel-collapse collapse login_form" id="loginform">
                    <div class="panel-body">
                        <p>Nếu bạn đã đăng ký tài khoản, xin vui lòng đăng nhập.</p>
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control{{ ($errors->has('email') || $errors->has('username')) ? ' is-invalid' : '' }}"
                                name="email" value="{{ old('email') }}" placeholder="Tên đăng nhập hoặc Email *" required />
                                @if ($errors->has('email') || $errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ empty($errors->first('email')) ? $errors->first('username') : $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mật khẩu *" required />
                                @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="login_footer form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
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
                @else
                <div class="toggle_info">
                    <span><i class="fas fa-user"></i>Bạn đã đăng nhập với tài khoản khách hàng <strong>{{ Auth::user()->name }}</strong>.</span>
                </div>
            @endguest
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="heading_s1">
                <h4>Thông tin giao hàng</h4>
            </div>
            <form action="{{ route('frontend.dathang') }}" method="post" id="checkoutform">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Họ và tên *" value="{{ Auth::user()->name ?? '' }}" required />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="diachigiaohang" placeholder="Địa chỉ giao hàng *" required />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="dienthoaigiaohang" placeholder="Điện thoại *" required />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Địa chỉ Email *" value="{{ Auth::user()->email ?? '' }}" required />
                </div>
                @guest
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
                @endguest
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
                            @foreach(Cart::content() as $value)
                            <tr>
                                <td>{{ $value->name }} <span class="product-qty">x {{ $value->qty }}</span></td>
                                <td>{{ number_format($value->price * $value->qty) }}<sup>đ</sup></td>
                            </tr>
                            @endforeach
                            </tbody>
                        <tfoot>
                            <tr>
                                <th>Tổng tiền sản phẩm</th>
                                <td class="product-subtotal">{{ Cart::subtotal() }}<sup>đ</sup></td>
                            </tr>
                            <tr>
                                <td>Thuế VAT (10%)</td>
                                <td>{{ Cart::tax() }}<sup>đ</sup></td>
                            </tr>
                            <tr>
                                <th>Phí vận chuyển</th>
                                <td>Miễn phí vận chuyển</td>
                            </tr>
                            <tr>
                                <th>Tổng thanh toán</th>
                                <td class="product-subtotal">{{ Cart::total() }}<sup>đ</sup></td>
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
                <a href="{{ route('frontend.dathang') }}"
                onclick="event.preventDefault();document.getElementById('checkoutform').submit();"
                class="btn btn-fill-out btn-block">TIẾN HÀNH ĐẶT HÀNG</a>
            </div>
        </div>
    </div>
</div>
@endsection