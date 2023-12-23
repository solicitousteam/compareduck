<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public $timestamps = false;
    public $table      = 'coupons';
    protected $guarded = [];
    
}