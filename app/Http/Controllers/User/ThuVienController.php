<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ThuVienController extends Controller
{

    public function show(){
        $loai_danh_muc = DB::table('loai_media')
        ->orderBy('created_at', 'DESC')
        ->paginate(6);
        return view('user.pages.thuvien',compact('loai_danh_muc'));
    }
    public function getAlbum($id){
        $album = DB::table('media')
        ->where('id_loai_media','=',$id)
        ->orderBy('created_at', 'DESC')
        ->get();
        $loai_danh_muc = DB::table('loai_media')
        ->inRandomOrder()
        ->orderBy('created_at', 'DESC')
        ->take(6)
        ->get();
        return view('user.pages.album',compact('album','loai_danh_muc'));
    }
}
