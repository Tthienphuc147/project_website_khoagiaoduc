<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LichCongTacController extends Controller
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
        $lichs = DB::table('lich_cong_tac')
        ->orderBy('created_at', 'ASC')
        ->paginate(6);
        return view('user.pages.lich-cong-tac',compact('thong_bao_noi_bat','lichs'));
    }
    public function getLich($id){
        $thong_bao_noi_bat = DB::table('bai_viets')
        ->join('loai_bai_viets','bai_viets.id_loai_bai_viet','=','loai_bai_viets.id')
        ->join('danh_muc_bai_viets','danh_muc_bai_viets.id','=','loai_bai_viets.id_danh_muc_bai_viet')
        ->select('bai_viets.*','loai_bai_viets.ten as ten_loai')
        ->where('bai_viets.id_loai_bai_viet','=','2')
        ->orderBy('created_at', 'DESC')
        ->get();
        $lich = DB::table('lich_cong_tac')
        ->where('id','=',$id)
        ->first();
        return view('user.pages.chi-tiet-lich',compact('thong_bao_noi_bat','lich'));
    }
}
