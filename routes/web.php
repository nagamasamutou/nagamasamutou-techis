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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('items')->middleware('auth', 'can:user-higher')->group(function () {

    //商品一覧画面
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);

    //種別一覧画面
    Route::get('/type_index', [App\Http\Controllers\TypeController::class, 'type_index']);

});

Route::prefix('items')->middleware('auth', 'can:admin-higher')->group(function () {

    //商品一覧画面
    // Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);

    //商品登録画面
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'get_add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'post_add']);

    //商品編集画面
    Route::get('/item_edit/{id}', [App\Http\Controllers\ItemController::class, 'get_item_edit']);
    Route::post('/item_edit/{id}', [App\Http\Controllers\ItemController::class, 'edit_delete_item']);

    //種別一覧画面
    // Route::get('/type_index', [App\Http\Controllers\TypeController::class, 'type_index']);

    //種別登録画面
    Route::get('/type_add', [App\Http\Controllers\TypeController::class, 'type_add']);
    Route::post('/type_add', [App\Http\Controllers\TypeController::class, 'type_add']);

    //種別編集画面
    Route::get('/type_edit/{id}', [App\Http\Controllers\TypeController::class, 'get_type_edit']);
    Route::post('/type_edit/{id}', [App\Http\Controllers\TypeController::class, 'edit_delete_type']);

});
