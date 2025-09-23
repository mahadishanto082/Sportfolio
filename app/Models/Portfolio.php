<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'title',
        'sub_title',
        'description',
        'project_name',
        'description',
        'logo_image',
        
        'status',
    ];

    /**
     * Get the URL of the portfolio image.
     *
     * @return string
     */
    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::url($this->image) : asset('images/default.png');
    }

    /**
     * Get a short description for the portfolio.
     *
     * @return string
     */
    public function getShortDescriptionAttribute()
    {
        return Str::limit($this->description, 100);
    }
}