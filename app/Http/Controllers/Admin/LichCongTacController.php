<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LichCongTac;
use DB;
use Carbon\Carbon;

class LichCongTacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lich_cong_tac=LichCongTac::orderby('thoi_gian_bat_dau','desc')->get();
        
        return view("admin.pages.lichcongtac.danhsach")->with('data',$lich_cong_tac);
    }
    public function indexThemView()
    {
        return view("admin.pages.lichcongtac.them");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->input('tuan')!=""&&$request->input('noi_dung')!=""){
            try{
                DB::beginTransaction();
                $lich_cong_tac=new LichCongTac();
                $lich_cong_tac->noi_dung=$request->input('noi_dung');
                $day_of_week=Carbon::create($request->input("tuan"));
                Carbon::setWeekStartsAt(Carbon::SUNDAY);
                $day_start=$day_of_week->startOfWeek();
                $day_of_week=Carbon::create($request->input("tuan"));
                Carbon::setWeekEndsAt(Carbon::SATURDAY);
                $day_end=$day_of_week->endOfWeek();
                $lich_cong_tac->thoi_gian_bat_dau=$day_start;
                $lich_cong_tac->thoi_gian_ket_thuc=$day_end;
                $lich_cong_tac->save();
                DB::commit();
                return view("admin.pages.lichcongtac.them")->with('message','Thêm thành công');
            }
            catch(Exception $e){
                DB::rollback();
            }
        }
        return view("admin.pages.lichcongtac.them")->with('message','Thêm thất bại');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lich_cong_tac=LichCongTac::find($id);
        if(!empty($lich_cong_tac)){
            return view("admin.pages.lichcongtac.sua")->with('data',$lich_cong_tac)->with('id',$id); 
        }
        $lich_cong_tac=LichCongTac::orderby('thoi_gian_bat_dau','desc')->get();
        return view("admin.pages.lichcongtac.danhsach")->with('data',$lich_cong_tac);
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
        $lich_cong_tac=LichCongTac::find($id);
        if(!empty($lich_cong_tac)){
            try{
                DB::beginTransaction();
                if($request->input('noi_dung')!="")$lich_cong_tac->noi_dung=$request->input('noi_dung');
                if($request->input("tuan")!=""){
                    $day_of_week=Carbon::create($request->input("tuan"));
                    Carbon::setWeekStartsAt(Carbon::SUNDAY);
                    $day_start=$day_of_week->startOfWeek();
                    $day_of_week=Carbon::create($request->input("tuan"));
                    Carbon::setWeekEndsAt(Carbon::SATURDAY);
                    $day_end=$day_of_week->endOfWeek();
                    $lich_cong_tac->thoi_gian_bat_dau=$day_start;
                    $lich_cong_tac->thoi_gian_ket_thuc=$day_end;
                }
                $lich_cong_tac->save();
                DB::commit();
                return view("admin.pages.lichcongtac.sua")->with('data',$lich_cong_tac)->with('id',$id)->with('message','Sửa thành công'); 
            }
            catch(Exception $e){
                DB::rollback();
            }
        }
        $lich_cong_tac=LichCongTac::orderby('thoi_gian_bat_dau','desc')->get();
        return view("admin.pages.lichcongtac.sua")->with('data',$lich_cong_tac)->with('id',$id)->with('message','Sửa thất bại'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lich_cong_tac=LichCongTac::find($id);
        if(!empty($lich_cong_tac)){
            try{
                DB::beginTransaction();
                $lich_cong_tac->delete();
                DB::commit();
                $lich_cong_tac=LichCongTac::orderby('thoi_gian_bat_dau','desc')->get();
                return view("admin.pages.lichcongtac.danhsach")->with('data',$lich_cong_tac)->with('message','Xóa thành công'); 
            }
            catch(Exception $e){
                DB::rollback();
            }
        }
        $lich_cong_tac=LichCongTac::orderby('thoi_gian_bat_dau','desc')->get();
        return view("admin.pages.lichcongtac.danhsach")->with('data',$lich_cong_tac)->with('message','Xóa thất bại');
    }
}
