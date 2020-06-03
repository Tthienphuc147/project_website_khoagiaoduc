<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slides;
use Session;
class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->session()->get('quyen_slide'))
        {
        $slides = Slides::all();
        return view('admin.pages.slides.danhsach')->with('data',$slides);
    }
    return view('admin.pages.error403');
    }
    public function indexThemView(){

        if(request()->session()->get('quyen_slide'))
        {
        return view('admin.pages.slides.them');
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

        if(request()->session()->get('quyen_slide'))
        {
        $allRequest = $request->all();
        if ($allRequest['link'])  $link=$allRequest['link'];
        else $link="#";
        $get_random_name = '';
	    if($request->hasFile('image')){
            //Hàm kiểm tra dữ liệu
            $this->validate($request,
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ],
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'image.max' => 'Hình giới hạn dung lượng không quá 2M',
                ]
            );
            $hinh_anh = $request->file('image');
            $get_random_name = time().'_'.$hinh_anh->getClientOriginalName();
            $path = public_path('upload/slide');
            $hinh_anh->move($path, $get_random_name);
            $slide = new Slides();
            $slide -> ten = $allRequest['ten'];
            $slide -> link = $link;
            $slide -> url_image = $get_random_name;
            $slide -> save();
            Session::flash('success', 'Thêm thành công!');

        }
        return view('admin.pages.slides.them');
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
        if(request()->session()->get('quyen_slide'))
        {
        $slide = Slides::find($id);
        if ($slide)
            return view('admin.pages.slides.sua')->with('data',$slide)->with('id',$id);
        return view('admin.pages.error404');
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
        if(request()->session()->get('quyen_slide'))
        {
        $allRequest = $request->all();
        if ($allRequest['link'])  $link=$allRequest['link'];
        else $link="#";
        $get_random_name = '';
        $slide = Slides::find($id);
        if($request->hasFile('image')){
            //Hàm kiểm tra dữ liệu
            $this->validate($request,
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ],
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'image.max' => 'Hình giới hạn dung lượng không quá 2M',
                ]
            );
            $hinh_anh = $request->file('image');
            $get_random_name = time().'_'.$hinh_anh->getClientOriginalName();
            $path = public_path('upload/slide');
            $hinh_anh->move($path, $get_random_name);
            $slide -> ten = $allRequest['ten'];
            $slide -> link = $link;
            $slide -> url_image = $get_random_name;
            $slide -> save();
            Session::flash('success', 'Update thành công!');
        }
        return view("admin.pages.slides.sua")->with('data',$slide)->with('id',$id);
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
        if(request()->session()->get('quyen_slide'))
        {
        $slide = Slides::find($id);
        if ($slide) {
            $slide->delete();
            Session::flash('success', 'Xóa thành công');
        }
        else return view("admin.pages.error404");
        return redirect("quantri/slides/danhsach");
    }
    return view('admin.pages.error403');
    }
}
