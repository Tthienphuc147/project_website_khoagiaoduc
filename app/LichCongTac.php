<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichCongTac extends Model
{
    protected $table="lich_cong_tac";
    public $timestamps=false;
    protected $fillable=['noi_dung','thoi_gian_bat_dau','thoi_gian_ket_thuc'];
}
