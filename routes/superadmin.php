<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LicenseController;
use Illuminate\Support\Facades\Route;

Route::resource('companies', CompanyController::class)->names('companies');
Route::resource('licenses', LicenseController::class)->names('licenses');