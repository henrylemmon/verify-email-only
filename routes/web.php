<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaveVerifiedEmailController;
use App\Http\Controllers\SendEmailVerificationEmailController;

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

Route::post('/verify-email', [SendEmailVerificationEmailController::class, '__invoke'])
    ->name('verify-email');

Route::get('/save-email', [SaveVerifiedEmailController::class, '__invoke'])
    ->name('save-email');
