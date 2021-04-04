<?php

use App\Http\Controllers\Admin\BikeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CapacityController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\SiteController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/app/{any}', function () {
    return view('layouts.admin');
})->where('any', '^(?!api).*$');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/brand/{slug}', [SiteController::class, 'brand'])->name('site.brand');
Route::get('/category/{slug}', [SiteController::class, 'category'])->name('site.category');
Route::get('/cc/{slug}', [SiteController::class, 'capacity'])->name('site.capacity');
Route::get('/details/{slug}', [SiteController::class, 'bike'])->name('site.bike');
Route::get('/privacy-policy', [SiteController::class, 'privacyPolicy'])->name('site.privacy-policy');
Route::get('/terms-and-conditions', [SiteController::class, 'termsConditions'])->name('site.terms-and-conditions');
Route::get('/disclaimer', [SiteController::class, 'disclaimer'])->name('site.disclaimer');
Route::get('/contact', [SiteController::class, 'contact'])->name('site.contact');
Route::post('/contactPost', [SiteController::class, 'contactPost'])->name('site.contact.post');



//Global Views
View::composer('layouts.partial.header',function ($view) {
    $brands = App\Models\Brand::all();
    //'categories', Category::all()
    $view->with('brands', $brands);
});

View::composer('layouts.partial.header',function ($view) {
    $categories = App\Models\Category::all();
    //'categories', Category::all()
    $view->with('categories', $categories);
});

View::composer('layouts.partial.header',function ($view) {
    $capacitise = App\Models\Capacity::all();
    //'categories', Category::all()
    $view->with('capacitise', $capacitise);
});