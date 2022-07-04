<?php

use App\Http\Controllers\ContactController;
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

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('contact/create',[ContactController::class, 'create'])->name('contact.create');
Route::post('contact/create',[ContactController::class, 'store'])->name('contact.store');
Route::get('contact/show/{contact}', [ContactController::class, 'show'])->name('contact.show');