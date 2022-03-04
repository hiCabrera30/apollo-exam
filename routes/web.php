<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RandomsController;

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

Route::get('/',[RandomsController::class, 'index']);
Route::name("radoms.get-all")->get('/get-all',[RandomsController::class, 'getAll']);
Route::name("radoms.initialize")->post('/',[RandomsController::class, 'store']);

