<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'duration', // in days
        'features',
        'status'
    ];

    // Optional: Cast features to array if storing as JSON
    protected $casts = [
        'features' => 'array',
    ];

    // Relationship with UserPackage
    public function userPackages()
    {
        return $this->hasMany(UserPackage::class);
    }

    // Scope for active packages
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Helper method to get formatted price
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 2);
    }
}
