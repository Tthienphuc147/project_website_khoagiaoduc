<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Exception;

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


    public function changeIsRead(Request $request)
    {

        if(request()->session()->get('quyen_goc_hoi_dap'))
        {


        $status = false;
        DB::beginTransaction();
        try {
            DB::table('lien_he')
                ->update([
                    'is_read' => true,
                ]);
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

}
