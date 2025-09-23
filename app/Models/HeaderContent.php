<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HeaderContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'buttons', // <-- store all button names (array/json)
        'status',
    ];

    /**
     * Cast attributes.
     * button_names will automatically be an array when retrieved.
     */
    protected $casts = [
        'buttons' => 'array',
    ];

    /**
     * Get full URL for logo
     */
    public function getLogoUrlAttribute()
    {
        return $this->logo ? Storage::url($this->logo) : null;
    }
}
