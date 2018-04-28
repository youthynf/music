<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Singer extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at']; //开启deleted_at
    protected $table = 'singer';
}
