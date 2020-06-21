<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class VanBanController extends Controller
{

    public function getVanBan($id){
        $van_bans = DB::table('van_ban_bieu_maus')
        ->where('id_loai_van_ban','=',$id)
        ->paginate(15);

		if($van_bans != null){
			return view('user.pages.van-ban',compact('van_bans'));
		}
		else{
			return view('user.pages.404');
		}
    }
}
