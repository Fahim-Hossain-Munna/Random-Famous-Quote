<?php

use App\Http\Controllers\DashboardMannageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuoteController;
use App\Models\Quote;
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

Route::get('/', [HomeController::class,  'root'])->name('root');

Route::get('/dashboard', [DashboardMannageController::class,  'index'])->middleware(['auth', 'verified'])->name('dashboard.root');

Route::resource('/quote', QuoteController::class)->middleware(['auth', 'verified']);



require __DIR__.'/auth.php';



// ->middleware(['auth', 'verified'])->name('dashboard');
