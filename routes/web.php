<?php

use Illuminate\Support\Facades\Route;


// Route::view('index', 'index')->name('index');

Route::get('/', function () {
    return redirect()->route('index');
})->name('/');

include('web-admin.php');