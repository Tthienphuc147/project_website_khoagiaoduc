<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BaiViet;
use App\LoaiBaiViet;
use DB;

class BaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if(request()->session()->get('quyen_loai_bai_viet'))
        {
        $bai_viet= BaiViet::where('id_loai_bai_viet',$id)->orderby('id','desc')->get();
        return view("admin.pages.baiviet.danhsach")->with('data',$bai_viet)->with('id',$id);
        }
        return view('admin.pages.error403');
    }
    public function indexThemView()
    {
        if(request()->session()->get('quyen_loai_bai_viet'))
        {
        $loai_bai_viet= LoaiBaiViet::all();
        return view("admin.pages.baiviet.them")->with('data',$loai_bai_viet);
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
        $bai_viet=new BaiViet();
        try{

            if($request->input('tieu_de')!=""){
                $bai_viet->tieu_de=$request->input('tieu_de');
            }
            else $bai_viet->tieu_de="chưa nhập";
            if($request->input('tom_tat')!=""){
                $bai_viet->tom_tat=$request->input('tom_tat');
            }
            else $bai_viet->tom_tat="chưa nhập";
            if($request->input('noi_dung')!=""){
                $bai_viet->noi_dung=$request->input('noi_dung');
            }
            else $bai_viet->noi_dung="chưa nhập";
            if($request->input('noi_bat')!=""){
                $bai_viet->is_noi_bat=$request->input('noi_bat');
            }
            else $bai_viet->noi_bat=0;
            if($request->hasFile('img_file')){
                    $img_file = $request->file('img_file');

                    $img_file_extension = $img_file->getClientOriginalExtension();
                    $img_file_name = $img_file->getClientOriginalName();
                    $random_file_name = $this->changeKey(4).'_'.$img_file_name;
                    while(file_exists('public/upload/image/'.$random_file_name))
                    {
                        $random_file_name = $this->changeKey(4).'_'.$img_file_name;
                    }

                    $img_file->move('public/upload/image/',$random_file_name);
                    $bai_viet->hinh_anh_mo_ta='/public/public/upload/image/'.$random_file_name;
                }
                $loai_bai_viet=LoaiBaiViet::find($request->input('loai_bai_viet'));
                if(!empty($loai_bai_viet)){
                    $bai_viet->luot_xem=0;
                    $bai_viet->id_loai_bai_viet=$request->input('loai_bai_viet');
                    $bai_viet->id_user=1;// phuc tu thay doi cho nay
                    DB::beginTransaction();
                    $bai_viet->save();
                    DB::commit();
                    $loai_bai_viet= LoaiBaiViet::all();
                    return view("admin.pages.baiviet.them")->with('data',$loai_bai_viet)->with('message','Thêm thành công');
                }


            }
        catch(Exception $e){
            DB::rollback();
        }
        $loai_bai_viet= LoaiBaiViet::all();
        return view("admin.pages.baiviet.them")->with('data',$loai_bai_viet)->with('message','Thêm thất bại');
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
        $bai_viet= BaiViet::find($id);
        if(!empty($bai_viet)){
            return view("admin.pages.baiviet.sua")->with('data',$bai_viet)->with('id',$id);
        }
        return redirect('/quantri');
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
    public function changeKey($len)
    {
        $s="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $anw="";
        for($i=0;$i<$len;$i++){
            $anw.=$s[rand(0,61)];
        }
        return $anw;
    }
    public function update(Request $request, $id)
    {

        if(request()->session()->get('quyen_loai_bai_viet'))
        {
        $bai_viet= BaiViet::find($id);
        if(!empty($bai_viet)){
            try{
                DB::beginTransaction();
                if($request->input('tieu_de')!=""){
                    $bai_viet->tieu_de=$request->input('tieu_de');
                }
                if($request->input('tom_tat')!=""){
                    $bai_viet->tom_tat=$request->input('tom_tat');
                }
                if($request->input('noi_dung')!=""){
                    $bai_viet->noi_dung=$request->input('noi_dung');
                }
                if($request->input('noi_bat')!=""){
                    $bai_viet->is_noi_bat=$request->input('noi_bat');
                }
                if($request->hasFile('img_file')){
                        $img_file = $request->file('img_file');

                        $img_file_extension = $img_file->getClientOriginalExtension();
                        $img_file_name = $img_file->getClientOriginalName();
                        $random_file_name = $this->changeKey(4).'_'.$img_file_name;
                        while(file_exists('public/upload/image/'.$random_file_name))
                        {
                            $random_file_name = $this->changeKey(4).'_'.$img_file_name;
                        }

                        $img_file->move('public/upload/image/',$random_file_name);
                        $bai_viet->hinh_anh_mo_ta='/public/public/upload/image/'.$random_file_name;
                    }
                    $bai_viet->save();
                    DB::commit();
                    return view("admin.pages.baiviet.sua")->with('data',$bai_viet)->with('id',$id)->with('message','Sửa thành công');
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
    public function destroy($id,$id1)
    {
        if(request()->session()->get('quyen_loai_bai_viet'))
        {
        $bai_viet= BaiViet::find($id1);
        if(!empty($bai_viet)){
            try{
                DB::beginTransaction();
                $bai_viet->delete();
                DB::commit();
                $bai_viet= BaiViet::where('id_loai_bai_viet',$id)->orderby('id','desc')->get();
                return view("admin.pages.baiviet.danhsach")->with('data',$bai_viet)->with('id',$id)->with('message','Xóa thành công');

            }
            catch(Exception $e){
                DB::rollback();
            }
        }
        $bai_viet= BaiViet::where('id_loai_bai_viet',$id)->orderby('id','desc')->get();
        return view("admin.pages.baiviet.danhsach")->with('data',$bai_viet)->with('id',$id)->with('message','Xóa thất bại');
    }
    return view('admin.pages.error403');
    }
}
