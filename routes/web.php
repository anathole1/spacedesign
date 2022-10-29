<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProjectTypeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/',[WelcomeController::class, 'welcome'])->name('welcome');
Route::post('/contact',[ContactController::class, 'store'])->name('contact');
Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard', function(){
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::resource('/project_type', ProjectTypeController::class);
    Route::resource('/projects', ProjectController::class);
    Route::resource('/about_us',AboutController::class);
});
require __DIR__.'/auth.php';
