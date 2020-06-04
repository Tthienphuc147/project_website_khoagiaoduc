<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class VanBanController extends Controller
{

    public function getVanBan($id){
        $thong_bao_noi_bat = DB::table('bai_viets')
        ->join('loai_bai_viets','bai_viets.id_loai_bai_viet','=','loai_bai_viets.id')
        ->join('danh_muc_bai_viets','danh_muc_bai_viets.id','=','loai_bai_viets.id_danh_muc_bai_viet')
        ->select('bai_viets.*','loai_bai_viets.ten as ten_loai')
        ->where('bai_viets.id_loai_bai_viet','=','2')
        ->orderBy('created_at', 'DESC')
        ->take(4)
        ->get();
        $van_bans = DB::table('van_ban_bieu_maus')
        ->where('id_loai_van_ban','=',$id)
        ->paginate(10);

		if($van_bans != null){
			return view('user.pages.van-ban',compact('thong_bao_noi_bat','van_bans'));
		}
		else{
			return view('user.pages.404');
		}
    }
}
