<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiBaiViet extends Model
{
    protected $table="loai_bai_viets";
    public $timestamps=false;
    protected $fillable=['ten','id_danh_muc_bai_viet'];
}
