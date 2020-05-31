<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Media;
use App\LoaiMedia;
use DB;
class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $media= Media::all();
        return view("admin.pages.media.danhsach")->with('data',$media);
    }
    public function indexThemView()
    {
        return view("admin.pages.media.them");
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
        if(request()->session()->get('quyen_media'))
        {

        $media=new Media();
        try{
            DB::beginTransaction();
            if($request->hasFile('img_file')){
                $img_file = $request->file('img_file');

                $img_file_extension = $img_file->getClientOriginalExtension();
                $img_file_name = $img_file->getClientOriginalName();
                $random_file_name = $this->changeKey(4).'_'.$img_file_name;
                while(file_exists('upload/image/'.$random_file_name))
                {
                    $random_file_name = $this->changeKey(4).'_'.$img_file_name;
                }

                $img_file->move('upload/image/',$random_file_name);
                $media->url='upload/image/'.$random_file_name;
            }
            $media->save();
            DB::commit();
            return view("admin.pages.media.them")->with('message','Thêm thành công');
        }
        catch(Exception $e){
            DB::rollback();
        }
        return view("admin.pages.media.them")->with('message','thêm thất bại');

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
        if(request()->session()->get('quyen_media'))
        {
        $media= Media::find($id);
        if(!empty($media)){
            return view("admin.pages.media.sua")->with('data',$media);
        }
        return redirect('/quantri/media/danhsach');
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
        if(request()->session()->get('quyen_media'))
        {
        $media= Media::find($id);
        if(!empty($media)){
            try{
                DB::beginTransaction();
                if($request->hasFile('img_file')){
                    $img_file = $request->file('img_file');

                    $img_file_extension = $img_file->getClientOriginalExtension();
                    $img_file_name = $img_file->getClientOriginalName();
                    $random_file_name = $this->changeKey(4).'_'.$img_file_name;
                    while(file_exists('upload/image/'.$random_file_name))
                    {
                        $random_file_name = $this->changeKey(4).'_'.$img_file_name;
                    }

                    $img_file->move('upload/image/',$random_file_name);
                    $media->url='upload/image/'.$random_file_name;
                }
                $media->save();
                DB::commit();
                return view("admin.pages.media.sua")->with('data',$media)->with('message','Sửa thành công');
            }
            catch(Exception $e){
                DB::rollback();
            }
        }
        return redirect('/quantri/media/danhsach');
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
        if(request()->session()->get('quyen_media'))
        {
        $media= Media::find($id);
        if(!empty($media)){
            try{
                DB::beginTransaction();
                $media->delete();
                DB::commit();
                $media= Media::all();
                return view("admin.pages.media.danhsach")->with('data',$media)->with('message','Xóa thành công');
            }
            catch(Exception $e){
                DB::rollback();
            }
        }
        $media= Media::all();
        return view("admin.pages.media.danhsach")->with('data',$media)->with('message','Xóa thất bại');
    }
    return view('admin.pages.error403');
    }
}
