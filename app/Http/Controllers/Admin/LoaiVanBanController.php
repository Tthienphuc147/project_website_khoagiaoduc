<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LoaiVanBan;
use Session;

class LoaiVanBanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->session()->get('quyen_loai_van_ban'))
        {

        $loai_van_ban = LoaiVanBan::all();
        return view("admin.pages.loaivanban.danhsach")->with('data',$loai_van_ban);
    }
    return view('admin.pages.error403');
    }
    /**
     * view Them loai van ban
     *
     * */
    public function indexThemView()
    {
        if(request()->session()->get('quyen_loai_van_ban'))
        {
        return view("admin.pages.loaivanban.them");
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
        if(request()->session()->get('quyen_loai_van_ban'))
        {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        try{
            $loai_van_ban = new LoaiVanBan();
            $loai_van_ban->ten = $request ->ten;
            $loai_van_ban->created_at = date('Y-m-d H:i:s');
            $loai_van_ban->updated_at = date('Y-m-d H:i:s');
            $loai_van_ban->save();
            Session::flash('success', 'Thêm mới loại văn bản thành công!');
        }
        catch (Exception $e){
            Session::flash('error', 'Thêm thất bại!');
        } finally{
            return view("admin.pages.loaivanban.them");
        }
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
        if(request()->session()->get('quyen_loai_van_ban'))
        {
        $loai_van_ban = LoaiVanBan::find($id);
        if ($loai_van_ban) return view("admin.pages.loaivanban.sua") -> with('ten', $loai_van_ban->ten) -> with('id', $id);
        return view("admin.pages.error404");
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
        if(request()->session()->get('quyen_loai_van_ban'))
        {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        try{
            $loai_van_ban = LoaiVanBan::find($id);
            $loai_van_ban->ten = $request->input('ten');
            $loai_van_ban->updated_at = date('Y-m-d H:i:s');
            $loai_van_ban->save();
            Session::flash('success', 'Sửa loại văn bản thành công!');
        } catch (Exception $e){
            Session::flash('error', 'Sửa thất bại!');
        } finally {
            return view("admin.pages.loaivanban.sua")->with('ten',$request->input('ten'))->with('id',$id);
        }
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
        if(request()->session()->get('quyen_loai_van_ban'))
        {
        $deleteData = LoaiVanBan::find($id);
        if (!empty($deleteData)){
            $deleteData->delete();
            Session::flash('success', 'Xóa thành công!');
        } else return view("admin.pages.error404");
        return Redirect("quantri/loaivanban/danhsach");
    }
    return view('admin.pages.error403');
    }

}
