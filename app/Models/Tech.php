<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class Tech extends Model
{
    use HasFactory;
    protected $table = 'techs';
    protected $fillable = [
        'name',
        'description',
        'logo_image',
        'status',
    ];

    /**
     * Get the URL of the tech icon.
     *
     * @return string
     */
    public function getIconUrlAttribute()
    {
        return $this->logo_image ? Storage::url($this->logo_image) : asset('images/default-icon.png');
    }

    /**
     * Get a short name for the tech.
     *
     * @return string
     */
    public function getShortNameAttribute()
    {
        return Str::limit($this->name, 20);
    }
}