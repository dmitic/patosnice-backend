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


// Route::get('/create-symlink', function () {
//     Artisan::call('storage:link');
//     });
// Route::get('/migrate', function () {
//     Artisan::call('migrate:fresh --seed');
//     });


Route::get('/', function () {
    return view('login');
});

Auth::routes();

Route::get('/home', 'UserController@index')->name('home');
Route::get('/slajder', 'SliderController@index')->name('slider');
Route::get('/posts', 'PostController@index')->name('postovi');
Route::get('/brendovi', 'BrandController@index')->name('brendovi');
Route::get('/proizvodjaci', 'CategoryController@index')->name('proizvodjaci');
Route::get('/proizvodi', 'ProductController@index')->name('proizvodi');


Route::prefix('/admin')->group(function()
{
    Route::get('/add', 'UserController@create')->name('dodaj_admina');
    Route::get('/{user}/edit', 'UserController@edit')->name('izmeni_admina');
    Route::put('/izmeniStatus/{user}', 'UserController@status')->name('statusKorisnika');
    Route::put('/{user}/edit', 'UserController@update')->name('izmeni_admina');
    Route::post('/add', 'UserController@store')->name('dodaj_admina');
    Route::delete('/{user}/delete', 'UserController@destroy')->name('obrisi_admina');
});

Route::prefix('/slajder')->group(function()
{
    Route::get('/add', 'SliderController@create')->name('dodaj_slajder');
    Route::get('/edit/{slider}', 'SliderController@edit')->name('izmeni_slajder');
    Route::put('/izmeniStatus/{slider}', 'SliderController@status')->name('statusSlajdera');
    Route::post('/edit/{slider}', 'SliderController@update')->name('izmeni_slajder');
    Route::post('/add', 'SliderController@store')->name('dodaj_slajder');
    Route::delete('/{slider}/delete', 'SliderController@destroy')->name('obrisi_slajder');
});

Route::prefix('/posts')->group(function()
{
//     Route::get('/add', 'UserController@create')->name('dodaj_admina');
//     Route::get('/edit/{user}', 'UserController@edit')->name('izmeni_admina');
    Route::put('/izmeniStatus/{post}', 'PostController@status')->name('statusPosta');
//     Route::post('/edit/{user}', 'UserController@update')->name('izmeni_admina');
//     Route::post('/add', 'UserController@store')->name('dodaj_admina');
    Route::delete('/{post}/delete', 'PostController@destroy')->name('obrisi_post');
});

Route::prefix('/brendovi')->group(function()
{
    Route::get('/add', 'BrandController@create')->name('dodaj_brend');
    Route::get('/edit/{brand}', 'BrandController@edit')->name('izmeni_brend');
    Route::put('/izmeniStatus/{brand}', 'BrandController@status')->name('statusBrenda');
    Route::post('/edit/{brand}', 'BrandController@update')->name('izmeni_brend');
    Route::post('/add', 'BrandController@store')->name('dodaj_brend');
    Route::delete('/{brand}/delete', 'BrandController@destroy')->name('obrisi_brend');
});

Route::prefix('/proizvodjaci')->group(function()
{
    Route::get('/add', 'CategoryController@create')->name('dodaj_proizvodjaca');
    Route::get('/edit/{proizvodjac}', 'CategoryController@edit')->name('izmeni_proizvodjaca');
    Route::put('/izmeniStatus/{proizvodjac}', 'CategoryController@status')->name('statusProizvodjaca');
    Route::post('/edit/{proizvodjac}', 'CategoryController@update')->name('izmeni_proizvodjaca');
    Route::post('/add', 'CategoryController@store')->name('dodaj_proizvodjaca');
    Route::delete('/{proizvodjac}/delete', 'CategoryController@destroy')->name('obrisi_proizvodjaca');
});

Route::prefix('/proizvodi')->group(function()
{
    // Route::get('/add', 'SliderController@create')->name('dodaj_slajder');
//     Route::get('/edit/{user}', 'UserController@edit')->name('izmeni_admina');
    Route::put('/izmeniStatus/{proizvod}', 'ProductController@status')->name('statusProizvoda');
//     Route::post('/edit/{user}', 'UserController@update')->name('izmeni_admina');
    // Route::post('/add', 'SliderController@store')->name('dodaj_slajder');
    Route::delete('/{proizvod}/delete', 'ProductController@destroy')->name('obrisi_proizvod');
});