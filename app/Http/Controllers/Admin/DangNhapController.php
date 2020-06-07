<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB, Auth,Session;
use Mail;
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

            // $req->session()->put('quyen_trang_gioi_thieu', $user[0]->trang_gioi_thieu);
            // $req->session()->put('quyen_danh_muc_bai_viet', $user[0]->danh_muc_bai_viet);
            $req->session()->put('quyen_loai_bai_viet', $user[0]->loai_bai_viet);
            $req->session()->put('quyen_loai_van_ban', $user[0]->loai_van_ban);
            $req->session()->put('quyen_van_ban', $user[0]->van_ban);
            $req->session()->put('quyen_media', $user[0]->media);
            $req->session()->put('quyen_loai_media', $user[0]->loai_media);
            $req->session()->put('quyen_slide', $user[0]->slide);
            $req->session()->put('quyen_goc_hoi_dap', $user[0]->goc_hoi_dap);
            $req->session()->put('quyen_loai_cap_bac', $user[0]->loai_cap_bac);
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
    // Xử lý xác thực tài khoản
    public function getQuenMatKhau(){
        return view('admin.pages.dangnhap.forgot_password');
    }
    public function postQuenMatKhau(Request $req){
        $this->validate(request(), [
            'email' => 'required'
        ]);
        $tim_tai_khoan = DB::table('users')->where('email','=',$req->email)->first();
        if($tim_tai_khoan != null){
                $chuoi_chuan = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $do_dai_chuoi_chuan = strlen($chuoi_chuan);
                $tao_chuoi_ngau_nhien = '';
                for ($i = 0; $i < 6; $i++) {
                    $tao_chuoi_ngau_nhien .= $chuoi_chuan[rand(0, $do_dai_chuoi_chuan - 1)];
                }
                // Thêm hoặc sửa bảng reset pass
                $password_resets = DB::table('password_resets')->where('email','=',$req->email)->first();
                if($password_resets != null){
                    $password_resets = DB::table('password_resets')->where('email','=',$req->email)
                    ->update(['token' => $tao_chuoi_ngau_nhien]);
                }
                else{
                    $password_resets = DB::table('password_resets')->insert(
                        ['email' => $req->email, 'token' => $tao_chuoi_ngau_nhien]
                    );
                }
                // Thiết lập gởi mail đi
                $data = [
                    'ten_hien_thi' => $tim_tai_khoan->ho_va_ten,'ma_xac_thuc' => $tao_chuoi_ngau_nhien,
                ];

                $user = [
                    'email' => $tim_tai_khoan->email,'view_name' => $tim_tai_khoan->ho_va_ten,
                ];

                Mail::send('admin.pages.mail.reset_pass', $data, function($msg) use ($tim_tai_khoan){
                    $msg->from('khoamamnon.hotro.ued.udn@gmail.com',"Khoa Giáo dục - Mầm non - Trường Đại học Sư phạm Đà Nẵng");
                    $msg->to($tim_tai_khoan->email, $tim_tai_khoan->ho_va_ten)
                    ->subject('Yêu cầu xác thực tài khoản!');
                });

                Session::put('goi_email_xac_thuc', $tim_tai_khoan->email);
                Session::put('thong_bao_xac_thuc', 'Một mã xác thực được gởi tới Email của bạn, vui lòng kiểm tra hộp thư!');

                return redirect('quen-mat-khau/xac-thuc-ma');
        }
        return back()->with('loi_email_xac_thuc','Email tài khoản không tồn tại. Vui lòng kiểm tra lại!');
    }
    public function getXacThucMatKhau(){
        if(Session::has('thong_bao_xac_thuc')){
            return view('admin.pages.dangnhap.verification');
        }
        return redirect('dang-nhap');
    }
    public function postNhapMaXacThuc(Request $req){
        $email = Session::get('goi_email_xac_thuc');
        if($email != null){
            $tai_khoan_xac_thuc = DB::table('password_resets')
            ->where('email','=',$email)
            ->where('token','=',$req->ma_xac_thuc)
            ->first();
            if($tai_khoan_xac_thuc != null){
                Session::put('email_doi_pass', $email);
                Session::forget('thong_bao_xac_thuc');
                Session::forget('goi_email_xac_thuc');
                return redirect('quen-mat-khau/thay-doi-mat-khau.html');
            }
            return back()->with('loi_nhap_xac_thuc','Mã xác thực không đúng, vui lòng kiểm tra lại!');
        }
        return redirect('dang-nhap');
    }
    public function getThayDoiMatKhau(){
        if(Session::has('email_doi_pass') && (!Session::has('thong_bao_xac_thuc'))){
            return view('admin.pages.dangnhap.reset_pass');
        }
        return redirect('dang-nhap');
    }
    public function postThayDoiMatKhau(Request $req){
        $doi_ma_moi = DB::table('users')
        ->where('email','=',$req->email)
        ->update(['password' => bcrypt($req->mat_khau_moi)]);
        if($doi_ma_moi){
            Session::forget('email_doi_pass');
        }
        return $doi_ma_moi ? 'true' : 'false';
    }
}
