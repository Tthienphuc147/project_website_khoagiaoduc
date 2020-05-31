<?php

namespace App\Http\Controllers\admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LoaiBaiViet;
use App\DanhMucBaiViet;

class LoaiBaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->session()->get('quyen_loai_bai_viet'))
        {
        $loai_bai_viets=LoaiBaiViet::all();

        return view("admin.pages.loaibaiviet.danhsach")->with('data',$loai_bai_viets);

}
return view('admin.pages.error403');
    }
    public function indexThemView()
    {
        if(request()->session()->get('quyen_loai_bai_viet'))
        {
        $danh_muc_bai_viets=DanhMucBaiViet::all();
        return view("admin.pages.loaibaiviet.them")->with('data',$danh_muc_bai_viets);
    }
    return view('admin.pages.error403');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(request()->session()->get('quyen_loai_bai_viet'))
        {
        $danh_muc_bai_viets= DanhMucBaiViet::find($request->input("id_danh_muc_bai_viet"));
        if(!empty($danh_muc_bai_viets)){

            if($request->input('ten')!=""){
                try{
                    DB::beginTransaction();
                    $loai_bai_viets=LoaiBaiViet::create($request->all());
                    $loai_bai_viets->save();
                    $danh_muc_bai_viets=DanhMucBaiViet::all();
                    DB::commit();
                    return view("admin.pages.loaibaiviet.them")->with('data',$danh_muc_bai_viets)->with('message','Thêm thành công');
                }
                catch(Exception $e){
                    DB::rollback();
                }
            }
        }
        $danh_muc_bai_viets=DanhMucBaiViet::all();
        return view("admin.pages.loaibaiviet.them")->with('data',$danh_muc_bai_viets)->with('message','Thêm thất bại vui lòng thử lại');
    }
    return view('admin.pages.error403');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(request()->session()->get('quyen_loai_bai_viet'))
        {
        $loai_bai_viet=LoaiBaiViet::find($id);
        if(!empty($loai_bai_viet)){

            $danh_muc_bai_viets=DanhMucBaiViet::all();
            return view("admin.pages.loaibaiviet.sua")->with('data',$danh_muc_bai_viets)->with('data_loai_bai_viet',$loai_bai_viet)->with('id',$id);
        }
        return redirect("quantri/loaibaiviet/danhsach");
    }
    return view('admin.pages.error403');
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
        if(request()->session()->get('quyen_loai_bai_viet'))
        {
        $loai_bai_viet=LoaiBaiViet::find($id);
        if(!empty($loai_bai_viet)){
            try{
                DB::beginTransaction();
                $loai_bai_viet->id_danh_muc_bai_viet=$request->input('id_danh_muc_bai_viet');
                if($request->input('ten')!="")$loai_bai_viet->ten=$request->input('ten');
                $loai_bai_viet->save();
                $danh_muc_bai_viets=DanhMucBaiViet::all();
                DB::commit();
                return view("admin.pages.loaibaiviet.sua")->with('data',$danh_muc_bai_viets)->with('data_loai_bai_viet',$loai_bai_viet)->with('message',"Sửa thành công")->with('id',$id);
            }
            catch(Exception $e){
                DB::rollback();
            }
        }
        $danh_muc_bai_viets=DanhMucBaiViet::all();
        return view("admin.pages.loaibaiviet.sua")->with('data',$danh_muc_bai_viets)->with('data_loai_bai_viet',$loai_bai_viet)->with('message',"Sửa thất bại bạn vui lòng thử lại")->with('id',$id);
    }
    return view('admin.pages.error403');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(request()->session()->get('quyen_loai_bai_viet'))
        {
        $loai_bai_viet=LoaiBaiViet::find($id);
        $loai_bai_viets=LoaiBaiViet::all();
        if(!empty($loai_bai_viet)){
            try{
                DB::beginTransaction();
                $loai_bai_viet->delete();
                DB::commit();
                return view("admin.pages.loaibaiviet.danhsach")->with('data',$loai_bai_viets)->with('message','Xóa thành công');
            }
            catch(Exception $e){
            DB::rollback();
            }

        }
        return view("admin.pages.loaibaiviet.danhsach")->with('data',$loai_bai_viets)->with('message','Xóa thất bại');
    }
    return view('admin.pages.error403');
    }
}
