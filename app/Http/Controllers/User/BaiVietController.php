<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class BaiVietController extends Controller
{

    public function getBaiViet($id_bai_viet){
        $bai_viet = DB::table('bai_viets')->where('bai_viets.id','=',$id_bai_viet) ->join('loai_bai_viets','bai_viets.id_loai_bai_viet','=','loai_bai_viets.id')
        ->select('bai_viets.*','loai_bai_viets.ten as ten_loai')
        ->first();
        if($bai_viet!=null){
            $bai_viet_lien_quan = DB::table('bai_viets')->where('bai_viets.id_loai_bai_viet','=',$bai_viet->id_loai_bai_viet)
            ->inRandomOrder()
            ->orderBy('created_at', 'DESC')
            ->take(3)
            ->get();
            $user = DB::table('users')->where('id','=',$bai_viet->id_user)->first();
            $loai_bai_viet = $bai_viet->ten_loai;
        }



		if($bai_viet != null){
			DB::table('bai_viets')
			->where('id', $id_bai_viet)
			->update(['luot_xem' => $bai_viet->luot_xem + 1]);
			return view('user.pages.detail-post',compact('bai_viet','bai_viet_lien_quan','user','loai_bai_viet'));
		}
		else{
			return view('user.pages.404');
		}
    }
    public function getLichSu(){
        $bai_viet = DB::table('bai_viets')->where('bai_viets.id_loai_bai_viet','=','21')
        ->select('bai_viets.*')
        ->first();
		if($bai_viet != null){
			return view('user.pages.lich-su',compact('bai_viet'));
		}
		else{
			return view('user.pages.404');
		}
    }
    public function getThongDiep(){
        $bai_viet = DB::table('bai_viets')->where('bai_viets.id_loai_bai_viet','=','20')
        ->select('bai_viets.*')
        ->first();
		if($bai_viet != null){
			return view('user.pages.thong-diep',compact('bai_viet'));
		}
		else{
			return view('user.pages.404');
		}
    }
    public function getDinhHuong(){
        $bai_viet = DB::table('bai_viets')->where('bai_viets.id_loai_bai_viet','=','51')
        ->select('bai_viets.*')
        ->first();
		if($bai_viet != null){
			return view('user.pages.thong-diep',compact('bai_viet'));
		}
		else{
			return view('user.pages.404');
		}
    }
    public function getMucTieu(){
        $bai_viet = DB::table('bai_viets')->where('bai_viets.id_loai_bai_viet','=','52')
        ->select('bai_viets.*')
        ->first();
		if($bai_viet != null){
			return view('user.pages.thong-diep',compact('bai_viet'));
		}
		else{
			return view('user.pages.404');
		}
    }
}
