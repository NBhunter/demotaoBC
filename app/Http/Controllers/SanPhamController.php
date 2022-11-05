<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Imports\SanPhamImport;
use App\Exports\SanPhamExport;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Excel;
use File;
use Illuminate\Support\Facades\Storage;


class SanPhamController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function getDanhSach()
	{
		$sanpham = SanPham::paginate(25);
		return view('sanpham.danhsach', compact('sanpham'));
	}
	
	public function getThem()
    {
        $loaisanpham = LoaiSanPham::all();
		return view('sanpham.them', compact('loaisanpham'));
    }
	
	public function postThem(Request $request)
	{
		$this->validate($request, [
			'loaisanpham_id' => ['required'],
			'tensanpham' => ['required', 'max:255', 'unique:sanpham'],
			'soluong' => ['required', 'numeric'],
			'dongia' => ['required', 'numeric'],
			 'hinhanh' => ['image', 'max:2048'],
		]);
		
		$orm = new SanPham();
		$orm->loaisanpham_id = $request->loaisanpham_id;
		$orm->tensanpham = $request->tensanpham;
		$orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
		$orm->soluong = $request->soluong;
		$orm->dongia = $request->dongia;
		// Kiểm tra tập tin rỗng hay không?
		if($request->hasFile('hinhanh'))
			{
			// Tạo thư mục nếu chưa có
			$lsp = LoaiSanPham::find($request->loaisanpham_id);
			File::isDirectory($lsp->tenloai_slug) or Storage::makeDirectory($lsp->tenloai_slug, 0775);

			// Xác định tên tập tin
			$extension = $request->file('hinhanh')->extension();
			$newfilename = Str::slug($request->tensanpham, '-') . '.' . $extension;

			// Upload vào thư mục và trả về đường dẫn
			$path = Storage::putFileAs($lsp->tenloai_slug, $request->file('hinhanh'), $newfilename);
			}
		$orm->hinhanh=$path;
		$orm->motasanpham = $request->motasanpham;
		$orm->save();
		
		return redirect()->route('sanpham');
	}
	
	public function getSua($id)
	{
		$sanpham = SanPham::find($id);
		$loaisanpham = LoaiSanPham::all();
		return view('sanpham.sua', compact('sanpham', 'loaisanpham'));
	}
	
	public function postSua(Request $request, $id)
	{
		$this->validate($request, [
			'loaisanpham_id' => ['required'],
			'tensanpham' => ['required', 'max:255', 'unique:sanpham,tensanpham,' . $id],
			'soluong' => ['required', 'numeric'],
			'dongia' => ['required', 'numeric'],
			'hinhanh' => ['image', 'max:2048'],
		]);
		
		$orm = SanPham::find($id);
		$orm->loaisanpham_id = $request->loaisanpham_id;
		$orm->tensanpham = $request->tensanpham;
		$orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
		$orm->soluong = $request->soluong;
		$orm->dongia = $request->dongia;
		// Kiểm tra tập tin rỗng hay không?
		if($request->hasFile('hinhanh'))
			{
			// Xóa tập tin cũ
			$sp = SanPham::find($id);
			Storage::delete($sp->hinhanh);

			// Xác định tên tập tin mới
			$extension = $request->file('hinhanh')->extension();
			$newfilename = Str::slug($request->tensanpham, '-') . '.' . $extension;

			// Upload vào thư mục và trả về đường dẫn
			$lsp = LoaiSanPham::find($request->loaisanpham_id);
			$path = Storage::putFileAs($lsp->tenloai_slug, $request->file('hinhanh'), $newfilename);
			$orm->hinhanh=$path;
			}
			
		$orm->motasanpham = $request->motasanpham;
		$orm->save();
		
		return redirect()->route('sanpham');
	}
	
	public function getXoa($id)
	{
		$orm = SanPham::find($id);
		$orm->delete();
		// Xóa tập tin khi xóa sản phẩm
 		Storage::delete($orm->hinhanh);
		return redirect()->route('sanpham');
	}
	
	// Nhập từ Excel
	public function postNhap(Request $request)
	{
		Excel::import(new SanPhamImport, $request->file('file_excel'));
		
		return redirect()->route('sanpham');
	}
	
	// Xuất ra Excel
	public function getXuat()
	{
		return Excel::download(new SanPhamExport, 'danh-sach-san-pham.xlsx');
	}
}