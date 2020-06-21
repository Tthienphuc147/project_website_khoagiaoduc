<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
class ThongTinLienHeController extends Controller
{

    public function getLienHe(){
    	return view('user.pages.contact');
    }
    public function postLienHe(Request $req){
      try{
        DB::beginTransaction();
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
        DB::commit();
        Session::flash('success', 'Liên hệ của bạn đã được gửi thành công');
    }
    catch (Exception $e){
        Session::flash('error', 'Liên hệ của bạn đã gửi thất bại');
    } finally{
        return view("user.pages.contact");
    }
    }
}
