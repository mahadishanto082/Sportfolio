<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMain extends Model
{
    use HasFactory;

    // Specify the table
    protected $table = 'main_about_page'; 
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'semi_description',
        'image',
        'logo_image',
        'caption',
        'history',
        'vision',
        'mission',
        'achievements',
        'status',
       
    ];
    protected $casts = [
        'achievements' => 'array',
    ];
    

    // Accessor for image URL
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    public function getLogoImageUrlAttribute()
    {
        return $this->logo_image ? asset('storage/' . $this->logo_image) : null;
    }
}
