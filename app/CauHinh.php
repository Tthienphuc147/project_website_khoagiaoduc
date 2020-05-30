<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CauHinh extends Model
{
    protected $table="cau_hinh_web";
    public $timestamps=false;
    protected $fillable=['so_dien_thoai_khoa','ten','so_dien_thoai','mo_ta'];
}
