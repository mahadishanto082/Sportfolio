<?php
namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialsMain extends Model
{
    use HasFactory;
    protected $table = 'testimonials_main';

    protected $fillable = [
        'user_id', 'name', 'role', 'message',
        'user_rating', 'admin_rating', 'status', 'photo'
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function displayRating()
    {
        return $this->admin_rating ?? $this->user_rating;
    }
}
