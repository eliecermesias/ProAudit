<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'nit',
        'email',
        'phone',
        'address',
        'logo',
        'description',
        'cotact_name',
    ];

    protected $casts = [
        'logo' => 'string',
        'description' => 'string',
    ];

    // Relaciones
    public function users()
    {
        return $this->belongsToMany(User::class, 'company_user')
            ->withPivot('role')
            ->withTimestamps();
    }

    public function licenses()
    {
        return $this->hasMany(License::class);
    }
}
