<?php

use App\Http\Controllers\AuditoriaController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::resource('companies', CompanyController::class);




require __DIR__.'/settings.php';
