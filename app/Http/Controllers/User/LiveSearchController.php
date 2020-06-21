<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LiveSearchController extends Controller
{
    public function getSearch(Request $request){
        $keyword = $request->keyword;
        $bai_viets = DB::table('bai_viets')->where('tieu_de','like',"%$request->keyword%")->get();
        return view('user.pages.search',['bai_viets' => $bai_viets,'keyword' => $keyword]);
    }
}
