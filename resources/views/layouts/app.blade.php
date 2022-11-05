<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	
	<title>@yield('title', 'Trang chủ quản trị') - {{ config('app.name', 'Laravel') }}</title>
	
	<!-- Scripts -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
	@yield('javascript')
	
	<!-- Styles -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="{{ asset('public/css/all.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('public/css/custom.css') }}" />
</head>
<body>
	<div id="app" class="container-fluid">
		<nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background:#ebc7df;">
			<div class="container-fluid">
				<a class="navbar-brand" href="{{ route('admin') }}">
					<i class="fal fa-shopping-cart"></i> {{ config('app.name', 'Laravel') }}
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left side of Navbar -->
					<ul class="navbar-nav me-auto">
						<li class="nav-item">
							<a class="nav-link" href="{{ route('loaisanpham') }}"><i class="fal fa-fw fa-list"></i> Loại sản phẩm</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('sanpham') }}"><i class="fal fa-fw fa-cubes"></i> Sản phẩm</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('donhang') }}"><i class="fal fa-fw fa-file-invoice"></i> Đơn hàng</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('nguoidung') }}"><i class="fal fa-fw fa-users"></i> Tài khoản</a>
						</li>
					</ul>
					
					<!-- Right side of Navbar -->
					<ul class="navbar-nav ms-auto">
						@guest
							@if (Route::has('login'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('login') }}"><i class="fal fa-fw fa-sign-in-alt"></i> Đăng nhập</a>
								</li>
							@endif
							@if (Route::has('register'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('register') }}"><i class="fal fa-fw fa-user-plus"></i> Đăng ký</a>
								</li>
							@endif
						@else
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#nguoidung" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fal fa-fw fa-user-circle"></i> {{ Auth::user()->name }}
								</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
										<i class="fal fa-fw fa-power-off fa-fw"></i> Đăng xuất
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
										@csrf
									</form>
								</div>
							</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>
		
		<main class="pt-3 pb-2">
			<!--@yield('content')-->
		</main>
		
		<hr class="shadow-sm" />
		<footer align="center">Bản quyền &copy; {{ date('Y') }} bởi Nguyễn Ra Băng.
			<p> {{ date('d-M-Y') }}</p>
		</footer>
	</div>
</body>
</html>