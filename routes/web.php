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



Route::get('/', function () {
    return view('auth/login');
});

Route::resource('users', 'UserController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', function () {
    return view('users_liste');
});
Route::get('/competences', function () {
    return view('competences');
});

Route::patch('/user/{$user_id}/new_skill', 'UserController@nouvelle_competence')->name('nouvelle_competence');

Route::get('/users', 'UserController@users_liste');
Route::get('/profile', 'UserController@user_profile')->name('profile');
Route::get('/users/{user_id}/edit_skill/{skill_id}', 'UserController@edit_skill')->name('edit_skill');
Route::get('profile/{id}', 'UserController@selected_profile')->name('selected_profile');
Route::get('profile/{user_id}/delete_skill/{skill_id}', 'UserController@delete_skill')->name('delete_skill');


Route::patch('/skill_update/{id}/{skill_id}', 'UserController@skill_update')->name('skill_update');


