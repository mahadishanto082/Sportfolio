<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ServicesMain extends Model
{
    use HasFactory;

    protected $table = 'main_services_page'; // Specify the table name if it's not the plural of the model name

    protected $fillable = [
        'title',
        'subtitle',

        'description',
        'content',
        'image',
        'features', // JSON field for features
        'status',
    ];
    
    protected $casts = [
        'features' => 'array',
    ];

    // Accessor for image URL
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}