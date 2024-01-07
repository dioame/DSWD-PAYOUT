<?php
use App\Http\Controllers\Web\Admin\Capture\CaptureController;
use App\Http\Controllers\Web\Admin\Print\PrintController;

Route::resource('capture', CaptureController::class);
Route::resource('print', PrintController::class);