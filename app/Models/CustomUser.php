<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomUser extends Model
{
    protected $table = 'custom_users';
    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password'];
}
