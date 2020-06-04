<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LiveSearchController extends Controller
{
    public function getSearch(Request $request){
        $thong_bao_noi_bat = DB::table('bai_viets')
        ->join('loai_bai_viets','bai_viets.id_loai_bai_viet','=','loai_bai_viets.id')
        ->join('danh_muc_bai_viets','danh_muc_bai_viets.id','=','loai_bai_viets.id_danh_muc_bai_viet')
        ->select('bai_viets.*','loai_bai_viets.ten as ten_loai')
        ->where('bai_viets.id_loai_bai_viet','=','2')
        ->orderBy('created_at', 'DESC')
        ->take(3)
        ->get();
        $keyword = $request->keyword;
        $bai_viets = DB::table('bai_viets')->where('tieu_de','like',"%$request->keyword%")->get();
        return view('user.pages.search',['bai_viets' => $bai_viets,'keyword' => $keyword,'thong_bao_noi_bat' =>$thong_bao_noi_bat]);
    }
}
