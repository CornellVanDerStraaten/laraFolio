<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


/**
 * DONE Restful Routes
 */


/**
 * DOING Restful Routes
 */
Route::get('/', 'HomeController@index')->name('home');

// Login
Route::get('/login', 'WebsiteController@showLogin')->name('login');

// Login->Forgot Password (FP)
Route::get('/forgot-password', 'loginController@FPform')->name('FP');

// Admin
Route::get('/admin/navigatie', 'AdminController@showNavigation')->name('admin.showNavigation');
Route::get('/admin/dashboard', 'AdminController@showDashboard')->name('admin.showDashboard');

/**
 * TODO Restful Routes
 *
 * Website
 * Route::get('/over-mij', 'WebsiteController@showAbout')->name('overMij');
 *
 * Admin
 * Route::get('/admin', 'AdminController@showLogin')->name('admin.showLogin');
 * Route::post('/admin', 'AdminController@logIn')->name('admin.login');
 * Route::get('/admin/dashboard', 'AdminController@showDashboard')->name('admin.showDashboard');
 *
 * Projecten
 * Route::get('/projecten', 'ProjectController@index')->name('projecten');
 * Route::get('/projecten/maken', 'ProjectController@create')->name('projecten.create');
 * Route::post('/projecten', 'ProjectController@store')->name('projecten.store');
 * Route::get('/projecten/{slug}', 'ProjectController@show')->name('projecten.show');
 * Route::get('/projecten/{slug}/aanpassen', 'ProjectController@edit')->name('projecten.edit');
 * Route::put('/projecten/{slug}', 'ProjectController@update')->name('projecten.update');
 * Route::delete('/projecten/{slug}', 'ProjectController@destroy')->name('projecten.destroy');
 *
 * Artikels
 * Route::get('/artikels', 'ArtikelController@index')->name('artikels');
 * Route::get('/artikels/maken', 'ArtikelController@create')->name('artikel.create');
 * Route::post('/artikels', 'ArtikelController@store')->name('artikel.store');
 * Route::get('/artikels/{slug}', 'ArtikelController@show')->name('artikel.show');
 * Route::get('/artikels/{slug}/aanpassen', 'ArtikelController@edit')->name('artikel.edit');
 * Route::put('/artikels/{slug}', 'ArtikelController@update')->name('artikel.update');
 * Route::delete('/artikels/{slug}', 'ArtikelController@destroy')->name('artikel.destroy');
 */

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
