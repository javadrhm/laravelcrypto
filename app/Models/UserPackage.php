<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{
    // Specify which fields can be mass assigned
    protected $fillable = [
        'user_id',
        'package_id',
        'status',
        'starts_at',
        'expires_at'
    ];

    // Define dates that should be treated as Carbon instances
    protected $dates = [
        'starts_at',
        'expires_at'
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Package
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
