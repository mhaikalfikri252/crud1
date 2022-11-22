<?php

use App\Http\Controllers\MahasiswaController;
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

// Authentication
Route::post('/insert', [MahasiswaController::class, 'create']);
Route::get('/read', [MahasiswaController::class, 'read']);
Route::post('/update', [MahasiswaController::class, 'update']);
Route::delete("/delete", [MahasiswaController::class, 'delete']);

// Route::get('/', function () {
//     return view('welcome');
// });
