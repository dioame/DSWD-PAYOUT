<?php
use App\Http\Controllers\Web\Admin\Capture\CaptureController;
use App\Http\Controllers\Web\Admin\Print\PrintController;

Route::resource('capture', CaptureController::class);

Route::get('print/generate-pdf', [PrintController::class, 'generatePdf']);
Route::get('print/test', [PrintController::class, 'test']);
Route::resource('print', PrintController::class);