<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LiveSearchController extends Controller
{
    public function getSearch(Request $req){
        $thong_bao_noi_bat = DB::table('bai_viets')
        ->join('loai_bai_viets','bai_viets.id_loai_bai_viet','=','loai_bai_viets.id')
        ->join('danh_muc_bai_viets','danh_muc_bai_viets.id','=','loai_bai_viets.id_danh_muc_bai_viet')
        ->select('bai_viets.*','loai_bai_viets.ten as ten_loai')
        ->where('bai_viets.id_loai_bai_viet','=','2')
        ->orderBy('created_at', 'DESC')
        ->take(3)
        ->get();
        $bai_viet = DB::("bai_viets")->where('bai_viets.tieu_de','like','%'.$req->key.'%')->get();
        return view('user.pages.search')
        ->with(compact('thong_bao_noi_bat','bai_viet'));
    }
}