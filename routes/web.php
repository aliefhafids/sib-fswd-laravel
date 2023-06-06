<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardGroupController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardCategoryController;

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

Route::get('/', function () {
    return view('index');
});


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::group(['middleware'=>['ceklevel:admin']], function(){
    Route::get('/', function () {
        return view('index');
    });
    Route::get('/dashboard', function(){
        return view('dashboard.index');
    });
    Route::resource('/dashboard/product', DashboardProductController::class);
    Route::resource('/dashboard/product-categories', DashboardCategoryController::class);
    Route::resource('/dashboard/group-user', DashboardGroupController::class);
    Route::resource('/dashboard/user', DashboardUserController::class);
});

Route::group(['middleware' =>['ceklevel:staff']], function(){
    Route::get('/', function () {
        return view('index');
    });
    Route::get('/dashboard', function(){
        return view('dashboard.index');
    });
});


// Route::group(['middleware' => ['auth', 'ceklevel:customer']], function(){
//     Route::get('/', function () {
//         return view('index');
//     });
// });
