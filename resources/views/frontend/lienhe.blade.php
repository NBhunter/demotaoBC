@extends('layouts.frontend')

@section('title', 'Liên hệ')

@section('content')
	<div class="breadcrumb_section bg_gray page-title-mini">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="page-title">
						<h1>Liên hệ</h1>
					</div>
				</div>
				<div class="col-md-6">
					<ol class="breadcrumb justify-content-md-end">
						<li class="breadcrumb-item"><a href="{{ route('frontend') }}">Trang chủ</a></li>
						<li class="breadcrumb-item active">Liên hệ</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	
	<div class="main_content">
		<div class="section pb_70">
			<div class="container">
				<div class="row">
					<div class="col-xl-4 col-md-6">
						<div class="contact_wrap contact_style3">
							<div class="contact_icon">
								<i class="linearicons-map2"></i>
							</div>
							<div class="contact_text">
								<span>Địa chỉ</span>
								<p>18 Ung Văn Khiêm, P. Đông Xuyên, TPLX</p>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-md-6">
						<div class="contact_wrap contact_style3">
							<div class="contact_icon">
								<i class="linearicons-envelope-open"></i>
							</div>
							<div class="contact_text">
								<span>Địa chỉ Email</span>
								<a href="larashop@gmail.com">larashop@gmail.com</a>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-md-6">
						<div class="contact_wrap contact_style3">
							<div class="contact_icon">
								<i class="linearicons-tablet2"></i>
							</div>
							<div class="contact_text">
								<span>Điện thoại</span>
								<p>+84 2963 01 11 10</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section pt-0">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="heading_s1">
							<h2>Để lại lời nhắn</h2>
						</div>
						<p class="leads">Nếu quý khách cần thêm thông tin hoặc phản hồi hãy để lại lời nhắn.</p>
						<div class="field_form">
							<form method="post" name="enq">
								<div class="row">
									<div class="form-group col-md-6">
										<input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên *" required />
									</div>
									<div class="form-group col-md-6">
										<input type="email" class="form-control" id="email" name="email" placeholder="Email *" required />
									</div>
									<div class="form-group col-md-6">
										<input type="text" class="form-control" id="phone" name="phone" placeholder="Điện thoại *" required />
									</div>
									<div class="form-group col-md-6">
										<input type="text" class="form-control" id="subject" name="subject" placeholder="Chủ đề *" required />
									</div>
									<div class="form-group col-md-12">
										<textarea class="form-control" id="message" name="message" rows="4" placeholder="Nội dung lời nhắn *" required></textarea>
									</div>
									<div class="col-md-12">
										<button type="submit" class="btn btn-fill-out">GỞI LỜI NHẮN</button>
									</div>
									<div class="col-md-12">
										<div id="alert-msg" class="alert-msg text-center"></div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-6 pt-2 pt-lg-0 mt-4 mt-lg-0">
						<div id="map" class="contact_map2" data-zoom="14" data-latitude="10.370575" data-longitude="105.431131" data-icon="{{ asset('public/assets/images/marker.png') }}"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('javascript')
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7TypZFTl4Z3gVtikNOdGSfNTpnmq-ahQ&amp;callback=initMap"></script>
@endsection