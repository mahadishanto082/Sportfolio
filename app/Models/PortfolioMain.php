<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioMain extends Model
{
    use HasFactory;

    protected $table = 'main_portfolios_page'; // Change this if your table name is different

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'client',
        'category',
        'description',
        'technologies',
        'project_url',
        'github_url',
        'thumbnail',      // single image
        'gallery',        // multiple images as JSON
        'tags',           // tags as JSON array
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'gallery' => 'array', // store multiple images as JSON
        'tags' => 'array',    // store tags as JSON
    ];

    /**
     * Accessor for the thumbnail URL.
     *
     * @return string|null
     */
    public function getThumbnailUrlAttribute()
    {
        return $this->thumbnail ? asset('storage/' . $this->thumbnail) : null;
    }

    /**
     * Accessor for gallery image URLs.
     *
     * @return array
     */
    public function getGalleryUrlsAttribute()
    {
        if (!$this->gallery) {
            return [];
        }

        return collect($this->gallery)->map(fn($image) => asset('storage/' . $image))->toArray();
    }
}
