<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    
    Route::group([ 'prefix' => 'v1'], function() {
        include('api-admin.php');
    });
    Route::any('{any}', function(){
        return response()->json(['status' => 'error','description'=>'Not Found'], 404);
    })->where('any', '.*');
