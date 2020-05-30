<?php

use Illuminate\Support\Facades\Route;

// --------------- NGƯỜI DÙNG --------------- //

Route::group(['prefix'=>''] , function(){
    Route::get('', function () {
        return redirect()->route('trangchinh');
    });
    Route::get('trang-chu','User\HomeController@show')->name('trangchinh');
    Route::get('bai-viet/{tenkhongdau}a{id}','User\BaiVietController@getBaiViet');
    Route::get('loai-bai-viet/{tenkhongdau}a{id}','User\LoaiBaiVietController@getLoaiBaiViet');
    Route::get('lien-he','User\ThongTinLienHeController@getLienHe');
    Route::post('lien-he','User\ThongTinLienHeController@postLienHe');
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
        Route::post('them','Admin\DanhMucBaiVietController@store');
        Route::get('chinhsua/{id}','Admin\DanhMucBaiVietController@edit');
        Route::post('chinhsua/{id}','Admin\DanhMucBaiVietController@update');
        Route::get('xoa/{id}','Admin\DanhMucBaiVietController@destroy');
    });
    Route::group(['prefix'=>'loaibaiviet'] , function(){
        Route::get('danhsach','Admin\LoaiBaiVietController@index');
        Route::get('themview','Admin\LoaiBaiVietController@indexThemView');
        Route::post('them','Admin\LoaiBaiVietController@store');
        Route::get('chinhsua/{id}','Admin\LoaiBaiVietController@edit');
        Route::post('chinhsua/{id}','Admin\LoaiBaiVietController@update');
        Route::get('xoa/{id}','Admin\LoaiBaiVietController@destroy');
    });

    //lien_he

    Route::group(['prefix'=>'gochoidap'] , function(){
        Route::get('hotro','Admin\HoTroController@indexDanhSachHoTro');
        Route::get('hotro/xoa/{id}','Admin\HoTroController@destroyHoTro');
        Route::post('hotro/changeisread','Admin\HoTroController@changeIsRead');
    });

//loi404
    Route::get('loi404','Admin\AdminController@loi404');


});












//----------------------------------------------//
