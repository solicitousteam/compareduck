<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class customer extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    
    
    
      protected $fillable = [
        'username',
        'email',
        'password',
        'social_id',
        'social_type',
        'image'
    ];
 
}
