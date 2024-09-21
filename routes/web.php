<?php

use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the 'web' middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/project', function () {return view('project');})->middleware(['auth', 'verified'])->name('project');
Route::get('/sample', function () {return view('sample');})->middleware(['auth', 'verified'])->name('sample');
Route::get('/setting', function () {return view('setting');})->middleware(['auth', 'verified'])->name('setting');
Route::get('/analysis', [AnalysisController::class, 'new'])->middleware(['auth', 'verified'])->name('new_analysis');
Route::get('/analysis/{id}', [AnalysisController::class, 'project'])->middleware(['auth', 'verified'])->name('analysis');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
