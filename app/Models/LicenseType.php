<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseType extends Model
{
    /** @use HasFactory<\Database\Factories\LicenseTypeFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'scope',
        'description',
    ];

    public function licenses()
    {
        return $this->hasMany(License::class);
    }
}
