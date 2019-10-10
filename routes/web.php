<?php

Route::prefix('/')
    ->namespace('Admin')
    ->group(function (){
        Route::group(['prefix'=>'/'],function (){
            Route::get('/login','AuthController@index')->name('login');
            Route::post('/login','AuthController@login')->name('login');
            Route::get('/logout','AuthController@logout')->name('logout');
        });

        Route::group(['middleware' => ['auth','admin'],'as'=>'admin.'], function () {
            Route::resource('users','UserController');
            Route::get('users/{user}/destroy','UserController@destroy')->name('destroy');
        });
        Route::group(['middleware'=>['auth'],'as'=>'admin.'],function (){
            Route::get('/','HomeController@index')->name('home');

            Route::resource('pharmacies','PharmacyController');
            Route::get('pharmacies/{pharmacy}/pharmacists','PharmacyController@pharmacists')->name('pharmacies.pharmacists');
//            Route::get('pharmacies/{pharmacy}/destroy','PharmacyController@destroy')->name('pharmacies.destroy');

            Route::resource('clients','ClientController');
//            Route::get('clients/{client}/destroy','ClientController@destroy')->name('clients.destroy');

            Route::resource('orders','OrderController');
//            Route::get('orders/{order}/destroy','OrderController@destroy')->name('orders.destroy');
        });


    });