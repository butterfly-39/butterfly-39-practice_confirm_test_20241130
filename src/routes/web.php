<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\Contact;
use App\Models\Category;


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

Route::middleware('auth')->group(function () {
    Route::get('/', [ContactController::class, 'index']);
    });
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'handleForm']);
Route::get('/admin', [ContactController::class, 'search']);
Route::get('/login', [ContactController::class, 'login']);
Route::delete('/contact/delete', [ContactController::class, 'destroy']);
Route::get('/admin/export', [ContactController::class, 'export']);
