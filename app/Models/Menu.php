<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /** @use HasFactory<\Database\Factories\MenuFactory> */
    use HasFactory;
    protected $fillable = [
        'menu_id',
        'name',
        'icon',
        'url',
        'current',
        'priority'
    ];

    protected $casts = [
        'current' => 'boolean',
        'roles' => 'array',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
    public function children()
    {
        return $this->hasMany(Menu::class, 'menu_id');
    }
}
