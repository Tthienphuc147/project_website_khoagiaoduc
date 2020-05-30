<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AdminController extends Controller
{
    public function trangchu(){
        return view('admin.pages.homepage');
    }
    public function loi404(){
        return view('admin.pages.error404');
    }
}
