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


/*
 * ===============================================
 * welcome routes
 * ===============================================
 * */

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::post('/signup','UserController@makeSignUp');

Route::post('/signin','UserController@makeSignIn');

Route::get('/dashboard',[
    'uses'=>'DashboardController@getDashboard',
    'as'=>'dashboard'
])->middleware('auth');


/*
 * ===============================================
 * dashboard routes
 * ===============================================
 * */

Route::get('/logout',[
    'uses' => 'DashboardController@logOut',
    'as' => 'logout'
])->middleware('auth');

Route::post('/like',[
    'uses' => 'LikeController@setLike',
    'as' => 'like']
)->middleware('auth');

Route::get('/dashboard/myfavorites',[
    'uses' => 'MyFavoriteController@getIndex',
    'as' => 'myfavorite'
])->middleware('auth');


Route::post('/remove',[
    'uses' => 'LikeController@remove',
    'as' => 'remove'
])->middleware('auth');