<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ThongTinLienHeController extends Controller
{

    public function getLienHe(){
        $thong_bao_noi_bat = DB::table('bai_viets')
        ->join('loai_bai_viets','bai_viets.id_loai_bai_viet','=','loai_bai_viets.id')
        ->join('danh_muc_bai_viets','danh_muc_bai_viets.id','=','loai_bai_viets.id_danh_muc_bai_viet')
        ->select('bai_viets.*','loai_bai_viets.ten as ten_loai')
        ->where('bai_viets.id_loai_bai_viet','=','2')
        ->orderBy('created_at', 'DESC')
        ->take(3)
        ->get();
    	return view('user.pages.contact',compact('thong_bao_noi_bat'));
    }
    public function postLienHe(Request $req){
    	 $new_contact = DB::table('lien_he')->insert(
            [
                'ten' => $req->ten,
                'so_dien_thoai' => $req->so_dien_thoai,
                'email' => $req->email,
                'tieu_de_lien_he' => $req->tieu_de_lien_he,
                'noi_dung_lien_he' => $req->noi_dung_lien_he,
                'lop' => $req->lop_lien_he,
                'is_read' => false,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        );
       return back();
    }
}
