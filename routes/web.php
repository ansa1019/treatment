<?php

use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\SettingController;
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

Route::get('/project', function () {
    return view('project');
})->middleware(['auth', 'verified'])->name('project');
Route::get('/sample', function () {
    return view('sample');
})->middleware(['auth', 'verified'])->name('sample');
Route::get('/analysis', [AnalysisController::class, 'new'])->middleware(['auth', 'verified'])->name('new_analysis');
Route::match(['get', 'post'], '/analysis/{id}', [AnalysisController::class, 'project'])->middleware(['auth', 'verified'])->name('analysis');

Route::middleware('auth')->group(function () {
    Route::get('/setting', [SettingController::class, 'edit'])->name('setting.edit');
    Route::patch('/setting', [SettingController::class, 'update'])->name('setting.update');
    Route::delete('/setting', [SettingController::class, 'destroy'])->name('setting.destroy');
});

require __DIR__ . '/auth.php';
