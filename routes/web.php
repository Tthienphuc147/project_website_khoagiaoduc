<?php

use Illuminate\Support\Facades\Route;

// --------------- NGƯỜI DÙNG --------------- //



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
});
