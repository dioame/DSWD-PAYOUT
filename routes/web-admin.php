<?php
use App\Http\Controllers\Web\Admin\Capture\CaptureController;
use App\Http\Controllers\Web\Admin\Print\PrintController;
use App\Http\Controllers\Web\Admin\Payroll\PayrollController;



Route::get('print/generate-pdf/{range}', [PrintController::class, 'generatePdf']);
Route::get('print/test', [PrintController::class, 'test']);
Route::get('print/duplicate-capture', [PrintController::class, 'duplicateCapture'])->name('print.duplicate-capture');
Route::get('print/ny-capture', [PrintController::class, 'nyCapture'])->name('print.ny-capture');
Route::get('print/trash', [PrintController::class, 'trash'])->name('print.trash');

Route::put('capture/restore/{id}', [CaptureController::class, 'restore'])->name('capture.restore');

Route::resource('print', PrintController::class);
Route::resource('payroll', PayrollController::class);
Route::resource('capture', CaptureController::class);