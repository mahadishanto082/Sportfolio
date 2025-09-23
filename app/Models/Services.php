<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Services extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        
        'icon',
        'name',
        'description',
        'status',
    ];

   

    public function getIconUrlAttribute()
    {
        return $this->icon ? Storage::url($this->icon) : null;
    }
}