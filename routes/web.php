<?php

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

Route::get('user/2/edit', 'HomeController@index')
    ->prefix('client')
    ->name('user.edit');
//     /admin/user/2/edit

Route::get('user/{user_id}', 'HomeController@params');


Route::get('user', 'Admin\Auth\HomeController@user')->prefix('admin');

Route::get('product', 'ProductController');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function() {
    Route::group(['prefix' => 'categories'], function() {
        Route::get('', [
            'as' => 'admin.categories.index',
            'uses' => 'CategoryController@index'
        ]); // /admin/categories

        Route::get('create', [
            'as' => 'admin.categories.create',
            'uses' => 'CategoryController@create'
        ]); // /admin/categories/create

        Route::get('{id}/edit', [
            'as' => 'admin.categories.edit',
            'uses' => 'CategoryController@edit'
        ]); // /admin/categories/{id}/edit
    });

    Route::group(['prefix' => 'products'], function() {
        Route::get('', [
            'as' => 'admin.products.index',
            'uses' => 'ProductController@index'
        ]); // /admin/products

        Route::get('create', [
            'as' => 'admin.products.create',
            'uses' => 'ProductController@create'
        ]); // /admin/products/create

        Route::get('{id}/edit', [
            'as' => 'admin.products.edit',
            'uses' => 'ProductController@edit'
        ]); // /admin/products/{id}/edit
    });

    Route::group(['prefix' => 'users'], function() {
        Route::get('', [
            'as' => 'admin.users.index',
            'uses' => 'UserController@index'
        ]); // /admin/users

        Route::get('create', [
            'as' => 'admin.users.create',
            'uses' => 'UserController@create'
        ]); // /admin/users/create

        Route::get('{id}/edit', [
            'as' => 'admin.users.edit',
            'uses' => 'UserController@edit'
        ]); // /admin/users/{id}/edit
    });

    Route::group(['prefix' => 'orders'], function() {
        Route::get('', [
            'as' => 'admin.orders.index',
            'uses' => 'OrderController@index'
        ]); // /admin/orders

        Route::get('processed', [
            'as' => 'admin.orders.processed',
            'uses' => 'OrderController@processed'
        ]); // /admin/orders/processed

        Route::get('{id}/detail', [
            'as' => 'admin.orders.detail',
            'uses' => 'OrderController@detail'
        ]); // /admin/orders/{id}/detail
    });
});
