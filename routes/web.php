<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Hello World from Laravel Herd!';
});

Route::get('/module2a/price_engine.php', function() {
    require base_path('module2a/price_engine.php');
});

Route::get('/module2a/price_engine_refactored.php', function() {
    require base_path('module2a/price_engine_refactored.php');
});

Route::get('/module2b/cosmic_calendar.php', function() {
    require base_path('module2b/cosmic_calendar.php');
});