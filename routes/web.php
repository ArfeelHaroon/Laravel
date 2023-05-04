<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/widgets', function () {
    return view('pages/widgets');
});

Route::get('/topnav', function () {
    return view('pages/layout/top-nav');
});

Route::get('/top-nav-sidebar', function () {
    return view('pages/layout/top-nav-sidebar');
});

Route::get('/boxed', function () {
    return view('pages/layout/boxed');
});

Route::get('/fixed-sidebar', function () {
    return view('pages/layout/fixed-sidebar');
});

Route::get('/chartjs', function () {
    return view('pages/charts/chartjs');
});

Route::get('/flot', function () {
    return view('pages/charts/flot');
});

Route::get('/inline', function () {
    return view('pages/charts/inline');
});

Route::get('/uplot', function () {
    return view('pages/charts/uplot');
});