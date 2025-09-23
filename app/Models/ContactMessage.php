<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'status',
    ];

    /**
     * Get a short version of the message.
     *
     * @return string
     */
    public function getShortMessageAttribute()
    {
        return Str::limit($this->message, 50);
    }

    /**
     * Check if the message is read.
     *
     * @return bool
     */
    public function getIsReadAttribute()
    {
        return $this->status === 'read';
    }
}