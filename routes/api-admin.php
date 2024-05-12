<?php
use App\Http\Controllers\Api\Admin\Capture\CaptureController;
use App\Http\Controllers\Api\Admin\TestConnection\TestConnectionController;
use App\Http\Controllers\Api\Admin\Import\ImportController;
use App\Http\Controllers\Api\Admin\Payroll\PayrollController;

Route::group(['prefix' => 'admin', 'middleware' => ['json.response']], function () {

    //Capture
    Route::apiResource('capture', CaptureController::class)->names([
        'index' => 'api.capture.index',
        'store' => 'api.capture.store',
        'show' => 'api.capture.show',
        'update' => 'api.capture.update',
        'destroy' => 'api.capture.destroy',
    ]);

    //Test connection
    Route::apiResource('test-connection', TestConnectionController::class);
    Route::post('test-connection/mobile', [TestConnectionController::class,'testConnection']);
    Route::patch('test-connection/mobile/disconnect', [TestConnectionController::class,'testConnectionDisconnect']);

    //Import
    Route::post('import/payroll', [ImportController::class,'importPayroll']); 

    // Payroll
    Route::apiResource('payroll', PayrollController::class)->names([
        'index' => 'api.payroll.index',
        'store' => 'api.payroll.store',
        'show' => 'api.payroll.show',
        'update' => 'api.payroll.update',
        'destroy' => 'api.payroll.destroy',
    ]);
});








