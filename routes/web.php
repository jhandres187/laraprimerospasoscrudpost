<?php


use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Web\BlogController;
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


Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'admin']],function() {
    Route::get('/', function () {
        return view('layouts.dashboard');
    })->middleware(['auth'])->name('dashboard');
    // Route::get('/dashboard', function () {//la ruta que comente arriba
    //     return view('dashboard');
    // })->name('dashboard');
    Route::resources([
        'post' => PostController::class,
        'category' => CategoryController::class
    ]);
});

Route::group(['prefix' => 'blog'], function(){
    Route::controller(BlogController::class)->group(function(){//aca definimos el controllador
        Route::get('/', "index")->name('web.blog.index');//aca solo llamamos la funcion de index
        Route::get('/{post}', "show")->name('web.blog.show');
    });
});


require __DIR__.'/auth.php';
