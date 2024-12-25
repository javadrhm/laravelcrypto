<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];



    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Laravel 10+ password hashing
    ];

    // Relationship to UserPackages
    public function packages()
    {
        return $this->hasMany(UserPackage::class);
    }

    // Check if user has an active package
    public function hasActivePackage()
    {
        return $this->packages()
            ->where('status', 'active')
            ->where('expires_at', '>', now())
            ->exists();
    }

    // Get the current active package
    public function activePackage()
    {
        return $this->packages()
            ->where('status', 'active')
            ->where('expires_at', '>', now())
            ->first();
    }


    public function posts()
{
    return $this->hasMany(Post::class, 'user_id');
}
public function isAdmin()
{
    return $this->role === 'admin';

}

}
