<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zayavka extends Model
{
    protected $table = 'zayavki';

    protected $fillable = ['number', 'comment'];
}
