<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\VanBan;
use App\LoaiVanBan;
use Session,DB;
class VanBanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if(request()->session()->get('quyen_cau_hinh_website'))
        {
        $van_ban = VanBan::where('id_loai_van_ban',$id)->orderby('id','desc')->get();
        return view('admin.pages.vanban.danhsach')->with('data',$van_ban);
    }
    return view('admin.pages.error403');
    }
    public function indexThemView()
    {
        if(request()->session()->get('quyen_cau_hinh_website'))
        {
        $loai_van_ban = LoaiVanBan::all();
        return view("admin.pages.vanban.them")->with('data',$loai_van_ban);
    }
    return view('admin.pages.error403');
    }
    public function changeKey($len)
    {
        $s="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $anw="";
        for($i=0;$i<$len;$i++){
            $anw.=$s[rand(0,61)];
        }
        return $anw;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(request()->session()->get('quyen_cau_hinh_website'))
        {
        $van_ban=new VanBan();
        try{

            if($request->input('ten')!=""){
                $van_ban->ten=$request->input('ten');
            }
            else $van_ban->ten="chưa nhập";
                if($request->hasFile('doc_file')){
                    $doc_file = $request->file('doc_file');
                    $doc_file_extension = $doc_file->getClientOriginalExtension();
                    $doc_file_name =$doc_file->getClientOriginalName();
                    $random_file_name = $this->changeKey(4).'_'.$doc_file_name;
                    while(file_exists('public/upload/documents/'.$random_file_name))
                    {
                        $doc_file_name = $this->changeKey(4).'_'.$doc_file_name;
                    }
                    $doc_file->move('public/upload/documents/',$random_file_name);
                    $van_ban->file='public/upload/documents/'.$random_file_name;
                }
                $loai_van_ban=LoaiVanBan::find($request->input('loai_van_ban'));
                if(!empty($loai_van_ban)){
                    $van_ban->id_loai_van_ban=$request->input('loai_van_ban');
                    DB::beginTransaction();
                    $van_ban->save();
                    DB::commit();
                    $loai_van_ban= LoaiVanBan::all();
                    return view("admin.pages.vanban.them")->with('data',$loai_van_ban)->with('message','Thêm thành công');
                }


            }
        catch(Exception $e){
            DB::rollback();
        }
        $loai_van_ban= LoaiVanBan::all();
        return view("admin.pages.vanban.them")->with('data',$loai_van_ban)->with('message','Thêm thất bại');
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
        if(request()->session()->get('quyen_cau_hinh_website'))
        {
        $vanban= VanBan::find($id);
        if(!empty($vanban)){
            return view("admin.pages.vanban.chinhsua")->with('data',$vanban)->with('id',$id);;
        }
        return redirect('/quantri/vanban/danhsach');
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
        if(request()->session()->get('quyen_cau_hinh_website'))
        {
        $van_ban= VanBan::find($id);
        if(!empty($van_ban)){
            try{
                DB::beginTransaction();
                if($request->input('ten')!=""){
                    $van_ban->ten=$request->input('ten');
                }
                if($request->hasFile('doc_file')){
                        $doc_file = $request->file('doc_file');

                        $doc_file_extension = $doc_file->getClientOriginalExtension();
                        $doc_file_name = $doc_file->getClientOriginalName();
                        $random_file_name = $this->changeKey(4).'_'.$doc_file_name;
                        while(file_exists('public/upload/documents/'.$random_file_name))
                        {
                            $random_file_name = $this->changeKey(4).'_'.$img_file_name;
                        }

                        $doc_file->move('public/upload/documents/',$random_file_name);
                        $van_ban->anh_mo_ta='public/upload/documents/'.$random_file_name;
                    }
                    $van_ban->save();
                    DB::commit();
                    return view("admin.pages.vanban.chinhsua")->with('data',$van_ban)->with('id',$id)->with('message','Sửa thành công');
                }
            catch(Exception $e){
                DB::rollback();
            }

        }
        return redirect('/quantri');
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
        if(request()->session()->get('quyen_cau_hinh_website'))
        {
        $vanban= VanBan::find($id);
        if(!empty($vanban)){
            try{
                DB::beginTransaction();
                $vanban->delete();
                DB::commit();
                $vanban= vanban::all();
                return view("admin.pages.vanban.danhsach")->with('data',$vanban)->with('message','Xóa thành công');
            }
            catch(Exception $e){
                DB::rollback();
            }
        }
        $vanban= vanban::all();
        return view("admin.pages.vanban.danhsach")->with('data',$vanban)->with('message','Xóa thất bại');
    }
    return view('admin.pages.error403');
    }
}
