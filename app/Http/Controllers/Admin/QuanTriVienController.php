<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB, Exception;
use App\QuanTriVien;
use App\CapBac;
use Session;
class QuanTriVienController extends Controller
{
    /**
     * Hiển thị danh sách quản trị viên.
     *
     * @return trang /quantri/quantrivien/danhsach
     */
    public function index()
    {
        if(request()->session()->get('quyen_tai_khoan'))
        {

        $status = false;
        try {
            $quan_tri_vien = DB::table('users')
                ->join('phan_quyens','phan_quyens.id_admin','=','users.id')
                ->orderBy('users.id', 'ASC')
                ->get();
            $status = true;
        } catch (Exception $e) {
            $status = false;
        }
        return $status
            ? view("admin.pages.quantrivien.danhsach", compact("quan_tri_vien"))
            : redirect('quantri/loi404');
        }
        return view('admin.pages.error403');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(request()->session()->get('quyen_tai_khoan'))
        {
        $cap_bac= CapBac::all();
        return view("admin.pages.quantrivien.them")->with('data',$cap_bac);
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
        if(request()->session()->get('quyen_tai_khoan'))
        {
        $this->validate(request(), [
            'ten_dang_nhap' => 'required',
            'ho_va_ten' => 'required',
            'password' => 'required|confirmed'
        ]);

        if ($request->hasFile('img_file')) {
            $imageName = '/public/public/upload/image/'.time().$request->img_file->getClientOriginalName();
            $request->img_file->move(public_path('public/upload/image/'), $imageName);
            $user = DB::table('users')->insert(
                [
                    'ten_dang_nhap' => $request->ten_dang_nhap,
                    'ho_va_ten' => $request->ho_va_ten,
                    'email' => $request->email,
                    'cap_bac' => $request->id_cap_bac,
                    'so_dien_thoai' => $request->so_dien_thoai,
                    'link' => $request->link,
                    'password' => bcrypt($request->password),
                    'avatar' => $imageName,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]
            );
        }

        $admin = DB::table('users')->orderBy('created_at', 'DESC')->get();
        $phan_quyen = DB::table('phan_quyens')->insert(
            [
                'id_admin' => $admin[0]->id
            ]
        );
        return $user
            ? redirect('quantri/quantrivien/danhsach')
            : redirect('quantri/loi404');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->session()->get('quyen_tai_khoan'))
        {
        $status = false;

         try {
            $data= CapBac::all();
             $admins = DB::table('users')->join('cap_bac','users.cap_bac','=','cap_bac.id')
             ->select('users.*','cap_bac.ten as ten_cap_bac')
             ->where('users.id','=',$id)
             ->first();
             if($admins) $status = true;
         } catch (Exception $e) {
             $status = false;
         }
         return $status
             ? view("admin.pages.quantrivien.chinhsua", compact('data','admins'))
             : redirect('quantri/loi404');
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
        if(request()->session()->get('quyen_tai_khoan'))
        {
        $quan_tri_vien=QuanTriVien::find($id);
        if(!empty($quan_tri_vien)){
            try{
                $data= CapBac::all();
                if($request->hasFile('img_file')) {
                    $imageName = '/public/public/upload/image/'.time().$request->img_file->getClientOriginalName();
                    $request->img_file->move(public_path('public/upload/image/'), $imageName);
                    DB::beginTransaction();
                    if($request->input('ten_dang_nhap')!="")$quan_tri_vien->ten_dang_nhap=$request->input('ten_dang_nhap');
                    if($request->input('ho_van_ten')!="")$quan_tri_vien->ho_va_ten=$request->input('ho_va_ten');
                    if($request->input('email')!="")$quan_tri_vien->email=$request->input('email');
                    if($request->input('id_cap_bac')!="")$quan_tri_vien->cap_bac=$request->input('id_cap_bac');
                    if($request->input('so_dien_thoai')!="")$quan_tri_vien->so_dien_thoai=$request->input('so_dien_thoai');
                    if($request->input('link')!="")$quan_tri_vien->link=$request->input('link');
                    $quan_tri_vien->avatar=$imageName;
                    $quan_tri_vien->save();
                    DB::commit();
                } else {
                        DB::beginTransaction();
                        if($request->input('ten_dang_nhap')!="")$quan_tri_vien->ten_dang_nhap=$request->input('ten_dang_nhap');
                        if($request->input('ho_van_ten')!="")$quan_tri_vien->ho_va_ten=$request->input('ho_va_ten');
                        if($request->input('id_cap_bac')!="")$quan_tri_vien->cap_bac=$request->input('id_cap_bac');
                        if($request->input('email')!="")$quan_tri_vien->email=$request->input('email');
                        if($request->input('so_dien_thoai')!="")$quan_tri_vien->so_dien_thoai=$request->input('so_dien_thoai');
                        if($request->input('link')!="")$quan_tri_vien->link=$request->input('link');
                        $quan_tri_vien->save();
                        DB::commit();
                        Session::flash('success', 'Sửa tài khoản thành công!');
                }
                return view("admin.pages.quantrivien.chinhsua")->with('admins',$quan_tri_vien)->with('data',$data);
            }
            catch(Exception $e){
                Session::flash('error', 'Sửa thất bại!');
                DB::rollback();
            }
        }
        return redirect("quantri");
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
        if(request()->session()->get('quyen_tai_khoan'))
        {
        $status = false;
        DB::beginTransaction();
        try {
            DB::table('users')
                ->where('id', $id)
                ->delete();
            DB::commit();
            $status = true;
        } catch (Exception $e) {
            DB::rollback();
            $status = false;
        }
        if($status){
            return redirect('quantri/quantrivien/danhsach');
        }
    }
    return view('admin.pages.error403');
    }
    public function getPermission($id){
        if(request()->session()->get('quyen_tai_khoan'))
        {
        $status = false;
         try {
             $permissions = DB::table('phan_quyens')->where('id_admin',$id)->first();
             if($permissions) $status = true;
         } catch (Exception $e) {
             $status = false;
         }
         return $status
             ? view("admin.pages.quantrivien.phanquyen", compact('permissions'))
             : redirect('quantri/loi404');
            }
            return view('admin.pages.error403');
    }
    public function updatePermission(Request $request, $id){
        if(request()->session()->get('quyen_tai_khoan'))
        {
        $status = false;
        DB::beginTransaction();
        try {
            DB::table('phan_quyens')
            ->where('id', $id)
            ->update([
                    'trang_gioi_thieu' => $request->trang_gioi_thieu,
                    'danh_muc_bai_viet' => $request->danh_muc_bai_viet,
                    'loai_bai_viet' => $request->loai_bai_viet,
                    'loai_van_ban' => $request->loai_van_ban,
                    'loai_van_ban' => $request->loai_van_ban,
                    'van_ban' => $request->van_ban,
                    'slide' => $request->slide,
                    'media' => $request->media,
                    'goc_hoi_dap' => $request->goc_hoi_dap,
                    'tai_khoan' => $request->tai_khoan,
                    'lich_cong_tac' => $request->lich_cong_tac,
                    'cau_hinh_website' => $request->cau_hinh_website,
                    'updated_at' => date("Y-m-d H:i:s")
                    ]);
            DB::commit();
            $status = true;
        } catch (Exception $e) {
            DB::rollback();
            $status = false;
        }

        return $status
            ? redirect('quantri/quantrivien/danhsach')->with('thongbaosuaquyenthanhcong', "a")
            : redirect('quantri/quantrivien/danhsach')->with('thongbaosuathatbai', "a");
        }
        return view('admin.pages.error403');
    }
}
