<?php

use App\Http\Controllers\Admin\BikeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CapacityController;
use App\Http\Controllers\Admin\GalleryController;
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

Route::group(['prefix' => 'api'], function(){
    Route::resource('/brand', BrandController::class);
    Route::resource('/capacity', CapacityController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/bike', BikeController::class);
    Route::get('/gallery/{id}', [GalleryController::class, 'index']);
    Route::post('/gallery/{id}', [GalleryController::class, 'store']);
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy']);
    Route::post('/gallery/main/{id}/{gallery}', [GalleryController::class, 'isMain']);
    Route::post('/gallery/remove/{id}', [GalleryController::class, 'remove']);
});

//Route::post('brand/store', [BrandController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/{any}', function () {
    return view('layouts.admin');
})->where('any', '^(?!api).*$');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
