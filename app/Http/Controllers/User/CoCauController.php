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
        $truong_khoa =DB::table('users')
        ->where('users.cap_bac','=','1')
        ->where('users.id_role','=','1')
        ->get();
        $pho_truong_khoa = DB::table('users')
        ->where('users.cap_bac','=','2')
        ->get();
        $pho_bo_mon_cs = DB::table('users')
        ->where('users.cap_bac','=','3')
        ->get();
        $pho_bo_mon_cn = DB::table('users')
        ->where('users.cap_bac','=','4')
        ->get();
        $gvcs = DB::table('users')
        ->where('users.cap_bac','=','5')
        ->get();
        $gvcn =DB::table('users')
        ->where('users.cap_bac','=','6')
        ->get();
    	return view('user.pages.co-cau',compact('thong_bao_noi_bat','truong_khoa','pho_truong_khoa','pho_bo_mon_cs','pho_bo_mon_cn','gvcs','gvcn'));
    }
}
