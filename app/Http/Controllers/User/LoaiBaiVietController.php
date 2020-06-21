<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LoaiBaiVietController extends Controller
{

    public function getLoaiBaiViet($id_loai_bai_viet){
        $loai_bai_viet = DB::table('bai_viets') ->join('loai_bai_viets','bai_viets.id_loai_bai_viet','=','loai_bai_viets.id')
        ->where('bai_viets.id_loai_bai_viet','=',$id_loai_bai_viet)
        ->select('bai_viets.*','loai_bai_viets.ten as ten_loai')
        ->inRandomOrder()
        ->orderBy('created_at', 'DESC')
        ->paginate(6);

		if($loai_bai_viet != null){
            $ten_danh_muc ='';
            if(sizeof($loai_bai_viet) > 0){
                $ten_danh_muc = $loai_bai_viet[0]->ten_loai;
            }

			return view('user.pages.category',compact('loai_bai_viet','ten_danh_muc'));
		}
		else{
			return view('user.pages.404');
		}
    }
}
