<?php

use Illuminate\Support\Facades\Route;

// --------------- NGƯỜI DÙNG --------------- //

Route::group(['prefix'=>''] , function(){
    Route::get('', function () {
        return redirect()->route('trangchinh');
    });
    Route::get('trang-chu','User\HomeController@show')->name('trangchinh');
    Route::get('bai-viet/a{id}','User\BaiVietController@getBaiViet');
    Route::get('thong-diep','User\BaiVietController@getThongDiep');
    Route::get('lich-su','User\BaiVietController@getLichSu');
    Route::get('co-cau','User\CoCauController@showCoCau');
    Route::get('loai-bai-viet/{id}','User\LoaiBaiVietController@getLoaiBaiViet');
    Route::get('lien-he','User\ThongTinLienHeController@getLienHe');
    Route::post('lien-he','User\ThongTinLienHeController@postLienHe');
    Route::post('tim-kiem','User\LiveSearchController@getSearch');
});
// ----------------------------------------- //








// --------------- QUẢN TRỊ --------------- //
Route::group(['prefix'=>'quantri'] , function(){
    Route::get('dangnhap', 'Admin\DangNhapController@getDangNhapQuanTri');
    Route::post('dangnhap','Admin\DangNhapController@postDangNhapQuanTri');

});

//check login admin
Route::group(['prefix'=>'quantri','middleware'=>'check.login.admin'] , function(){
    Route::get('trangchu','Admin\AdminController@trangchu')->name('trangchu');

    Route::get('', function () {
        return redirect()->route('trangchu');
    });
    Route::get('dangxuat','Admin\DangNhapController@getLogoutAdmin');
    //danh_muc_bai_viet
    Route::group(['prefix'=>'danhmucbaiviet'] , function(){
        Route::get('danhsach','Admin\DanhMucBaiVietController@index');
        Route::get('themview','Admin\DanhMucBaiVietController@indexThemView');
        Route::post('them','Admin\DanhMucBaiVietController@store');
        Route::get('chinhsua/{id}','Admin\DanhMucBaiVietController@show');
        Route::post('chinhsua/{id}','Admin\DanhMucBaiVietController@update');
        Route::get('xoa/{id}','Admin\DanhMucBaiVietController@destroy');
    });
    //loai_van_ban
    Route::group(['prefix' => 'loaivanban'] , function(){
        Route::get('danhsach', 'Admin\LoaiVanBanController@index');
        Route::get('themview', 'Admin\LoaiVanBanController@indexThemView');
        Route::post ('them','Admin\LoaiVanBanController@store');
        Route::get('chinhsua/{id}','Admin\LoaiVanBanController@show');
        Route::post('chinhsua/{id}','Admin\LoaiVanBanController@update');
        Route::get('xoa/{id}','Admin\LoaiVanBanController@destroy');
    });
    //van_ban
    Route::group(['prefix' => 'vanban'], function(){
        Route::get('danhsach/{id}', 'Admin\VanBanController@index');
        Route::get('themview', 'Admin\VanBanController@indexThemView');
        Route::post ('them','Admin\VanBanController@store');
        Route::get('chinhsua/{id}','Admin\VanBanController@show');
        Route::post('chinhsua/{id}','Admin\VanBanController@update');
        Route::get('xoa/{id}','Admin\VanBanController@destroy');
    });
    //slides
    Route::group(['prefix' => 'slides'], function(){
        Route::get('danhsach', 'Admin\SlidesController@index');
        Route::get('themview', 'Admin\SlidesController@indexThemView');
        Route::post ('them','Admin\SlidesController@store');
        Route::get('chinhsua/{id}','Admin\SlidesController@show');
        Route::post('chinhsua/{id}','Admin\SlidesController@update');
        Route::get('xoa/{id}','Admin\SlidesController@destroy');
    });
    Route::group(['prefix'=>'loaibaiviet'] , function(){
        Route::get('danhsach','Admin\LoaiBaiVietController@index');
        Route::get('themview','Admin\LoaiBaiVietController@indexThemView');
        Route::post('them','Admin\LoaiBaiVietController@store');
        Route::get('chinhsua/{id}','Admin\LoaiBaiVietController@show');
        Route::post('chinhsua/{id}','Admin\LoaiBaiVietController@update');
        Route::get('xoa/{id}','Admin\LoaiBaiVietController@destroy');
    });
    Route::group(['prefix'=>'cauhinh'] , function(){
        Route::get('chinhsua','Admin\CauHinhWebsiteController@show');
        Route::post('chinhsua','Admin\CauHinhWebsiteController@update');
    });
    Route::group(['prefix'=>'lichcongtac'] , function(){
        Route::get('danhsach','Admin\LichCongTacController@index');
        Route::get('themview','Admin\LichCongTacController@indexThemView');
        Route::post('them','Admin\LichCongTacController@store');
        Route::get('chinhsua/{id}','Admin\LichCongTacController@show');
        Route::post('chinhsua/{id}','Admin\LichCongTacController@update');
        Route::get('xoa/{id}','Admin\LichCongTacController@destroy');
    });
    Route::group(['prefix'=>'baiviet'] , function(){
        Route::get('danhsach/{id}','Admin\BaiVietController@index');
        Route::get('themview','Admin\BaiVietController@indexThemView');
        Route::post('them','Admin\BaiVietController@store');
        Route::get('chinhsua/{id1}','Admin\BaiVietController@show');
        Route::post('chinhsua/{id1}','Admin\BaiVietController@update');
        Route::get('xoa/{id}/{id1}','Admin\BaiVietController@destroy');
    });
    Route::group(['prefix'=>'media'] , function(){
        Route::get('danhsach','Admin\MediaController@index');
        Route::get('themview','Admin\MediaController@indexThemView');
        Route::post('them','Admin\MediaController@store');
        Route::get('chinhsua/{id1}','Admin\MediaController@show');
        Route::post('chinhsua/{id1}','Admin\MediaController@update');
        Route::get('xoa/{id}','Admin\MediaController@destroy');
    });

    //lien_he

    Route::group(['prefix'=>'gochoidap'] , function(){
        Route::get('hotro','Admin\HoTroController@indexDanhSachHoTro');
        Route::get('hotro/xoa/{id}','Admin\HoTroController@destroyHoTro');
        Route::post('hotro/changeisread','Admin\HoTroController@changeIsRead');
    });

    //quan_ly_tai_khoan
    Route::group(['prefix'=>'quantrivien'] , function(){
        Route::get('danhsach','Admin\QuanTriVienController@index');
        Route::get('them','Admin\QuanTriVienController@create');
        Route::post('them','Admin\QuanTriVienController@store');
        Route::get('xoa/{id}','Admin\QuanTriVienController@destroy');
        Route::get('chinhsua/{id}','Admin\QuanTriVienController@edit');
        Route::post('chinhsua/{id}','Admin\QuanTriVienController@update');
        Route::get('phanquyen/{id}','Admin\QuanTriVienController@getPermission');
        Route::post('phanquyen/{id}','Admin\QuanTriVienController@updatePermission');
    });

//loi404
    Route::get('loi404','Admin\AdminController@loi404');


});












//----------------------------------------------//
