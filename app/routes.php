<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */
use Frenzycode\Models\URLModel;

foreach (URLModel::$httpGet as $route) {
    Route::get($route['url'], $route['handle']);
}

foreach (URLModel::$httpPost as $route) {
    Route::post($route['url'], $route['handle']);
}

Route::get('/', function() {
    
   
});

