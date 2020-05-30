<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class BaiVietController extends Controller
{
    public function getBaiViet($ten_khong_dau, $id_bai_viet){
		$bai_viet = DB::table('bai_viets')->where('id','=',$id_bai_viet)->first();
		$user = DB::table('users')->where('id','=',$bai_viet->id_user)->first();
		if($bai_viet != null){
			DB::table('bai_viets')
			->where('id', $id_bai_viet)
			->update(['luot_xem' => $bai_viet->luot_xem + 1]);
			return view('user.pages.detail-post',compact('bai_viet','user'));
		}
		else{
			return view('user.pages.404');
		}
    }
}
