<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class BaiVietController extends Controller
{

    public function getBaiViet($ten_khong_dau, $id_bai_viet){
        $thong_bao_noi_bat = DB::table('bai_viets')
        ->join('loai_bai_viets','bai_viets.id_loai_bai_viet','=','loai_bai_viets.id')
        ->join('danh_muc_bai_viets','danh_muc_bai_viets.id','=','loai_bai_viets.id_danh_muc_bai_viet')
        ->select('bai_viets.*','loai_bai_viets.ten as ten_loai')
        ->where('bai_viets.id_loai_bai_viet','=','2')
        ->orderBy('created_at', 'DESC')
        ->take(3)
        ->get();
        $bai_viet = DB::table('bai_viets')->where('bai_viets.id','=',$id_bai_viet) ->join('loai_bai_viets','bai_viets.id_loai_bai_viet','=','loai_bai_viets.id')
        ->select('bai_viets.*','loai_bai_viets.ten as ten_loai')
        ->first();
        $bai_viet_lien_quan = DB::table('bai_viets')->where('bai_viets.id_loai_bai_viet','=',$bai_viet->id_loai_bai_viet)
        ->inRandomOrder()
        ->orderBy('created_at', 'DESC')
        ->take(3)
        ->get();
        $user = DB::table('users')->where('id','=',$bai_viet->id_user)->first();
        $loai_bai_viet = $bai_viet->ten_loai;
		if($bai_viet != null){
			DB::table('bai_viets')
			->where('id', $id_bai_viet)
			->update(['luot_xem' => $bai_viet->luot_xem + 1]);
			return view('user.pages.detail-post',compact('thong_bao_noi_bat','bai_viet','bai_viet_lien_quan','user','loai_bai_viet'));
		}
		else{
			return view('user.pages.404');
		}
    }
}
