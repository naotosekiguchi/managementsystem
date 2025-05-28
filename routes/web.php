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

Route::get('/', function () {
    return view('welcome');
});

//UserController.phpに飛ばす
//ログイン画面表示用
Route::get('/login', [App\Http\Controllers\UserController::class, 'showLogin'])->name('login');

//ログイン画面機能
Route::post('/login',[App\Http\Controllers\UserController::class, 'loginSubmit'])->name('login.submit');

//新規登録画面表示用
Route::get('/regist',[App\Http\Controllers\UserController::class, 'showRegistForm'])->name('regist');

//新規登録用
Route::post('/regist',[App\Http\Controllers\UserController::class, 'registSubmit'])->name('submit');

//商品一覧画面表示
Route::get('/productlist', [App\Http\Controllers\ProductController::class, 'showList'])->name('list');

//商品新規登録画面表示用
Route::get('/productregist',[App\Http\Controllers\ProductController::class, 'showRegist'])->name('show.Regist');

//商品新規登録画面機能
Route::post('/productregist',[App\Http\Controllers\ProductController::class, 'productRegist'])->name('product.regist');

//商品情報削除機能
Route::get('/productlist{id}',[App\Http\Controllers\ProductController::class, 'deleteProduct'])
    ->name('delete.product');

//商品検索機能
Route::post('/productlist', [App\Http\Controllers\ProductController::class,  'serchProduct'])->name('product.serch');

//商品情報詳細画面表示
Route::get('/productdetail{id}', [App\Http\Controllers\ProductController::class,  'showDetail'])->name('detail');

//商品情報編集画面表示
Route::get('/productedit{id}', [App\Http\Controllers\ProductController::class,  'showEdit'])->name('edit');

//商品情報編集機能
Route::post('/productedit{id}', [App\Http\Controllers\ProductController::class,  'submitEdit'])->name('edit.submit');
