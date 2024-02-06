<?php

use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return redirect()->route('index');
})->name('/');


$host = gethostbyname(gethostname());
$host = "http://".$host.":8000";
$qrCode = QrCode::size(300)->generate($host);
Route::view('index', 'index', ['qrCode' => $qrCode,'host'=>$host])->name('index');

include('web-admin.php');