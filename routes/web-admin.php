<?php
use App\Http\Controllers\Web\Admin\Capture\CaptureController;
use App\Http\Controllers\Web\Admin\Print\PrintController;
use App\Http\Controllers\Web\Admin\Payroll\PayrollController;

Route::resource('capture', CaptureController::class);

Route::get('print/generate-pdf', [PrintController::class, 'generatePdf']);
Route::get('print/test', [PrintController::class, 'test']);
Route::resource('print', PrintController::class);
Route::resource('payroll', PayrollController::class);