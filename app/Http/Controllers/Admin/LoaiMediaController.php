<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LoaiMedia;
use Session;
class LoaiMediaController extends Controller
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

        $loai_media = LoaiMedia::all();
        return view("admin.pages.loaimedia.danhsach")->with('data',$loai_media);
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
        return view("admin.pages.loaimedia.them");
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
            $loai_media = new LoaiMedia();
            $loai_media->ten = $request ->ten;
            $loai_media->created_at = date('Y-m-d H:i:s');
            $loai_media->updated_at = date('Y-m-d H:i:s');
            $loai_media->save();
            Session::flash('success', 'Thêm thành công!');
        }
        catch (Exception $e){
            Session::flash('error', 'Thêm thất bại!');
        } finally{
            return view("admin.pages.loaimedia.them");
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
        $loai_media = LoaiMedia::find($id);
        if ($loai_media) return view("admin.pages.loaimedia.sua") -> with('ten', $loai_media->ten) -> with('id', $id);
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
            $loai_media = LoaiMedia::find($id);
            $loai_media->ten = $request->input('ten');
            $loai_media->updated_at = date('Y-m-d H:i:s');
            $loai_media->save();
            Session::flash('success', 'Sửa thành công!');
        } catch (Exception $e){
            Session::flash('error', 'Sửa thất bại!');
        } finally {
            return view("admin.pages.loaimedia.sua")->with('ten',$request->input('ten'))->with('id',$id);
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
        $deleteData = LoaiMedia::find($id);
        if (!empty($deleteData)){
            $deleteData->delete();
            Session::flash('success', 'Xóa thành công!');
        } else return view("admin.pages.error404");
        return Redirect("quantri/loaimedia/danhsach");
    }
    return view('admin.pages.error403');
    }
}
