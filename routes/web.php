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
Route::group(['middleware' => ['web']], function() {  
    Route::get('/', 'PagesController@homepage');
    Route::get('about', 'PagesController@about');

    Auth::routes(['register' => false]);
    
    //Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('user', 'UserController');

    Route::get('student/search', 'StudentController@search');
    Route::resource('student', 'StudentController');
    Route::resource('class', 'ClasseController');
    Route::resource('hobby', 'HobbieController');
    // Route::get('student', 'StudentController@index');
    // Route::get('student/create', 'StudentController@create');
    // Route::post('student', 'StudentController@store');
    // Route::get('student/{id}', 'StudentController@show');
    // Route::get('student/{id}/edit', 'StudentController@edit');
    // Route::patch('student/{id}', 'StudentController@update');
    // Route::delete('student/{id}', 'StudentController@destroy');
});

//Laravel V5.2 up
// Route::get('halaman-rahasia', function () {
//     return 'Anda sedang melihat <strong>Halaman Rahasia</strong>';
// })->name('secret');

// Route::get('showmesecret', function () {
//     return redirect()->route('secret');
// });

Route::get('halaman-rahasia', 'RahasiaController@halamanRahasia') -> name('secret');

Route::get('showmesecret', 'RahasiaController@showmesecret');


