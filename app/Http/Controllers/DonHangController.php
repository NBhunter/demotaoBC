<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\DonHang_ChiTiet;
use App\Mail\DatHangEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DonHangController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function getDanhSach()
	{
		$donhang = DonHang::orderBy('created_at', 'desc')->get();
		return view('donhang.danhsach', compact('donhang'));
	}
	
	public function getThem()
	{
		// Thêm Đơn hàng demo
		$donhang = DonHang::create([
			'nguoidung_id' => Auth::user()->id,
			'dienthoaigiaohang' => '0939011900',
			'diachigiaohang' => '18 Ung Văn Khiêm - TP. Long Xuyên - An Giang',
		]);
		
		// Thêm Đơn hàng chi tiết demo
		DonHang_ChiTiet::create([
			'donhang_id' => $donhang->id,
			'sanpham_id' => 1,
			'soluongban' => 1,
			'dongiaban' => 5990000,
		]);
		
		DonHang_ChiTiet::create([
			'donhang_id' => $donhang->id,
			'sanpham_id' => 2,
			'soluongban' => 1,
			'dongiaban' => 350000,
		]);
		
		// Gởi email
		Mail::to(Auth::user()->email)->send(new DatHangEmail($donhang));
		
		return redirect()->route('frontend.dathangthanhcong');
	}
	
	public function getSua($id)
	{
		$donhang = DonHang::find($id);
		return view('donhang.sua', compact('donhang'));
	}
	
	public function postSua(Request $request, $id)
	{
		$this->validate($request, [
			'dienthoai' => ['required', 'max:20'],
			'diachi' => ['required', 'max:255'],
			'tinhtrang' => ['required'],
		]);
		
		$orm = DonHang::find($id);
		$orm->dienthoaigiaohang = $request->dienthoai;
		$orm->diachigiaohang = $request->diachi;
		$orm->tinhtrang = $request->tinhtrang;
		$orm->save();
		
		return redirect()->route('donhang');
	}
	
	public function getXoa($id)
	{
		$orm = DonHang::find($id);
		$orm->delete();
		
		$chitiet = DonHang_ChiTiet::where('donhang_id', $orm->id)->first();
		$chitiet->delete();
		
		return redirect()->route('donhang');
	}
}