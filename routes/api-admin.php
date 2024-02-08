<?php
use App\Http\Controllers\Api\Admin\Capture\CaptureController;
use App\Http\Controllers\Api\Admin\TestConnection\TestConnectionController;
use App\Http\Controllers\Api\Admin\Import\ImportController;
use App\Http\Controllers\Api\Admin\Payroll\PayrollController;

Route::group(['prefix' => 'admin', 'middleware' => ['json.response']], function () {

    //Capture
    Route::apiResource('capture', CaptureController::class);

    //Test connection
    Route::apiResource('test-connection', TestConnectionController::class);
    Route::post('test-connection/mobile', [TestConnectionController::class,'testConnection']);
    Route::patch('test-connection/mobile/disconnect', [TestConnectionController::class,'testConnectionDisconnect']);

    //Import
    Route::post('import/payroll', [ImportController::class,'importPayroll']); 

    // Payroll
    Route::apiResource('payroll', PayrollController::class);
});








