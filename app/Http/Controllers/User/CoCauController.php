<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
class CoCauController extends Controller
{

    public function showCoCau(){
        $loai_cap_bac = DB::table('cap_bac')->get();
        $user = DB::table('users')->get();
    	return view('user.pages.co-cau',compact('loai_cap_bac','user'));
    }
}
