<?php
use App\Http\Controllers\Web\Admin\Capture\CaptureController;
use App\Http\Controllers\Web\Admin\Print\PrintController;
use App\Http\Controllers\Web\Admin\Payroll\PayrollController;
use App\Http\Controllers\Web\Admin\Home\HomeController;
use App\Http\Controllers\Web\Admin\Database\DatabaseController;


Route::get('index', [HomeController::class, 'index'])->name('index');

Route::get('print/generate-pdf/{range}', [PrintController::class, 'generatePdf']);
Route::get('print/capture-index', [PrintController::class, 'index'])->name('capture.print-index');
Route::get('print/duplicate-capture', [PrintController::class, 'duplicateCapture'])->name('print.duplicate-capture');
Route::get('print/ny-capture', [PrintController::class, 'nyCapture'])->name('print.ny-capture');
Route::get('print/trash', [PrintController::class, 'trash'])->name('print.trash');
Route::get('print/edit-capture-form/{id}', [PrintController::class, 'editCaptureForm'])->name('print.edit-capture-form');
Route::put('print/edit-capture/{id}', [PrintController::class, 'editCapture'])->name('print.edit-capture');
Route::get('print/ny-payroll', [PrintController::class, 'nyPayroll'])->name('print.ny-payroll');

Route::get('capture', [CaptureController::class, 'index'])->name('capture.index');
Route::post('capture/upload-folder', [CaptureController::class, 'uploadFolder'])->name('capture.upload-folder');

Route::put('capture/{id}/restore', [CaptureController::class, 'restore'])->name('capture.restore');
Route::get('capture/edit-form/{id}', [CaptureController::class, 'editForm'])->name('capture.edit-form');
Route::put('capture/edit-capture/{id}', [CaptureController::class, 'editCapture'])->name('capture.edit-capture');
Route::delete('capture/{id}/delete', [CaptureController::class, 'deleteCapture'])->name('capture.delete');

Route::put('payroll/{id}/status/{status}', [PayrollController::class, 'editStatus'])->name('payroll.edit-status');
Route::delete('payroll/all', [PayrollController::class, 'deletePayrollAll'])->name('payroll.delete-all');


Route::get('database', [DatabaseController::class, 'index'])->name('database.index');
Route::get('database/create-form', [DatabaseController::class, 'createForm'])->name('database.create-form');
Route::post('database/store', [DatabaseController::class, 'store'])->name('database.store');
Route::put('database/change', [DatabaseController::class, 'changeDatabase'])->name('database.change');
Route::get('database/migrate', [DatabaseController::class, 'performMigration'])->name('database.migrate');

Route::resource('print', PrintController::class);
Route::resource('payroll', PayrollController::class);
Route::resource('capture', CaptureController::class);