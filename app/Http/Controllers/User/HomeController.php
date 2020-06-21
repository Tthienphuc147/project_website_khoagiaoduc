<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class HomeController extends Controller
{
    public function show(){
        $tin_tuc_noi_bat = DB::table('bai_viets')
        ->join('loai_bai_viets','bai_viets.id_loai_bai_viet','=','loai_bai_viets.id')
        ->join('danh_muc_bai_viets','danh_muc_bai_viets.id','=','loai_bai_viets.id_danh_muc_bai_viet')
        ->select('bai_viets.*','loai_bai_viets.ten as ten_loai')
        ->where('bai_viets.id_loai_bai_viet','=','1')
        ->where('bai_viets.is_noi_bat','=','1')
        ->orderBy('created_at', 'DESC')
        ->take(1)
        ->first();
        $tin_tuc_top = DB::table('bai_viets')
        ->join('loai_bai_viets','bai_viets.id_loai_bai_viet','=','loai_bai_viets.id')
        ->join('danh_muc_bai_viets','danh_muc_bai_viets.id','=','loai_bai_viets.id_danh_muc_bai_viet')
        ->select('bai_viets.*','loai_bai_viets.ten as ten_loai')
        ->where('bai_viets.id_loai_bai_viet','=','1')
        ->orderBy('created_at', 'DESC')
        ->take(6)
        ->get();
        $thong_bao = DB::table('bai_viets')
        ->join('loai_bai_viets','bai_viets.id_loai_bai_viet','=','loai_bai_viets.id')
        ->join('danh_muc_bai_viets','danh_muc_bai_viets.id','=','loai_bai_viets.id_danh_muc_bai_viet')
        ->select('bai_viets.*','loai_bai_viets.ten as ten_loai')
        ->where('bai_viets.id_loai_bai_viet','=','2')
        ->orderBy('created_at', 'DESC')
        ->take(5)
        ->get();
        $tin_tuc = DB::table('bai_viets')
        ->join('loai_bai_viets','bai_viets.id_loai_bai_viet','=','loai_bai_viets.id')
        ->join('danh_muc_bai_viets','danh_muc_bai_viets.id','=','loai_bai_viets.id_danh_muc_bai_viet')
        ->select('bai_viets.*','loai_bai_viets.ten as ten_loai')
        ->where('bai_viets.id_loai_bai_viet','=','1')
        ->orderBy('created_at', 'DESC')
        ->take(6)
        ->get();
        $dao_tao = DB::table('bai_viets')
        ->join('loai_bai_viets','bai_viets.id_loai_bai_viet','=','loai_bai_viets.id')
        ->join('danh_muc_bai_viets','danh_muc_bai_viets.id','=','loai_bai_viets.id_danh_muc_bai_viet')
        ->select('bai_viets.*','loai_bai_viets.ten as ten_loai')
        ->where('loai_bai_viets.id_danh_muc_bai_viet','=','2')
        ->orderBy('created_at', 'DESC')
        ->take(4)
        ->get();
        $sinh_vien= DB::table('bai_viets')
        ->join('loai_bai_viets','bai_viets.id_loai_bai_viet','=','loai_bai_viets.id')
        ->join('danh_muc_bai_viets','danh_muc_bai_viets.id','=','loai_bai_viets.id_danh_muc_bai_viet')
        ->select('bai_viets.*','loai_bai_viets.ten as ten_loai')
        ->where('loai_bai_viets.id_danh_muc_bai_viet','=','5')
        ->orderBy('created_at', 'DESC')
        ->take(4)
        ->get();
        $slide = DB::table('slides')
        ->get();
        $album = DB::table('media')
        ->where('media.id_loai_media','=','1')
        ->inRandomOrder()
        ->get();
        $album1 = DB::table('media')
        ->where('media.id_loai_media','!=','1')
        ->inRandomOrder()
        ->get();
        return view('user.pages.home-page')->with(compact('tin_tuc_noi_bat','tin_tuc_top','thong_bao','tin_tuc','dao_tao','sinh_vien','slide','album','album1'));
    }
}
