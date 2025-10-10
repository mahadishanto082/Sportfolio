<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FooterContent extends Model
{
    use HasFactory;
    protected $table = 'footercontents';

    // Fillable fields for mass assignment
    protected $fillable = [
        'logo',
        'name',
        'email',
        'phone',
        'address',
        'status',
    ];

    /**
     * Get a short version of the address.
     *
     * @return string
     */
    public function getShortAddressAttribute()
    {
        return Str::limit($this->address, 50);
    }

    /**
     * Get the contact's email domain.
     *
     * @return string
     */
    public function getEmailDomainAttribute()
    {
        return substr(strrchr($this->email, "@"), 1);
    }

    /**
     * Check if the contact is active.
     *
     * @return bool
     */
    public function getIsActiveAttribute()
    {
        return $this->status === 'Active';
    }
}
