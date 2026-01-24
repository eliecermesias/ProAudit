<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    /** @use HasFactory<\Database\Factories\LicenseFactory> */
    use HasFactory;

    protected $fillable = [
        'company_id',
        'user_id',
        'license_type_id',
        'license_class_id',
        'starts_at',
        'expires_at',
        'max_users',
        'modules_enabled',
        'is_active',
        'license_key',
    ];

    protected $casts = [
        'modules_enabled' => 'array',
        'starts_at' => 'date',
        'expires_at' => 'date',
        'is_active' => 'boolean',
    ];

    // Relaciones
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->belongsTo(LicenseType::class, 'license_type_id');
    }

    public function class()
    {
        return $this->belongsTo(LicenseClass::class, 'license_class_id');
    }
}
