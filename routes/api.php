<?php

use App\Http\Controllers\ApiController;
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

Route::get('/search-symbol/',[ApiController::class, 'searchSecondSymbol'])->name('search-symbol');
Route::get('/palindrome/',[ApiController::class, 'palindrome'])->name('palindrome');
