<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Middleware\TestMiddleware;
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


// Route::resource('post', PostController::class)->only(['show']);//rutas de tipo de recurso y pra solo mostrar solo un recurso
// Route::resource('category', CategoryController::class);//rutas de tipo de recurso

// agrupar route resources
Route::resources([
    'post' => PostController::class,
    'category' => CategoryController::class
]);


// // routa tipo group no se ve en la documentacion pero agrupá por prefijo de la url para aplicaciones grandes
// Route::group(['prefix' => 'dashboard'], function(){
//     Route::resource('post', PostController::class);//rutas de tipo de recurso
//     Route::resource('category', CategoryController::class);//rutas de tipo de recurso
// });

// // ruta middleware
// Route::middleware([TestMiddleware::class])->group(function(){
//     Route::get('/test/{id?}',function($id = 10){
//         echo $id;
//     });
// });

// Route::get('/test/{id?}',function($id = 10){
//     echo $id;
// });//ruta conargumentos obligatorios o opcionales
// ruta de laravel 8.7.5
// Route::controller(PostController::class)->group(function(){
//     Route::get('post')->name("post.index");
//     Route::get('post/{post}')->name("post.show");
//     Route::get('post/create')->name("post.create");
//     Route::get('post/{post}/edit')->name("post.edit");

//     Route::post('post')->name("post.store");
//     Route::put('post/{post}')->name("post.update");
//     // Route::patch('post/{post}')->name("post.update");//actualiza solo parte de un post
//     Route::delete('post/{post}')->name("post.destroy");
// });

// equivalente route resource
// Route::get('post', [PostController::class, 'index']);
// Route::get('post/{post}', [PostController::class, 'show']);
// Route::get('post/create', [PostController::class, 'create']);
// Route::get('post/{post}/edit', [PostController::class, 'edit']);

// Route::post('post', [PostController::class, 'store']);
// Route::put('post/{post}', [PostController::class, 'update']);
// // Route::patch('post/{post}', [PostController::class, 'update']);//actualiza solo parte de un post
// Route::delete('post/{post}', [PostController::class, 'destroy']);