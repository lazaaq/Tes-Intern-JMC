<?php

use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\ProvinsiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MyController::class, 'index']);
Route::resource('/provinsi', ProvinsiController::class);
Route::resource('/kabupaten', KabupatenController::class);
