<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB, Auth,Session;

class DangNhapController extends Controller
{
    public function getDangNhapQuanTri(){
        if(Auth::guard('web')->check()){
            return redirect('quantri/trangchu');
        }

    	return view('admin.pages.dangnhap.login');
    }

    public function postDangNhapQuanTri(Request $req){
    	$login = filter_var($req->tai_khoan, FILTER_VALIDATE_EMAIL) ? 'email' : 'ten_dang_nhap';
        $payload[$login] = $req->tai_khoan;
        $payload['password'] = $req->mat_khau;
        if (Auth::guard('web')->attempt($payload, $req->ghi_nho)) {
            $user =  DB::table('phan_quyens')
            ->select(
                'phan_quyens.*'
            )->where('phan_quyens.id_admin',Auth::guard('web')->user()->id)->get();

            $req->session()->put('quyen_trang_gioi_thieu', $user[0]->trang_gioi_thieu);
            $req->session()->put('quyen_danh_muc_bai_viet', $user[0]->danh_muc_bai_viet);
            $req->session()->put('quyen_loai_bai_viet', $user[0]->loai_bai_viet);
            $req->session()->put('quyen_loai_van_ban', $user[0]->loai_van_ban);
            $req->session()->put('quyen_van_ban', $user[0]->van_ban);
            $req->session()->put('quyen_media', $user[0]->media);
            $req->session()->put('quyen_slide', $user[0]->slide);
            $req->session()->put('quyen_goc_hoi_dap', $user[0]->goc_hoi_dap);
            $req->session()->put('quyen_tai_khoan', $user[0]->tai_khoan);
            $req->session()->put('quyen_lich_cong_tac', $user[0]->lich_cong_tac);
            $req->session()->put('quyen_cau_hinh_website', $user[0]->cau_hinh_website);
            return 'quantri/trangchu';
        } else {
            return "false";
        }
    }
    public function getLogoutAdmin(Request $req){
        Auth::guard('web')->logout();
        $req->session()->flush();
    	return redirect('quantri/dangnhap');
    }
}
