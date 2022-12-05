<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\MahasiswaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [RegisterController::class, 'login']);

Route::post('/create', [MahasiswaController::class, 'create']);
Route::post('/update', [MahasiswaController::class, 'update']);
Route::delete('/delete', [MahasiswaController::class, 'delete']);
Route::get('/readall', [MahasiswaController::class, 'readall']);
Route::get('/readbynim', [MahasiswaController::class, 'readbynim']);

Route::middleware('auth:sanctum')->post('/create2', [MahasiswaController::class, 'create'])->name('create2');
Route::middleware('auth:sanctum')->get('/read2', [MahasiswaController::class, 'read'])->name('read2');
Route::middleware('auth:sanctum')->post('/update2', [MahasiswaController::class, 'update'])->name('update2');
Route::middleware('auth:sanctum')->delete('/delete2', [MahasiswaController::class, 'delete'])->name('delete2');

Route::post('/tokens/create', function (Request $request) {
    $token = $request->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});
