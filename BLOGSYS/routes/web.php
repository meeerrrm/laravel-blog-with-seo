<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\TagController;

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

Route::get('/', [LandingController::class, 'index'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    Route::prefix('admin')
        ->name('admin.')
        ->middleware('auth')
        ->group(function(){
            Route::controller(App\Http\Controllers\Admin\BlogController::class)
                ->prefix('blog')
                ->name('blog.')
                ->group(function(){
                    Route::get('/','index')->name('index');
                    Route::get('/create','create')->name('create');
                    Route::get('/update/{id}','edit')->name('edit');

                    Route::post('/','store')->name('store');
                    Route::put('/','update')->name('update');
                    Route::delete('/','destroy')->name('destroy');
            });
            Route::controller(App\Http\Controllers\Admin\TagController::class)
                ->prefix('tag')
                ->name('tag.')
                ->group(function(){
                    Route::get('/','index')->name('index');
                    Route::get('/create','create')->name('create');
                    Route::get('/update/{id}','edit')->name('edit');

                    Route::post('/','store')->name('store');
                    Route::put('/','update')->name('update');
                    Route::delete('/','destroy')->name('destroy');
            });
    });

    require __DIR__.'/auth.php';
