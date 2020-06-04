<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ThuVienController extends Controller
{

    public function show(){
        $thong_bao_noi_bat = DB::table('bai_viets')
        ->join('loai_bai_viets','bai_viets.id_loai_bai_viet','=','loai_bai_viets.id')
        ->join('danh_muc_bai_viets','danh_muc_bai_viets.id','=','loai_bai_viets.id_danh_muc_bai_viet')
        ->select('bai_viets.*','loai_bai_viets.ten as ten_loai')
        ->where('bai_viets.id_loai_bai_viet','=','2')
        ->orderBy('created_at', 'DESC')
        ->take(4)
        ->get();
        $loai_danh_muc = DB::table('loai_media')
        ->orderBy('created_at', 'ASC')
        ->paginate(6);
        return view('user.pages.thuvien',compact('thong_bao_noi_bat','loai_danh_muc'));
    }
    public function getAlbum($id){
        $thong_bao_noi_bat = DB::table('bai_viets')
        ->join('loai_bai_viets','bai_viets.id_loai_bai_viet','=','loai_bai_viets.id')
        ->join('danh_muc_bai_viets','danh_muc_bai_viets.id','=','loai_bai_viets.id_danh_muc_bai_viet')
        ->select('bai_viets.*','loai_bai_viets.ten as ten_loai')
        ->where('bai_viets.id_loai_bai_viet','=','2')
        ->orderBy('created_at', 'DESC')
        ->get();
        $album = DB::table('media')
        ->where('id_loai_media','=',$id)
        ->orderBy('created_at', 'DESC')
        ->get();
        $loai_danh_muc = DB::table('loai_media')
        ->inRandomOrder()
        ->orderBy('created_at', 'DESC')
        ->take(6)
        ->get();
        return view('user.pages.album',compact('thong_bao_noi_bat','album','loai_danh_muc'));
    }
}
