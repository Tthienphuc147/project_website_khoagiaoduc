<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiMedia extends Model
{
    protected $table="loai_media";
    public $timestamps=false;
    protected $fillable=['ten'];
}
