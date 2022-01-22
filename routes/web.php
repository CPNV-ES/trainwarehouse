<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/export', function () {
    $filename =  date('Y-m-d_H-i-s') . '_' . time() . '.sql';

    Artisan::call('db:export', ['name' =>  $filename]);
    Artisan::call('upload:s3', ['file' => 'database/backup/'. $filename]);

    return "<pre>" . Artisan::output();
});
