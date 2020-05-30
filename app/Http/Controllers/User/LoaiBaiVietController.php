<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LoaiBaiVietController extends Controller
{

    public function getLoaiBaiViet($ten_khong_dau, $id_loai_bai_viet){
        $thong_bao_noi_bat = DB::table('bai_viets')
        ->join('loai_bai_viets','bai_viets.id_loai_bai_viet','=','loai_bai_viets.id')
        ->join('danh_muc_bai_viets','danh_muc_bai_viets.id','=','loai_bai_viets.id_danh_muc_bai_viet')
        ->select('bai_viets.*','loai_bai_viets.ten as ten_loai')
        ->where('bai_viets.id_loai_bai_viet','=','2')
        ->orderBy('created_at', 'DESC')
        ->take(3)
        ->get();
        $loai_bai_viet = DB::table('bai_viets') ->join('loai_bai_viets','bai_viets.id_loai_bai_viet','=','loai_bai_viets.id')
        ->where('bai_viets.id_loai_bai_viet','=',$id_loai_bai_viet)
        ->select('bai_viets.*','loai_bai_viets.ten as ten_loai')
        ->inRandomOrder()
        ->orderBy('created_at', 'DESC')
        ->get();

		if($loai_bai_viet != null){
            $ten_danh_muc ='';
            if(sizeof($loai_bai_viet) > 0){
                $ten_danh_muc = $loai_bai_viet[0]->ten_loai;
            }

			return view('user.pages.category',compact('thong_bao_noi_bat','loai_bai_viet','ten_danh_muc'));
		}
		else{
			return view('user.pages.404');
		}
    }
}
