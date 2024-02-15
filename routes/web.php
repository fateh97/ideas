<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IdeaController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/idea', [IdeaController::class, 'store'])->name('idea.store');
Route::delete('/idea/{id}', [IdeaController::class, 'destroy'])->name('idea.destroy');
Route::get('/terms', function () {
    return view('terms');
});
