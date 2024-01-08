<?php
use App\Http\Controllers\Api\Admin\Capture\CaptureController;
use App\Http\Controllers\Api\Admin\TestConnection\TestConnectionController;

Route::group(['prefix' => 'admin', 'middleware' => ['json.response']], function () {

    Route::apiResource('capture', CaptureController::class);
    Route::apiResource('test-connection', TestConnectionController::class);
    Route::post('test-connection/mobile', [TestConnectionController::class,'testConnection']);
    Route::patch('test-connection/mobile/disconnect', [TestConnectionController::class,'testConnectionDisconnect']);
});








