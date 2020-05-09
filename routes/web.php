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

Route::get('/admin',function(){
    return view('admin_login');
});

Route::post('/admin/login','LoginController@login')->name('admin.login');

Route::group(['prefix' => 'role'], function () {
    Route::get('/', 'RoleController@index')->name('role.list');
    Route::get('/new', 'RoleController@new')->name('role.new');
    Route::post('/add', 'RoleController@add')->name('role.add');
    Route::get('/edit/{id}', 'RoleController@edit')->name('role.edit');
    Route::post('/update/{id}', 'RoleController@update')->name('role.update');
    Route::get('/delete/{id}', 'RoleController@delete')->name('role.delete');
    Route::get('/permissions/{id}', 'RoleController@permissions')->name('role.permissions');
    Route::post('/permissions/add/{id}', 'RoleController@permissionAdd')->name('role.permission.add');
    Route::get('/permissions/delete/{id}/{permission_id}', 'RoleController@permissionDelete')->name('role.permission.delete');
});

Route::group(['prefix' => 'permission'], function () {
    Route::get('/', 'PermissionController@index')->name('permission.list');
    Route::get('/new', 'PermissionController@new')->name('permission.new');
    Route::post('/add', 'PermissionController@add')->name('permission.add');
    Route::get('/edit/{id}', 'PermissionController@edit')->name('permission.edit');
    Route::post('/update/{id}', 'PermissionController@update')->name('permission.update');
    Route::get('/delete/{id}', 'PermissionController@delete')->name('permission.delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
