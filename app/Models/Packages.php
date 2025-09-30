<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    protected $fillable = [
        'title',
        'name',
        'price',
        'duration',
        'features',
        'status',
        'created_at',
        'updated_at'
    ];

}
