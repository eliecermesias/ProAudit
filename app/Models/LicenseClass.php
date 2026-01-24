<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseClass extends Model
{
    /** @use HasFactory<\Database\Factories\LicenseClassFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'default_max_users',
        'default_modules',
        'default_duration_months',
    ];

    protected $casts = [
        'default_modules' => 'array',
    ];

    public function licenses()
    {
        return $this->hasMany(License::class);
    }
}
