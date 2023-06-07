<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiProductController;

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

Route::get('/dashboard-product ', [ApiProductController::class, 'index']);
Route::get('/dashboard-product/store', [ApiProductController::class, 'store']);
Route::get('/dashboard-product/update', [ApiProductController::class, 'update']);
Route::get('/dashboard-product/delete', [ApiProductController::class, 'destroy']);
