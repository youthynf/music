<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Music extends Model
{
    //
    use SoftDeletes;
    const IMG = 'upload\img/';
    const MUSIC = 'upload\music/';
    protected $dates = ['deleted_at']; //开启deleted_at
    protected $table = 'music';
}
