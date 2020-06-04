<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Exception;
use Mail;
class HoTroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexDanhSachHoTro()
    {
        if(request()->session()->get('quyen_goc_hoi_dap'))
        {
        $status = false;
        try {
            $ho_tro = DB::table('lien_he')
                ->orderBy('id', 'DESC')
                ->get();
            $status = true;
        } catch (Exception $e) {
            $status = false;
        }

        return $status
            ? view("admin.pages.lienhe.danhsach", compact("ho_tro"))
            : redirect('quantri/loi404');
        }
        return view('admin.pages.error403');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyHoTro($id)
    {
        if(request()->session()->get('quyen_goc_hoi_dap'))
        {
        $status = false;
        DB::beginTransaction();
        try {
            DB::table('ho_tros')
                ->where('id', $id)
                ->delete();
            DB::commit();
            $status = true;
        } catch (Exception $e) {
            DB::rollback();
            $status = false;
        }
        return response()->json([
            'status' => $status
        ]);
    }
    return view('admin.pages.error403');
    }


    public function viewContact($id)
    {
        if(request()->session()->get('quyen_goc_hoi_dap'))
        {
        $status = false;
        try {
            $ho_tro = DB::table('lien_he')
                ->where('id',$id)
                ->first();
            $status = true;
        } catch (Exception $e) {
            $status = false;
        }

        return $status
            ? view("admin.pages.lienhe.chinhsua", compact("ho_tro"))
            : redirect('quantri/loi404');
        }
        return view('admin.pages.error403');
    }
    public function sendContact(Request $req, $id)
    {
        if(request()->session()->get('quyen_goc_hoi_dap'))
        {
            $tim_lien_he = DB::table('lien_he')->where('id','=',$id)->first();
            $ho_tro = [ 'phan_hoi' => $req->phan_hoi];
            Mail::send('admin.pages.mail.phan_hoi',$ho_tro, function($msg) use ($tim_lien_he){
                $msg->from('khoamamnon.hotro.ued.udn@gmail.com',"Khoa giáo dục - mầm non");
                $msg->to($tim_lien_he->email, $tim_lien_he->ten)
                ->subject('Gửi liên hệ phản hồi');
            });
            DB::table('lien_he')
			->where('id', $id)
			->update(['is_read' => 1]);
            return redirect('/quantri/gochoidap/hotro');
        }
        return view('admin.pages.error403');
    }

}
