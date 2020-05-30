<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CauHinh;
use DB;

class CauHinhWebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cau_hinh=CauHinh::first();
        if(!empty($cau_hinh)){

            return view("admin.pages.cauhinh.sua")->with('data',$cau_hinh);
        }
        return redirect("quantri");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $cau_hinh=CauHinh::first();
        if(!empty($cau_hinh)){
            try{
                DB::beginTransaction();
                if($request->input('email')!="")$cau_hinh->email=$request->input('email');
                if($request->input('so_dien_thoai')!="")$cau_hinh->email=$request->input('so_dien_thoai');
                if($request->input('so_dien_thoai_khoa')!="")$cau_hinh->email=$request->input('so_dien_thoai_khoa');
                if($request->input('mo_ta')!="")$cau_hinh->email=$request->input('mo_ta');
                $cau_hinh->save();
                DB::commit();
                return view("admin.pages.cauhinh.sua")->with('data',$cau_hinh)->with('message',"Sửa thành công");
            }
            catch(Exception $e){
                DB::rollback();
            }
        }
        return redirect("quantri");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
