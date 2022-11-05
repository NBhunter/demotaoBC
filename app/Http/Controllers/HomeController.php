<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\SanPham;
use Gloudemans\Shoppingcart\Facades\Cart;



class HomeController extends Controller
{
	public function __construct()
	{
		
	}
	
	public function getHome()
	{
		$sanpham = SanPham::paginate(24);
		return view('frontend.index',compact('sanpham'));
	}
	
	public function getDangKy()
	{
		return view('frontend.dangky');
	}
	
	public function getDangNhap()
	{
		return view('frontend.dangnhap');
	}
	
	public function getSanPham($tenloai_slug = '')
	{
		return view('frontend.sanpham');
	}
	
	public function getSanPham_ChiTiet($tenloai_slug, $tensanpham_slug)
	{
		return view('frontend.sanpham_chitiet');
	}
	
	public function getLienHe()
	{
		return view('frontend.lienhe');
	}
	
	public function getGioHang()
	{
		if(Cart::count() <= 0)
			return view('frontend.giohang_rong');
		else
			return view('frontend.giohang');
	}
	
	public function getGioHang_Them($tensanpham_slug)
	{
		$sanpham = SanPham::where('tensanpham_slug', $tensanpham_slug)->first();		
			Cart::add([
			'id' => $sanpham->id,
			'name' => $sanpham->tensanpham,
			'price' => $sanpham->dongia,
			'qty' => 1,
			'weight' => 0,
			'options' => [
				'image' => $sanpham->hinhanh
				]
			]);

		return redirect()->route('frontend');
	}
	
	public function getGioHang_Xoa($row_id)
	{
		Cart::remove($row_id);
		return redirect()->route('frontend.giohang');
	}
	
	public function getGioHang_XoaTatCa()
	{
		Cart::destroy();
		return redirect()->route('frontend.giohang');
	}
	
	public function getGioHang_Giam($row_id)
	{
		$row = Cart::get($row_id);
		if($row->qty > 1)
		{
			Cart::update($row_id, $row->qty - 1);
		}
		return redirect()->route('frontend.giohang');

	}
	
	public function getGioHang_Tang($row_id)
	{
		$row = Cart::get($row_id);
		if($row->qty < 10)
		{
			Cart::update($row_id, $row->qty + 1);
		}
		return redirect()->route('frontend.giohang');
	}
	
	public function getDatHang()
	{
		return view('frontend.dathang');
	}
	
	public function postDatHang(Request $request)
	{
		return redirect()->route('frontend.dathangthanhcong');
	}
	
	public function getDatHangThanhCong()
	{
		return view('frontend.dathangthanhcong');
	}

	public function postSanPham(Request $request)
	{
		if($request->sapxep == 'popularity') // Mua nhiều nhất
		{
			$sanpham = SanPham::leftJoin('donhang_chitiet', 'sanpham.id', '=', 'donhang_chitiet.sanpham_id')
			->selectRaw('sanpham.*, coalesce(sum(donhang_chitiet.soluongban), 0) tongsoluongban')
			->groupBy('sanpham.id')
			->orderBy('tongsoluongban', 'desc')
			->paginate(16);

			// Ghi vào SESSION
			session()->put('sapxep', 'popularity');
		}
		elseif($request->sapxep == 'date') // Mới nhất
		{
			$sanpham = SanPham::orderBy('created_at', 'desc')->paginate(16);

			// Ghi vào SESSION
			session()->put('sapxep', 'date');
		}
		elseif($request->sapxep == 'price') // Xếp theo giá: thấp đến cao
		{
			$sanpham = SanPham::orderBy('dongia', 'asc')->paginate(16);

			// Ghi vào SESSION
			session()->put('sapxep', 'price');
		}
		elseif($request->sapxep == 'price-desc') // Xếp theo giá: cao xuống thấp
		{
			$sanpham = SanPham::orderBy('dongia', 'desc')->paginate(16);

			// Ghi vào SESSION
			session()->put('sapxep', 'price-desc');
		}
		else // Mặc định
		{
			$sanpham = SanPham::paginate(16);

			// Ghi vào SESSION
			session()->put('sapxep', 'default');
		}

	return view('frontend.index', compact('sanpham'));
	}
}