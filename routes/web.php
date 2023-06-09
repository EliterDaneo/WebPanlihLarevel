<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', [FrontEndController::class, 'index']);
// Route::get('/detail-materi/{slug}', [FrontEndController::class, 'detail'])->name('detail-materi');

Route::controller(FrontEndController::class)->group(function(){
    Route::get('/',  'index');
    Route::get('/detail-materi/{slug}', 'detail');
});

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['CheckRole:admin']], function () {
        Route::resource('kategori', KategoriController::class);
        Route::resource('artikel', ArtikelController::class);
        Route::resource('playlist', PlaylistController::class);
        Route::resource('materi', MateriController::class);
        Route::resource('slider', SliderController::class);
        Route::resource('iklan', IklanController::class);
        Route::resource('user', UserController::class);
    });
    Route::group(['middleware' => ['CheckRole:user']], function () {
    });
});
