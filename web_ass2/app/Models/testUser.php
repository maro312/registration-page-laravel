<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestUser extends Model
{
    use HasFactory;

    
    public $timestamps = false;
    protected $primaryKey = 'user_name';
    protected $fillable = [
        'full_name',
        'user_name',
        'birthdate',
        'phone',
        'address',
        'password',
        'email',
        'user_image'
        // Add any other fields that can be mass-assigned here
    ];

    protected $hidden = [
        'password', // Hide password from JSON responses for security
    ];

    // Define relationships if needed
    // For example:
    // public function posts()
    // {
    //     return $this->hasMany(Post::class);
    // }

    // You might also need mutators or accessors for custom logic

    // For example, hashing the password before saving it to the database
    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = bcrypt($value);
    // }
}
