<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
class CoCauController extends Controller
{

    public function showCoCau(){
        $thong_bao_noi_bat = DB::table('bai_viets')
        ->join('loai_bai_viets','bai_viets.id_loai_bai_viet','=','loai_bai_viets.id')
        ->join('danh_muc_bai_viets','danh_muc_bai_viets.id','=','loai_bai_viets.id_danh_muc_bai_viet')
        ->select('bai_viets.*','loai_bai_viets.ten as ten_loai')
        ->where('bai_viets.id_loai_bai_viet','=','2')
        ->orderBy('created_at', 'DESC')
        ->take(3)
        ->get();
        $loai_cap_bac = DB::table('cap_bac')->get();
        $user = DB::table('users')->get();
        // for(var i =0;i<sizeof($loai_cap_bac);i++){
        //     $tai_khoan = $
        // }
    	return view('user.pages.co-cau',compact('thong_bao_noi_bat','loai_cap_bac','user'));
    }
}
