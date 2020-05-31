<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\DanhMucBaiViet;
class DanhMucBaiVietController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danh_muc_bai_viet=DanhMucBaiViet::all();

        return view("admin.pages.danhmucbaiviet.danhsach")->with('data',$danh_muc_bai_viet);
    }
    public function indexThemView()
    {
        return view("admin.pages.danhmucbaiviet.them");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            if($request->input('ten')!=""){
                try{
                    DB::beginTransaction();
                    $danh_muc_bai_viet=new DanhMucBaiViet();
                    $danh_muc_bai_viet->ten=$request->input('ten');
                    $danh_muc_bai_viet->save();
                    DB::commit();
                    return view("admin.pages.danhmucbaiviet.them")->with('message','Thêm thành công');
                }
                catch(Exception $e){
                    DB::rollback();
                }
            }
        return view("admin.pages.danhmucbaiviet.them")->with('message','Thêm thất bại vui lòng thử lại');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $danh_muc_bai_viet=danhmucbaiviet::find($id);
        if(!empty($danh_muc_bai_viet)){
            return view("admin.pages.danhmucbaiviet.sua")->with('data_danh_muc_bai_viet',$danh_muc_bai_viet)->with('id',$id);
        }
        return redirect("quantri/danhmucbaiviet/danhsach");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $danh_muc_bai_viet=danhmucbaiviet::find($id);
        if(!empty($danh_muc_bai_viet)){
            try{
                DB::beginTransaction();
                if($request->input('ten')!="")$danh_muc_bai_viet->ten=$request->input('ten');
                $danh_muc_bai_viet->save();
                DB::commit();
                return view("admin.pages.danhmucbaiviet.sua")->with('data_danh_muc_bai_viet',$danh_muc_bai_viet)->with('message',"Sửa thành công")->with('id',$id);
            }
            catch(Exception $e){
                DB::rollback();
            }
        }
        return view("admin.pages.danhmucbaiviet.sua")->with('data_danh_muc_bai_viet',$danh_muc_bai_viet)->with('message',"Sửa thất bại bạn vui lòng thử lại")->with('id',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(request()->session()->get('quyen_danh_muc_bai_viet'))
        {
        $danh_muc_bai_viet=danhmucbaiviet::find($id);
        $danh_muc_bai_viets=danhmucbaiviet::all();
        if(!empty($danh_muc_bai_viet)){
            try{
                DB::beginTransaction();
                $danh_muc_bai_viet->delete();
                DB::commit();
                return redirect('quantri/danhmucbaiviet/danhsach')->with('message','Xóa thành công');
            }
            catch(Exception $e){
            DB::rollback();
            }

        }
        return view("admin.pages.danhmucbaiviet.danhsach")->with('data',$danh_muc_bai_viets)->with('message','Xóa thất bại');
    }
    return view('admin.pages.error403');

    }
}
