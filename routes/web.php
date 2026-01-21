<?php

use App\Http\Controllers\AuditoriaController;
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

Route::middleware(['auth', 'check.license:auditorias'])->group(function () {
    Route::get('/auditorias', [AuditoriaController::class, 'index']);
});

Route::middleware(['auth', 'check.license:reportes'])->group(function () {
    Route::get('/reportes', [ReporteController::class, 'index']);
});


Route::post('/select-company', function (Illuminate\Http\Request $request) {
    $companyId = $request->input('company_id');
    $request->session()->put('company_id', $companyId);

    return back()->with('status', 'Empresa seleccionada correctamente');
})->name('select.company')->middleware('auth');


require __DIR__.'/settings.php';
