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
        'email',
        'phone',
        'address',
        'logo',
        'description',
        'contact_name',
        'nit',
    ];

    // Relaciones
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('role')
            ->withTimestamps();
    }

    public function licenses()
    {
        return $this->hasMany(License::class);
    }

}
