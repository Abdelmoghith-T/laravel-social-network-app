<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyprofileController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\SettingsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/myprofile', [MyprofileController::class, 'index'])->name('myprofile.index');
Route::get('/profiles', [ProfilesController::class, 'index'])->name('profiles.index');
Route::get('/profiles/{id}', [ProfilesController::class, 'show'])
->where('id','\d+')
->name('profiles.show');
Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');