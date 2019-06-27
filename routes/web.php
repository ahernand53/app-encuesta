<?php
// RUTAS DE AUTENTIFICACION
Route::auth();

Route::get('/', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return view('welcome');
})->name('welcome');

// --------------------- ADMIN -----------------------

Route::middleware('admin')->prefix('dashboard')->group(function () {

    Route::get('/', 'HomeController@index')->name('home');

    // ETAPAS
    Route::resource('/formulario/stages', 'Administration\StageController');

    // USUARIOS - ADMINS
    Route::resource('/usuarios', 'User\AdminController');

});


// --------------------- NORMAL -----------------------

// ENCUESTA
Route::get('/register', 'Poll\PollController@register')->name('poll.register');
Route::post('/register', 'Poll\PollController@sendRegister')->name('poll.send');

Route::get('/form/{key}', 'Poll\PollController@makeSurvey')->name('poll.make');
Route::post('/form/complete', 'Poll\PollController@madeSurvey')->name('poll.made');

