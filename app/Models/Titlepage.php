<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Titlepage extends Model
{
    use HasFactory;

    protected $table = 'titlepages';

    protected $fillable = [
        'image',
    
        'short_title',
        'content',
        'caption', 
        'emergency_contact',
        'status',
    ];

    /**
     * Accessor: Format status with capital first letter when retrieved
     */
    public function getStatusAttribute($value)
    {
        return ucfirst($value);
    }
}