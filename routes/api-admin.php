<?php
use App\Http\Controllers\Api\Admin\Capture\CaptureController;

Route::group(['prefix' => 'admin', 'middleware' => ['json.response']], function () {

    Route::apiResource('capture', CaptureController::class);
});








