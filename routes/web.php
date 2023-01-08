<?php

use App\Http\Controllers\Admin\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/admin', function () {
//    return view('admin.dashboard');
//})->middleware(['auth', 'verified'])->prefix('admin')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
});


// created routes
Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function() {
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::resource('/lots', 'LotController');
    Route::resource('/categories', 'CategoryController');
});

Route::group(['namespace' => 'App\Http\Controllers\Client'], function() {
    Route::resource('/', 'HomeController');
});

require __DIR__ . '/auth.php';
