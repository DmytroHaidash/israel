<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'user.admin'],
], function () {
    Route::get('/', function () {
        return \redirect()->route('admin.appointments.index');
    })->name('home');

    Route::resource('articles', 'ArticlesController')->except('show');
    Route::resource('categories', 'CategoriesController')->except('show');
    Route::resource('directions', 'DirectionsController')->except('show');
    Route::resource('methods', 'MethodsController')->except('show');
    Route::resource('commands', 'CommandsController')->except('show');
    Route::resource('reviews', 'ReviewsController')->except('show');
    Route::resource('questions', 'QuestionsController')->except('show');
    Route::resource('services', 'ServicesController')->except('show');
    Route::resource('appointments', 'AppointmentsController')->only('index', 'edit', 'update');
    Route::get('subscribes', 'SubscribesController@index')->name('subscribes.index');

    Route::group([
        'as' => 'settings.',
        'prefix' => 'settings',
    ], function () {
        Route::get('/', 'SettingsController@index')->name('index');
        Route::patch('/', 'SettingsController@update')->name('update');
    });

    Route::group([
        'as' => 'media.',
        'prefix' => 'media',
    ], function () {
        Route::post('upload', 'MediaController@upload')->name('upload');
        Route::delete('{media}', 'MediaController@destroy')->name('destroy');
    });

});