<?php

namespace App\Models;   
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'semi-description',
        'image',
        'logo_image',
     
        'status',
        'created_at',
        'updated_at'
    ];

   

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }
}