<?php

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

//Route::get('/', 'App\Http\Controllers\MainController@home');
//
//Route::get('/about', 'App\Http\Controllers\MainController@about');
//
//Route::get('/review', 'App\Http\Controllers\MainController@review')->name('review');
//
//Route::post('/review/check', 'App\Http\Controllers\MainController@review_check');

//Route::resource('rest', 'App\Http\Controllers\RestTestController')->names('restTest');
//Route::get('/user/{id}/{name}', function ($id, $name) {
//    return 'ID: ' . $id . 'Name: ' . $name;
//});

//Route::resource('posts', 'PostController')
//    ->except(['show'])
//    ->names('blog.main.posts');
//



Route::group(['namespace' => 'App\Http\Controllers\Blog', 'prefix' => 'blog'], function () {
    Route::resource('posts', 'PostController') -> names('blog.posts');
});

Auth::routes();

//Route::get('/', [App\Http\Controllers\blog\HomeController::class, 'index'])->name('blog.main');
//
//Route::get('/', [App\Http\Controllers\blog\HomeController::class, 'index'])->name('blog.main');

Route::group(['prefix' => '/',], function () {
    Route::get('/', [App\Http\Controllers\blog\HomeController::class, 'index'])
        ->name('blog.main');
    Route::get('/post/{id}', [App\Http\Controllers\blog\HomeController::class, 'post'])
        ->name('blog.view');
    Route::post('/comment', [App\Http\Controllers\CommentController::class, 'store'])
        ->name('comments.store');
});
//Route::resource('categories', 'CategoryController')
//    ->only($methods)
//    ->names('blog.admin.categories');
//
//Route::group(['namespace' => 'App\Http\Controllers\Blog', 'prefix' => 'post'], function () {
//    Route::resource('posts', 'PostController') -> names('blog.posts');
//});

//Route::get('/', [App\Http\Controllers\Blog\PostController::class, 'index'])->name('');
//Route::group(['prefix' => 'digging_deeper',], function (){
//    Route::get( 'collections', 'DiggingDeeperController@collections')
//        ->name('digging_deeper.collections');
//});

Route::group(['prefix' => 'digging_deeper',], function (){
    Route::get( '/collections', [App\Http\Controllers\DiggingDeeperController::class, 'collections'])
        ->name('digging_deeper.collections');
});

// Админка блога
$groupData = [
    'namespace' => 'App\Http\Controllers\Blog\Admin',
    'prefix' => 'admin/blog',
];

Route::group($groupData, function () {
    //BlogCategory
    $methods = ['index', 'edit', 'update', 'create', 'store',];
    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('blog.admin.categories');

    //BlogPost
    Route::resource('posts', 'PostController')
        ->except(['show'])
        ->names('blog.admin.posts');

});
