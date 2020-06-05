<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use DB, View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer('user/*', function ($view) {
            $all_share_danh_muc_tin_tuc = DB::table('danh_muc_bai_viets')
            ->join('loai_bai_viets','loai_bai_viets.id_danh_muc_bai_viet','=','danh_muc_bai_viets.id')
            ->where('danh_muc_bai_viets.id','=','1')
            ->select('loai_bai_viets.*')
            ->get();
            $all_share_danh_muc_dao_tao = DB::table('danh_muc_bai_viets')
            ->join('loai_bai_viets','loai_bai_viets.id_danh_muc_bai_viet','=','danh_muc_bai_viets.id')
            ->where('danh_muc_bai_viets.id','=','2')
            ->select('loai_bai_viets.*')
            ->orderBy('created_at','ASC')
            ->get();
            $all_share_danh_muc_ngkh = DB::table('danh_muc_bai_viets')
            ->join('loai_bai_viets','loai_bai_viets.id_danh_muc_bai_viet','=','danh_muc_bai_viets.id')
            ->where('danh_muc_bai_viets.id','=','3')
            ->select('loai_bai_viets.*')
            ->get();
            $all_share_danh_muc_hoc_lieu = DB::table('danh_muc_bai_viets')
            ->join('loai_bai_viets','loai_bai_viets.id_danh_muc_bai_viet','=','danh_muc_bai_viets.id')
            ->where('danh_muc_bai_viets.id','=','4')
            ->select('loai_bai_viets.*')
            ->get();
            $all_share_danh_muc_sinh_vien = DB::table('danh_muc_bai_viets')
            ->join('loai_bai_viets','loai_bai_viets.id_danh_muc_bai_viet','=','danh_muc_bai_viets.id')
            ->where('danh_muc_bai_viets.id','=','5')
            ->select('loai_bai_viets.*')
            ->get();
            $all_share_danh_muc_tuyen_sinh = DB::table('danh_muc_bai_viets')
            ->join('loai_bai_viets','loai_bai_viets.id_danh_muc_bai_viet','=','danh_muc_bai_viets.id')
            ->where('danh_muc_bai_viets.id','=','6')
            ->select('loai_bai_viets.*')
            ->get();
            $all_share_danh_muc_hop_tac = DB::table('danh_muc_bai_viets')
            ->join('loai_bai_viets','loai_bai_viets.id_danh_muc_bai_viet','=','danh_muc_bai_viets.id')
            ->where('danh_muc_bai_viets.id','=','7')
            ->select('loai_bai_viets.*')
            ->get();
            $all_share_danh_muc_tuyen_dung = DB::table('danh_muc_bai_viets')
            ->join('loai_bai_viets','loai_bai_viets.id_danh_muc_bai_viet','=','danh_muc_bai_viets.id')
            ->where('danh_muc_bai_viets.id','=','8')
            ->select('loai_bai_viets.*')
            ->get();
            $all_share_danh_muc_gioi_thieu = DB::table('danh_muc_bai_viets')
            ->join('loai_bai_viets','loai_bai_viets.id_danh_muc_bai_viet','=','danh_muc_bai_viets.id')
            ->where('danh_muc_bai_viets.id','=','9')
            ->select('loai_bai_viets.*')
            ->get();
            $all_cau_hinh = DB::table('cau_hinh_web')
            ->first();
            $all_luot_xem = DB::table('bai_viets')->sum('luot_xem');
            $view->with([
                'all_share_danh_muc_tin_tuc' => $all_share_danh_muc_tin_tuc,
                'all_share_danh_muc_dao_tao' => $all_share_danh_muc_dao_tao,
                'all_share_danh_muc_ngkh' => $all_share_danh_muc_ngkh,
                'all_share_danh_muc_hoc_lieu' => $all_share_danh_muc_hoc_lieu,
                'all_share_danh_muc_sinh_vien' => $all_share_danh_muc_sinh_vien,
                'all_share_danh_muc_tuyen_sinh' => $all_share_danh_muc_tuyen_sinh,
                'all_share_danh_muc_hop_tac' => $all_share_danh_muc_hop_tac,
                'all_share_danh_muc_tuyen_dung' => $all_share_danh_muc_tuyen_dung,
                'all_share_danh_muc_gioi_thieu' => $all_share_danh_muc_gioi_thieu,
                'all_cau_hinh' => $all_cau_hinh,
                'all_luot_xem' => $all_luot_xem
            ]);
        });

    }
}
