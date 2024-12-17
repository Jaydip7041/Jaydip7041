<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categorys'; // Correct table name
    protected $fillable = ['name', 'srname', 'email', 'city', 'mobileno']; // Correct field names
}