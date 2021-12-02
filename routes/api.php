<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuridController;

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

Route::get('/murid', [MuridController::class, 'index']);
Route::post('/murid', [MuridController::class, 'create']);
Route::put('/murid/{id}', [MuridController::class, 'update']);
Route::delete('/murid/{id}', [MuridController::class, 'delete']);
Route::get('/murid/{id}', [MuridController::class, 'show']);
