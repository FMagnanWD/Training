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
// importe les routes d'authentification
Auth::routes();
// Routes accessibles par tous
Route::get('/home', 'HomeController@index')->name('home');

// Routes ou il faut etre identifié
Route::group(['middleware' => ['auth']], function() {
    // Routes Formateur
    Route::get('/mon-compte-pro', 'TeacherController@index')->name('account.teacher');
    Route::post('/account/categories/create', 'MediaController@create');
    // Settings teacher Account
    Route::get('/admin/settings', 'SettingsController@index')->name('settings');
    Route::post('/admin/settings/update', 'SettingsController@update')->name('teacher.settings.update');

    // Vidéos API YOUTUBE
    Route::get('/admin/video', 'MediaController@index')->name('video.show');

    // Routes Etudiants
    Route::get('/mon-compte', 'StudentController@index')->name('account.student');
});

// Route de deconnexion
Route::post('/logout', function() { Auth::logout(); return Redirect::to('/home'); });

