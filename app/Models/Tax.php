<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    public $timestamps = false;
    public $table      = 'tax';
    protected $guarded = [];
    
}