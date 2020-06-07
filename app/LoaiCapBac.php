<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiCapBac extends Model
{
    protected $table="cap_bac";
    public $timestamps=false;
    protected $fillable=['ten'];
}
