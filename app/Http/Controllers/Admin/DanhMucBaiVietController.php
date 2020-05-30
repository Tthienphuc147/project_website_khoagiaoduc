<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class DanhMucBaiVietController extends Controller
{
    public function index()
    {
        $status = false;
        try {
            $danh_muc_bai_viet = DB::table('danh_muc_bai_viets')
                ->orderBy('id', 'ASC')
                ->get();
            $status = true;
        } catch (Exception $e) {
            $status = false;
        }

        return $status
            ? view("admin.pages.danhmucbaiviet.danhsach", compact("danh_muc_bai_viet"))
            : redirect('quantri/loi404');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = false;
        DB::beginTransaction();
        try {
            $id = DB::table('danh_muc_bai_viets')
                ->insertGetId([
                    'ten' => $request->ten,
                    'created_at' => date("Y-m-d H:i:s")
                ]);
            DB::commit();
            $danh_muc_bai_viet = DB::table('danh_muc_bai_viets')
                ->where('id', $id)
                ->first();
            if($danh_muc_bai_viet) $status = true;
        } catch (Exception $e) {
            DB::rollback();
            $status = false;
        }

        return response()->json([
            'status' => $status,
            'danh_muc_bai_viet' => $danh_muc_bai_viet
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = false;
        try {
            $danh_muc_bai_viet = DB::table('danh_muc_bai_viets')
                ->where('id', $id)
                ->first();
            if($danh_muc_bai_viet) $status = true;
        } catch (Exception $e) {
            $status = false;
        }
        return $status
            ? response()->json([
                    'status' => $status,
                    'danh_muc_bai_viet' => $danh_muc_bai_viet
                ])
            : response()->json([
                    'status' => $status
                ]);
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
        DB::beginTransaction();
        $status = false;
        try {
            DB::table('danh_muc_bai_viets')
                ->where('id', $id)
                ->update([
                    'ten' => $request->ten,
                    'updated_at' => date("Y-m-d H:i:s")
                ]);
            DB::commit();
            $status = true;
        } catch (Exception $e) {
            DB::rollback();
            $status = false;
        }

        return $status
            ? response()->json([
                    'status' => $status,
                    'ten' => $request->ten
                ])
            : response()->json([
                    'status' => $status
                ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = false;
        DB::beginTransaction();
        try {
            DB::table('danh_muc_bai_viets')
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
}
