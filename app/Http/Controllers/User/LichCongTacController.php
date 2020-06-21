<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LichCongTacController extends Controller
{

    public function show(){
        $lichs = DB::table('lich_cong_tac')
        ->orderBy('created_at', 'DESC')
        ->paginate(6);
        return view('user.pages.lich-cong-tac',compact('lichs'));
    }
    public function getLich($id){
        $lich = DB::table('lich_cong_tac')
        ->where('id','=',$id)
        ->first();
        return view('user.pages.chi-tiet-lich',compact('lich'));
    }
}
