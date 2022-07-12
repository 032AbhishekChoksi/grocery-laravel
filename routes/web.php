<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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
// Route::get('/categories', [CategoryController::class, 'getAllCategories'])->name('category.getAllCategories');
// Route::get('/category/add', [CategoryController::class, 'addCategory'])->name('category.addCategory');

Route::get('/scope', 'App\Http\Controllers\ScopeController@index')->name('scope.index');
Route::get('/scope/add', 'App\Http\Controllers\ScopeController@add')->name('scope.add');
Route::post('/scope/add', 'App\Http\Controllers\ScopeController@store')->name('scope.store');
Route::get('/scope/edit/{id}', 'App\Http\Controllers\ScopeController@edit')->name('scope.edit');
Route::post('/scope/edit/{id}', 'App\Http\Controllers\ScopeController@update')->name('scope.update');